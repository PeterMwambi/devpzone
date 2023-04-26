 <div class="d-flex justify-content-center">
     <span class="intro-text text-light">Tell us where you are heading to</span>
 </div>
 <div class="d-flex justify-content-center mt-3">
     <form action="" method="post" id="locationForm">
         <div class="form-row select-location-inputs">
             <div class="col-12">
                 <?php echo Form::label("PickUp", "Select your Pickup Location", array("text-nowrap", "mr-3")) ?>
                 <select name="pickup-point" class="form-control">
                     <?php
                        foreach ($placeOptions as $option) {
                            echo "<option value='" . $option->name . "'>" . $option->name . "</option>";
                        }
                        ?>
                 </select>
             </div>
             <div class="col-12 mt-3">
                 <?php echo Form::label("Destination", "Select your Destination", array("text-nowrap", "mr-3")) ?>
                 <?php
                    ?>
                 <select name="destination" class="form-control">
                     <?php
                        foreach ($placeOptions as $option) {
                            echo "<option value='" . $option->name . "'>" . $option->name . "</option>";
                        }
                        ?>
                 </select>
             </div>
         </div>
         <div class="row">
             <div class="col-4 col-md-6">
                 <div class="d-flex justify-content-start">
                     <div class="form-group mt-2">
                         <input type="hidden" name="mandatory-form-identifier" value="<?php echo Functions::encrypt("LOCATION_FORM") ?>">
                         <input type="submit" class="btn btn-primary shadow submit-btn" value="Send Request">
                     </div>
                 </div>
             </div>
             <div class="col-8 col-md-6">
                 <div class="d-flex justify-content-end">
                     <a class="text-light mt-3" href="?request=viewTicket">View Pending Requests</a>
                 </div>
             </div>
         </div>

     </form>
 </div>