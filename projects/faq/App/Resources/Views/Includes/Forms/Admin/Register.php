<?php

use Models\Authentication\Services\Functions;
use Models\Core\Config\Directories;
use Resources\Views\Includes\Components\Alert;
use Resources\Views\Includes\Components\Spinner;

?>



<div class="card border-dark">
    <div class="card-header">
        <div class="faq-admin__form-heading my-3 d-flex justify-content-center">
            <div>
                <img src="<?php echo Directories::GetFilePath("app/resources/assets/padlock.png") ?>" alt="">
            </div>
            <div>
                <emp class="text-muted">Please register to proceed</emp>
            </div>
        </div>
    </div>
    <div class="card-body p-4">
        <?php
        Spinner::Display("admin-register-form", "Please wait");
        Alert::Display("admin-register");
        ?>
        <form method="post" id="admin-register-form">
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="form-label">Firstname:</label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <div class="col-md-6 ">
                    <label class="form-label">Lastname:</label>
                    <input type="text" class="form-control" name="lastname">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="form-label">Phone number:</label>
                    <input type="text" class="form-control" name="phone-number">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email:</label>
                    <input type="text" class="form-control" name="email">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="mt-4">
                <label class="form-label">Re-enter Password:</label>
                <input type="password" class="form-control" name="confirm-password">
            </div>
            <input type="hidden" name="AdminRegisterPassKey" value="<?php echo Functions::encrypt("ADMIN_REGISTER") ?>">
            <input type="hidden" name="FormRequestFlag" value="<?php echo Functions::encrypt("register-admin") ?>">
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
        </form>
    </div>
    <?php require_once(Directories::GetFilePath("app/resources/views/includes/forms/global/footer.php")); ?>
</div>