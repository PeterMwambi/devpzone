<?php

use Models\Authentication\Services\Functions;
use Models\Authentication\Services\Input;
use Models\Core\Config\Directories;
use Models\Services\FAQ\AdminServices;
use Resources\Views\Includes\Components\Alert;
use Resources\Views\Includes\BreadCrumb;
use Resources\Views\Includes\Components\Spinner;

define("ALLOW_SERVICE_ACCESS", TRUE);
$adminProfile = new AdminServices;

if (!$adminProfile->VerifyAdminEntry()) {
    die(header("location:?page=forms&auth=admin"));
}


function CheckReplied()
{
    if (Input::Get("flag") === "replied") {
        return true;
    }
    return false;
}

switch (Input::Get("flag")) {
    case "not-replied":
        $questions = $adminProfile->AdminGetPostedQuestions();
        $title = "Questions awaiting reply";
        break;
    case "replied":
        $questions = $adminProfile->AdminGetRepliedQuestions();
        $title = "Replied Questions";
        break;
    default:
        $questions = $adminProfile->AdminGetPostedQuestions();
        $title = "Recently posted questions";
        break;
}


?>


<section class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-start my-5 mx-5">
                <a href="?page=profile&auth=admin">Home</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end my-5 mx-5">
                <p class="text-muted">
                    Today is:
                    <?php echo $adminProfile->GetPresentDate() ?>
                </p>
                <div class="mx-5">
                    <a
                        href="<?php echo Directories::GetFilePath("app/resources/views/pages/admin/logout.php"); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-5">
        <div class="col-md-12">
            <h3 class="mx-5 my-3">Hi,
                <?php echo ucfirst($adminProfile->GetFirstname()) ?>
                welcome
            </h3>
        </div>

        <!-- Recently Posted Questions -->
        <div class="faq-admin__recently-posted col-md-6">
            <div>
                <h6 class="mx-5 my-3">
                    <?php echo $title; ?>
                </h6>
            </div>
            <div class="my-3">
                <?php echo Spinner::Display("delete-question", "Please Wait"); ?>
            </div>
            <?php echo Alert::Display("delete-question"); ?>
            <div class="my-3 mx-5">
                <?php if (!empty($questions)) { ?>
                <?php $x = 0; ?>
                <?php foreach ($questions as $question): ?>
                <div class="card mt-3">
                    <div class="card-body faq-admin__question-heading p-0">
                        <div class="p-2">
                            <div class="row my-2">
                                <div class="col-md-4 col-12 faq-admin__question-id">
                                    <h6 class="text-muted text-nowrap mx-2">
                                        Qid:
                                        <?php echo $question->qn_id; ?>
                                    </h6>
                                </div>
                                <div class="d-flex justify-content-end col-md-8 faq-admin__question-date">
                                    <h6 class="text-muted text-nowrap mx-2">
                                        Posted on:
                                        <?php echo $question->qn_dayposted . ", " . $question->qn_dateposted . ", " . $question->qn_timeposted; ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="mx-2 my-4 faq-admin__question">
                                <h6 class="col-11">
                                    <?php echo $question->qn_content; ?>
                                </h6>
                            </div>

                            <div class="faq-admin__question-buttons d-flex justify-content-end mb-3">
                                <?php if (CheckReplied()) { ?>
                                <div class="mx-3 mt-3">
                                    <a class="btn btn-primary px-3"
                                        href="?page=topic&auth=admin&qnid=<?php echo $question->qn_id ?>">Read</a>
                                </div>
                                <?php } else { ?>
                                <div class="mx-3 mt-3">
                                    <a class="btn btn-primary px-3"
                                        href="?page=reply&auth=admin&qnid=<?php echo $question->qn_id ?>">Reply</a>
                                </div>
                                <?php } ?>
                                <div class="mx-3 mt-3">
                                    <a class="btn btn-danger delete-question"
                                        id="<?php echo Functions::encrypt("DELETE_QUESTION"); ?>"
                                        name="<?php echo Functions::encrypt("delete-question"); ?>"
                                        href="<?php echo $question->qn_id; ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php } else { ?>
                <div class="d-flex justify-content-center p-5">
                    <h3 class="text-muted my-5">No Questions Posted</h3>
                </div>
                <?php } ?>
            </div>
        </div>


        <!-- Side Navbar -->
        <div class="faq-admin__side-navbar sticky-top">
            <div class="card my-1">
                <div class="card-body">
                    <div>
                        <strong>In this section</strong>
                    </div>
                    <div class="my-3">
                        <a href="?page=profile&auth=admin&flag=replied">Questions replied</a>
                        <span class="badge bg-primary">
                            <?php echo $adminProfile->AdminGetRepliedCount() ?>
                        </span>
                    </div>
                    <div class="my-3">
                        <a href="?page=profile&auth=admin&flag=not-replied">Questions not replied</a>
                        <span class="badge bg-secondary">
                            <?php echo $adminProfile->AdminGetNotRepliedCount() ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</section>