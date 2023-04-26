<?php

require_once("../Models/data.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Resources/CSS/bootsrap.css" />
    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="d-flex justify-content-center">
            <div class="mt-5 card col-7 shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-center my-3">
                        <h1 class="text-primary">Client registration form</h1>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <h4 class="text-dark">
                            <strong>Step 1: Personal Information</strong>
                        </h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <?php
          if (isset($error)) {

            ?>
                    <div class="alert alert-danger">
                        <div class="alert-heading">
                            <h5>Oops! Unexpected error occured</h5>
                        </div>
                        <div class="mt-1"><em>
                                <?php echo $error ?>
                            </em></div>
                    </div>
                    <?php
          }
          ?>
                    <form action="" method="post">
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="firstname"><strong>First name:</strong></label>
                                    <input type="text" class="form-control" name="firstname"
                                        value="<?php echo !empty($firstname) ? $firstname : "" ?>" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="lastname"><strong>Last name:</strong></label>
                                    <input type="text" class="form-control" name="lastname"
                                        value="<?php echo !empty($lastname) ? $lastname : "" ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="gender"><strong>Gender:</strong></label>
                                    <select name="gender" class="form-select">
                                        <option value="male"
                                            <?php echo (!empty($gender)&& $gender === "male") ? "selected = 'selected'" : '' ?>>
                                            Male</option>
                                        <option value="female"
                                            <?php echo (!empty($gender) && $gender === "female") ? "selected = 'selected'" : '' ?>>
                                            Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="age"><strong>Age:</strong></label>
                                    <input type="number" class="form-control" name="age"
                                        value="<?php echo !empty($lastname) ? $lastname : "" ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="nationality"><strong>Nationality:</strong></label>
                                    <select name="nationality" class="form-select">
                                        <option value="kenyan"
                                            <?php echo (!empty($nationality) && $nationality === "kenyan") ? "selected = 'selected'" : '' ?>>
                                            Kenyan</option>
                                        <option value="non-kenyan"
                                            <?php echo (!empty($nationality) && $nationality === "non-kenyan") ? "selected = 'selected'" : '' ?>>
                                            Non-Kenyan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="national-id"><strong>National id:</strong></label>
                                    <input type="number" class="form-control" name="national-id"
                                        value="<?php echo !empty($nationalId) ? $nationalId : "" ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="phone-number"><strong>Phone number:</strong></label>
                                    <input type="number" class="form-control" name="phone-number"
                                        value="<?php echo !empty($phoneNumber) ? $phoneNumber : "" ?>" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="mb-2" for="email"><strong>Email:</strong></label>
                                    <input type="text" class="form-control" name="email"
                                        value="<?php echo !empty($email) ? $email : "" ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-lg btn-primary w-100">
                                Go to step 2
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="../Resources/JS/bootstrap.js"></script>
</body>

</html>