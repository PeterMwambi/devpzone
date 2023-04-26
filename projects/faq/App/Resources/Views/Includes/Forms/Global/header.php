<?php

use Models\Core\Config\Directories;

?>

<div class="card-header">
    <div class="faq-admin__form-heading my-3 d-flex justify-content-center">
        <div>
            <img src="<?php echo Directories::GetFilePath("app/resources/assets/padlock.png") ?>" alt="">
        </div>
        <div>
            <emp class="text-muted">Please sign in to proceed</emp>
        </div>
    </div>
</div>