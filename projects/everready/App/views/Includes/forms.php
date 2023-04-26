<?php
$query = Input::grab("query");
$action = Input::grab("action");


function getOptions($table, $fields = array())
{
    $databaseHandler = new DatabaseHandler;
    $databaseHandler->setTable($table);
    $databaseHandler->setField($fields);
    $databaseHandler->queryDb("select", 0);
    $results = $databaseHandler->getOutput();
    return $results;
}

$locations = getOptions("locations", array("location_id", "name"));
switch ($action) {
    case 'register':
        switch ($query) {
            case 'drivers':
                $form = 'register-driver';
                $identityValue = Functions::encrypt("DRIVER_REGISTRATION_FORM");
                $button = "Register";
                $formId = "driverRegisterForm";
                $title = "Driver Registration";
                $introMessage = "Please apply by filling in the form bellow";
                $userActionMessage = "Already Have an account ? <a class='text-dark' href='?action=login&query=drivers'> Click here to Login</a>";
                $options = [];
                foreach ($locations as $location) {
                    $options[] = array("name" => $location->name, "value" => $location->name);
                }
                break;
                break;
            case 'vehicle':
                $form = 'register-vehicle';
                $identityValue = Functions::encrypt("VEHICLE_REGISTRATION_FORM");
                $button = "Register";
                $formId = "vehicleRegisterForm";
                $title = "Vehicle Registration";
                $introMessage = "To sign up your vehicle please fill in the fields bellow";
                $userActionMessage = "Already Have an account ? <a class='text-dark' href='?action=login&query=drivers'> Click here to Login</a>";
                break;
            case 'clients':
                $form = 'register-client';
                $button = "Register";
                $identityValue = Functions::encrypt("CLIENT_REGISTRATION_FORM");
                $formId = "clientRegisterForm";
                $title = "Client Registration";
                $introMessage = "Please fill in the form bellow to sign up for your account";
                $userActionMessage = "Already Have an account ? <a class='text-dark' href='?action=login&query=clients'> Click here to Login</a>";
                break;
            case 'administrators':
                $form = 'register-administrator';
                $button = "Register";
                $identityValue = Functions::encrypt("ADMINISTRATORS_REGISTRATION_FORM");
                $formId = "administratorsRegisterForm";
                $title = "Administrators Registration";
                $introMessage = "Please fill in the form bellow to sign up for your account";
                $userActionMessage = "Already Have an account ? <a class='text-dark' href='?action=login&query=admin'> Click here to Login</a>";
                break;
            case 'locations':
                $form = 'register-location';
                $button = "Register Location";
                $identityValue = Functions::encrypt("LOCATION_REGISTRATION_FORM");
                $formId = "locationRegisterForm";
                $title = "Location Registration";
                $introMessage = "Please fill in the form bellow to add a new location";
                $userActionMessage = "Click to <a class='text-dark' href='?action=login&query=admin'>view all registered locations </a>";
                break;
            case 'routes':
                $form = 'register-route';
                $button = "Register Route";
                $identityValue = Functions::encrypt("ROUTE_REGISTRATION_FORM");
                $formId = "routeRegisterForm";
                $title = "Route Registration";
                $introMessage = "Please fill in the form bellow to register a new route";
                $userActionMessage = "Click to <a class='text-dark' href='?action=login&query=admin'>view all registered routes </a>";
                break;
            case 'areas':
                $form = 'register-area';
                $button = "Register Area";
                $identityValue = Functions::encrypt("AREA_REGISTRATION_FORM");
                $formId = "areaRegisterForm";
                $title = "Area Registration";
                $introMessage = "Please fill in the form bellow to register an operation area";
                $userActionMessage = "Click to <a class='text-dark' href='?action=login&query=admin'>view all operational areas </a>";
                $options = [];
                foreach ($locations as $location) {
                    $options[] = array("name" => $location->name, "value" => $location->name);
                }
                break;
        }
        break;
    case 'login':
        switch ($query) {
            case 'drivers':
                $form = 'login';
                $button = "Login";
                $formId = "driverLoginForm";
                $identityValue = Functions::encrypt("DRIVER_LOGIN_FORM");
                $title = "Driver Login";
                $introMessage = "Please login with your username and password to proceed";
                $userActionMessage = "Don't Have an account ? <a class='text-dark' href='?action=register&query=drivers'> Click here to Register</a>";
                break;
            case 'clients':
                $form = 'login';
                $formId = "clientLoginForm";
                $identityValue = Functions::encrypt("CLIENT_LOGIN_FORM");
                $button = "Login";
                $title = "Client Login";
                $introMessage = "Please login with your username and password to proceed";
                $userActionMessage = "Don't Have an account ? <a class='text-dark' href='?action=register&query=clients'> Click here to Register</a>";
                break;
            case 'admin':
                $form = 'login';
                $formId = "administratorLoginForm";
                $identityValue = Functions::encrypt("ADMNISTRATORS_LOGIN_FORM");
                $button = "Login";
                $title = "Administrators Login";
                $introMessage = "Please login with your username and password to proceed";
                $userActionMessage = "Don't Have an account ? <a class='text-dark' href='?action=register&query=administrators'> Click here to Register</a>";
                break;
        }
        break;
    default:
        $introMessage = "Welcome to Everready Taxi Services";
        break;
}
$formInput = Config::getForm($form);
$inputNames = $formInput["name"];
$textInputs = $formInput["text"];
$emailInputs = $formInput["email"];
$passwordInputs = $formInput["password"];
$selectInputs = $formInput["select"];
$fileInputs = $formInput["file"];



