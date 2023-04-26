<!-- Begin home content -->
<!-- @content short product, about, contacts content description -->



<?php

if (!empty($categoryId)) {

?>

    <?php

    $databaseHandler->runSQL("SELECT products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.reviews,
        product_details.market_price, 
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE category.category_id = ?", array($categoryId), 0);
    $results = $databaseHandler->getOutput();
    $count = $databaseHandler->getCount();
    ?>

    <div class="container-fluid body-overlay p-2 p-md-3">
        <div class="d-flex justify-content-end">
            <span class="mr-3 mt-2">Showing Results: <?php echo $count ?></span>
        </div>
        <div class="row mr-0">
            <section>
                <div class="col-12">
                    <div class="row mb-5 mr-0">
                        <?php foreach ($results as $result) { ?>
                            <div class="col-md-2 col-6 mt-3">
                                <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                                    <div class="card card-uniform shadow-sm">
                                        <div>
                                            <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                        </div>
                                        <div class="card-body p-1 p-md-3">
                                            <div class="position-absolute">
                                                <span class="text-muted"><?php echo $result->product_name; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-start mt-5">
                                                <div>
                                                    <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                                </div>
                                                <div class="ml-md-3 ml-2">
                                                    <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                                </div>
                                            </div>
                                            <div class="mt-1">
                                                <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                            </div>
                                            <div class="mt-1">
                                                <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                            </div>

                                            <div class="mt-lg-3 mt-2 mb-3">
                                                <form method="post" class="addToCart">
                                                    <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                                    <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                                    <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        <?php if (!empty($categoryId)) { ?>
            <div class="d-flex justify-content-center">
                <span>Need Help?</span>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <small class="text-center col-11 col-md-12">Try out a few options here to help you find what you are looking for</small>
            </div>
            <?php
            $databaseHandler->runSQL("SELECT
    sub_category.sub_category_icon,
    sub_category.sub_category_name
    FROM sub_category
    INNER JOIN category ON
    category.category_id = sub_category.category_id
    WHERE category.category_id = ?", array($categoryId), 0);

            $subCategoryResults = $databaseHandler->getOutput();
            ?>

            <div class="d-flex justify-content-center">
                <div class="col-md-8 col-12 overflow-scroll-x mb-2">
                    <div class="d-flex">
                        <?php foreach ($subCategoryResults as $subCategoryResult) { ?>
                            <div class="col-md-4 mt-2 mb-3 ml-5">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-outline-dark bg-orange-hover round" href=""><?php echo $subCategoryResult->name ?>
                                        <div class="d-flex">
                                            <div>
                                                <img src="<?php echo Directories::getLocation("uploads/sub-category/" . $subCategoryResult->sub_category_icon) ?>" class="img-fluid icon-sm">
                                            </div>
                                            <div>
                                                <span class="text-nowrap"><?php echo $subCategoryResult->sub_category_name; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>

        <div class="container-fluid p-0 body-overlay">
            <div class="p-3 bg-light shadow-sm mt-5">
                <div class="d-flex text-dark-orange justify-content-center mt-3">
                    <h3 class="mr-3">OFFER !</h3>
                    <h3 class="mr-3">OFFER !</h3>
                    <h3>OFFER !</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="text-center col-md-4">Winter is here with us. Enjoy amaizing offers and discounts on men and women jackets, jumpers and all warm wear</p>
                </div>
            </div>


            <?php
            $categoryId = "6284A5EF78CA1";
            $databaseHandler->runSQL("SELECT products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.market_price, 
        product_details.reviews,
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE category.category_id = ? LIMIT 6", array($categoryId), 0);
            $results = $databaseHandler->getOutput();
            $count = $databaseHandler->getCount();

            ?>
            <div class="d-flex justify-content-center">
                <div class="mt-3">
                    <h5 class="text-dark-orange text-center">Men Warm Wear</h5>
                </div>
            </div>
            <div class="row mr-0 ml-0 mt-md-3">
                <?php foreach ($results as $result) { ?>
                    <div class="col-md-2 col-6 mt-3">
                        <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                            <div class="card card-uniform shadow-sm">
                                <div>
                                    <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                </div>
                                <div class="card-body p-1 p-md-3">
                                    <div class="position-absolute">
                                        <span class="text-muted"><?php echo $result->product_name; ?></span>
                                    </div>
                                    <div class="d-flex justify-content-start mt-5">
                                        <div>
                                            <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                        </div>
                                        <div class="ml-md-3 ml-2">
                                            <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                    </div>
                                    <div class="mt-1">
                                        <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                    </div>

                                    <div class="mt-lg-3 mt-2 mb-3">
                                        <form method="post" class="addToCart">
                                            <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                            <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                            <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <div class="d-flex justify-content-center mt-3 mt-md-5 mb-3">
                <a class="btn btn-outline-dark bg-orange-hover round" href="?request=products&identifier=" .$categoryId>Find out More &raquo;</a>
            </div>


            <?php
            $databaseHandler->runSQL("SELECT products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.reviews,
        product_details.market_price, 
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE category.category_id = ? LIMIT 6", array("629EF3CDD4B8F"), 0);
            $results = $databaseHandler->getOutput();
            $count = $databaseHandler->getCount();

            ?>

            <div class="d-flex justify-content-center">
                <div class="mt-3">
                    <h5 class="text-dark-orange text-center">Ladies Warm Wear</h5>
                </div>
            </div>

            <section>
                <div class="row mr-0 ml-0 mt-md-3">
                    <?php foreach ($results as $result) { ?>
                        <div class="col-md-2 col-6 mt-3">
                            <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                                <div class="card card-uniform shadow-sm">
                                    <div>
                                        <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                    </div>
                                    <div class="card-body p-1 p-md-3">
                                        <div class="position-absolute">
                                            <span class="text-muted"><?php echo $result->product_name; ?></span>
                                        </div>
                                        <div class="d-flex justify-content-start mt-5">
                                            <div>
                                                <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                            </div>
                                            <div class="ml-md-3 ml-2">
                                                <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                        </div>

                                        <div class="mt-1">
                                            <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                        </div>

                                        <div class="mt-lg-3 mt-2 mb-3">
                                            <form method="post" class="addToCart">
                                                <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                                <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                                <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <div class="d-flex justify-content-center mt-3 mt-md-5 mb-5">
                    <a class="btn btn-outline-dark bg-orange-hover round" href="?request=products&identifier=629EF3CDD4B8F">Find out More &raquo;</a>
                </div>
            </section>


            <div class="p-3 bg-light shadow-sm">
                <div class="d-flex text-dark-orange justify-content-center mt-3">
                    <h3 class="mr-3">Most Viewed Items</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="text-center col-md-4">Take a look some of the most viewed and most rated fashion wear by our customers</p>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="mt-3">
                    <h5 class="text-dark-orange text-center">Men Fashion</h5>
                </div>
            </div>

            <?php

            $databaseHandler->runSQL("SELECT 
        products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.market_price, 
        product_details.reviews,
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE product_details.reviews >= ? AND category.gender = ? ORDER BY product_details.reviews DESC
        LIMIT 6", array(20, "Male"), 0);
            $results = $databaseHandler->getOutput();
            $count = $databaseHandler->getCount();


            ?>
            <section>
                <div class="row mr-0 ml-0 mt-md-3">
                    <?php foreach ($results as $result) { ?>
                        <div class="col-md-2 col-6 mt-3">
                            <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                                <div class="card card-uniform shadow-sm">
                                    <div>
                                        <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                    </div>
                                    <div class="card-body p-1 p-md-3">
                                        <div class="position-absolute">
                                            <span class="text-muted"><?php echo $result->product_name; ?></span>
                                        </div>
                                        <div class="d-flex justify-content-start mt-5">
                                            <div>
                                                <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                            </div>
                                            <div class="ml-md-3 ml-2">
                                                <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                        </div>

                                        <div class="mt-1">
                                            <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                        </div>

                                        <div class="mt-lg-3 mt-2 mb-3">
                                            <form method="post" class="addToCart">
                                                <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                                <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                                <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <div class="d-flex justify-content-center mt-3 mt-md-5 mb-3">
                    <a class="btn btn-outline-dark bg-orange-hover round" href="?request=products&identifier=629EF3CDD4B8F">Find out More &raquo;</a>
                </div>
            </section>


            <div class="d-flex justify-content-center">
                <div class="mt-3">
                    <h5 class="text-dark-orange text-center">Ladies Fashion</h5>
                </div>
            </div>

            <?php

            $databaseHandler->runSQL("SELECT 
        products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.market_price, 
        product_details.reviews,
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE product_details.reviews >= ? AND category.gender = ? ORDER BY product_details.reviews DESC
        LIMIT 12", array(20, "Female"), 0);
            $results = $databaseHandler->getOutput();
            $count = $databaseHandler->getCount();


            ?>

            <section>
                <div class="row mr-0 ml-0">
                    <?php foreach ($results as $result) { ?>
                        <div class="col-md-2 col-6 mt-3">
                            <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                                <div class="card card-uniform shadow-sm">
                                    <div>
                                        <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                    </div>
                                    <div class="card-body p-1 p-md-3">
                                        <div class="position-absolute">
                                            <span class="text-muted"><?php echo $result->product_name; ?></span>
                                        </div>
                                        <div class="d-flex justify-content-start mt-5">
                                            <div>
                                                <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                            </div>
                                            <div class="ml-md-3 ml-2">
                                                <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                        </div>

                                        <div class="mt-1">
                                            <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                        </div>

                                        <div class="mt-lg-3 mt-2 mb-3">
                                            <form method="post" class="addToCart">
                                                <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                                <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                                <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <div class="d-flex justify-content-center mt-md-5 mt-3 mb-md-5 mb-3">
                <a class="btn btn-outline-dark bg-orange-hover round" href="?request=products&identifier=629EF3CDD4B8F">Find out More &raquo;</a>
            </div>

            <div class="p-3 bg-light shadow-sm mt-4">
                <div class="d-flex text-dark-orange justify-content-center mt-3">
                    <div>
                        <h3 class="mr-3">Shop by Categories</h3>
                    </div>
                    <div class="ml-1 mt-1">
                        <img src="<?php echo Config::getIcon("shopping-cart") ?>" class="img-fluid icon-sm">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="text-center col-md-4">Find your foverite fashion wear by category</p>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-center mt-3 bg-category-men p-3">
                <div class="d-block">
                    <div class="d-flex justify-content-center">
                        <div class="mr-2">
                            <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("man") ?>">
                        </div>
                        <div>
                            <h4 class="text-center text-dark-orange">Men Fashion Wear</h4>
                        </div>
                    </div>
                    <div>
                        <p class="text-center">Consist of men fashion wear categories</p>
                    </div>
                </div>
            </div>
            <hr>
            <?php
            $databaseHandler->runSQL("SELECT category.category_id, 
                                    category.category_name,
                                    category.category_icon
                                    FROM category WHERE gender = ?", array("male"), 0);


            $menCategoryInfo = $databaseHandler->getOutput();
            foreach ($menCategoryInfo as $categoryInfo) {
                $databaseHandler->runSQL("SELECT products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.reviews,
        product_details.market_price, 
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE category.category_id = ? LIMIT 6", array($categoryInfo->category_id), 0);
                $results = $databaseHandler->getOutput();
            ?>

                <section>
                    <div class="d-flex justify-content-center mt-md-4 mt-3">
                        <div>
                            <img src="<?php echo Directories::getLocation("uploads/category/" . $categoryInfo->category_icon)  ?>" class="img-fluid icon-sm">
                        </div>
                        <div class="ml-2">
                            <h5 class="text-center text-dark-orange"><?php echo $categoryInfo->category_name ?></h5>
                        </div>
                    </div>
                    <div class="row mr-0 ml-0 mt-0 mt-md-4">
                        <?php foreach ($results as $result) { ?>
                            <div class="col-md-2 col-6 mt-3">
                                <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                                    <div class="card card-uniform shadow-sm">
                                        <div>
                                            <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                        </div>
                                        <div class="card-body p-1 p-md-3">
                                            <div class="position-absolute">
                                                <span class="text-muted"><?php echo $result->product_name; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-start mt-5">
                                                <div>
                                                    <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                                </div>
                                                <div class="ml-md-3 ml-2">
                                                    <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                                </div>
                                            </div>
                                            <div class="mt-1">
                                                <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                            </div>

                                            <div class="mt-1">
                                                <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                            </div>

                                            <div class="mt-lg-3 mt-2 mb-3">
                                                <form method="post" class="addToCart">
                                                    <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                                    <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                                    <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="d-flex justify-content-center mt-md-5 mt-3 mb-md-5 mb-3">
                        <a class="btn btn-outline-dark bg-orange-hover round" href="?request=products&identifier=<?php echo $categoryInfo->category_id ?>">Find out More &raquo;</a>
                    </div>
                </section>
            <?php } ?>




            <hr>
            <div class="d-flex justify-content-center mt-3 bg-category-ladies p-3">
                <div class="d-block">
                    <div class="d-flex justify-content-center">
                        <div class="mr-2">
                            <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("woman") ?>">
                        </div>
                        <div>
                            <h4 class="text-center text-dark-orange">Women Fashion Wear</h4>
                        </div>
                    </div>
                    <div>
                        <p class="text-center">Consist of women fashion wear categories</p>
                    </div>
                </div>
            </div>
            <hr>

            <?php
            $databaseHandler->runSQL("SELECT category.category_id, 
                                    category.category_name,
                                    category.category_icon
                                    FROM category WHERE gender = ?", array("female"), 0);


            $womenCategoryInfo = $databaseHandler->getOutput();

            foreach ($womenCategoryInfo as $categoryInfo) {
                $databaseHandler->runSQL("SELECT products.product_name,
        category.category_name,
        products.product_id,
        sub_category.sub_category_name, 
        products.product_name,
        product_details.reviews,
        product_details.market_price, 
        product_details.discounted_price,
        product_details.product_image
        FROM products
        INNER JOIN product_details ON
        product_details.product_id = products.product_id
        INNER JOIN category ON
        category.category_id = products.category_id
        INNER JOIN sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE category.category_id = ? LIMIT 6", array($categoryInfo->category_id), 0);

                $results = $databaseHandler->getOutput();
            ?>

                <section>
                    <div class="d-flex justify-content-center mt-md-4 mt-3">
                        <div>
                            <img src="<?php echo Directories::getLocation("uploads/category/" . $categoryInfo->category_icon)  ?>" class="img-fluid icon-sm">
                        </div>
                        <div class="ml-2">
                            <h5 class="text-center text-dark-orange"><?php echo $categoryInfo->category_name ?></h5>
                        </div>
                    </div>
                    <div class="row mr-0 ml-0 mt-md-4">
                        <?php foreach ($results as $result) { ?>
                            <div class="col-md-2 col-6 mt-3">
                                <a href="<?php echo "?request=viewItem&identifier=" . $result->product_id ?>">
                                    <div class="card card-uniform shadow-sm">
                                        <div>
                                            <img src="<?php echo Directories::getLocation("uploads/products/" . $result->product_image) ?>" class="img-fluid icon-uniform-height">
                                        </div>
                                        <div class="card-body p-1 p-md-3">
                                            <div class="position-absolute">
                                                <span class="text-muted"><?php echo $result->product_name; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-start mt-5">
                                                <div>
                                                    <span class="cancelled"><?php echo $result->market_price . "Ksh" ?></span>
                                                </div>
                                                <div class="ml-md-3 ml-2">
                                                    <span><?php echo $result->discounted_price . "Ksh" ?></span>
                                                </div>
                                            </div>
                                            <div class="mt-1">
                                                <span><?php echo number_format((($result->discounted_price - $result->market_price) / $result->market_price) * 100, 0) ?> % Off</span>
                                            </div>

                                            <div class="mt-1">
                                                <span class="text-muted"><?php echo $result->reviews ?> reviews</span>
                                            </div>

                                            <div class="mt-lg-3 mt-2 mb-3">
                                                <form method="post" class="addToCart">
                                                    <input type="hidden" name="mandatory-security-field" value="<?php echo Functions::encrypt("ADD_CART_AUTHENTICATOR"); ?>">
                                                    <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($result->product_id); ?>">
                                                    <input class="btn-sm btn-warning" type="submit" value="Add to Cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="d-flex justify-content-center mt-md-5 mt-3 mb-md-5 mb-3">
                        <a class="btn btn-outline-dark bg-orange-hover round" href="?request=products&identifier=<?php echo $categoryInfo->category_id ?>">Find out More &raquo;</a>
                    </div>
                </section>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- Footer Extension -->
    <?php require_once(Directories::getLocation("app/views/client/includes/footer/footerExtension.php")) ?>