<form method="post" id="contact-form">
    <div class="alert alert-danger d-none contact-form-alert">
        <div class="alert-body d-flex justify-content-center">
            <span class="contact-form-alert-text"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 form-group">
            <label for="firstname" class="text-light">Firstname:</label>
            <input type="text" name="firstname" class="form-control custom-message">
        </div>
        <div class=" col-md-6 form-group">
            <label for="lastname" class="text-light">Lastname:</label>
            <input type="text" name="lastname" class="form-control custom-message">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="text-light">Email:</label>
        <input type="text" name="email" class="form-control custom-message">
    </div>
    <div class="form-group">
        <label for="message" class="text-light">Message:</label>
        <textarea name="message" class="form-control messageAreaResizeFalse custom-message" cols="50" rows="2"></textarea>
    </div>
    <div class="form-group">
        <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ConTaCT_FORM__aDPTiX@X350") ?>">
        <input type="hidden" name="mandatory-security-passcode" value="<?php echo Functions::encrypt("ConTAcT_PasS_KEY_PHRASE__@aDPTiX943A") ?>">
        <input class="btn btn-warning w-100" name="sendMessage" type="submit" value="Send &raquo;">
    </div>
</form>