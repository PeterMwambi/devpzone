<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/CSS/style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-form">
        <div class="login-form__body">
            <form action="" method="post" id="login-form">
                <div class="login-form__group">
                    <label for="login-form__username">Username</label>
                    <input type="text" name="username" id="username">
                    <span id="username-error"></span>
                </div>
                <div class="login-form__group">
                    <label for="login-form__password">Password</label>
                    <input type="text" name="password" id="password">
                    <span id="password-error"></span>
                </div>
                <div class="login-form__group">
                    <button type="submit">Log in &raquo;</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../resources/JS/script.js"></script>


</body>

</html>