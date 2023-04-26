   <?php

    $intro_card_content = array(
        "Our History" => "Find out how our journey started",
        "Who We Are" => "Discover adept designers",
        "Our Brands" => "Take a look at the brands we sell",
        "Opening Days/Hours" => "We are open from Monday to Saturday",
        "Payment Methods" => "Take a look at the payment modes we accept",
        "Terms and Conditions" => "View our T & Cs",
        "Our Contacts" => "Reach out to us",
        "Social Media" => "Give us a shout out",
        "Our Location" => "Locate our shops"
    )
    ?>

   <div class="container">
       <div class="d-flex justify-content-center mt-5">
           <div class="d-block mt-5">
               <h3 class="text-warning text-center mt-5">About Adept Designers</h3>
               <p class="text-center text-light mb-4"> Find out more about us</p>
           </div>
       </div>
       <div class="row">
           <?php $x = 0; ?>
           <?php foreach ($intro_card_content as $content) {
                $heading = array_keys($intro_card_content);
                $description = array_values($intro_card_content);
                $link_prefix = strtolower(str_replace(array(" ", "/"), "-", $heading[$x]));
            ?>
               <div class="col-md-4 animate__animated animate__flipInX mb-5 mt-n5">
                   <div class="card animateable top-border mt-5">
                       <div class="card-body">
                           <div>
                               <h4 class="text-warning"><?php echo $heading[$x]; ?></h4>
                           </div>
                           <div>
                               <p class="text-left"><?php echo $description[$x]; ?></p>
                           </div>
                           <div>
                               <a class="btn btn-warning" href="<?php echo "#" . $link_prefix; ?>">Find out more &raquo;</a>
                           </div>
                       </div>
                   </div>
               </div>
           <?php
                $x++;
            } ?>
       </div>
   </div>