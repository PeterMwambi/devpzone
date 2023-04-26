<!-- Navigation -->

<?php
$cart = new Cart;

?>

<nav class="navbar navbar-expand-lg sticky-top navbar-light mainnav shadow-sm p-1">

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


    <div class="collapse navbar-collapse ml-2 ml-md-0" id="secondaryNavbar">
        <ul class="navbar-nav navbar-secondary ml-auto">
            <li class="nav-item">
                <a class="nav-link ml-md-3" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=home" ?>">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                    About
                </a>
            </li>
            <div class="dropdown-body bg-light shadow mt-lg-5 p-md-3">
                <div class="d-block">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <span class="dropdown-item text-warning ml-n3" href="javascript:void(0)">About Us</span>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=about"  ?>">What we do</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Our Story</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Our Brands</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Payment Methods</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Terms & Conditions</a>
                        </div>
                        <div class="col-md-6 border-right">

                            <span class="dropdown-item text-warning ml-n3" href="javascript:void(0)">Contact Us</span>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo  Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Talk to Us</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo  Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Find us on Social Media</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo  Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Find our Location</a>
                            <a class="dropdown-item nav-link link-hover" href="<?php echo  Directories::getLocation("app/pages/client/") . "?request=about"  ?>">Leave Us a comment</a>

                        </div>
                    </div>
                </div>
            </div>
            <li class="nav-item">

                <a class="nav-link" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=products"  ?>">Products</a>

            </li>
            <li class="nav-item products">


                <a class="nav-link d-flex" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=cart"  ?>">
                    <div class="text-nowrap">
                        My cart <img src="<?php echo Config::getIcon("shopping-cart") ?>" class="img-fluid cart-image" />
                    </div>
                    <div class="mt-n2 ml-n2">
                        <span class="badge bg-dark text-light rounded-pill shadow-lg"><?php echo $cart->getTotalItems() ?></span>
                    </div>
                </a>

            </li>
            <?php if (Functions::decrypt(Session::getValue("CLIENT_PASSKEY_AUTHENTICATOR"))) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-1 text-nowrap" href="javascript:void(0)">Hello, <?php echo ucwords(Session::getValue(("client-username"))) ?></a>
                </li>
                <div class="dropdown-body-1 position-absolute resize-margin bg-light shadow mt-lg-5 p-4" style="z-index:100;">
                    <a class="nav-link dropdown-item d-flex link-hover" href="<?php echo Directories::getLocation("app/pages/client/account") . "?request=orders"  ?>">
                        My Orders
                    </a>
                    <a class="nav-link dropdown-item d-flex link-hover" href="<?php echo Directories::getLocation("app/pages/client/account") . "?request=profile"  ?>">
                        My Subscription
                    </a>

                    <a class="nav-link dropdown-item d-flex link-hover" href="<?php echo Directories::getLocation("app/pages/client/account") . "?request=profile"  ?>">
                        Leave a Comment
                    </a>

                    <a class="nav-link dropdown-item d-flex link-hover" href="<?php echo Directories::getLocation("app/pages/client/account") . "?request=profile"  ?>">
                        Chat with us
                    </a>
                    <a class="nav-link dropdown-item d-flex link-hover" href="<?php echo Directories::getLocation("app/pages/client/account") . "?request=profile"  ?>">
                        Edit Profile
                    </a>
                    <a class="nav-link dropdown-item d-flex link-hover logout" href="<?php echo Directories::getLocation("app/pages/client/authentication/logout.php") ?>">
                        <div class="mr-1">
                            <img src="<?php echo Config::getIcon("sign out") ?>" class="img-fluid icon-v-sm">
                        </div>
                        Logout
                    </a>
                </div>

            <?php } else { ?>
                <a class="nav-link mr-4" href="<?php echo Directories::getLocation("app/pages/client/") . "?request=login"  ?>">Account</a>
            <?php } ?>

            <li class="nav-item">
                <form method="post">
                    <div class="row mt-3 mt-md-0 mb-md-0 mb-2">
                        <div class="col-8">
                            <input type="search" placeholder="Find something..." class="form-control" name="search-item">
                            <div class="card position-absolute rounded-0 d-none" name="results-body-comment">
                                <div class="card-body">
                                    <?php foreach ($results as $result) { ?>
                                        <div class="d-block">
                                            <p class="mb-md-n1 text-info" name="results-commentor"></p>
                                            <small class="text-muted" name="results-comment"></small>
                                        </div>
                                        <hr>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-dark ml-n4">Search</button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</nav>


<script>
    $(document).ready(function() {
        $(".dropdown-body").hide();
        $(".dropdown-toggle").hover(function() {
            $(".dropdown-body").show();
        })
        $(".dropdown-body").mouseover(function() {
            $(this).show();
        }).mouseout(function() {
            $(this).hide();
        })
        $(".dropdown-body-1").hide();
        $(".dropdown-toggle-1").hover(function() {
            $(".dropdown-body-1").show();
        })
        $(".dropdown-body-1").mouseover(function() {
            $(this).show();
        }).mouseout(function() {
            $(this).hide();
        })
    })
</script>