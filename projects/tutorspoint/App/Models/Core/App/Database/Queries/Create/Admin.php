<?php

namespace Models\Core\App\Database\Queries\Create;

use Models\Auth\Token;
use Models\Core\App\Database\Queries\Handler\Provider;
use Models\Core\App\Database\Queries\Read\Admin as ReadAdmin;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;

class Admin extends Provider
{

    /*
    ``````````````````````````````````````````````````````
    ADMIN REGISTRATION
    ``````````````````````````````````````````````````````
    */

    /**
     * Admin registration
     * @param array $data
     * @return bool
     */
    public function registerAdmin(array $data)
    {
        Session::start();
        parent::setData($data);
        parent::setUniqIdPrefix("TPAD");
        parent::setUniqId();
        $this->regsterAdminDataFromStep1();
        $this->registerAdminDataFromStep2();
        Session::set("ADMIN_ACCOUNT_ACCESS", Token::run()::generate("ADMIN_USER_AUTH"));
        return true;
    }


    /**
     * Admin registration step 1
     * @return void
     */
    private function regsterAdminDataFromStep1()
    {
        parent::generateFormData("admin-registration-form-step-1");
        parent::modifyFormDataKeys("-", "_", true, "ad_");
        $data = parent::getFormData();
        $data["ad_id"] = $this->getUniqId();
        $data["ad_phone_number"] = "+254" . $data["ad_phone_number"];
        $data["ad_date_of_birth"] = DateTime::run()->formatDate($data["ad_date_of_birth"], "d/m/Y");
        parent::setTable("admin_personal_info");
        parent::setQueryData($data);
        parent::insert();
    }

    /**
     * Admin registration step 2
     * @return void
     */
    private function registerAdminDataFromStep2()
    {
        parent::generateFormData("admin-registration-form-step-2");
        parent::modifyFormDataKeys("-", "_", true, "ad_");
        parent::pushSelectedKeys(["ad_username", "ad_password"]);
        $data = parent::getFormData();
        $data["ad_id"] = $this->getUniqId();
        $data["ad_password"] = password_hash($data["ad_password"], PASSWORD_DEFAULT);
        $data["ad_date_created"] = DateTime::run()->getDateTimeAsJson();
        $data["ad_last_login"] = DateTime::run()->getDateTimeAsJson();
        Session::set("ad_username", $data["ad_username"]);
        parent::setTable("admin_account_info");
        parent::setQueryData($data);
        parent::insert();
    }


    /*
    ```````````````````````````````````````````````````````````
    COURSE CATEGORY REGISTRATION
    ```````````````````````````````````````````````````````````
    */

    public function registerCategory(array $data)
    {
        parent::setData($data);
        parent::setUniqIdPrefix("TPCT");
        parent::setUniqId();
        $this->registerCourseCategory();
        return true;
    }

    private function registerCourseCategory()
    {
        parent::generateFormData("course-category-form");
        parent::modifyFormDataKeys("-", "_", true, "ct_");
        $data = parent::getFormData();
        $data["ct_id"] = $this->getUniqId();
        $data["ct_date_created"] = DateTime::run()->getDateTimeAsJson();
        parent::setTable("course_category");
        parent::setQueryData($data);
        parent::insert();
    }

    /*
    ````````````````````````````````````````````````````````````````
    COURSE REGISTRATION
    ````````````````````````````````````````````````````````````````
    */

    /**
     * Register course
     * @param array $data
     * @return bool
     */
    public function registerCourse(array $data)
    {
        parent::setData($data);
        parent::setUniqIdPrefix("TPC");
        parent::setUniqId();
        $this->registerCourseData();
        return true;
    }

    /**
     * Register course data
     * @return void
     */
    private function registerCourseData()
    {
        parent::generateFormData("course-registration-form");
        $categoryId = ReadAdmin::run()->getCourseCategoryIdFromName(parent::getFormData()["category"]);
        parent::modifyFormDataKeys("-", "_", true, "c_");
        parent::pushSelectedKeys(["c_name", "c_description", "c_fee"]);
        $data = parent::getFormData();
        $data["c_id"] = $this->getUniqId();
        $data["ct_id"] = $categoryId;
        $data["c_date_created"] = DateTime::run()->getDateTimeAsJson();
        parent::setTable("courses");
        parent::setQueryData($data);
        parent::insert();
    }


}