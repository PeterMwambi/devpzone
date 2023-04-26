<?php

use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>


<form method="post" class="d-none" id="registration-form-step-5">

    <div class="mb-3">
        <label for="security-question" class="mb-2"><strong>Answer the following 3 security questions:
                *</strong></label>
        <div>
            <p class="text-muted">Security questions help to ensure that your account is secure.
            </p>
        </div>
        <div>
            <p class="text-muted">You will be required to provide
                the answers to the questions you choose whenever you forget your password <a
                    href="javascript:void(0)">Learn more</a></p>
        </div>
        <div>
            <p class="text-muted">Ensure that you choose different questions</p>
        </div>
    </div>

    <?php
    for ($x = 1; $x <= 3; $x++) {
        ?>
    <div class="security-question-<?php echo $x ?>">
        <div class="form-group mb-3">
            <label for="security-question-<?php echo $x ?>" class="mb-2"><strong>Security question
                    <?php echo $x ?>
                    *
                </strong></label>
            <select name="security-question-<?php echo $x ?>" class="form-select">
                <option>What is the name of your foverite pet ?</option>
                <option>What was your childhood nickname ?</option>
                <option>What is the name of your foverite movie ? </option>
                <option>What is the name of your foverite cousin ?</option>
                <option>What is the name of your foverite meal ?</option>
                <option>What is your foverite game ?</option>
                <option>What was the name of the city where your parents met ?</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="security-answer-<?php echo $x ?>" class="mb-2"><strong>Answer question:
                </strong></label>
            <input type="password" name="security-answer-<?php echo $x ?>"
                class="form-control password-visibility-toggle">
        </div>
    </div>
    <?php } ?>


    <div class="d-flex justify-content-end">
        <div class="form-check">
            <input type="checkbox" class="form-check-input password-switch">
            <label for="show-password">Show Responses</label>
        </div>
    </div>

    <input type="hidden" name="form-identifier" value="<?php echo Hashing::encrypt("MEMBER_REGISTRATION_STEP_5") ?>">

    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>

</form>