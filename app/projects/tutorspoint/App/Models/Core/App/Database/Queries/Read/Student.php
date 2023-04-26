<?php

namespace Models\Core\App\Database\Queries\Read;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

/**
 * Next versions should implement hashes for login
 */
class Student extends Provider
{

    private static $instance = null;


    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Student;
        }
        return self::$instance;
    }


    public function loginStudent(array $data)
    {
        $this->setData($data);
        $this->prepareLoginPrimitives();
        return true;
    }

    private function prepareLoginPrimitives()
    {
        parent::generateFormData("student-login-form");
        $data = parent::getFormData();
        $username = $data["username"];
        Session::start();
        Session::set("STUDENT_ACCOUNT_ACCESS", Token::run()::generate("STUDENT_USER_AUTH"));
        Session::set("st_username", $username);
        parent::setTable("student_account_info");
        parent::setQueryData(
            [
                "set" => array(
                    "st_last_login" => DateTime::run()->getDateTimeAsJson()
                ),
                "where" => array(
                    "st_username" => $username
                )
            ]
        );
        parent::update();
    }


    public function getLoginTime(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("student_account_info.st_last_login");
        parent::setTable("student_account_info");
        parent::setJoinClause("WHERE student_account_info.st_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        $dateTime = json_decode(parent::queryDataWithResults()->st_last_login);
        return $dateTime->day . ", " . $dateTime->date . " " . $dateTime->time;
    }
    public function getFirstname(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            student_personal_info.st_firstname,
            student_personal_info.st_id");
        parent::setTable("student_personal_info");
        parent::setJoinClause("INNER JOIN 
            student_account_info 
            ON 
            student_personal_info.st_id = student_account_info.st_id
            WHERE student_account_info.st_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        return parent::queryDataWithResults()->st_firstname;
    }

    public function getCourses()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        tutor_personal_info.t_firstname,
        tutor_personal_info.t_lastname,
        tutor_account_info.t_ratings,
        courses.c_id,
        course_category.ct_id,
        courses.c_name, 
        course_category.ct_name,
        courses.c_description, 
        course_content.cn_description,
        course_content.t_id,
        courses.c_fee,
        courses.c_date_created");
        parent::setTable("courses");
        parent::setJoinClause("
        INNER JOIN
        course_category ON
        courses.ct_id = course_category.ct_id
        INNER JOIN
        course_content ON
        courses.c_id = course_content.c_id
        INNER JOIN 
        tutor_personal_info ON 
        course_content.t_id = tutor_personal_info.t_id
        INNER JOIN
        tutor_account_info ON
        tutor_personal_info.t_id = tutor_account_info.t_id
        ");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

    public function getCourseNameAndPrice(string $cid)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("courses.c_name, courses.c_fee");
        parent::setTable("courses");
        parent::setJoinClause("WHERE courses.c_id = ?");
        parent::setWhere([$cid]);
        parent::setFetchControl("array");
        parent::setFetch(0);
        return parent::queryDataWithResults();
    }
    public function getStudentId(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("student_account_info.st_id");
        parent::setTable("student_account_info");
        parent::setJoinClause("WHERE student_account_info.st_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("array");
        parent::setFetch(0);
        return parent::queryDataWithResults()["st_id"];
    }

    public function getStudentPaymentHistory(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        tutor_personal_info.t_firstname,
        tutor_personal_info.t_lastname,
        payment_details.pmd_amount,
        payment_details.pmd_date,
        payment_details.pmd_status,
        payment_details.pmd_transaction_code,
        payment_details.pmd_mode,
        payment_details.pmd_balance
        ");
        parent::setTable("payment_details");
        parent::setJoinClause("
        INNER JOIN payments ON
        payment_details.pm_id = payments.pm_id
        INNER JOIN tutor_personal_info ON
        payments.t_id = tutor_personal_info.t_id
        INNER JOIN student_account_info ON
        payments.st_id = student_account_info.st_id
        WHERE student_account_info.st_username = ?
        ");
        parent::setWhere([$username]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    private function getClassRoomStudentData()
    {
        Session::start();
        $stid = $this->getStudentId(Session::get("st_username"));
        parent::setAction("SELECT");
        parent::setFieldItems("
            classes.cl_id,
            courses.c_id,
            courses.c_name,
            classes.cl_date_created,
            tutor_personal_info.t_firstname,
            tutor_personal_info.t_lastname");
        parent::setTable("payments");
        parent::setJoinClause("
            INNER JOIN courses ON
            payments.c_id = courses.c_id
            INNER JOIN tutor_personal_info ON
            payments.t_id = tutor_personal_info.t_id
            INNER JOIN classes ON
            payments.c_id = classes.c_id
            INNER JOIN student_account_info ON
            payments.st_id = student_account_info.st_id 
            WHERE payments.st_id = ?");
        parent::setWhere([$stid]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    /**
     * Summary of getSignedCourses
     * @return array|false
     */
    public function getSignedCourses()
    {
        return $this->getClassRoomStudentData();
    }

    public function getSignedClasses()
    {
        Session::start();
        $stid = $this->getStudentId(Session::get("st_username"));
        parent::setAction("SELECT");
        parent::setFieldItems("
            classes.cl_id,
            courses.c_id,
            courses.c_name,
            classes.cl_date_created,
            course_content.cn_description,
            course_content.cn_description,
            course_content.cn_notes,
            tutor_personal_info.t_firstname,
            tutor_personal_info.t_lastname");
        parent::setTable("payments");
        parent::setJoinClause("
            INNER JOIN courses ON
            payments.c_id = courses.c_id
            INNER JOIN tutor_personal_info ON
            payments.t_id = tutor_personal_info.t_id
            INNER JOIN classes ON
            payments.c_id = classes.c_id
            INNER JOIN student_account_info ON
            payments.st_id = student_account_info.st_id 
            INNER JOIN course_content ON
            payments.c_id = course_content.c_id
            WHERE payments.st_id = ?");
        parent::setWhere([$stid]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    public function getCourseContent(string $classId)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        course_content.cn_description,
        course_content.cn_notes,
        course_content.cn_topics,
        courses.c_name,
        tutor_personal_info.t_firstname,
        tutor_personal_info.t_lastname");
        parent::setTable("course_content");
        parent::setJoinClause("
        INNER JOIN courses ON
        course_content.c_id = courses.c_id
        INNER JOIN tutor_personal_info ON
        course_content.t_id = tutor_personal_info.t_id
        INNER JOIN classes ON
        courses.c_id = classes.c_id
        WHERE classes.cl_id = ?
        ");
        parent::setWhere([$classId]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }
}