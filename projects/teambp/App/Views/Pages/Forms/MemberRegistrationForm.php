<?php

use Models\Core\App\Cache\Storage;
use Models\Core\App\Utilities\Url;

Storage::ClearCacheData();
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once(Url::GetPath("app/views/includes/meta/head.php")); ?>

<body>

    <section class="container-fluid">
        <?php require_once(Url::GetPath("app/views/includes/components/navigation/clientnavigation.php")); ?>

        <div class="row p-lg-5 p-md-3 p-2">
            <div class="col-lg-6 col-md-12 animate__animated animate__slideInLeft">
                <div class="mt-lg-1 d-flex justify-content-center">
                    <h1 class="text-success"><strong>Member Registration</strong></h1>
                </div>
                <div class="mt-lg-3 d-flex justify-content-center">
                    <img class="img-fluid mt-3 mx-3"
                        src="<?php echo Url::GetReference("resources/assets/images/png/workplace.png") ?>">
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12 animate__animated animate__slideInRight">
                <?php require_once(Url::GetPath("app/views/includes/widgets/formprogressbar.php")); ?>
                <div class="mt-lg-5 mx-lg-5 my-3 p-md-4 p-lg-4 p-4 border border-secondary rounded">
                    <?php require_once(Url::GetPath("app/views/includes/widgets/formheader.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/components/alert/success.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/components/forms/MemberRegistration/step5.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/components/forms/MemberRegistration/step4.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/components/forms/MemberRegistration/step3.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/components/forms/MemberRegistration/step2.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/components/forms/MemberRegistration/step1.php")) ?>
                    <?php require_once(Url::GetPath("app/views/includes/widgets/formfooter.php")) ?>
                </div>
            </div>
        </div>
    </section>


    <?php require_once(Url::GetPath("app/views/includes/meta/scripts.php")); ?>
    <script>
        $(document).ready(function () {
            $(window).bind('beforeunload', function () {
                return 'Are you sure you want to leave?';
            });
        })
    </script>

</body>

</html>