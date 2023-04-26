<!-- Navigation -->
<?php
!Session::exists("username") ?? die("Bad Gateway");
$result = new DatabaseHandler;
$result->setTable("administrators");
$result->setField(array("profile_image", "admin_id"));
$result->setQueryItems(array("username", "=", strtolower(Session::getValue("username"))));
$result->queryDb("select", 1);
$result = $result->getOutput();

$i = 1;
$z = 0;
$j = 0;
$x = 0;
$navbar = array(
    "title" => array(
        "leftMenu" =>    array("products", "logistics", "feedback & interaction", "system users"),
        "rightMenu" => array(Session::getValue("username"), "more actions", "notifications"),
    ),
    "dropdownItems" => array(
        "products" => array("products", "categories", "sub categories"),
        "logistics" => array("suppliers", "orders", "customers", "transactions"),
        "feedback & interaction" => array("messages", "subscriptions", "blogs", "comments"),
        "system users" => array("clients", "employees", "administrators"),
        Session::getValue("username") => array("update profile", "view activity", "sign out"),
        "more actions" => array("go to homepage", "add products", "add categories", "add sub categories", "add suppliers", "add employees")
    ),

    "links" => array(
        "products" => Directories::getLocation("accounts/profile/") . "?request=view&reference=products",
        "categories" => Directories::getLocation("accounts/profile") . "?request=view&reference=category",
        "sub categories" => Directories::getLocation("accounts/profile") . "?request=view&reference=sub-category",
        "suppliers" => Directories::getLocation("accounts/profile") . "?request=view&reference=suppliers",
        "orders" => Directories::getLocation("accounts/profile") . "?request=view&reference=orders",
        "customers" => Directories::getLocation("accounts/profile") . "?request=view&reference=customers",
        "transactions" => Directories::getLocation("accounts/profile") . "?request=view&reference=transactions",
        "clients" => Directories::getLocation("accounts/profile") . "?request=view&reference=users",
        "employees" => Directories::getLocation("accounts/profile") . "?request=view&reference=employees",
        "administrators" => Directories::getLocation("accounts/profile") . "?request=view&reference=administrators",
        "messages" => Directories::getLocation("accounts/profile") . "?request=view&reference=messages",
        "subscriptions" => Directories::getLocation("accounts/profile") . "?request=view&reference=subscriptions",
        "blogs" => Directories::getLocation("accounts/profile") . "?request=view&reference=blogs",
        "comments" => Directories::getLocation("accounts/profile") . "?request=view&reference=comments",
        "update profile" => Directories::getLocation("accounts/profile/") . "?request=update&reference=administrators&identifier=" . $result->admin_id,
        "view activity" => Directories::getLocation("accounts/profile/") . "?request=view&reference=activity",
        "sign out" => Directories::getLocation("app/pages/admin/authentication/logout.php"),
        "update sub-category" => Directories::getLocation("accounts/profile/") . "?request=update&reference=sub-category",
        "go to homepage" => Directories::getLocation("accounts/profile/") . "?request=home",
        "add categories" => Directories::getLocation("accounts/profile/") . "?request=add&reference=category",
        "add sub categories" => Directories::getLocation("accounts/profile/") . "?request=add&reference=sub-category",
        "add products" => Directories::getLocation("accounts/profile/") . "?request=add&reference=products",
        "add suppliers" => Directories::getLocation("accounts/profile/") . "?request=add&reference=suppliers",
        "add employees" => Directories::getLocation("accounts/profile/") . "?request=add&reference=employees",
    ),
    "icons" => array(
        "products" => Config::getIcon("products"),
        "categories" => Config::getIcon("category"),
        "sub categories" => Config::getIcon("sub-category"),
        "suppliers" => Config::getIcon("suppliers"),
        "orders" => Config::getIcon("orders"),
        "customers" => Config::getIcon("customers"),
        "transactions" => Config::getIcon("transactions"),
        "clients" => Config::getIcon("users"),
        "employees" => Config::getIcon("employees"),
        "administrators" => Config::getIcon("administrators"),
        "messages" => Config::getIcon("messages"),
        "subscriptions" => Config::getIcon("subscriptions"),
        "blogs" => Config::getIcon("blogs"),
        "comments" => Config::getIcon("comments"),
        "set" => Directories::getLocation("app/uploads/administrators/" . $result->profile_image),
        "not set" => Config::getIcon($reference),
    )

);


