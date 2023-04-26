<?php

use Models\Authentication\Services\Functions;
use Models\Authentication\Services\Input;
use Models\Authentication\Services\Sanitize;
use Models\Core\Config\Directories;
use Models\Services\FAQ\GuestServices;
use Resources\Views\Includes\Components\Alert;
use Resources\Views\Includes\Components\Spinner;

define("ALLOW_SERVICE_ACCESS", TRUE);
$guestTopic = new GuestServices;

$id = Sanitize::String(Input::Get("qnid"));

$question = $guestTopic->GuestGetRepliedQuestionById($id);

?>


<?php
require_once(Directories::GetFilePath("app/resources/views/includes/components/navbar.php"));


?>


<div class="container">

    <div class="faq-admin__topic">

        <?php if (Input::Get("auth") === "admin") { ?>
        <div class="my-3">
            <?php echo Spinner::Display("delete-question", "Please Wait"); ?>
        </div>
        <?php echo Alert::Display("delete-question"); ?>
        <?php } ?>
        <div class="row">
            <div class="col-md-6">
                <h6 class="text-muted ">Question</h6>
            </div>
            <div class="col-md-6">
                <h6 class="text-muted ">
                    Posted on:
                    <?php echo $question->qn_dayposted . ", " . $question->qn_dateposted . ", " . $question->qn_timeposted; ?>
                </h6>
            </div>
        </div>
        <div>
            <h5><strong class="">
                    <?php echo $question->qn_content ?>
                </strong></h5>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <h6 class="text-muted ">Answer</h6>
            </div>
            <div class="col-md-6">
                <h6 class="text-muted ">
                    Answered on:
                    <?php echo $question->rp_dayposted . ", " . $question->rp_dateposted . ", " . $question->rp_timeposted; ?>
                </h6>
            </div>
        </div>

        <div class="mt-3">
            <p class=" col-5">
                <?php echo $question->rp_content; ?>
            </p>
        </div>


        <?php if (Input::Get("auth") === "admin") { ?>
        <div class="faq-admin__delete-btn mt-5">
            <a class="btn btn-danger delete-question" data-redirect="home"
                id="<?php echo Functions::encrypt("DELETE_QUESTION"); ?>"
                name="<?php echo Functions::encrypt("delete-question"); ?>"
                href="<?php echo $question->qn_id; ?>">Delete</a>
        </div>
        <?php } ?>
    </div>
</div>