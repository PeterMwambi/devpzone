<?php

use Models\Auth\Input;
use Models\Core\App\Utilities\Url;

require_once(Url::getPath("app/views/includes/components/renders/page.php"));

?>
<div class="container">
    <?php if (!getClassContent(Input::get("clid"))) { ?>
    <div class="d-flex justify-content-center">
        <div class="mt-md">
            <h2>Oops! Class was not found</h2>
            <h4><strong>Dont panic!</strong></h4>
            <p>Here is a few things you can do</p>
            <div class="d-flex">
                <a class="btn btn-primary me-3" href="student-home">Go to home page</a>
                <a class="btn btn-dark me-3" href="courses">View courses</a>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <?php foreach (getClassContent(Input::get("clid")) as $content): ?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h3 class="my-md-5 mt-5">
                    <?php echo $content["c_name"] ?>
                </h3>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end">
                    <h6 class="mt-md-3 my-2">Trainer:
                        <?php echo $content["t_firstname"] . " " . $content["t_lastname"] ?>
                    </h6>
                </div>
            </div>
        </div>
        <iframe src="<?php echo Url::getReference("uploads/notes/" . $content["cn_notes"]) ?>"
            class="w-100 md-height"></iframe>
    </div>
    <?php endforeach; ?>
    <?php } ?>
</div>