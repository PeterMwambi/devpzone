<?php


namespace Models\Core\App\Database\Queries\Create;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Database\Queries\Read\Tutor as ReadTutor;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

class Tutor extends Provider
{

    /*
    ```````````````````````````````````````````````````````````````````
    TUTOR REGISTRATION
    ```````````````````````````````````````````````````````````````````
    */

    /**
     * Regster tutor
     * @param array $data
     * @return bool
     */
    public function registerTutor(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("TPT");
        parent::setUniqId();
        $this->regsterTutorDataFromStep1();
        $this->registerTutorDataFromStep2();
        Session::set("TUTOR_ACCOUNT_ACCESS", Token::run()::generate("TUTOR_USER_AUTH"));
        return true;
    }


    /**
     * Register tutor data from step 1
     * @return void
     */
    protected function regsterTutorDataFromStep1()
    {
        parent::generateFormData("tutor-registration-form-step-1");
        parent::modifyFormDataKeys("-", "_", true, "t_");
        $data = parent::getFormData();
        $data["t_id"] = $this->getUniqId();
        $data["t_phone_number"] = "+254" . $data["t_phone_number"];
        $data["t_date_of_birth"] = DateTime::run()->formatDate($data["t_date_of_birth"], "d/m/Y");
        parent::setTable("tutor_personal_info");
        parent::setQueryData($data);
        parent::insert();
    }

    /**
     * Register tutor data from  step 2
     * @return void
     */
    protected function registerTutorDataFromStep2()
    {
        parent::generateFormData("tutor-registration-form-step-2");
        parent::modifyFormDataKeys("-", "_", true, "t_");
        parent::pushSelectedKeys(["t_username", "t_password"]);
        $data = parent::getFormData();
        $data["t_id"] = $this->getUniqId();
        $data["t_password"] = password_hash($data["t_password"], PASSWORD_DEFAULT);
        $data["t_ratings"] = 2;
        $data["t_reviews"] = json_encode(array());
        $data["t_date_created"] = DateTime::run()->getDateTimeAsJson();
        $data["t_last_login"] = DateTime::run()->getDateTimeAsJson();
        Session::set("t_username", $data["t_username"]);
        parent::setTable("tutor_account_info");
        parent::setQueryData($data);
        parent::insert();
    }


    /*
    ```````````````````````````````````````````````````````````````````
    TUTOR COURSE RECEPTION
    ```````````````````````````````````````````````````````````````````
    */
    /**
     * Register course
     * @return void
     */
    public function registerCourse(array $data)
    {
        parent::setData($data);
        parent::setUniqIdPrefix("TPCN");
        parent::setUniqId();
        $this->registerCourseData();
        return;
    }

    /**
     * Reister course data
     * @return void|bool
     */
    private function registerCourseData()
    {
        parent::generateFormData("course-reception-form");
        $tutorId = ReadTutor::run()->getTutorIdFromUsername(Session::get("t_username"));
        $courseId = ReadTutor::run()->getCourseIdFromName(parent::getFormData()["course"]);
        if ($this->verifyCourseContent($courseId, $tutorId)) {
            parent::modifyFormDataKeys("-", "_", true, "cn_");
            parent::pushSelectedKeys(["cn_description", "cn_topics", "cn_notes"]);
            $data = parent::getFormData();
            $data["cn_id"] = parent::getUniqId();
            $data["c_id"] = $courseId;
            $data["t_id"] = $tutorId;
            $data["cn_date_created"] = DateTime::run()->getDateTimeAsJson();
            $data["cn_topics"] = json_encode(array("topics" => $data["cn_topics"]));
            parent::setTable("course_content");
            parent::setQueryData($data);
            parent::insert();
            $this->generateClassRoom($data["c_id"], $data["cn_id"], $data["t_id"]);
            return;
        } else {
            return false;
        }
    }
    /**
     * Generate classroom
     * @param string $cid
     * @param string $cnid
     * @param string $tid
     * @return void
     */
    private function generateClassRoom(string $cid, string $cnid, string $tid)
    {
        parent::setUniqIdPrefix("TPCL");
        parent::setUniqId();
        $data = [
            "cl_id" => $this->getUniqId(),
            "c_id" => $cid,
            "cn_id" => $cnid,
            "t_id" => $tid,
            "cl_students" => json_encode(array()),
            "cl_date_created" => DateTime::run()->getDateTimeAsJson()
        ];
        parent::setTable("classes");
        parent::setQueryData($data);
        parent::insert();
        return;
    }

    private function verifyCourseContent(string $cid, string $tid)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("course_content.c_id");
        parent::setTable("course_content");
        parent::setJoinClause("
        WHERE course_content.c_id = ? AND course_content.t_id = ?");
        parent::setWhere([$cid, $tid]);
        parent::setFetchControl("array");
        parent::setFetch(0);
        if (empty(parent::queryDataWithResults())) {
            return true;
        } else {
            return false;
        }
    }


}