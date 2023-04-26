<?php
$links = Config::getLinks("ADMINISTRATOR");
?>



<div class="container">
    <div class="mt-md bg-translucent-white p-4 rounded mb-5">
        <div class="d-flex justify-content-center">
            <h1 class="text-nowrap">Howdy <?php echo Session::getValue("adminUsername"); ?></h1>
        </div>
        <div class="d-flex justify-content-center">
            <span>Welcome to the Administrators Dashboard. Today is <?php echo date("l, d M Y") ?></span>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <h5>Lets Get Started</h5>
        </div>
        <?php
        $linkGroupNames = $links["name"];
        $icons = $links["icons"];
        $linkItems = $links["nameGroup"];
        $addActionGroup = $links["actionGroups"]["add"];
        $viewActionGroup = $links["actionGroups"]["view"];
        $deleteActionGroup = $links["actionGroups"]["delete"];
        $headerReference = $links["href"];

        ?>
        <div class="row">
            <?php foreach ($linkGroupNames as $linkGroupName) { ?>
                <div class="col-12 mt-3 col-md-3">
                    <div class="card border-top-blue shadow-lg">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="mr-1">
                                    <img src="<?php echo $icons[$linkGroupName]  ?>" class="img-fluid icon-sm">
                                </div>
                                <div>
                                    <h5 class="text-darkaliceblue"><?php echo ucfirst($linkGroupName); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach ($linkItems[$linkGroupName] as $linkItem) { ?>
                                <div class="mt-3">
                                    <a class="text-nowrap btn btn-outline-dark" href="<?php echo $headerReference[$linkItem] ?>">
                                        <div class="d-flex">
                                            <div>
                                                <img src="<?php

                                                            if (in_array($linkItem, $addActionGroup)) {
                                                                echo $icons["add"];
                                                            }
                                                            if (in_array($linkItem, $viewActionGroup)) {
                                                                echo $icons["view"];
                                                            }
                                                            if (in_array($linkItem, $deleteActionGroup)) {
                                                                echo $icons["delete"];
                                                            }

                                                            ?>" class="img-fluid icon-sm">
                                            </div>
                                            <div class="mt-half">
                                                <?php echo ucfirst($linkItem); ?>&#x2192;
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>