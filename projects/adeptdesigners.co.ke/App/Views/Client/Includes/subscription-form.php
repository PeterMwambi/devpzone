 <form method="POST" id="subscription-form" action="">
     <div class="d-flex justify-content-center">
         <?php for ($x = 1; $x <= 5; $x++) { ?>
             <span class="spinner-grow mr-md-2 text-dark spinner-grow-sm d-none busy-waiting"></span>
         <?php } ?>
     </div>
     <div class="alert alert-success d-none message">
         <span class="return-message"></span>
     </div>
     <div class="form-group">
         <label for="email">Enter your Email address</label>
         <input type="email" class="mt-1 mb-2 form-control NewsLetterEmail" name="email">
         <span class="text-danger mb-2 NewsLetterEmailErr"></span>
     </div>
     <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt("SUBSCRIPTION_FORM__aDPTiX@X350") ?>">
     <input type="hidden" name="mandatory-security-passcode" value="<?php echo Functions::encrypt("SUBSCRIPTION_PASS_KEY_PHRASE__@aDPTiX943A") ?>">
     <div class="form-group">
         <input type="submit" class="btn btn-dark btn-lg shadow w-100" value="Subscribe Now">
     </div>
 </form>