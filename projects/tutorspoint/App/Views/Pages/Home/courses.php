<?php

use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

require_once(Url::getPath("app/views/includes/components/renders/navbar.php"));
require_once(Url::getPath("app/views/includes/components/renders/page.php"));


processStudentFeePayment();

Session::start();

function getCourses()
{
    $student = new Student;
    return $student->getCourses();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once(Url::getPath("app/views/includes/meta/head.php")); ?>

<body>
    <?php
    if (Session::exists("st_username")) {
        runStudentNavbarSetUp(Page::run()->getTitle());
    } else {
        runDefaultNavbarSetup(Page::run()->getTitle());
    }
    ?>

    <section class="container-fluid mt-md">
        <div>
            <h3 class="text-primary my-3">Courses</h3>
        </div>
        <div class="row">
            <?php foreach (getCourses() as $course): ?>
                <div class="col-md-4 mt-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="my-3">
                                <?php echo $course["c_name"] ?>
                            </h4>

                            <p>
                                <?php echo $course["cn_description"] ?>
                            </p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8 col-8">
                                    <p class="text-muted">Instructor:
                                        <?php echo $course["t_firstname"] . " " . $course["t_lastname"] ?>
                                    </p>
                                </div>
                                <div class="col-md-4 col-4">
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            <img src="<?php echo Url::getReference("resources/assets/images/png/dollar.png") ?>"
                                                class="img-fluid small">
                                        </div>
                                        <p class="ms-2">
                                            <?php echo number_format($course["c_fee"]) . " Ksh"; ?>
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="d-flex">
                                        <?php for ($x = 1; $x <= 5; $x++): ?>
                                            <?php if ($x <= $course["t_ratings"]): ?>
                                                <div>
                                                    <img src="<?php echo Url::getReference("resources/assets/images/png/star.png"); ?>"
                                                        class="img-fluid md-small-2 ms-1">
                                                </div>
                                                <?php continue; endif; ?>
                                            <?php ?>
                                            <div>
                                                <img src="<?php echo Url::getReference("resources/assets/images/png/star2.png"); ?>"
                                                    class="img-fluid small">
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-primary"
                                            href="?cid=<?php echo $course["c_id"] ?>&tid=<?php echo $course["t_id"] ?>">Enroll
                                            now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php require_once(Url::getPath("app/views/includes/meta/scripts.php")); ?>
</body>

</html>