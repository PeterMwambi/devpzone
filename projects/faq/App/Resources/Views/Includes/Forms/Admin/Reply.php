<?php

use Models\Authentication\Services\Functions;

?>


<form method="post" id="reply-question-form">
    <div class="mb-3">
        <textarea class="form-control" name="reply-message" rows="5" placeholder="Enter your reply"></textarea>
    </div>
    <input type="hidden" name="question-id" value="<?php echo $question->qn_id; ?>">
    <input type="hidden" name="ReplyQuestionPassKey" value="<?php echo Functions::encrypt("REPLY_QUESTION") ?>">
    <input type="hidden" name="FormRequestFlag" value="<?php echo Functions::encrypt("reply-question") ?>">
    <button type="submit" class="btn btn-primary">Send Reply</button>
</form>