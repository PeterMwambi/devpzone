    <!-- Begin home content -->
    <!-- @content short product, about, contacts content description -->
    <div class="container-fluid about-info">
        <section id="aboutAdept">
            <div class="d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-center">
                                <h2 class="text-warning text-nowrap text-center mt-5 mb-md-3 display-4">About Adept Designers</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-end">
                                <small class="text-muted mt-lg-5 mr-lg-3">2 mins to read</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="text-md-justify text-dark mb-lg-5 mt-lg-2">Hi <img src="<?php echo Directories::getLocation("tools/assets/wave.png") ?>" class="img-fluid img-sm" />,
                            we proudly welcome you
                            to our website.
                            We are always commited to serving you.
                            We sell you your foverite mtumba(second hand clothes) and new clothes
                            at discounted prices. We are dealers in
                            women Dresses, Suits and Blazers, Tops and Tees, Coats jackets and
                            Vests, Jump Suits, Skirts, Jeans, Shorts, Shoes, Jewelery, Hand bags and more. Thats not all, we also have
                            mens Shirts, Tshirts, Suits, Pants, Shorts, Jeans, Shoes, Jackets, a wider variety for you to explore. <a href="../products/" class="text-info">Click here</a> now to
                            view our products.
                            We sell major <a href="#our-brands" class="text-info">brands</a> like Reebok, Vans, Jordan, Puma, Nike, Dior, New Balance and
                            so much more.
                            At Adept Designers we give you nothing but the best of swaggarific combinations from casual outfits to official wear. Piga luuku na
                            discounts kibao on our items. We give you amaizing offers on all of our products as well as deliver them straight to
                            your door step. Have a look at our <a class="text-info" href="javascript:">terms and conditions</a>.
                            We are customer centered and therefore, we give you good grooming tips to look outstanding
                            on any event or any place. You can <a class="text-info" href="javascript:void(0)">subscribe to our news letter</a>
                            to receive weekly fashion news across the globe and updates on our new product arrivals directly
                            to your email address. You can also <a class="text-info" href="javascript:void(0)">join our whatsapp groups</a>
                            to view our products. We post them daily as well as continue to keep you involved.
                            Usiachwe nyuma, Join us today and be the trend.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="visible">
        <?php
        $title = Sanitize::__string("Our Journey");
        $history_description = array(
            "2019" => "We started out as a small SME with no physical premises.",
            "2020" => "We set up our head office in Gill house, Nairobi Floor 3 room no 305.",
            "2021" => "We began online marketing leveraging on our social media platforms and our website"
        );
        $x = 0;
        ?>
        <div class="container-fluid info-background overlay-info" id="our-history">
            <section id="ourJourney">
                <div class="d-flex justify-content-center">
                    <h2 class="text-warning mt-5 display-4"><?php echo $title; ?></h2>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="text-center text-light">It all began with you. Take a look</p>
                </div>
                <div class="container">
                    <div class="row">
                        <?php foreach ($history_description as $description) {
                            $year = array_keys($history_description);
                        ?>
                            <div class="col-md-4 mb-lg-5">
                                <div class="card mt-3 shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="col-md-3 d-flex justify-content-center rounded bg-warning p-lg-5">
                                                <h4 class="text-light"><?php echo Sanitize::__string($year[$x]); ?></h4>
                                            </div>
                                            <div class="col-md-9">
                                                <p> <?php echo Sanitize::__string($description); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $x++;
                        } ?>
                    </div>
                </div>

                <?php

                $customer_declaration = array("Our Customer" => "Giving you great service along with offering you quality products
                        has been our center of interest from since we began our journey with you.
                        Thank you for always choosing us.");
                $x = 0;
                ?>

                <div class="d-flex justify-content-center">
                    <?php foreach ($customer_declaration as $declaration) {
                        $heading = array_keys($customer_declaration);
                    ?>
                        <div class="col-md-4 mt-3">
                            <h5 class="text-center text-light"><?php echo Sanitize::__string($heading[$x]); ?></h5>
                            <p class="text-center text-light mb-5"><?php echo Sanitize::__string($declaration); ?>
                            </p>
                        </div>
                    <?php
                        $x++;
                    } ?>
                </div>
            </section>
        </div>
    </div>

    <div class="visible mt-md-n1">
        <?php
        $title = Sanitize::__string("Our Brands");
        $brands = array(
            "converse" => "Converse.png",
            "fila" => "Fila.png",
            "gucci" => "gucci.png",
            "jordan" => "jordan.png",
            "lacoste" => "lacoste.png",
            "new-balance" => "new-balance.png",
            "nike" => "nike.png",
            "puma" => "puma.png",
            "reebok" => "reebok.png",
            "skechers" => "skechers.png",
            "timberland" => "timberland.png",
            "under-armour" => "under-armour.png",
            "vans" => "vans.png",
            "asics" => "asics.png",
            "versace" => "versace.png",
            "caterpillar" => "caterpillar.png",
            "dior" => "dior.png",
            "diadora" => "diadora.png",
            "kappa" => "kappa.png",
            "burberry" => "burberry.png",
            "hushpuppies" => "hushpuppies.png",
            "brooks" => "brooks.png",
            "crocs" => "crocs.png",
            "sperry" => "sperry.png",
            "adidas" => "adidas.png",
            "drmartens" => "drmartens.png",
            "toms" => "toms.png",
            "columbia" => "columbia.png",
            "oldnavy" => "oldnavy.png",
            "gap" => "gap.png"
        );
        $x = 0;
        ?>
        <div class="container-fluid brands">
            <section id="ourBrands">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center">
                            <h2 class="text-center text-dark-orange mt-4 mt-lg-5 mt-3 mb-4 mb-lg-5 display-4" id="our-brands"><strong><?php echo $title; ?></strong></h2>
                        </div>
                        <div class="row">
                            <?php foreach ($brands as $brand) { ?>
                                <div class="col-md-2 col-3 mb-5">
                                    <img src="<?php echo Directories::getLocation("tools/assets/" . $brand) ?>" class="img-fluid resized brand">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="container-fluid p-0">
        <div class="contacts-background background-position-center overlay">
            <section id="contactUs">
                <div class="d-flex justify-content-center">
                    <div class="d-block mb-3 p-3">
                        <h1 class="text-warning text-center mt-5">Contact Us</h1>
                        <p class="text-left text-light mt-3 ml-3 ml-md-0"> We have made it easy for you to connect with us. You can
                        </p>
                        <ul class="text-light">
                            <li>Chat with us on social media</li>
                            <li>Send us a message via whatsapp</li>
                            <li>Send us a direct message via our contact form</li>
                            <li>Give us a direct call on our official telephone numbers</li>
                        </ul>
                        <p class="text-left text-light mt-3 ml-3 ml-md-0"> Scroll down to discover more ways you can reach to us.
                        </p>
                    </div>
                </div>
            </section>

            <!-- @begin content -->
            <!-- Contact form -->
            <section class="visible contact-info shadow-sm">
                <!--Map Information section-->
                <section>
                    <div class="container-fluid background">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <div class="card shadow-sm" id="socialMediaLinks">
                                    <div class="card-body">
                                        <h5 class="text-warning text-center">
                                            <i class="fa fa-globe"></i>
                                            Social Media Links
                                        </h5>
                                        <div class="d-flex justify-content-center">
                                            <small class="text-center">Find us on social media via the following links</small>
                                        </div>
                                        <ul class=" d-block list-unstyled text-center mt-3">
                                            <li class="pb-4"><a href="javascript:void(0)" class="text-nowrap">
                                                    <img src="<?php echo Directories::getLocation("tools/assets/facebook.png") ?>" class="img-fluid icon"> theeadeptdesigner</a></li>
                                            <li class="pb-4"><a href="javascript:void(0)" class="text-nowrap">
                                                    <img src="<?php echo Directories::getLocation("tools/assets/twitter.png") ?>" class="img-fluid icon"> @theeadeptdesigner</a></li>
                                            <li class="pb-4"><a href="javascript:void(0)" class="text-nowrap">
                                                    <img src="<?php echo Directories::getLocation("tools/assets/linkedin.png") ?>" class="img-fluid icon"> theeadeptdesigner</a></li>
                                            <li class="pb-4"><a href="javascript:void(0)" class="text-nowrap">
                                                    <img src="<?php echo Directories::getLocation("tools/assets/instagram.png") ?>" class="img-fluid icon"> #theeadeptdesigner</a></li>
                                            <li class="pb-4"><a href="javascript:void(0)" class="text-nowrap">
                                                    <img src="<?php echo Directories::getLocation("tools/assets/youtube.png") ?>" class="img-fluid icon"> theeadeptdesigner</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card shadow-sm" id="ourLocation">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <h5 class="text-warning">Our location</h5>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <small class="text-body">Find out where we are located</small>
                                        </div>
                                        <div class="mt-2">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe src="https://www.google.com/maps/d/embed?mid=15fWhTqBCmxaf8O1bonhC-Mtgl4H-oyB3"></iframe>
                                            </div>
                                            <div class="mt-lg-4">
                                                <div>
                                                    <div>
                                                        <p class="">Gill House, Nairobi <i class="fa fa-city"></i></p>
                                                        <small class="text-muted">Floor 3, Room no 305</small>
                                                    </div>
                                                    <div class="d-flex justify-content-center mt-lg-3">
                                                        <small class="text-center">Click on our icon to quickly locate us on google maps</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card shadow-sm" id="ourContacts">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div>
                                                <h5 class="text-warning text-center">
                                                    <i class="fa fa-address-book mt-1"></i>
                                                    Our Contacts
                                                </h5>
                                            </div>
                                            <div>
                                                <ul class=" d-block list-unstyled text-center">
                                                    <li class="mt-3">
                                                        <div class="d-block">
                                                            <img src="<?php echo Directories::getLocation("tools/assets/phone(1).png") ?>" class="img-fluid icon">
                                                            <div><small class="text-nowrap"> Give us a call on </small></div>
                                                            <a href="tel:0114858431"> 0114958431</a> or <a href="tel:0700521998"> 0700521998</a>
                                                        </div>
                                                    </li>
                                                    <li class="mt-4">
                                                        <img src="<?php echo Directories::getLocation("tools/assets/whatsapp.png") ?>" class="img-fluid icon">
                                                        <div><small class="text-nowrap"> Send us a message via whatsapp on </small></div>
                                                        <div><a href="javascript:void(0)">0114958431 </a> or <a href="javascript:void(0)"> 0700521998</a></div>
                                                    </li>
                                                    <li class="mt-3">
                                                        <img src="<?php echo Directories::getLocation("tools/assets/mail.png") ?>" class="img-fluid icon">
                                                        <div><small>Send us an email on</small></div>
                                                        <div><a href="mailto:info@adeptdesigners.co.ke">info@adeptdesigners.co.ke </a></div>
                                                    </li>
                                                    <li class="pb-4 mt-lg-3"><a href="javascript:void(0)" class="text-warning">Click on this link to join our whatsapp group </a></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>

    <div class="bg-dark">
        <section>
            <div class="container-fluid p-0">
                <div class="p-md-5">
                    <div class="row mr-0 justify-content-center">
                        <div class="col-md-4 ml-3 ml-md-0" id="contactForm">
                            <div class="mt-5">
                                <div class="d-flex justify-content-center">
                                    <h1 class="text-center text-warning text-nowrap"> Contact Form</h1>
                                </div>
                                <p class="text-light text-justify p-3 p-md-0">Send us a direct message free of charge
                                    via our contact form. We promise to reply
                                    to you as soon as possible. Be sure to confirm your email within 24 hours. We will not to fill your
                                    inbox with spam. To proceed please fill the form bellow.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 p-3 ml-3 ml-md-5 mb-3">
                            <?php require_once(Directories::getLocation("App/Views/Client/Includes/contact-form.php")) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php

    $payment_option_links = array(
        "equity" => "Equity Holdings logo-01.png",
        "mpesa" => "mpesa-logo-AE44B6F8EB-seeklogo.com.png",
        "paypal" => "paypal.png",
        "bitcoin" => "bitcoin.png",
        "kcb" => "KCB_Kenya.jpg",
        "netteller" => "netteller.png",
        "moneygram" => "moneygram.png",
        "westernUnion" => "western-union.png",
    );
    ?>
    <div class="container-fluid about-info">
        <section id="paymentMethods">
            <div class="d-flex justify-content-center">
                <h3 class="text-center text-nowrap mt-5 text-dark-orange">Accepted Payment Methods</h3>
            </div>
            <div class="d-flex justify-content-center">
                <span class="text-nowrap text-muted mb-4">Here are the payment methods we accept</span>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="row mb-5">
                        <?php $x = 0 ?>
                        <?php foreach ($payment_option_links as $link) { ?>
                            <?php $link_name = array_keys($payment_option_links) ?>
                            <div class="col-md-3 col-6 mt-3">
                                <div class="d-flex justify-content-center">
                                    <a href="javascript:void(0)" class="no-outline">
                                        <img src="<?php echo Directories::getLocation("tools/assets/" . $link); ?>" class="icon-medium ml-lg-3 " />
                                    </a>
                                </div>
                            </div>
                        <?php
                            $x++;
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>