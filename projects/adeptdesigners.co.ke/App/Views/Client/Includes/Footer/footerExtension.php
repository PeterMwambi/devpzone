<div class="bg-light shadow">
    <div class="d-flex justify-content-center">
        <h4 class="text-center text-dark-orange mt-5 ml-md-0">All Categories</h4>
    </div>
    <section>
        <div class="row mr-0">
            <!-- Men Fashion -->
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-center">
                    <h5 class="mt-2 text-dark-orange ml-3 text-center">Men Fashion</h5>
                </div>
                <?php
                $databaseHandler->runSQL("SELECT category.category_name, category.category_id, category.category_icon FROM category WHERE category.gender = ?", array("Male"), 0);

                $results = $databaseHandler->getOutput();
                ?>
                <div class="row mr-0">
                    <div class="d-flex justify-content-center">
                        <div class="col-10 col-md-8 mb-2">
                            <?php foreach ($results as $result) { ?>
                                <a class="btn btn-outline-dark ml-md-0 ml-3 mt-3 w-100 bg-orange-hover round" href="?request=products&identifier=<?php echo $result->category_id ?>"><?php echo $result->name ?>
                                    <div class="d-flex justify-content-center">
                                        <div class="mr-2">
                                            <img src="<?php echo Directories::getLocation("uploads/category/" . $result->category_icon) ?>" class="img-fluid icon-sm">
                                        </div>
                                        <div>
                                            <span class="text-nowrap"><?php echo $result->category_name; ?></span>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Women Fashion  -->
            <div class="col-md-6 col-12">
                <div class="d-flex justify-content-center">
                    <h5 class="mt-3 text-center text-dark-orange">Women Fashion</h5>
                </div>

                <?php
                $databaseHandler->runSQL("SELECT category.category_name, category.category_id, category.category_icon FROM category WHERE category.gender = ?", array("Female"), 0);

                $results = $databaseHandler->getOutput();
                ?>
                <div class="d-flex justify-content-center">
                    <div class="row mr-0">
                        <div class="d-flex justify-content-center">
                            <div class="col-10 col-md-8 mb-2">
                                <?php foreach ($results as $result) { ?>
                                    <a class="btn btn-outline-dark ml-3  ml-md-0 mt-3 w-100 bg-orange-hover round" href="?request=products&identifier=<?php echo $result->category_id ?>"><?php echo $result->name ?>
                                        <div class="d-flex justify-content-center">
                                            <div class="mr-2">
                                                <img src="<?php echo Directories::getLocation("uploads/category/" . $result->category_icon) ?>" class="img-fluid icon-sm">
                                            </div>
                                            <div>
                                                <span class="text-nowrap"><?php echo $result->category_name; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center mb-3">
        <p class="text-center mt-3 col-md-4">Getting your foverite fashion wear has never been easier than this.
            Try Adept Designers today
            and select from a wide variety of <?php echo isset($categoryName) ? $categoryName : "fashion attire" ?> at great prices, offers and discounts.</p>
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
                    <a a href="?request=cart" class="ml-2"><?php echo $categoryName ?></a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex justify-content-md-end justify-content-start text-medium-size mt-3">
                <div class="d-flex mb-md-n5 ml-3">
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