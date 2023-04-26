<?php

$cart = new Cart;

?>

<div class="body-overlay mt-5">
    <div class="d-flex justify-content-end">
        <span class="mt-5 mr-3"></span>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center mt-3 mt-lg-0">
            <h5 class="text-center text-dark-orange">My Cart</h5>
        </div>
        <?php if ($cart->getTotalItems() > 0) { ?>
            <div class="d-flex justify-content-center">
                <span>Here are the items you have selected</span>
            </div>
            <div class="row mr-0 mt-4">
                <?php foreach ($cart->displayItems() as $item) { ?>
                    <?php
                    $databaseHandler = new DatabaseHandler;

                    $databaseHandler->runSQL(
                        "SELECT 
                product_details.product_image, 
                products.product_name,
                product_details.discounted_price
                FROM products
                INNER JOIN product_details ON
                product_details.product_id = products.product_id WHERE products.product_id = ? LIMIT 1",
                        array($item["id"]),
                        1
                    );
                    $result = $databaseHandler->getOutput();
                    ?>
                    <div class="col-md-3 col-6 mb-5">
                        <div class="card shadow-sm card-uniform">
                            <div>
                                <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                            </div>
                            <div class="card-body p-1 p-md-3">
                                <div class="position-absolute">
                                    <h6 class="text-muted pb-3"><?php echo $item["name"]; ?></h6>
                                </div>

                                <div class="d-flex justify-content-start mt-5">
                                    <form method="post" class="updateQuantity mt-3">
                                        <div class="form-row">
                                            <div class="col-md-9 col-7">
                                                <div class="d-flex">
                                                    <div>
                                                        <span>Qty &nbsp;</span>
                                                    </div>
                                                    <div>
                                                        <select name="quantity" class="quantity height-md">
                                                            <?php for ($x = 1; $x <= 10; $x++) { ?>
                                                                <option value="<?php echo $x ?>" <?php
                                                                                                    if ($x === (int)$item["quantity"]) {
                                                                                                        echo "selected='selected'";
                                                                                                    } ?>><?php echo $x; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("UPDATE_CART_QUANTITY") ?>">
                                                        <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($item["id"]) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-5">
                                                <input type="submit" name="updateCart" class="btn-sm btn-warning height-md ml-md-3" value="Update">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <span class="text-nowrap text-dark-orange mt-2">Price: <b><?php echo number_format($item["total_price"]); ?> Ksh </b></span>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <form method="post" class="deleteItem mt-1">
                                        <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("DELETE_CART_ITEM") ?>">
                                        <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($item["id"]) ?>">
                                        <img src="<?php echo Config::getIcon("delete");  ?>" class="img-fluid icon-sm-uniform mr-n1">
                                        <input type="submit" class="text-muted link-hover border-0 bg-transparent" value="Remove Item">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="d-flex justify-content-center">
                <div class="d-block">
                    <div class="d-flex justify-content-center">
                        <span class="text-dark text-center">Your cart is currently empty. Click bellow to start shopping</span>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-warning" href="<?php echo htmlspecialchars("?request=products") ?>">Start Shopping</a>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <span class="text-dark">Adept Designers cares for you</span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="bg-light">

        <div class="d-flex justify-content-md-end ml-3 mr-3">
            <div class="d-block">
                <div class="d-flex">
                    <div class="mt-5 mr-2">
                        <h4>Total Items:</h4>
                    </div>
                    <div class="mt-5">
                        <h3 class="font-weight-bolder text-dark-orange"><?php echo $cart->getTotalItems() ?></h3>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mr-2">
                        <h4 class="mt-1">Total Price:</h4>
                    </div>
                    <div>
                        <h3 class="font-weight-bolder text-dark-orange"><?php echo number_format($cart->getTotalPrice()) ?> KSh </h3>
                    </div>
                </div>
                <?php if ($cart->getTotalItems()) { ?>
                    <div class="mb-2">
                        <form method="post" class="checkOutCart">
                            <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("CHECKOUT_CART_AUTHENTICATION") ?>">
                            <input type="submit" class="btn btn-lg btn-warning text-underline" value="CheckOut &raquo;">
                        </form>
                    </div>
                <?php } ?>

                <div class="d-flex mb-2 mt-2">
                    <div>
                        <a class="ml-1" href="<?php echo "?request=products" ?>">Continue Shopping</a>
                    </div>
                    <div class="ml-2">
                        <img src="<?php echo Config::getIcon("shopping-cart") ?>" class="img-fluid icon-sm-uniform">
                    </div>
                </div>

                <div>
                    <form method="post" class="emptyCart">
                        <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("EMPTY_CART") ?>">
                        <input type="submit" class="text-muted link-hover border-0 bg-transparent" value="Empty Cart">
                        <img src="<?php echo Config::getIcon("delete");  ?>" class="img-fluid icon-sm-uniform mb-1">
                    </form>
                </div>
            </div>
        </div>

        <div class="row flex-column-reverse mr-0">

            <div class="col-md">
                <div class="d-flex justify-content-start text-medium-size mt-3 mt-md-2 ml-3">
                    <div class="d-flex mb-3">
                        <a href="?request=home" class="">Home</a> >
                    </div>
                    <div class="d-flex">
                        <a a href="?request=products" class="ml-2">Products</a> >
                    </div>
                    <div>
                        <a a href="?request=cart" class="ml-2">Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end text-medium-size mt-3">
                    <div class="d-flex mb-lg-n4">
                        <div class="mr-4">
                            <a class="link-hover" href="">Help</a>
                        </div>
                        <div class="mr-4">
                            <a class="link-hover" href="">T&C</a>
                        </div>
                        <div class="mr-4">
                            <a class="text-nowrap link-hover" href="">Give Us A Call</a>
                        </div>
                        <div class="mr-4">
                            <a class="text-nowrap link-hover ml-3" href="">Report a Complain</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>