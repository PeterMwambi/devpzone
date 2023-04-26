<?php
$x = 0;

$navbar_items = array(
    "title" => array(
        "Home",
        "Products",
        "Comments",
        "Messages",
        "Subscribers",
        "Orders",
        "Customers",
        "Finance",
        "Category",
        "Sub-Category",
        "Administrators",
        "My Profile"
    ),
    "icon-links" => array(
        "Home" => Directories::getLocation("tools/assets/house.png"),
        "Products" => Directories::getLocation("tools/assets/clothes-hanger.png"),
        "Comments" => Directories::getLocation("tools/assets/chat-box.png"),
        "Messages" => Directories::getLocation("tools/assets/messages.png"),
        "Subscribers" => Directories::getLocation("tools/assets/subscription.png"),
        "Orders" => Directories::getLocation("tools/assets/order.png"),
        "Customers" => Directories::getLocation("tools/assets/customer.png"),
        "Finance" => Directories::getLocation("tools/assets/budget.png"),
        "Category" => Directories::getLocation("tools/assets/category.png"),
        "Sub-Category" => Directories::getLocation("tools/assets/options.png"),
        "Administrators" => Directories::getLocation("tools/assets/software-engineer.png"),
        "My Profile" => Directories::getLocation("tools/assets/man.png")

    ),
    "locations" => array(
        "Products" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=products",

        "Categories" =>
        Directories::getLocation("account/admin/profile/") . "?query=add&table=category",

        "Sub-Categories" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=sub-category",

        "Orders" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=customers",

        "Customers" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=customers",

        "Subscriptions" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=subscriptions",

        "Comments" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=comments",

        "Messages" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=messages",

        "Administrators" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=administrators",

        "Suppliers" =>
        Directories::getLocation("account/admin/profile/") . "?query=view&table=suppliers",

        "My Profile" =>
        Directories::getLocation("account/admin/profile/") . "?query=update&table=profile"


    ),
);

?>

<div class="sidenav mb-lg-3">
    <div class="mb-lg-5 mt-lg-4">
        <?php foreach ($navbar_items["title"] as $title) { ?>
            <div class="link-identity">
                <?php if (isset($title)) { ?>
                    <a class="text-dark d-flex" href=" <?php
                                                        echo $navbar_items["locations"][$title];
                                                        ?>">
                        <div>
                            <img src="<?php echo $navbar_items["icon-links"][$title]; ?>" class="img-fluid icon-sm">
                        </div>
                        <div class="ml-md-1">
                            <span class="text-nowrap mt-lg-1"> <?php echo ($title) ?> </span>
                        </div>
                    </a>
                <?php } ?>
            </div>
        <?php $x++;
        } ?>
    </div>
</div>