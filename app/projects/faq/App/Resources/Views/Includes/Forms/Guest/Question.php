<?php

use Models\Authentication\Services\Functions;
use Models\Core\Config\Directories;

?>
<form method="post" id="post-question-form" class="my-3">
    <div class="row">
        <div class="faq-guest__form-input col-9">
            <img src="<?php echo Directories::GetFilePath("app/resources/assets/search.png") ?>" class="img-fluid">
            <input type="text" class="form-control" name="question" placeholder="Type your question">
        </div>
        <input type="hidden" name="PostQuestionPassKey" value="<?php echo Functions::encrypt("POST_QUESTION") ?>">
        <input type="hidden" name="FormRequestFlag" value="<?php echo Functions::encrypt("post-question") ?>">
        <div class="col-3">
            <button type="submit" class="btn btn-success w-100">Ask Question</button>
        </div>
    </div>
</form>