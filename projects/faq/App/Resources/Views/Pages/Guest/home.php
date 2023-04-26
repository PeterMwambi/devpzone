<?php

use Models\Authentication\Services\Input;
use Models\Core\Config\Directories;
use Models\Services\FAQ\GuestServices;
use Resources\Views\Includes\Components\Alert;
use Resources\Views\Includes\Components\Spinner;

define("ALLOW_SERVICE_ACCESS", TRUE);
$guestQuestion = new GuestServices;


function CheckReplied()
{
    if (Input::Get("flag") === "replied") {
        return true;
    }
    return false;
}

switch (Input::Get("flag")) {
    case "not-replied":
        $questions = $guestQuestion->GuestGetPostedQuestions();
        $title = "Questions awaiting reply";
        break;
    case "replied":
        $questions = $guestQuestion->GuestGetRepliedQuestions();
        $title = "Replied Questions";
        break;
    default:
        $questions = $guestQuestion->GuestGetPostedQuestions();
        $title = "Recently Asked";
        break;
}

?>


<section class="container-fluid">

    <?php require_once(Directories::GetFilePath("app/resources/views/includes/components/navbar.php")); ?>


    <div class="faq-guest__heading d-flex justify-content-center">
        <h3>Hi, how can we help you ?</h3>
    </div>

    <div class="faq-guest__question-form col-md-5 mx-auto">

        <div class="my-1">
            <?php Spinner::Display("post-question-form", "Please Wait"); ?>
        </div>
        <?php Alert::Display("post-question") ?>

        <?php require_once(Directories::GetFilePath("app/resources/views/includes/forms/guest/question.php")); ?>
    </div>



    <div class="faq-guest__questions d-flex justify-content-center">
        <div class="col-5 my-3">
            <div class="faq-guest__questions-heading">
                <h6>
                    <?php echo $title; ?>
                </h6>
            </div>

            <?php if (!empty($questions)) { ?>

            <?php foreach ($questions as $question) { ?>

            <div class="card mt-3">
                <div class="card-body p-0">
                    <div class="p-3">
                        <div class="d-flex justify-content-end">
                            <div class="col-md-6 mx-4">
                                <h6 class="text-muted text-nowrap"> Posted on:
                                    <?php echo $question->qn_dayposted . ", " . $question->qn_dateposted . ", " . $question->qn_timeposted; ?>
                                </h6>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start">
                            <strong class="my-2">
                                <?php echo $question->qn_content ?>
                            </strong>
                        </div>

                        <div class="d-flex justify-content-end">
                            <?php if (CheckReplied()) { ?>
                            <a class="btn btn-sm btn-primary"
                                href="?page=topic&auth=guest&qnid=<?php echo $question->qn_id ?>">Read this
                                topic</a>
                            <?php } else { ?>
                            <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Awaiting Reply</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } else { ?>
            <div class="d-flex justify-content-center p-5">
                <h3 class="text-muted my-5">No Questions Posted</h3>
            </div>
            <?php } ?>
        </div>
</section>