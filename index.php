<?php
require_once("app/public/autoload.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="app/resources/css/frameworks/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/custom/style.css">
</head>

<body>

    <!-- Devpzone Pre loader icon -->
    <div class="d-flex justify-content-center mt-lg mb-0">
        <img src="favicon.png" class="img-fluid large">
    </div>

    <!-- Devpzone Pre loader message -->
    <div class="d-flex justify-content-center">
        <h5 class="mt-1">Redirecting you in a moment...</h5>
    </div>

    <!-- Devpzone Pre loader spinner -->
    <div class="d-none justify-content-center align-items-center mt-3 dpz__spinner">
        <div class="spinner-grow text-primary spinner-grow-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <?php for ($x = 0; $x <= 3; $x++) { ?>
        <div class="spinner-grow text-primary spinner-grow-sm ms-3" role="status"></div>
        <?php } ?>
    </div>

    <script>
    //Get spinner element by class name
    let spinner = document.querySelector(".dpz__spinner");

    //Let spinner play for 2 seconds then  redirect user after 5 seconds
    window.addEventListener("load", function() {
        setTimeout(function() {
            spinner.classList.remove("d-none");
            spinner.classList.add("d-flex");
        }, 2000)
        setTimeout(function() {
            window.location.href = "app/home"
        }, 5000)
    })
    </script>
</body>

</html>