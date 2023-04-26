 <?php

    switch ($reference) {
        case 'category':
            $path = "uploads/category/";
            break;
        case 'sub-category':
            $path = "uploads/sub-category/";
            break;
        case 'products':
            $path = "uploads/products/";
            break;
        case 'suppliers':
            $path = "uploads/suppliers/";
            break;
        case 'employees':
            $path = "uploads/employees/";
            break;
        case 'administrators':
            if ($request === "add") {
                $path = "uploads/employees/";
            } else {
                $path = "uploads/administrators/";
            }
            break;
    }

    $icon = !empty($fieldIcon) ? $fieldIcon : null;

    ?>





 <form method="post" id="upload-form" enctype="multipart/form-data">
     <div class="form-group">
         <div class="alert alert-danger d-none upload-form-alert">
             <div class="alert-body d-flex justify-content-center">
                 <span class="upload-form-alert-text"></span>
             </div>
         </div>
         <div class="d-flex justify-content-center">
             <div class="d-block">
                 <div class="mt-lg-2">
                     <div class="d-flex justify-content-center">
                         <img src="<?php echo !empty($icon) ? Directories::getLocation($path . $icon) :  Config::getIcon($reference) ?>" class="img-fluid icon-lg upload-icon">
                     </div>
                     <div class="d-flex justify-content-center">
                         <label for="upload-image" class="btn btn-outline-dark mt-3">
                             <img src="<?php echo Directories::getLocation("tools/assets/open-folder.png") ?>" class="img-fluid icon-sm mb-lg-1">
                             Select Image
                         </label>
                     </div>
                 </div>
                 <div class="d-flex justify-content-center">
                     <small class="profile-text mt-lg-n3"></small>
                 </div>
             </div>
         </div>
         <?php if (!empty($identifier)) { ?>
             <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($identifier) ?>">
         <?php } ?>
         <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADMIN_UPLOAD_FORM") ?>">
         <input type="hidden" name="mandatory-security-reference" value="<?php echo Functions::encrypt($reference) ?>">
         <input type="file" id="upload-image" onchange="readFile(this)" name="upload-image" class="d-none">

     </div>
     <div class="form-group">
         <div class="d-flex justify-content-center">
             <input type="submit" name="upload" class="btn-lg btn-dark" value="Click to Upload">
         </div>
     </div>
 </form>
 <script>
     function readFile(input) {
         var file = $("input[type='file']").get(0).files[0];
         if (file) {
             var reader = new FileReader;
             reader.onload = function() {
                 $(".upload-icon").attr("src", reader.result);
             }
             reader.readAsDataURL(file)
         }
     }
 </script>