<?php

use Models\Core\App\Utilities\Url;

require_once(Url::getPath("app/views/includes/components/renders/page.php"));

?>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="mt-3">
            <img src="<?php echo Url::getReference("resources/assets/images/png/workplace.png") ?>"
                class="img-fluid small mt-1">
        </div>
        <h3 class="col-md-9 mt-3 text-primary">My Classes</h3>
    </div>
    <div class="row justify-content-center">
        <?php foreach (getStudentClasses() as $class): ?>
            <div class="col-md-9 mt-3">
                <div class="card my-3 h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>
                                    <?php echo $class["c_name"]; ?>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end">
                                    <h6>
                                        Began on:
                                        <?php echo getItemDate($class["cl_date_created"]) ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <p class="col-md-8 mt-3">
                            <?php echo $class["cn_description"] ?>
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <p>By:
                                    <?php echo $class["t_firstname"] . " " . $class["t_lastname"] ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary" href="<?php echo "?clid=" . $class["cl_id"] ?>">Attend
                                        lecture</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>