<?php

use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>

<form method="POST" class="d-none" id="login-form-step-2">
    <div class="mb-3">
        <h6 class="mb-2"><strong>Answer the following security questions *</strong></h6>
    </div>

    <div class="mb-3">
        <h6>A final step to confirm your identity. This helps us keep your account intact</h6>
    </div>

    <div class="mb-3">
        <h6>Ensure that you answer a question you had chosen during registration </h6>
    </div>

    <?php
    for ($x = 1; $x <= 2; $x++) {
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


    <div class="d-flex justify-content-start">
        <div class="form-check">
            <input type="checkbox" class="form-check-input password-switch">
            <label for="show-password">Show Responses</label>
        </div>
    </div>

    <input type="hidden" name="form-identifier" value="<?php echo Hashing::encrypt("MEMBER_LOGIN_STEP_2") ?>">


    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>


</form>