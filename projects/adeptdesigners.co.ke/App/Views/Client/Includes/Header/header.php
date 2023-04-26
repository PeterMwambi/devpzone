<?php

switch ($pageTitle) {
    case 'Home':
?>
        <style>
            .background {
                --image-url: url("../../Tools/assets/store-1338629_1920.jpg");
                width: auto;
                min-height: 50vh;
            }

            .overlay {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.5)),
                    var(--image-url);
                background-repeat: no-repeat;
                /* background-position: ; */
                background-size: cover;
            }

            .footer-nav li a:hover {
                color: rgb(253, 191, 76);
            }

            .body-overlay {
                background: linear-gradient(360deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.6));
            }
        </style>

    <?php
        break;
    case 'Contact Us':
    ?>
        <style>
            .contact-info {
                background: linear-gradient(360deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.7));
            }

            .big-font {
                font-size: 6vw;
            }

            .overlay {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                    var(--image-url);
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .bg-comment {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7));
            }

            .footer-nav li a:hover {
                color: rgb(253, 191, 76);
            }

            .home {
                display: none;
            }

            .customMessage:focus {
                box-shadow: 0.5px 0.5px 5px rgb(201, 130, 0);
                border: 0.5px solid rgb(236, 178, 69);
            }
        </style>
    <?php
        break;
    case "About Us":
    ?>
        <style>
            .background {
                --image-url: url("../../tools/assets/clothes.jpg");
                width: auto;
            }

            .contacts-background {
                --image-url: url("../../tools/assets/annie-spratt-goholCAVTRs-unsplash.jpg");
                width: auto;
            }

            .background-position-center {
                background-position: center center !important;
            }

            .overlay {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                    var(--image-url);
                background-size: cover;
                background-position: left;
                background-repeat: no-repeat;
            }

            .footer-nav li a:hover {
                color: rgb(253, 191, 76);
            }

            .home {
                display: none;
            }

            .big-font {
                font-size: 6vw;
            }

            .resized {
                max-width: 80px;
            }

            .img-sm {
                max-width: 20px;
            }

            .info-background {
                --info-img: url("../../tools/assets/clothes2.jpg");
            }

            .overlay-info {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                    var(--info-img);
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .about-info {
                background: linear-gradient(360deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.6));
            }

            .brands {
                background: linear-gradient(360deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.6));
            }

            .brand:hover {
                background-color: rgba(255, 183, 88, 0.795);
                cursor: pointer
            }

            .animateable:hover {
                cursor: pointer;
                border-top: 4px solid orange;
            }

            img[name='paypal'] {
                max-width: 150px;
            }

            .payment-option:hover {
                background-color: rgba(255, 183, 88, 0.795);
            }

            .top-border {
                border-top: 4px solid rgba(255, 183, 88, 0.795);
            }

            .text-medium {
                font-size: 18px;
            }

            .customMessage:focus {
                box-shadow: 0.5px 0.5px 5px rgb(201, 130, 0);
                border: 0.5px solid rgb(236, 178, 69);
            }
        </style>
    <?php
        break;
    case 'Products':
    ?>
        <style>
            .background {
                background-color: white;
            }

            .overlay-image {
                background: linear-gradient(360deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6));
                z-index: 1;
            }

            .footer-nav li a:hover {
                color: rgb(253, 191, 76);
            }

            .body-overlay {
                background: linear-gradient(360deg, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.6));
            }
        </style>
<?php }
?>


<div class="container-fluid p-0 header-body">
    <div class="mask background overlay">
        <?php
        switch ($pageTitle) {
            case "Home":
                require_once(Directories::getLocation("App/Views/Client/Includes/Header/homeHeader.php"));
                break;
            case "About Us":
                require_once(Directories::getLocation("App/Views/Client/Includes/Header/aboutHeader.php"));
                break;
            case "Products":
                require_once(Directories::getLocation("App/Views/Client/Includes/Header/productsHeader.php"));
                break;
        } ?>
    </div>