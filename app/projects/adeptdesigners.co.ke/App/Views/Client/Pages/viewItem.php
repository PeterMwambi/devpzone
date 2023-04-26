<?php

$itemIdentifier = Sanitize::__string(Input::grab("identifier"));

if (empty($itemIdentifier)) {

?>
    <div class="body-overlay">
        <div class="d-flex justify-content-center">
            <h3 class="text-dark-orange text-center mt-wide">Oops!!</h3>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <p class="col-9 text-center">Something seems wrong here. Go back to the previous page then try again</p>
        </div>
        <div class="d-flex justify-content-center mb-2 mt-2">
            <div>
                <a class="ml-1" href="<?php echo "?request=products" ?>">Continue Shopping</a>
            </div>
            <div class="ml-2">
                <img src="<?php echo Config::getIcon("shopping-cart") ?>" class="img-fluid icon-sm-uniform">
            </div>
        </div>
        <div class="d-flex justify-content-center text-medium-size mt-3">
            <div class="d-flex ml-3 mb-5">
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
<?php } else {
    if (isset($itemIdentifier)) {
        $databaseHandler->runSQL("SELECT reviews FROM product_details WHERE product_id = ? LIMIT 1", array($itemIdentifier), 1);
        $review = $databaseHandler->getOutput()->reviews;

        if (empty($review)) {
            $review = 1;
        } else {
            $review += 1;
        }
        $databaseHandler->runSQL("UPDATE product_details SET reviews = ? WHERE product_details.product_id = ?", array($review, $itemIdentifier), null);
    }

    $databaseHandler->runSQL("SELECT 
                                    products.product_id,
                                    products.product_name,
                                    category.category_name, 
                                    sub_category.sub_category_name,
                                    product_details.product_image,
                                    product_details.market_price,
                                    product_details.discounted_price,
                                    product_details.product_description,
                                    product_details.reviews,
                                    product_details.status FROM products
                                    INNER JOIN category ON
                                    category.category_id = products.category_id
                                    INNER JOIN sub_category ON
                                    sub_category.sub_category_id = products.sub_category_id
                                    INNER JOIN product_details ON
                                    product_details.product_id = products.product_id WHERE products.product_id = ? LIMIT 1", array($itemIdentifier), 1);
    $result = $databaseHandler->getOutput();
    $productDetails = json_decode($result->product_description);
    $productDetails = (array) $productDetails;
    $productDescription = $productDetails["product-description"];
    $productFeautures = $productDetails["product-features"];
    $count = $databaseHandler->getCount();
}
?>

<?php if ($count) { ?>

    <div class="body-overlay">
        <div class="container-fluid p-5">
            <div class="d-flex justify-content-center">
                <h3 class="text-dark-orange mt-5">About</h3>
            </div>

            <div class="row">
                <div class="col-md-5 mt-3 mb-5">
                    <div>
                        <h6 class="text-center mb-3"><?php echo $result->product_name ?></h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?php echo Directories::getLocation("app/uploads/products/") . $result->product_image ?>" class="img-fluid icon-x-lg">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="d-flex justify-content-start ml-n2">
                        <h5 class="text-dark-orange mt-md-5">Product Information</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <span class="text-dark">Name:</span>
                            <h6 class="text-dark-orange"><?php echo $result->product_name ?></h6>
                        </div>
                        <div class="col-md-6 p-2">
                            <span class="text-dark">Category:</span>
                            <h6 class="text-dark-orange"><?php echo $result->category_name ?></h6>
                        </div>
                        <div class="col-md-6 p-2">
                            <span class="text-dark">Sub Category:</span>
                            <h6 class="text-dark-orange"><?php echo $result->sub_category_name ?></h6>
                        </div>
                        <div class="col-md-6 p-2">
                            <span class="text-dark">Price:</span>
                            <h6 class="text-dark-orange"><?php echo number_format($result->discounted_price) . " KSh" ?></h6>
                        </div>
                        <div class="col-md-6 p-2">
                            <span class="text-dark">Price by other Sellers:</span>
                            <h6 class="text-dark-orange"><?php echo number_format($result->market_price) . " KSh" ?></h6>
                        </div>

                        <div class="col-md-6 p-2">
                            <span class="text-dark">Discount:</span>
                            <h6 class="text-dark-orange"><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</h6 class="text-dark-orange">
                        </div>

                        <div class="col-md-6 p-2">
                            <span class="text-dark">Save:</span>
                            <h6 class="text-dark-orange"><?php echo number_format($result->market_price - $result->discounted_price) . " KSh" ?></h6>
                        </div>
                        <div class="col-md-6 p-2">
                            <span class="text-dark">Reviewed By:</span>
                            <h6 class="text-dark-orange"><?php echo $result->reviews ?> People</h6>
                        </div>

                        <div class="col-md-6 p-2">
                            <form method="post" class="addToCart">
                                <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                <input class="btn-sm btn-warning" type="submit" value="Add Item to Cart">
                            </form>
                        </div>
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-start">
                                <h5 class="text-dark-orange">Description</h5>
                            </div>
                            <div>
                                <p><?php echo $productDescription ?></p>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-start">
                                <h5 class="text-dark-orange">Features</h5>
                            </div>
                            <div>
                                <p><?php echo html_entity_decode($productFeautures) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>