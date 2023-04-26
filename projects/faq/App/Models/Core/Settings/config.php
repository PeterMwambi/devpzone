<?php

use Models\Core\Config\Directories;


/** 
 * DATABASE CONFIGURATION CONSTANTS
 */
define(
    "DB_SETTINGS",
    array(
        "host" => "127.0.0.1",
        "username" => "root",
        "password" => "",
        "name" => "book_store",
        "options" => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    )
);



/**
 * PAGE CONFIGURATION CONSTANTS
 */
define(
    "PAGE_SETTINGS",
    array(
        "admin" => array(
            "profile" => array(
                "title" => "Admin Dashboard",
                "page" => Directories::GetFilePath("App/resources/views/pages/admin/profile.php"),
            ),
            "reply" => array(
                "title" => "Reply Question",
                "page" => Directories::GetFilePath("App/resources/views/pages/admin/reply.php"),
            ),
            "topic" => array(
                "title" => "View Topic",
                "page" => Directories::GetFilePath("App/resources/views/pages/global/topic.php"),
            )
        ),
        "guest" => array(
            "home" => array(
                "title" => "FAQ(Frequently Asked Questions)",
                "page" => Directories::GetFilePath("App/resources/views/pages/guest/home.php")
            ),
            "topic" => array(
                "title" => "Read Topic",
                "page" => Directories::GetFilePath("App/resources/views/pages/global/topic.php")
            ),
            "forms" => array(
                "title" => "Login/Registration panel",
                "page" => Directories::GetFilePath("App/resources/views/pages/guest/form.php")
            ),
        ),
        "meta" => array(
            "scripts" => Directories::GetFilePath("App/resources/views/includes/meta/scripts.php"),
            "head" => Directories::GetFilePath("app/resources/views/includes/meta/head.php")
        ),
    )
);