<?php

namespace Models\Core\App\Database\Queries\Read;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

/**
 * Next versions should implement hashes for login
 */
class Tutor extends Provider
{

    private static $instance = null;


    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Tutor;
        }
        return self::$instance;
    }


    public function loginTutor(array $data)
    {
        $this->setData($data);
        $this->prepareLoginPrimitives();
        return true;
    }

    private function prepareLoginPrimitives()
    {
        parent::generateFormData("tutor-login-form");
        $data = parent::getFormData();
        $username = $data["username"];
        Session::set("TUTOR_ACCOUNT_ACCESS", Token::run()::generate("TUTOR_USER_AUTH"));
        Session::set("t_username", $username);
        parent::setTable("tutor_account_info");
        parent::setQueryData(
            [
                "set" => array(
                    "t_last_login" => DateTime::run()->getDateTimeAsJson()
                ),
                "where" => array(
                    "t_username" => $username
                )
            ]
        );
        parent::update();
    }

    public function getFirstname(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            tutor_personal_info.t_firstname,
            tutor_personal_info.t_id");
        parent::setTable("tutor_personal_info");
        parent::setJoinClause("INNER JOIN 
            tutor_account_info 
            ON 
            tutor_personal_info.t_id = tutor_account_info.t_id
            WHERE tutor_account_info.t_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        return parent::queryDataWithResults()->t_firstname;
    }

    public function getLoginTime($username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("tutor_account_info.t_last_login");
        parent::setTable("tutor_account_info");
        parent::setJoinClause("WHERE tutor_account_info.t_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        $dateTime = json_decode(parent::queryDataWithResults()->t_last_login);
        return $dateTime->day . ", " . $dateTime->date . " " . $dateTime->time;
    }


    public function getCourseIdFromName(string $courseName)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("courses.c_id");
        parent::setTable("courses");
        parent::setJoinClause("WHERE courses.c_name = ?");
        parent::setWhere([$courseName]);
        parent::setFetchControl("array");
        parent::setFetch(0);
        return parent::queryDataWithResults()["c_id"];
    }

    public function getTutorIdFromUsername(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("tutor_account_info.t_id");
        parent::setTable("tutor_account_info");
        parent::setJoinClause("WHERE tutor_account_info.t_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("array");
        parent::setFetch(0);
        return parent::queryDataWithResults()["t_id"];
    }

    public function getTutorCourses(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        courses.c_id,
        course_content.cn_id,
        courses.c_name, 
        course_category.ct_name,
        courses.c_description, 
        course_content.cn_date_created");
        parent::setTable("courses");
        parent::setJoinClause("
        INNER JOIN
        course_category ON
        courses.ct_id = course_category.ct_id
        INNER JOIN 
        course_content ON
        courses.c_id = course_content.c_id
        INNER JOIN 
        tutor_account_info ON
        course_content.t_id = tutor_account_info.t_id
        WHERE tutor_account_info.t_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    public function getCourseContent(string $cnid, string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        courses.c_name,
        course_content.cn_description,
        course_content.cn_topics,
        course_content.cn_notes,
        course_content.cn_date_created
        ");
        parent::setTable("course_content");
        parent::setJoinClause("
        INNER JOIN 
        tutor_account_info ON
        course_content.t_id = tutor_account_info.t_id
        INNER JOIN
        courses ON
        courses.c_id = course_content.c_id
        WHERE course_content.cn_id = ? AND tutor_account_info.t_username = ?
        ");
        parent::setWhere([$cnid, $username]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

    public function getStudentPayments(string $username)
    {
        $tid = $this->getTutorIdFromUsername($username);
        parent::setAction("SELECT");
        parent::setFieldItems("
        courses.c_name,
        courses.c_fee,
        student_personal_info.st_firstname,
        student_personal_info.st_lastname,
        student_personal_info.st_phone_number,
        payments.st_id,
        payment_details.pmd_amount,
        payment_details.pmd_date,
        payment_details.pmd_status,
        payment_details.pmd_transaction_code,
        payment_details.pmd_mode,
        payment_details.pmd_balance");
        parent::setTable("payments");
        parent::setJoinClause("
        INNER JOIN payment_details
        ON
        payments.pm_id = payment_details.pm_id
        INNER JOIN student_personal_info
        ON
        payments.st_id = student_personal_info.st_id
        INNER JOIN courses 
        ON
        payments.c_id = courses.c_id
        WHERE payments.t_id = ?");
        parent::setWhere([$tid]);
        parent::setFetch(1);
        parent::setFetchControl("array");
        return parent::queryDataWithResults();
    }


    public function getStudents(string $username)
    {
        $tid = $this->getTutorIdFromUsername($username);
        $classes = Admin::run()->getClasses(["classes.t_id", "=", $tid]);
        if (!is_array($classes)) {
            return;
        }
        $students = [];
        $studentData = [];
        $studentsArray = [];

        foreach ($classes as $class) {
            array_push($students, $class["cl_students"]);
        }
        foreach ($students as $student) {
            $student = json_decode($student);
            array_push($studentData, $student);
        }
        foreach ($studentData as $classroom) {
            foreach ($classroom as $student) {
                parent::setAction("SELECT");
                parent::setFieldItems("
                student_personal_info.st_id,
                student_personal_info.st_firstname,
                student_personal_info.st_lastname,
                student_personal_info.st_phone_number,
                courses.c_name,
                payments.pm_id,
                payment_details.pmd_date,
                payment_details.pmd_amount,
                payment_details.pmd_mode,
                payment_details.pmd_balance,
                payment_details.pmd_status");
                parent::setTable("student_personal_info");
                parent::setJoinClause("
                INNER JOIN payments
                ON 
                student_personal_info.st_id = payments.st_id
                INNER JOIN payment_details
                ON
                payments.pm_id = payment_details.pm_id
                INNER JOIN courses
                ON
                payments.c_id = courses.c_id
                WHERE student_personal_info.st_id = ?");
                parent::setWhere([$student]);
                parent::setFetchControl("array");
                parent::setFetch(0);
                array_push($studentsArray, parent::queryDataWithResults());
            }
        }
        return $studentsArray;
    }


    public function getClasses(string $username)
    {
        $tid = $this->getTutorIdFromUsername($username);
        $classes = Admin::run()->getClasses(["classes.t_id", "=", $tid]);
        if (!is_array($classes)) {
            return;
        }
        $classData = [];
        foreach ($classes as $class) {
            parent::setAction("SELECT");
            parent::setFieldItems("
            classes.cl_id,
            courses.c_name,
            classes.cl_date_created,
            classes.cl_students");
            parent::setTable("classes");
            parent::setJoinClause("
            INNER JOIN courses
            ON 
            classes.c_id = courses.c_id
            WHERE classes.cl_id = ?");
            parent::setWhere([$class["cl_id"]]);
            parent::setFetch(0);
            parent::setFetchControl("array");
            array_push($classData, parent::queryDataWithResults());
        }
        return $classData;
    }
}