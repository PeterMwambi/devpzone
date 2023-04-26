<!-- Navigation -->
<?php
$i = 1;
$navbar = array(
    "items" => array(
        "admin" => array("home", "about", "my profile", "sign out"),
        "client" => array("home", "about",  "sign out"),
        "driver" => array("home", "contracts",  "sign out")
    ),
    "links" => array(
        "admin" => array(
            "home" => Directories::getLocation("accounts/admin/") . "?action=home",
            "about" => Directories::getLocation("accounts/admin/") . "?action=about",
            "my profile" => Directories::getLocation("accounts/admin/") . "?action=profile",
            "sign out" => "javascript:",
        ),
        "client" => array(
            "home" => Directories::getLocation("accounts/client/"),
            "about" => Directories::getLocation("accounts/client/") . "?action=about",
            "sign out" => "javascript:",
        ),
        "driver" => array(
            "home" => Directories::getLocation("accounts/driver/"),
            "contracts" => Directories::getLocation("accounts/driver/") . "?action=contracts",
            "sign out" => "javascript:",
        )
    )
);


$navbarMenuItems = $navbar["items"][$page];

$links = $navbar["links"][$page];

?>



<div class="modal fade confirm-logout" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center confirm-logout-text">
                </p>
                <div class="d-flex justify-content-center">
                    <?php for ($x = 0; $x <= 4; $x++) { ?>
                        <span class="spinner-grow logout-spinner text-dark spinner-grow-sm d-none mb-lg-3 ml-lg-2"></span>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="logout-buttons">
                        <a class="btn btn-danger confirm-exit mr-lg-2" href="javascript:void(0)">Confirm</a>
                        <a class="btn btn-dark" href="javascript:void(0)" data-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php



?>
<nav class="navbar navbar-expand-lg bg-light fixed-top bg-light navbar-light shadow-sm p-md-2">
    <a class="nav-brand d-flex">
        <div>
            <img src="<?php echo Config::getIcon("places") ?>" class="img-fluid icon-sm">
        </div>
        <div>
            <h3 class="text-dark">EVERREADY</h3>
        </div>
    </a>
    <div class="d-flex justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#secondaryNavbar" aria-controls="secondaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="secondaryNavbar">
        <ul class="navbar-nav ml-auto">
            <?php foreach ($navbarMenuItems as $item) { ?>
                <li class="nav-item <?php echo "dropdown-btn-" . $i; ?>">
                    <a class="nav-link ml-lg-4 <?php if ($item === "sign out") {
                                                    echo "signout mr-3";
                                                } ?>" href="<?php
                                                            echo $links[$item];
                                                            ?>"><?php echo ucwords($item); ?></a>
                </li>
            <?php   } ?>
        </ul>
    </div>
</nav>