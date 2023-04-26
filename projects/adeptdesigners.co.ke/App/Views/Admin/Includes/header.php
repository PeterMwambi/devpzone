 <?php

    $header = array(
        "navigationMenuGroups" => array(
            "add" => array(
                "products" => array("home", "products", "add"),
                "category" => array("home", "categories", "add"),
                "sub-category" => array("home", "sub-categories", "add"),
                "administrators" => array("home", "administrators", "add"),
                "employees" => array("home", "employees", "add"),
                "suppliers" => array("home", "suppliers", "add"),
            ),
            "update" => array(
                "products" => array("home", "products", "update"),
                "category" => array("home", "categories", "update"),
                "sub-category" => array("home", "sub-categories", "update"),
                "administrators" => array("home", "administrators", "update"),
                "employees" => array("home", "employees", "update"),
                "suppliers" => array("home", "suppliers", "update"),
                "orders" => array("home", "orders", "update"),
                "customers" => array("home", "customers", "update"),
                "users" => array("home", "users", "update"),
            ),
            "view" => array(
                "products" => array("home", "products"),
                "category" => array("home", "categories"),
                "sub-category" => array("home", "sub-categories"),
                "administrators" => array("home", "administrators"),
                "employees" => array("home", "employees"),
                "suppliers" => array("home", "suppliers"),
                "orders" => array("home", "orders"),
                "customers" => array("home", "customers"),
                "users" => array("home", "users"),
            ),
            "item" => array(
                "products" => array("home", "products", "item"),
                "category" => array("home", "categories", "item"),
                "sub-category" => array("home", "sub-categories", "item"),
                "administrators" => array("home", "administrators", "item"),
                "employees" => array("home", "employees", "item"),
                "suppliers" => array("home", "suppliers", "item"),
                "orders" => array("home", "orders", "item"),
                "customers" => array("home", "customers", "item"),
                "users" => array("home", "users", "item"),
            )
        ),

        "navigationMenuLinks" => array(
            "home" => Directories::getLocation("account/pages/") . "?request=home",
            "products" => Directories::getLocation("account/pages/") . "?request=view&reference=products",
            "add" => htmlspecialchars(""),
            "categories" => Directories::getLocation("account/pages/") . "?request=view&reference=category",
            "sub-categories" => Directories::getLocation("account/pages/") . "?request=view&reference=sub-category",
            "administrators" => Directories::getLocation("account/pages/") . "?request=view&reference=administrators",
            "suppliers" => Directories::getLocation("account/pages/") . "?request=view&reference=suppliers",
            "employees" => Directories::getLocation("account/pages/") . "?request=view&reference=employees",
            "orders" => Directories::getLocation("account/pages/") . "?request=view&reference=orders",
            "customers" => Directories::getLocation("account/pages/") . "?request=view&reference=customers",
            "users" => Directories::getLocation("account/pages/") . "?request=view&reference=users",
            "item" => htmlspecialchars(""),
        ),


        "icons" => array(
            "products" =>
            Directories::getLocation("tools/assets/clothes-hanger.png"),
            "comments" =>
            Directories::getLocation("tools/assets/chat-box.png"),
            "messages" =>
            Directories::getLocation("tools/assets/messages.png"),
            "subscriptions" =>
            Directories::getLocation("tools/assets/subscription.png"),
            "orders" =>
            Directories::getLocation("tools/assets/order.png"),
            "customers" =>
            Directories::getLocation("tools/assets/customer.png"),
            "finance" =>
            Directories::getLocation("tools/assets/budget.png"),
            "category" =>
            Directories::getLocation("tools/assets/category.png"),
            "sub-category" =>
            Directories::getLocation("tools/assets/options.png"),
            "suppliers" =>
            Directories::getLocation("tools/assets/delivery-courier.png"),
            "administrators" =>
            Directories::getLocation("tools/assets/software-engineer.png"),
            "gender" =>
            Directories::getLocation("tools/assets/gender-symbols.png"),
            "users" =>
            Directories::getLocation("tools/assets/user.png"),
            "employees" =>
            Directories::getLocation("tools/assets/employee.png"),
            "notifications" =>
            Directories::getLocation("tools/assets/notification.png"),
            "blogs" =>
            Directories::getLocation("tools/assets/blog.png")
        ),
        "sub-title" => array(
            "add" => array(
                "category" => "Add Category",
                "sub-category" => "Add Sub Category",
                "products" => "Add Products",
                "suppliers" => "Add Suppliers",
                "employees" => "Add Employees"
            ),
            "item" => array(
                "category" => "Category Details",
                "sub-category" => "Sub Category Details",
                "products" => "Product Details",
                "suppliers" => "Suppliers Profile",
                "employees" => "Employee Details"
            ),
            "view" => array(
                "category" => "View Categories",
                "sub-category" => "View Sub Categories",
                "products" => "View Products",
                "suppliers" => "View Suppliers",
                "employees" => "View Employees"
            ),
        ),
        "preamble" => array(
            "add" => array(
                "category" => "Categories help us classify men and women products differently for easier identification. 
                Categories thus separate men fashion from women fashion and places them into different groups for reference. Click
                here to
                <a class='text-warning' href='?request=description&reference=category'>find out more</a>.
                To add a new category please fill the forms bellow",
                "sub-category" => "Sub Categories help us to separate different clothes worn by both men and women. Through breaking down the categories into sub categories, we are able to group similar fashion items
                 into classes for easier identification.    
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To add a new sub category please fill the forms bellow",
                "products" => "This section consists of a variety of clothes sold by adept designers.
                 Fashion wear for both men and women, in all categories and sub categories are displayed here. Click here to 
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To add a new product please fill the forms bellow",
                "administrators" => "A list of administrators who are staff employees mandated to manage the system,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To add a new administrator please fill the forms bellow",
                "employees" => "Staff members working for adept designers. i.e, the adept team,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To add a new employee please fill the forms bellow",
                "suppliers" => "Product suppliers delivering fashion products,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To add a new supplier please fill the forms bellow",
            ),
            "view" => array(
                "category" => "Categories help us classify men and women products differently for easier identification. 
                Categories thus separate men fashion from women fashion and places them into different groups for reference. Click here to   
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a> about categories",
                "sub-category" => "Sub Categories help us to separate different clothes worn by both men and women. Through breaking down the categories into sub categories, we are able to group similar fashion items
                 into classes for easier identification. Click here to   
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a> about sub categories",
                "products" => "This section consists of a variety of clothes sold by adept designers.
                 Fashion wear for both men and women, in all categories and sub categories are displayed here. Click here to 
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a> about products",
                "administrators" => "A list of administrators who are staff employees mandated to manage the system,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>",
                "employees" => "Staff members working for adept designers. i.e, the adept team,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>",
                "suppliers" => "Product suppliers delivering fashion products,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>",
            ),
            "update" => array(
                "category" => "Categories help us classify men and women products differently for easier identification. Click
                here to
                <a class='text-warning' href='?request=description&reference=category'>find out more</a>.
                To update this category information please fill the forms bellow",
                "sub-category" => "Sub Categories help us to identify the different clothes that are worn by both men and women,    
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To update this sub category information please fill the forms bellow",
                "products" => "Display a variety of clothes offered by adept designers, in all categories, sub categories, 
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To update this product information please fill the forms bellow",
                "administrators" => "A list of administrators who are staff employees mandated to manage the system,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To update this administrators information please fill the forms bellow",
                "employees" => "Staff members working for adept designers. i.e, the adept team,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To update this employees information please fill the forms bellow",
                "suppliers" => "Product suppliers delivering fashion products,
                <a class='text-warning text-underline' href='request=description&reference=category'>find out more</a>.
                To update this suppliers information please fill the forms bellow",
            )
        ),

        "buttons" => array(
            "view" => array(
                "name" => array(
                    $reference => "Add " . ucfirst($reference)
                ),
                "href" => array(
                    $reference => Directories::getLocation("account/admin/") . "?request=add&reference={$reference}"
                ),
                "icon" => Config::getIcon("add"),
                "color" =>  "text-muted text-underline link-hover mt-3"
            ),
            "add" => array(
                "name" => array(
                    $reference => "Go to " . ucfirst($reference)
                ),
                "href" => array(
                    $reference => Directories::getLocation("account/admin/") . "?request=view&reference={$reference}"
                ),
                "icon" => Config::getIcon("open-folder"),
                "color" =>  "text-muted text-underline link-hover mt-3"
            ),
        ),
    );
    $title = ucfirst(str_replace("_", "-", $reference));
    $subTitle = $header["sub-title"][$request][$reference];
    $navigationMenuItems = $header["navigationMenuGroups"][$request][$reference];
    $icon = $header["icons"][$reference];
    $preamble = $header["preamble"][$request][$reference];
    $href = $header["navigationMenuLinks"];
    $buttons = $header["buttons"][$request];
    $buttonIcon = $header["buttons"][$request]["icon"];
    $buttonColor = $header["buttons"][$request]["color"];
    $informationTitle = $header["information"][$request][$reference]["title"];
    $informationContent = $header["information"][$request][$reference]["content"];
    $informationHeading = $header["information"][$request][$reference]["heading"];
    $additionalInformationHeading = $header["additionalInformation"][$request][$reference]["heading"];
    $additionalInformationContent = $header["additionalInformation"][$request][$reference]["content"];


    ?>






 <div class="card mt-2 bg-banner">
     <div class="card-body">
         <div class="row">
             <div class="col-md-7">
                 <span class="mr-3 text-muted"><?php echo date("l, d/m/Y"); ?></span>
                 <?php foreach ($navigationMenuItems as $item) { ?>
                     <a href="<?php echo $href[$item];  ?>" class="text-muted link-hover"><?php echo ucfirst($item); ?></a> <span class="text-muted">></span>
                 <?php } ?>
                 <div class="d-flex justify-content-start mt-4">
                     <div>
                         <img src="<?php echo $icon; ?>" class="img-fluid icon mr-1">
                     </div>
                     <div>
                         <h1 class="admin-heading"><?php echo $title; ?></h1>
                     </div>
                 </div>
                 <div class="col-md-10 col-12 mb-3">
                     <p class="text-justify"><?php echo $preamble ?></p>
                     <p><strong>Records Found: </strong><?php echo !empty($count) ? $count : 0 ?></p>
                 </div>
             </div>
             <div class="col-md-5 mt-2">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="d-block">
                             <div class="d-flex justify-content-start">
                                 <small class="text-nowrap text-muted">Type here to find <?php echo (!empty($reference) && ($reference === "administrator" || $reference === "employees")) ? "an" : "a" ?> <?php echo $reference; ?> by name or id</small>
                             </div>
                             <div class="mt-2 mb-3">
                                 <?php require_once(Directories::getLocation("app/views/admin/includes/searchForm.php")); ?>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="d-block">
                             <?php if (!empty($buttons)) { ?>
                                 <div class="d-flex justify-content-lg-end mb-3">
                                     <a class="<?php echo $buttonColor ?> text-nowrap" href="<?php echo $buttons["href"][$reference] ?>">
                                         <span class="mt-2"><?php echo $buttons["name"][$reference]; ?></span>
                                         <img src="<?php echo $buttonIcon ?>" class="img-fluid icon-xs mb-lg-1">
                                     </a>
                                 </div>
                             <?php } ?>
                         </div>
                         <?php if (!empty($identifier)) { ?>
                             <div class="d-flex mt-3">
                                 <h6 class="admin-heading">More Information on this record</h6>
                             </div>
                             <div>
                                 <div class="d-flex">
                                     <span class="text-nowrap"><?php echo ucfirst($reference) ?> id:</span>
                                     <span class="text-muted text-nowrap ml-1"><?php echo $id ?></span>
                                 </div>
                                 <div class="d-flex mt-1">
                                     <span class="text-nowrap">Table:</span>
                                     <span class="text-muted text-nowrap ml-1"><?php echo ucfirst($reference) ?></span>
                                 </div>
                                 <div class="d-flex mt-1">
                                     <span class="text-nowrap">Date Added:</span>
                                     <span class="text-muted text-nowrap ml-1"><?php echo $dateAdded ?></span>
                                 </div>
                                 <div class="d-flex mt-1">
                                     <span class="text-nowrap">Time Added:</span>
                                     <span class="text-muted text-nowrap ml-1"><?php echo $timeAdded ?></span>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>