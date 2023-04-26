<?php

use Models\Core\Config\Directories as Directories;

use Models\Authentication\Services\Input as Input;
use Models\Core\Config\Settings;

?>

<!DOCTYPE html>
<html lang="en">

<?php

require(Directories::GetFilePath("app/resources/views/includes/meta/head.php"));

?>

<body>



    <?php


    if(!empty(Input::Get("auth")) && !empty(Input::Get("page"))){
        Settings::GetPage(Input::Get("auth"), Input::Get("page"));
    }
            


    ?>


    <?php
    require_once(Directories::GetFilePath("App/resources/views/includes/meta/scripts.php"));
    ?>

</body>

</html>