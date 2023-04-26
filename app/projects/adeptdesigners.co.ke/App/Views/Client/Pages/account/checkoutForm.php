<div class="container-fluid p-0 mt-5">
    <div class="body-overlay p-3 mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="d-flex justify-content-center mt-5">
                    <h2 class="text-dark-orange">My Items</h2>
                </div>
                <?php
                $cart = new Cart;
                ?>
                <div class="row justify-content-start mt-2">
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
                        <div class="col-md-3 col-6 p-2 p-md-3">
                            <div class="card mt-3 card-uniform">
                                <div>
                                    <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                </div>

                                <div class="card-body p-2">
                                    <div class="position-absolute">
                                        <span class="text-muted"><?php echo $result->product_name ?></span>
                                    </div>
                                    <div class="d-flex justify-content-start mt-5 mb-3">
                                        <form method="post" class="updateQuantity">
                                            <div class="form-row">
                                                <div class="col-4">
                                                    <div class="d-flex">
                                                        <div class="ml-1">
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
                                                <div class="col-5 ml-3 ml-md-0">
                                                    <input type="submit" name="updateCart" class="btn-sm btn-warning ml-lg-5 ml-2 height-md" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <span class="text-nowrap text-dark-orange mt-n2">Price: <b><?php echo number_format($item["total_price"]); ?> Ksh </b></span>
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

                <div class="card p-3 mt-3">
                    <div class="d-flex justify-content-md-end ml-lg-3 mr-3">
                        <div class="d-block">
                            <div class="d-flex">
                                <div class="mr-2">
                                    <h4>Total Items:</h4>
                                </div>
                                <div class="">
                                    <h4 class="font-weight-bolder text-dark-orange"><?php echo $cart->getTotalItems() ?></h4>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="mr-2">
                                    <h4 class="">Total Price:</h4>
                                </div>
                                <div>
                                    <h3 class="font-weight-bolder text-dark-orange"><?php echo number_format($cart->getTotalPrice()) ?> KSh </h3>
                                </div>
                            </div>

                            <div class="d-flex mb-2">
                                <div>
                                    <a class="" href="<?php echo "../?request=products" ?>">Continue Shopping</a>
                                </div>
                                <div class="ml-2">
                                    <img src="<?php echo Config::getIcon("shopping-cart") ?>" class="img-fluid icon-sm-uniform">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $databaseHandler->runSQL("SELECT users.firstname, users.lastname, users.phone_number, users.user_email FROM users WHERE users.username = ? LIMIT 1", array(Session::getValue("client-username")), 1);
            $result = $databaseHandler->getOutput();
            ?>
            <div class="col-md-5 mt-5 mb-5 rounded">
                <div class="card mt-md-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-center p-2">
                            <div class="d-block">
                                <h3 class="text-center form-alert-heading text-dark-orange">Checkout</h3>
                                <p class="text-center form-alert-text mt-2">Fill in the fields bellow to complete your order...</p>
                                <div class="d-flex justify-content-center">
                                    <?php for ($x = 0; $x <= 4; $x++) { ?>
                                        <span class="spinner-grow text-dark spinner-grow-sm d-none mt-n1 mb-2 mr-3 request"></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="p-1">
                            <form method="post" class="clientRegistrationForm" class="w-100">
                                <div class="form-row">
                                    <div class="col-md form-group">
                                        <label for="firstname">Firstname:</label>
                                        <input type="text" name="firstname" class="form-control" value="<?php echo $result->firstname; ?>">
                                    </div>
                                    <div class="col-md form-group">
                                        <label for="lastname">Lastname:</label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo $result->lastname; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md form-group">
                                        <label for="phoneNumber">Phone Number:</label>
                                        <input type="text" name="phoneNumber" class="form-control" value="<?php echo $result->phone_number; ?>">
                                    </div>
                                    <div class="col form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $result->user_email; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md form-group">
                                        <label for="residence">Residence:</label>
                                        <select name="residence" class="form-control">
                                            <option>Nairobi CBD</option>
                                            <option>Kiambu</option>
                                            <option>Kikuyu</option>
                                            <option>Kahawa West</option>
                                            <option>Githurai</option>
                                            <option>Juja</option>
                                        </select>
                                    </div>
                                    <div class="col-md form-group">
                                        <label for="email">Pickup station:</label>
                                        <select name="pickup-station" class="form-control">
                                            <option title="Product collected from our shop">Nairobi CBD, Gill House</option>
                                            <option title="Product shipped to your desired destination">Home Delivery</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nationalId">National Id:</label>
                                    <input type="text" name="national-id" class="form-control">
                                </div>
                                <div class="form-group mt-lg-4">
                                    <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("CHECKOUT_CART") ?>">
                                    <input type="submit" name="checkout" class="btn btn-lg btn-dark w-100" value="Place Order &raquo;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>