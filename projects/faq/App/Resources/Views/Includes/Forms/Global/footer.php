<?php

use Models\Authentication\Services\Input;
use Models\Core\Config\Directories;

switch (Input::Get("action")) {
    case "register":
        $imgPath = Directories::GetFilePath("app/resources/assets/key.png");
        $urlPath = "?page=forms&auth=guest&action=login";
        $btn = "Login";
        break;
    case "login":
        $imgPath = Directories::GetFilePath("app/resources/assets/edit2.png");
        $urlPath = "?page=forms&auth=guest&action=register";
        $btn = "Register";
        break;
}

?>


<div class="card-footer">
    <div class="row my-3">
        <div class="col-4 faq-admin__register-button">
            <a href="<?php echo $urlPath ?>">
                <div class="d-flex">
                    <div>
                        <img src="<?php echo $imgPath ?>" alt="" />
                    </div>
                    <div>
                        <span>
                            <?php echo $btn ?>
                        </span>
                    </div>
                </div>
            </a>
        </div>

        <div class=" col-8 faq-admin__form-footer d-flex justify-content-end">
            <div class="mx-3">
                <a href=""><small>Help</small></a>
            </div>
            <div class="mx-3">
                <a href=""><small>Privacy</small></a>
            </div>
            <div class="mx-3">
                <a href=""><small>Terms</small></a>
            </div>
        </div>
    </div>
</div>