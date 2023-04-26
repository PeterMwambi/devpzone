<?php

use Models\Authentication\Services\Input;

if (Input::Get("auth") === "admin") {
    $auth = "admin";
    $page = "profile";
} else {
    $auth = "guest";
    $page = "home";
}

?>





<div class="row faq-navbar">
    <div class="col-md-6">
        <div class="mx-5 my-5">
            <a href="?page=<?php echo $page ?>&auth=<?php echo $auth ?>">Home</a>
        </div>
    </div>
    <div class="col-md-6 faq-quest__navbar">
        <div class="d-flex justify-content-end my-5">
            <div class="mx-3">
                <a href="?page=<?php echo $page ?>&auth=<?php echo $auth ?>&flag=replied">Questions replied </a>
            </div>
            <div class="mx-3">
                <a href="?page=<?php echo $page ?>&auth=<?php echo $auth ?>&flag=not-replied">Questions not replied</a>
            </div>
            <?php if (Input::Get("auth") === "guest") { ?>
            <div class="mx-3">
                <a href="?page=forms&auth=guest&action=login">Go to admin</a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>