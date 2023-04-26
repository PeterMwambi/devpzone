<?php

use Models\Authentication\Services\Input;
use Models\Authentication\Services\Sanitize;
use Models\Core\Config\Directories;
use Models\Services\FAQ\AdminServices;
use Resources\Views\Includes\Components\Alert;
use Resources\Views\Includes\Components\Spinner;

define("ALLOW_SERVICE_ACCESS", true);
$adminReply = new AdminServices;

$id = Sanitize::String(Input::Get("qnid"));



$question = $adminReply->AdminGetQuestionById($id);
?>

<?php
require_once(Directories::GetFilePath("app/resources/views/includes/components/navbar.php"));
?>
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>Reply a question</h3>
    </div>

    <div class="my-3">
        <?php echo Spinner::Display("reply-question-form", "Please Wait"); ?>
    </div>
    <?php echo Alert::Display("reply-question"); ?>

    <div class="row">
        <div class="col-md-6">
            <h6 class="text-muted faq-admin__space-items">Question</h6>
        </div>

        <div class="col-md-6">
            <h6 class="text-muted faq-admin__space-items">
                Posted on:
                <?php echo $question->qn_dayposted . ", " . $question->qn_dateposted . ", " . $question->qn_timeposted; ?>
            </h6>
        </div>
    </div>

    <div class="my-1">
        <strong class="faq-admin__space-items">
            <?php echo $question->qn_content ?>
        </strong>
    </div>

    <div class="faq-admin__space-items">
        <?php require_once(Directories::GetFilePath("app/resources/views/includes/forms/admin/reply.php")) ?>
    </div>
</div>