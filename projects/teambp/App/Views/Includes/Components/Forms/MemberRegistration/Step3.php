<?php
use Models\Auth\Hashing;
use Models\Core\App\Utilities\Url;

?>
<form method="post" class="d-none" id="registration-form-step-3">
    <div class="mb-3">
        <label for="education-level" class="mb-2"><strong>Education level:</strong> *</label>
        <select class="form-select" name="education-level" placeholder="">
            <option>Mid-Level</option>
            <option>Undergraduate</option>
            <option>Graduate</option>
            <option>Post-Graduate</option>
        </select>
    </div>

    <div class="mb-3">
        <div>
            <label for="skills"><strong>Key skills and competencies:</strong></label>
        </div>
        <div class="mb-2">
            <span class="text-muted">Use a coma (,) to seperate them if they are multiple</span>
        </div>
        <textarea class="form-control" rows="3" cols="3" name="skills" placeholder="What are you good in ?"></textarea>
    </div>

    <div class="mb-3">
        <label for="bio" class="mb-2"><strong>Bio information:</strong></label>
        <textarea class="form-control" rows="3" cols="3" name="bio" placeholder="Tell us about yourself"></textarea>
    </div>

    <input type="hidden" name="form-identifier" value="<?php echo Hashing::encrypt("MEMBER_REGISTRATION_STEP_3") ?>">

    <?php require(Url::GetPath("app/views/includes/widgets/formbutton.php")); ?>

</form>