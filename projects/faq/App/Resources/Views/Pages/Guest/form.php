<?php

use Models\Authentication\Services\Input;
use Models\Core\Config\Directories as Directories;


    switch(Input::Get("action")){
        case "register":
            $file = Directories::GetFilePath("app/resources/views/pages/guest/forms/register.php");
            $heading = "Create an Account";
            break;
        case "login":
            $file = Directories::GetFilePath("app/resources/views/pages/guest/forms/login.php");
            $heading = "Go to my Account";
            break;
    }
    
?>

<section class="container-fluid">
    <?php require_once(Directories::GetFilePath("app/resources/views/includes/components/navbar.php")); ?>

    <div class="faq-admin__form-heading d-flex justify-content-center my-3">
        <h3><?php echo $heading; ?></h3>
    </div>

    <div class="mb-5">
        <?php !empty($file) ? require_once($file) : "Something unexpected happened"; ?>
    </div>

</section>