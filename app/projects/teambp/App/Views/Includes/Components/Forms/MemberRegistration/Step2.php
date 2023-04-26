<?php
use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>
<form method="post" class="d-none" id="registration-form-step-2">
    <div class="row">
        <div class="col-md-6 col-12 mb-3">
            <label for="county" class="mb-2"><strong>County:</strong> *</label>
            <input type="text" class="form-control " name="county" placeholder="">
        </div>
        <div class="col-md-6 col-12 mb-3">
            <label for="sub-county" class="mb-2"><strong>Sub county:</strong> *</label>
            <input type="text" class="form-control" name="sub-county" placeholder="">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 mb-3">
            <label for="location" class="mb-2"><strong>Area:</strong> *</label>
            <input type="text" class="form-control" name="area" placeholder="">
        </div>
        <div class="col-md-6 col-12 mb-3">
            <label for="city" class="mb-2"><strong>Nearest city:</strong> *</label>
            <select name="city" class="form-select">
                <option>Eldoret</option>
                <option>Embu</option>
                <option>Kisumu</option>
                <option>Kakamega</option>
                <option>Kisii</option>
                <option>Meru</option>
                <option>Muranga</option>
                <option>Mombasa</option>
                <option>Machakos</option>
                <option>Nairobi</option>
                <option>Naivasha</option>
                <option>Nakuru</option>
                <option>Nyeri</option>
                <option>Voi</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-12 mb-3">
            <label for="phone-number" class="mb-2"><strong>Phone number:</strong> *</label>
            <div class="input-group">
                <div class="input-group-text">
                    <span name="phone-number-prefix">+254</span>
                </div>
                <input type="number" class="form-control" name="phone-number" placeholder="e.g 7002345125">
            </div>
        </div>
        <div class="col-md-6 col-12 mb-3">
            <label for="identification" class="mb-2"><strong>National id number:</strong> *</label>
            <input type="number" class="form-control" name="national-id" placeholder="">
        </div>
    </div>

    <div class="mb-3">
        <label for="email-address" class="mb-2"><strong>Email address:</strong> *</label>
        <input type="email" class="form-control" name="email" placeholder="">
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="subscribe-newsletter" value="subscribenewsletter">
        <label class="form-check-label w-100" for="subscribenewsletter">I wish to receive news on events and technology
            straight to my email address
    </div>

    <input type="hidden" name="form-identifier" value="<?php echo Hashing::encrypt("MEMBER_REGISTRATION_STEP_2") ?>">

    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>


</form>