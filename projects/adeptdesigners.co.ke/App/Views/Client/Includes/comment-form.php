 <form method="post" id="comment-form">
     <div class="alert alert-danger d-none comment-form-alert">
         <div class="alert-body d-flex justify-content-center">
             <span class="comment-form-alert-text"></span>
         </div>
     </div>
     <div class="form-group">
         <label for="name" class="text-light">Name:</label>
         <input type="text" name="firstname" class="form-control custom-message">
     </div>
     <div class="form-group mb-lg-2">
         <label for="email" class="text-light">Add a Comment:</label>
         <textarea name="message" class="form-control messageAreaResizeFalse custom-message" cols="50" rows="2"></textarea>
     </div>
     <div class="form-group text-light">
         <label for="rating" class="text-light">Rating:</label>
         <div>
             <?php for ($x = 1; $x <= 5; $x++) { ?>
                 <i class="<?php echo "far fa-star font-lg rating-star-" . (string) $x; ?>"></i>
             <?php } ?>
         </div>
     </div>
     <div class="form-group">
         <input type="hidden" name="counter" class="counter" value="">
         <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("@_CoMmeNt&_FoRM__aDPTiX@X350") ?>">
         <input type="hidden" name="mandatory-security-passcode" value="<?php echo Functions::encrypt("@%CoMmment&_PASS_KEY_PHRASE__@aDPTiX943A") ?>">
         <input type="hidden" name="mandatory-security-value" value="<?php echo $token->create("@%CoMmment&_PASS_KEY_PHRASE__@aDPTiX943A"); ?>">
         <button class="btn btn-warning w-100" name="sendMessage" type="submit">Send &raquo;</button>
     </div>
 </form>