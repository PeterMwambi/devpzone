<?php
use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>
<form method="post" class="" id="registration-form-step-1">
    <div class="row">
        <div class="col-md-6 col-12 mb-3">
            <label for="firstname" class="mb-2"><strong>First name:</strong> *</label>
            <input type="text" class="form-control" name="firstname" placeholder="">
        </div>
        <div class="col-md-6 col-12 mb-3">
            <label for="lastname" class="mb-2"><strong>Last name:</strong> *</label>
            <input type="text" class="form-control" name="lastname" placeholder="">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 mb-3">
            <label for="gender" class="mb-2"><strong>Gender:</strong> *</label>
            <select class="form-control " name="gender" placeholder="">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
        <div class="col-md-6 col-12 mb-3">
            <label for="age" class="mb-2"><strong>Age:</strong> *</label>
            <input type="number" class="form-control" name="age" placeholder="">
        </div>
    </div>
    <div class="mb-3">
        <label for="nationality" class="mb-2"><strong>Nationality:</strong> *</label>
        <select class="form-select" name="nationality" placeholder="">
            <option>Kenyan</option>
            <option>Other</option>
        </select>
    </div>

    <input type="hidden" name="form-identifier"
        value="<?php echo Hashing::encrypt("PROPERTY_OWNER_REGISTRATION_STEP_1") ?>">

    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>

</form>