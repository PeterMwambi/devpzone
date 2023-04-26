<?php


namespace Models\Core\App\Database\Queries\Create;

use Models\Auth\Token as AuthToken;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Database\Queries\Read\Admin;
use Models\Core\App\Database\Queries\Read\Student as ReadStudent;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\Session;

class Student extends Provider
{


    public function registerStudent(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("TPST");
        parent::setUniqId();
        $this->regsterStudentDataFromStep1();
        $this->registerStudentDataFromStep2();
        Session::set("STUDENT_ACCOUNT_ACCESS", AuthToken::run()::generate("STUDENT_USER_AUTH"));
        return true;
    }


    private function regsterStudentDataFromStep1()
    {
        parent::generateFormData("student-registration-form-step-1");
        parent::modifyFormDataKeys("-", "_", true, "st_");
        $data = parent::getFormData();
        $data["st_id"] = $this->getUniqId();
        $data["st_phone_number"] = "+254" . $data["st_phone_number"];
        $data["st_date_of_birth"] = DateTime::run()->formatDate($data["st_date_of_birth"], "d/m/Y");
        parent::setTable("student_personal_info");
        parent::setQueryData($data);
        parent::insert();
    }

    private function registerStudentDataFromStep2()
    {
        parent::generateFormData("student-registration-form-step-2");
        parent::modifyFormDataKeys("-", "_", true, "st_");
        parent::pushSelectedKeys(["st_username", "st_password"]);
        $data = parent::getFormData();
        $data["st_id"] = $this->getUniqId();
        $data["st_password"] = password_hash($data["st_password"], PASSWORD_DEFAULT);
        $data["st_date_created"] = DateTime::run()->getDateTimeAsJson();
        $data["st_last_login"] = DateTime::run()->getDateTimeAsJson();
        Session::set("st_username", $data["st_username"]);
        parent::setTable("student_account_info");
        parent::setQueryData($data);
        parent::insert();
    }
    public function processPayment(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("TPPM");
        parent::setUniqId();
        $this->registerPaymentDataStep1();
        $this->registerPaymentDataStep2();
        Session::destroy("ALLOW_ADD_RECORD");
        return true;
    }

    private function registerPaymentDataStep1()
    {
        $studentId = ReadStudent::run()->getStudentId(Session::get("st_username"));
        $tutorId = Session::get("tid");
        $courseId = Session::get("cid");
        if ($this->verifyStudentNotInClass($courseId, $tutorId, $studentId)) {
            $pmId = $this->getUniqId();
            $data = [
                "pm_id" => $pmId,
                "t_id" => $tutorId,
                "st_id" => $studentId,
                "c_id" => $courseId
            ];
            parent::setTable("payments");
            parent::setQueryData($data);
            parent::insert();
            $this->registerStudentToCourse($courseId, $tutorId, $studentId);
            Session::set("ALLOW_ADD_RECORD", true);
        }
        return;
    }

    private function registerPaymentDataStep2()
    {
        if (Session::exists("ALLOW_ADD_RECORD") && Session::get("ALLOW_ADD_RECORD")):
            parent::generateFormData("fee-payment-form");
            $courseFee = ReadStudent::run()->getCourseNameAndPrice(Session::get("cid"))["c_fee"];
            $status = (parent::getFormData()["amount"] < $courseFee) ? "pending" : "verified";
            $balance = $courseFee - parent::getFormData()["amount"];
            parent::modifyFormDataKeys("-", "_", true, "pmd_");
            $data = parent::getFormData();
            $data["pm_id"] = $this->getUniqId();
            $data["pmd_status"] = $status;
            $data["pmd_date"] = DateTime::run()->getDateTimeAsJson();
            $data["pmd_balance"] = $balance;
            parent::setTable("payment_details");
            parent::setQueryData($data);
            parent::insert();
        endif;
        return;
    }

    private function verifyStudentNotInClass(string $cid, string $tid, string $stid)
    {
        $classroom = Formatter::formatToArray(json_decode(Admin::run()->getClassByCourseAndTutor($cid, $tid)["cl_students"]));
        if (!in_array($stid, $classroom)) {
            return true;
        } else {
            return false;
        }
    }

    private function registerStudentToCourse(string $cid, string $tid, string $stid)
    {
        $classroom = json_decode(Admin::run()->getClassByCourseAndTutor($cid, $tid)["cl_students"]);
        array_push($classroom, $stid);
        $classroom = json_encode($classroom);
        parent::setTable("classes");
        parent::setQueryData(
            [
                "set" => array(
                    "cl_students" => $classroom
                ),
                "where" => array(
                    "c_id" => $cid
                )
            ]
        );
        parent::update();
    }

}