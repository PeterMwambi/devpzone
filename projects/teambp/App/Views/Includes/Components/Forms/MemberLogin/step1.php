<?php

use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>

<form method="post" id="login-form-step-1" autocomplete="off">

    <div class="form-group mb-3">
        <label for="usernameoremail" class="mb-2">Username or Email: *</label>
        <input type="text" name="username" class="form-control userinfo">
    </div>

    <div class="form-group mb-3">
        <label for="password" class="mb-2">Password: *</label>
        <input type="password" name="password" class="form-control password-visibility-toggle">
    </div>
    <div class="d-flex justify-content-start mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input password-switch">
            <label for="show-password">Show password</label>
        </div>
    </div>

    <input type="hidden" name="form-identifier" value="<?php echo Hashing::Encrypt("MEMBER_LOGIN_STEP_1") ?>">

    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>

</form>