?>
<div class="col-12 col-md-7 border rounded shadow p-3 mb-5 form-body">
    <div class="d-flex justify-content-center mt-2">
        <a class="nav-brand d-flex">
            <div>
                <img src="<?php echo Config::getIcon("places") ?>" class="img-fluid icon-sm">
            </div>
            <div>
                <h3 class="text-dark">EVERREADY</h3>
            </div>
        </a>
    </div>
    <div class="d-flex justify-content-center">
        <h1 class="text-nowrap"><?php echo $title; ?></h1>
    </div>
    <div class="mt-2">
        <p class="text-center"><?php echo $introMessage ?>
        </p>
    </div>
    <?php if (empty($query)) { ?>
        <div class="d-flex justify-content-center">
            <span>Login options</span>
        </div>
        <div class="d-flex justify-content-center p-3">
            <a class="btn-lg btn-dark mr-3" href="?action=login&query=drivers">Driver</a>
            <a class="btn-lg btn-primary" href="?action=login&query=clients">Client</a>
        </div>

    <?php } else { ?>
        <div class="alert alert-danger form-alert d-none">
            <div class="d-flex justify-content-center">
                <h4 class="text-center form-alert-heading"></h4>
            </div>
            <div class="d-flex justify-content-center">
                <span class="form-alert-text text-center"></span>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <?php for ($x = 0; $x <= 4; $x++) { ?>
                    <span class="spinner-grow spinner-grow-sm mr-2 d-none"></span>
                <?php } ?>
            </div>
        </div>
        <?php if (isset($getUploadForm) && $getUploadForm === "upload-form") { ?>
            <form action="" method="post">
                <div class="imagePreviewBody">
                    <img src="" class="img-fluid img-lg">
                </div>
                <div class="form-group">
                    <label for="upload-image" class="btn btn-outline-dark">Select Image</label>
                </div>
            </form>

        <?php } ?>
        <form method="post" id="<?php echo $formId ?>">
            <?php foreach ($inputNames as $input) { ?>
                <?php if ($input === "submit") { ?>
                    <div class="form-group">
                        <?php echo Form::Input($input, $input, array("btn btn-dark w-100 mt-3"), $button) ?>
                    </div>
                <?php } ?>
                <?php if ($input === "mandatory-form-identifier") { ?>
                    <div class="form-group">
                        <?php echo Form::Input("hidden", $input, array(), $identityValue) ?>
                    </div>
                <?php } ?>
                <?php if (!empty($fileInputs) && in_array($input, $fileInputs)) { ?>
                    <div class="d-flex justify-content-center">
                        <div class="d-block">
                            <div class="d-flex justify-content-center">
                                <span class="text-center mb-2">Image Preview</span>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div>
                                    <img src="<?php echo Config::getIcon("uploadIcon") ?>" onchange="readFile(this)" class="img-fluid icon imagePreviewIcon">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-group">
                                    <?php echo Form::Label("fileUpload", "Click Here To Select An Image", array("btn btn-dark mt-3")) ?>
                                    <?php echo Form::file($input, array("d-none"), "fileUpload") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function readFile(input) {
                            var file = $("input[type='file']").get(0).files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    $(".imagePreviewIcon").attr("src", reader.result);
                                };
                                reader.readAsDataURL(file);
                            }
                        }
                    </script>
                <?php } ?>
                <?php if (!empty($textInputs) && in_array($input, $textInputs)) { ?>
                    <div class="form-group">
                        <?php echo Form::Label((ucfirst($input)), ucfirst($input)) ?>
                        <?php echo Form::Input("text", $input, array("form-control")) ?>
                    </div>
                <?php } ?>
                <?php if (!empty($emailInputs) && in_array($input, $emailInputs)) { ?>
                    <div class="form-group">
                        <?php echo Form::Label(ucfirst($input), ucfirst($input)) ?>
                        <?php echo Form::Input("email", $input, array("form-control")) ?>
                    </div>
                <?php } ?>
                <?php if (!empty($passwordInputs) && in_array($input, $passwordInputs)) { ?>
                    <div class="form-group">
                        <?php echo Form::Label(ucfirst($input), ucfirst($input)) ?>
                        <?php echo Form::Input("password", $input, array("form-control")) ?>
                    </div>
                <?php } ?>
                <?php if (!empty($selectInputs) && in_array($input, $selectInputs)) { ?>
                    <?php Form::initializeOptions(); ?>
                    <div class="form-group">
                        <?php echo Form::Label($input, ucfirst($input) . ":") ?>
                        <?php echo Form::Select($input, $options, array("form-control")) ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </form>
    <?php } ?>
    <div class="row mt-2">
        <div class="col-8 col-md-10">
            <?php echo $userActionMessage ?>
        </div>
        <?php if (!empty($query) && !empty($action)) { ?>
            <div class="col-4 col-md-2">
                <div class="d-flex justify-content-end">
                    <a class="mr-3" href="./">Restart</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>