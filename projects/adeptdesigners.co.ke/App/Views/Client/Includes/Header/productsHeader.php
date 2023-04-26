<?php


if (!empty($categoryId)) {

    $databaseHandler->runSQL("SELECT  
category.category_name,
category.category_description,
category.category_icon
FROM category WHERE category.category_id = ? LIMIT 1", array($categoryId), 1);

    $categoryResults = $databaseHandler->getOutput();


    $categoryName = $categoryResults->category_name;

    $categoryIcon = $categoryResults->category_icon;

    $categoryDescription = $categoryResults->category_description;




    $databaseHandler->runSQL("SELECT
product_details.product_image,
product_details.market_price,
product_details.discounted_price,
products.product_id, 
products.product_name,
category.category_name
FROM product_details
INNER JOIN products ON products.product_id = product_details.product_id
INNER JOIN category ON category.category_id = products.category_id
 WHERE products.category_id = ? LIMIT 5", array($categoryId), 0);

    $results = $databaseHandler->getOutput();



?>

    <div class="bg-light">
        <div class="d-flex justify-content-center mt-5">
            <div class="mt-5">
                <img class="icon-sm mt-2" src="<?php echo Directories::getLocation("uploads/category/" . $categoryIcon) ?>">
            </div>
            <div class="mt-5 ml-1">
                <h3 class="text-dark-orange text-center text-nowrap"><strong><?php echo $categoryName; ?> </strong></h3>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="d-block">
                <div class="d-flex justify-content-center mb-3">
                    <h6 class="text-center"><?php echo $categoryDescription ?></h6>
                </div>
            </div>
        </div>
    </div>



    <div id="products-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($x = 1; $x <= count($results); $x++) {
            ?>
                <?php if ($x == 0) { ?>
                    <li data-target="#products-carousel" data-slide-to="<?php echo $x; ?>" class="active"></li>
                    <?php continue; ?>
                <?php } ?>
                <li data-target="#products-carousel" data-slide-to="<?php echo $x; ?>"></li>
            <?php } ?>

        </ol>
        <div class="carousel-inner overlay-image">
            <?php
            $firstItem = current($results);
            ?>
            <div class="carousel-item overlay active">
                <div class="row mb-3 mb-lg-0 mb-md-0">
                    <div class="col-md-4 col-12">
                        <div>
                            <img src="<?php echo Directories::getLocation("uploads/products/" . $firstItem->product_image); ?>" class="img-fluid uniform-image-height">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex justify-content-end mt-lg-5">
                            <a href="<?php echo "?request=viewItem&identifier=" . $firstItem->product_id ?>">
                                <div class="d-block mt-lg-5 bg-products-overlay rounded p-4 mr-5 text-dark-orange top-resized shadow">
                                    <div class="mt-3">
                                        <p class="text-right display-4"><?php echo $firstItem->product_name ?></p>
                                    </div>

                                    <div class="mt-2">
                                        <h6 class="text-right"><?php echo $firstItem->category_name ?></h6>
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <div>
                                            <h5 class="text-right cancelled"><?php echo $firstItem->market_price . "KSh" ?></h5>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="text-right"><?php echo $firstItem->discounted_price . "KSh" ?></h5>
                                        </div>
                                    </div>

                                    <div class="ml-3">
                                        <h3 class="text-right"><?php echo number_format((($firstItem->discounted_price - $firstItem->market_price) / $firstItem->market_price) * 100, 0) ?>% Off</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php for ($x = 0; $x < count($results); $x++) {
                if ($x === 0) {
                    continue;
                }
            ?>
                <div class="carousel-item overlay">
                    <div class="row mb-3 mb-lg-0 mb-md-0">
                        <div class="col-md-4 col-12">
                            <img src="<?php echo Directories::getLocation("uploads/products/" . $results[$x]->product_image); ?>" class="img-fluid uniform-image-height">
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-end mt-lg-5">
                                <a href="<?php echo "?request=viewItem&identifier=" . $results[$x]->product_id ?>">

                                    <div class="d-block mt-lg-5 bg-products-overlay rounded p-4 mr-5 text-dark-orange top-resized shadow">
                                        <div class="mt-3">
                                            <p class="text-right display-4"><?php echo $results[$x]->product_name ?></p>
                                        </div>

                                        <div class="mt-2">
                                            <h6 class="text-right"><?php echo $results[$x]->category_name ?></h6>
                                        </div>

                                        <div class="d-flex justify-content-end mt-3">
                                            <div>
                                                <h5 class="text-right cancelled"><?php echo $results[$x]->market_price . "KSh" ?></h5>
                                            </div>
                                            <div class="ml-3">
                                                <h5 class="text-right"><?php echo $results[$x]->discounted_price . "KSh" ?></h5>
                                            </div>
                                        </div>

                                        <div class="ml-3">
                                            <h3 class="text-right"><?php echo number_format((($results[$x]->discounted_price - $results[$x]->market_price) / $results[$x]->market_price) * 100, 0) ?>% Off</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#products-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#products-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php } ?>