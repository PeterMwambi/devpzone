<?php
use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>
<form method="post" class="d-none" id="registration-form-step-4">
    <div class="form-group mb-3">
        <label for="username" class="mb-2"><strong>Choose a username: *</strong></label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="password" class="mb-2"><strong>Choose a password: *</strong></label>
        <input type="password" name="password" class="form-control password-visibility-toggle">
    </div>

    <div class="form-group mb-3">
        <label for="confirm-password" class="mb-2"><strong>Confirm password: *</strong></label>
        <input type="password" name="confirm-password" class="form-control password-visibility-toggle">
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <a class="text-decoration-none" href="javascript:void(0)">Suggest password</a>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input password-switch">
                    <label for="show-password">Show password</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="terms-and-conditions" value="accepted">
        <label class="form-check-label w-100" for="">By clicking submit you accept the
            <a href="javascript:void(0)">terms and conditions</a></label>
    </div>
    <input type="hidden" name="form-identifier" value="<?php echo Hashing::encrypt("MEMBER_REGISTRATION_STEP_4") ?>">

    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>
</form>