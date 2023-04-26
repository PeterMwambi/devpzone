<!-- Modal for subscribe to news letter -->
<div class="modal fade" id="newsletter-subscription" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subscribe to our News Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php require_once(Directories::getLocation("App/Views/Client/Includes/subscription-form.php")); ?>
            </div>
        </div>
    </div>
</div>

<?php


$footer = array(
    "title" => array("About Us", "Contact Us", "Products", "Account", "Go to Homepage"),
    "content" => array(
        "About Us" => array(
            "Who we are",
            "Our Brands",
            "Opening Days",
            "Payment Methods",
            "T & Cs",
        ),
        "Contact Us" => array(
            "Our Contacts",
            "Our Location",
            "Social Media",
            "Contact Form",
        ),
        "Products" => array(
            "Men Fashion",
            "Women Fashion",
            "My Cart"
        ),
        "Account" => array(
            "Register",
            "Sign In"
        ),
        "Go to Homepage" => array()
    ),
    "links" => array(
        "Go to Homepage" => Directories::getLocation("pages/client/") . "?request=home",
        "About Us" => Directories::getLocation("pages/client/") . "?request=about",
        "Who we are" => Directories::getLocation("pages/client/") . "?request=about#aboutAdept",
        "Our Brands" => Directories::getLocation("pages/client/") . "?request=about#ourBrands",
        "Opening Days" => Directories::getLocation("pages/client/") . "?request=about#openingDays",
        "Payment Methods" => Directories::getLocation("pages/client/") . "?request=about#paymentMethods",
        "T & Cs" => Directories::getLocation("pages/client/") . "?request=about#T&Cs",
        "Our Contacts" => Directories::getLocation("pages/client/") . "?request=about#ourContacts",
        "Our Location" => Directories::getLocation("pages/client/") . "?request=about#ourLocation",
        "Social Media" => Directories::getLocation("pages/client/") . "?request=about#socialMediaLinks",
        "Contact Form" => Directories::getLocation("pages/client/") . "?request=about#contactForm",
    ),
    "icons" => array()
);

$titles = $footer["title"];
$content = $footer["content"];
$links = $footer["links"];

?>

<footer class="position-absolute w-100">
    <div class="container-fluid p-0 no gutters">
        <div class="jumbotron mb-0 bg-footer w-100 h-25">
            <section class="visible">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <?php foreach ($titles as $title) { ?>
                                <?php if (count($content[$title])) { ?>
                                    <div class="col-lg-2 col-4 mt-2">
                                        <div>
                                            <a class="text-muted" href="<?php echo $links[$title] ?>"><?php echo $title ?></a>
                                        </div>
                                        <?php foreach ($content[$title] as $contentItem) { ?>
                                            <div>
                                                <a class="font-sm-md text-nowrap" href="<?php echo $links[$contentItem] ?>"><?php
                                                   echo $contentItem ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-lg-2 col-4 mt-2">
                                        <a class="text-muted text-nowrap" href="<?php echo $links[$title] ?>"><?php echo $title ?></a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <h6 class="text-center text-secondary"><i class="far fa-newspaper"></i> Subscribe to
                                    our newsletter</h6>
                                <p class="text-body text-center">Receive the latest news on fashion directly to your
                                    email address</p>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-warning p-3 shadow" data-toggle="modal"
                                        data-target="#newsletter-subscription">Subscribe</button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid title mt-2"
                                src="<?php echo Directories::getLocation("tools/assets/title.png") ?>">
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="lead text-center mt-2">&copy;
                                <?php echo date("Y"); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center mt-md-n5">
                        <div>
                            <a href="javascript:void(0)"> <img src="<?php echo Config::getIcon("facebook") ?>"
                                    class="img-fluid icon-sm"></a>
                        </div>
                        <div class="ml-3">
                            <a href="javascript:void(0)"> <img src="<?php echo Config::getIcon("twitter") ?>"
                                    class="img-fluid icon-sm"></a>
                        </div>
                        <div class="ml-3">
                            <a href="javascript:void(0)"> <img src="<?php echo Config::getIcon("linkedin") ?>"
                                    class="img-fluid icon-sm"></a>
                        </div>
                        <div class="ml-3">
                            <a href="javascript:void(0)"> <img src="<?php echo Config::getIcon("youtube") ?>"
                                    class="img-fluid icon-sm"></a>
                        </div>
                        <div class="ml-3">
                            <a href="javascript:void(0)"> <img src="<?php echo Config::getIcon("instagram") ?>"
                                    class="img-fluid icon-sm"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</footer>