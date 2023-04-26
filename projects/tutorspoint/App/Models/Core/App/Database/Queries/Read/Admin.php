<?php

namespace Models\Core\App\Database\Queries\Read;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

class Admin extends Provider
{
    private static $instance = null;

    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Admin;
        }
        return self::$instance;
    }


    public function loginAdmin(array $data)
    {
        $this->setData($data);
        $this->prepareLoginPrimitives();
        return true;
    }

    private function prepareLoginPrimitives()
    {
        parent::generateFormData("admin-login-form");
        $data = parent::getFormData();
        $username = $data["username"];
        Session::start();
        Session::set("ADMIN_ACCOUNT_ACCESS", Token::run()::generate("ADMIN_USER_AUTH"));
        Session::set("ad_username", $username);
        parent::setTable("admin_account_info");
        parent::setQueryData(
            [
                "set" => array(
                    "ad_last_login" => DateTime::run()->getDateTimeAsJson()
                ),
                "where" => array(
                    "ad_username" => $username
                )
            ]
        );
        parent::update();
    }

    public function getFirstname(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            admin_personal_info.ad_firstname,
            admin_personal_info.ad_id");
        parent::setTable("admin_personal_info");
        parent::setJoinClause("
            INNER JOIN 
            admin_account_info 
            ON 
            admin_personal_info.ad_id = admin_account_info.ad_id
            WHERE admin_account_info.ad_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        return parent::queryDataWithResults()->ad_firstname;
    }

    public function getLoginTime(string $username)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("admin_account_info.ad_last_login");
        parent::setTable("admin_account_info");
        parent::setJoinClause("WHERE admin_account_info.ad_username = ?");
        parent::setWhere([$username]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        $dateTime = json_decode(parent::queryDataWithResults()->ad_last_login);
        return $dateTime->day . ", " . $dateTime->date . " " . $dateTime->time;
    }


    public function getCourseCategoryIdFromName(string $name)
    {
        parent::setAction("SELECT");
        parent::setFieldItems("course_category.ct_id");
        parent::setTable("course_category");
        parent::setJoinClause("WHERE course_category.ct_name = ?");
        parent::setWhere([$name]);
        parent::setFetchControl("object");
        parent::setFetch(0);
        return parent::queryDataWithResults()->ct_id;
    }


    public function getCourseCategories()
    {
        parent::setTable("course_category");
        parent::setFieldItems([
            "course_category.ct_name",
            "course_category.ct_id",
            "course_category.ct_date_created",
            "course_category.ct_description"
        ]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::selectWithResults();
    }

    public function getCourses()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        courses.c_id,
        course_category.ct_id,
        courses.c_name, 
        course_category.ct_name,
        courses.c_description, 
        courses.c_date_created");
        parent::setTable("courses");
        parent::setJoinClause("
        INNER JOIN
        course_category ON
        courses.ct_id = course_category.ct_id
        ");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }


    public function getClassesFullInfo()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        classes.cl_id,
        courses.c_name,
        classes.cl_students,
        tutor_personal_info.t_firstname,
        tutor_personal_info.t_lastname,
        classes.cl_date_created");
        parent::setTable("classes");
        parent::setJoinClause("
        INNER JOIN courses
        ON
        classes.c_id = courses.c_id
        INNER JOIN tutor_personal_info
        ON 
        classes.t_id = tutor_personal_info.t_id");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

    public function getClasses(array $where = array())
    {
        parent::setFieldItems([
            "classes.cl_id",
            "classes.c_id",
            "classes.t_id",
            "classes.cn_id",
            "classes.cl_students",
        ]);
        parent::setTable("classes");
        parent::setWhere($where);
        parent::setFetch(1);
        parent::setFetchControl("array");
        return parent::selectWithResults();
    }

    public function getClassByTutor(string $tid)
    {
        parent::setAction("SELECT");
        parent::setFieldItems(
            "classes.cl_id,
            classes.c_id,
            classes.t_id,
            classes.cn_id,
            classes.cl_students,
            tutor_personal_info.t_firstname,
            tutor_personal_info.t_lastname"
        );
        parent::setTable("classes");
        parent::setJoinClause("
        INNER JOIN tutor_personal_info
        ON
        classes.t_id = tutor_personal_info.t_id
        WHERE tutor_personal_info.t_id = ?
        ");
        parent::setWhere([$tid]);
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }
    public function getClassByCourseAndTutor(string $cid, string $tid, int $fetch = 0)
    {
        parent::setAction("SELECT");
        parent::setFieldItems(
            "classes.cl_id,
            classes.c_id,
            classes.t_id,
            classes.cn_id,
            classes.cl_students,
            tutor_personal_info.t_firstname,
            tutor_personal_info.t_lastname"
        );
        parent::setTable("classes");
        parent::setJoinClause("
        INNER JOIN tutor_personal_info
        ON
        classes.t_id = tutor_personal_info.t_id
        INNER JOIN courses
        ON
        classes.c_id = courses.c_id
        WHERE courses.c_id = ? AND  tutor_personal_info.t_id = ? 
        ");
        parent::setWhere([$cid, $tid]);
        parent::setFetchControl("array");
        parent::setFetch($fetch);
        return parent::queryDataWithResults();
    }

    public function getStudentTutorPayments()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        payments.pm_id,
        courses.c_name,
        courses.c_fee,
        student_personal_info.st_firstname,
        student_personal_info.st_lastname,
        student_personal_info.st_phone_number,
        tutor_personal_info.t_firstname,
        tutor_personal_info.t_lastname,
        tutor_personal_info.t_phone_number,
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
        INNER JOIN tutor_personal_info
        ON
        payments.t_id = tutor_personal_info.t_id
        INNER JOIN courses 
        ON
        payments.c_id = courses.c_id");
        parent::setFetch(1);
        parent::setFetchControl("array");
        return parent::queryDataWithResults();
    }

    public function getStudents()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
            student_personal_info.st_id,
            student_personal_info.st_firstname,
            student_personal_info.st_lastname,
            student_personal_info.st_gender,
            student_personal_info.st_date_of_birth,
            student_personal_info.st_age,
            student_personal_info.st_nationality,
            student_personal_info.st_national_id,
            student_personal_info.st_phone_number,
            student_personal_info.st_email,
            student_account_info.st_date_created,
            student_account_info.st_last_login
        ");
        parent::setTable("student_personal_info");
        parent::setJoinClause("
            INNER JOIN student_account_info
            ON
            student_personal_info.st_id = student_account_info.st_id");
        parent::setFetchControl("array");
        parent::setFetch(1);
        return parent::queryDataWithResults();
    }

    public function getTutors()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        tutor_personal_info.t_id,
        tutor_personal_info.t_firstname,
        tutor_personal_info.t_lastname,
        tutor_personal_info.t_gender,
        tutor_personal_info.t_date_of_birth,
        tutor_personal_info.t_age,
        tutor_personal_info.t_nationality,
        tutor_personal_info.t_national_id,
        tutor_personal_info.t_phone_number,
        tutor_personal_info.t_email,
        tutor_account_info.t_date_created,
        tutor_account_info.t_last_login
        ");
        parent::setTable("tutor_personal_info");
        parent::setJoinClause("
        INNER JOIN tutor_account_info
        ON
        tutor_personal_info.t_id = tutor_account_info.t_id");
        parent::setFetch(1);
        parent::setFetchControl("array");
        return parent::queryDataWithResults();
    }

    public function getAdministrators()
    {
        parent::setAction("SELECT");
        parent::setFieldItems("
        admin_personal_info.ad_id,
        admin_personal_info.ad_firstname,
        admin_personal_info.ad_lastname,
        admin_personal_info.ad_gender,
        admin_personal_info.ad_date_of_birth,
        admin_personal_info.ad_age,
        admin_personal_info.ad_nationality,
        admin_personal_info.ad_national_id,
        admin_personal_info.ad_phone_number,
        admin_personal_info.ad_email,
        admin_account_info.ad_date_created,
        admin_account_info.ad_last_login
        ");
        parent::setTable("admin_personal_info");
        parent::setJoinClause("
        INNER JOIN admin_account_info
        ON
        admin_personal_info.ad_id = admin_account_info.ad_id");
        parent::setFetch(1);
        parent::setFetchControl("array");
        return parent::queryDataWithResults();
    }


}