$leftNavbarTitle = $navbar["title"]["leftMenu"];

$rightNavBarTitle = $navbar["title"]["rightMenu"];

$dropdownItems = $navbar["dropdownItems"];

$links = $navbar["links"];

$icons = $navbar["icons"];


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
<nav class="navbar navbar-expand-lg bg-light fixed-top bg-light navbar-light shadow-sm p-md-2">
    <a class="nav-brand d-flex">
        <div>
            <img src="<?php echo Directories::getLocation("tools/assets/icon.png"); ?>" class="img-fluid icon company-icon">
        </div>
        <div>
            <img src="<?php echo Directories::getLocation("tools/assets/title.png"); ?>" class="img-fluid title company-title">
        </div>
    </a>
    <div class="d-flex justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#secondaryNavbar" aria-controls="secondaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="secondaryNavbar">
        <ul class="navbar-nav">
            <?php foreach ($leftNavbarTitle as $title) { ?>
                <li class="nav-item <?php echo "dropdown-btn-" . $i; ?>">
                    <a class="nav-link ml-lg-4" href="javascript:"><?php echo ucwords($title); ?></a>
                    <div class="dropdown-body shadow <?php echo "dropdown-collection-" . $i; ?>">
                        <div class="d-flex">
                            <div>
                                <div class="ml-lg-3">
                                    <?php
                                    if (array_key_exists($title, $dropdownItems)) {
                                    ?>
                                        <?php foreach ($dropdownItems[$title] as $item) { ?>
                                            <div class="d-flex">
                                                <div>
                                                    <img class="img-fluid icon-sm" src="<?php echo $icons[$item]; ?>">
                                                </div>
                                                <div>
                                                    <a class="nav-link text-nowrap" href="<?php echo $links[$item]; ?>"><?php echo "Go to " . ucwords($item); ?></a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                </div>
                            <?php } ?>
                            </div>
                        <?php
                        $i++;
                    } ?>
                        </div>
                    </div>
                </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php foreach ($rightNavBarTitle as $title) { ?>
                <?php if ($title === Session::getValue("username")) { ?>
                    <li class="nav-item dropdown-btn-5 mr-3">
                        <a class="nav-link d-flex" href="javascript:void(0)">
                            <?php if (!empty($result->profile_image)) { ?>
                                <div>
                                    <img class="img-fluid icon-sm mr-1" src="<?php echo !empty($result) ? $icons["set"] : $icons["not-set"]; ?> ">
                                </div>
                            <?php } ?>
                            <div class="ml-1">
                                <?php echo ucwords($title); ?>
                            </div>
                        </a>
                        <div class="dropdown-body shadow dropdown-collection-5 mr-5">
                            <?php foreach ($dropdownItems[Session::getValue("username")] as $item) { ?>
                                <a class="nav-link <?php echo ($item === "sign out") ? "logout" : ""; ?> d-flex" href="<?php echo $links[$item] ?>">
                                    <div>
                                        <img class="img-fluid icon-sm" src="<?php echo Config::getIcon($item); ?>">
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-nowrap"><?php echo ucwords($item) ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                <?php continue;
                } ?>
                <?php if ($title === "more actions") { ?>
                    <li class="nav-item dropdown-btn-6 mr-3">
                        <a class="nav-link d-flex" href="javascript:void(0)">
                            <div class="ml-1">
                                <?php echo ucwords($title); ?>
                            </div>
                        </a>
                        <div class="dropdown-body shadow dropdown-collection-6 mr-5">
                            <?php foreach ($dropdownItems[$title] as $item) { ?>
                                <a class="nav-link <?php echo ($item === "sign out") ? "logout" : ""; ?> d-flex" href="<?php echo $links[$item] ?>">
                                    <div>
                                        <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("add"); ?>">
                                    </div>
                                    <div class="ml-2">
                                        <span class="text-nowrap"><?php echo ucwords($item) ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                <?php continue;
                } ?>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="javascript:void(0)"> <?php echo ucwords($title); ?></a>
                </li>
            <?php
            } ?>
        </ul>
    </div>
</nav>