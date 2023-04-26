<?php

use Models\Authentication\Services\Functions;
use Models\Core\Config\Directories;
use Resources\Views\Includes\Components\Alert;

use Resources\Views\Includes\Components\Spinner;



?>


<div class="card border-dark">
    <?php require_once(Directories::GetFilePath("app/resources/views/includes/forms/global/header.php")); ?>
    <div class="card-body p-4">
        <div class="mb-2">
            <?php
            Spinner::Display("admin-login-form", "Please wait");
            ?>
        </div>
        <?php Alert::Display("admin-login") ?>

        <form method="post" id="admin-login-form">
            <div>
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mt-4">
                <label class="form-label">Password:</label>
                <input type="password" class="form-control show-password" name="password">
            </div>
            <div class="mt-4">
                <div class="form-check">
                    <input class="form-check-input check-password" value="show-password" type="checkbox">
                    <label class="form-check-label" for="">
                        Show password
                    </label>
                </div>
            </div>
            <input type="hidden" name="AdminLoginPassKey" value="<?php echo Functions::encrypt("ADMIN_LOGIN") ?>">
            <input type="hidden" name="FormRequestFlag" value="<?php echo Functions::encrypt("login-admin") ?>">
            <div class="mt-4">
                <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
            </div>
        </form>
    </div>
    <?php require_once(Directories::GetFilePath("app/resources/views/includes/forms/global/footer.php")); ?>
</div>