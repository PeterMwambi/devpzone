<?php

if ($reference === "products" || $reference === "sub-category") {
    $categoryOptions = [];
    $subCategoryOptions = [];
    $categories = Form::getDbOptions("category", array("category_name"));
    if (!empty($categories)) {
        foreach ($categories as $category) {
            array_push($categoryOptions, $category->category_name);
        }
    }
    $subCategories = Form::getDbOptions("sub_category", array("sub_category_name"));
    if (!empty($subCategories)) {
        foreach ($subCategories as $subCategory) {
            array_push($subCategoryOptions, $subCategory->sub_category_name);
        }
    }

    $options = array(
        "category name" => count($categoryOptions) ? $categoryOptions : array(),
        "sub category name" => count($subCategoryOptions) ? $subCategoryOptions : array()
    );
}

if ($reference === "purchases" || $reference === "orders" || $reference === "customers") {
    $productNameOptions = [];
    $supplierNameOptions = [];
    $productNames = Form::getDbOptions("products", array("product_name"));
    if (!empty($productNames)) {
        foreach ($productNames as $name) {
            array_push($productNameOptions, $name->product_name);
        }
    }
    $supplierNames = Form::getDbOptions("suppliers", array("supplier_name"));
    if (!empty($supplierNames)) {
        foreach ($supplierNames as $name) {
            array_push($supplierNameOptions, $name->supplier_name);
        }
    }
    $options = array(
        "payment method" => array("Cash", "Mpesa"),
        "payment status" => array("Pending", "Verified"),
        "product name" => count($productNameOptions) ? $productNameOptions : array(),
        "supplier" => count($supplierNameOptions) ? $supplierNameOptions : array(),
    );
}

if ($reference === "administrators" || $reference === "category") {
    $options = array(
        "gender" => array("Male", "Female"),
    );
}

if ($reference === "employees" || $reference === "administrators") {
    $options = array(
        "gender" => array("Male", "Female"),
        "marital status" => array("Single", "Married", "Divorced"),
        "payment method" => array("Mpesa Paybill to Employees Phone Number", "Mpesa Paybill to Employee Bank Account", "Business Account to Employee Bank Account", "Business Account to Employee Phone Number")
    );
}

$fields = $forms["fields"];
$id = $forms["id"];
$alert = $forms["alert"];
$attributes = $forms["attributes"];
$button = ucwords(str_replace("-", " ", $request) . " " . $reference);
$mandatorySecurityField = $forms["mandatorySecurityField"];
$cardIdentifier = $forms["mandatorySecurityCardIdentifier"];
$viewPageName = $forms["viewPageName"];
$viewPageRequest = $forms["viewPageRequest"];
$identifier = Sanitize::__string(Input::grab("identifier"));
$values = !empty($values) ? $values : array();
?>








<form method="post" id="<?php echo $id; ?>">
    <div class="alert alert-danger d-none <?php echo $alert ?> alert-dissmissable fade show mt-3">
        <div class="alert-body d-flex justify-content-center">
            <span class="<?php echo $alert . "-text" ?>"></span>
        </div>
    </div>
    <?php foreach ($fields as $field) { ?>
    <?php if (!empty($attributes) && $attributes[$field]["type"] === "select") { ?>
    <div class="form-group">
        <?php Form::initializeOptions(); ?>
        <?php echo Form::Label($field, ucfirst($field) . ":") ?>
        <?php echo Form::Select(str_replace(" ", "-", $field), $options[$field], $attributes[$field]["class"], $values[$field]) ?>
    </div>
    <?php continue;
        } ?>


    <?php if (!empty($attributes) && $attributes[$field]["type"] === "textarea") { ?>
    <div class="form-group">
        <?php echo Form::Label($field, ucfirst($field) . ":") ?>
        <textarea class="form-control textarea"
            name="<?php echo str_replace(" ", "-", $field) ?>"> <?php echo $values[$field] ?></textarea>
    </div>
    <?php continue;
        } ?>
    <?php if (!empty($attributes) && $attributes[$field]["type"] === "submit") { ?>
    <div class="form-group">
        <?php
                if (!empty($identifier)) { ?>
        <input type="hidden" name="mandatory-security-identifier" value="<?php echo Functions::encrypt($identifier) ?>">
        <?php } ?>
        <?php if (!empty($cardIdentifier)) { ?>
        <input type="hidden" name="mandatory-security-card" value="<?php echo Functions::encrypt($cardIdentifier) ?>">
        <?php } ?>
        <?php if ($reference === "orders" || $reference === "customers") { ?>
        <input type="hidden" name="mandatory-security-reference" value="<?php echo Functions::encrypt($reference) ?>">
        <?php } ?>
        <input type="hidden" name="mandatory-security-action" value="<?php echo Functions::encrypt($request) ?>">
        <input type="hidden" name="mandatory-security-field"
            value="<?php echo Functions::encrypt($mandatorySecurityField) ?>">
        <?php echo Form::Input($attributes[$field]["type"], str_replace(" ", "-", $field), $attributes[$field]["class"], $button) ?>
    </div>
    <?php continue;
        } ?>
    <?php if (!empty($attributes) && $attributes[$field]["type"] === "checkbox") { ?>
    <div class="d-flex justify-content-end">
        <div class="form-group">
            <?php echo Form::Input($attributes[$field]["type"], str_replace(" ", "-", $field), $attributes[$field]["class"], $values[$field]) ?>
            <?php echo Form::Label($field, ucfirst($field)) ?>
        </div>
    </div>
    <?php continue;
        } ?>
    <div class="form-group <?php if ($field === 'transaction id') {
            echo "transactionID d-none";
        } ?>">
        <?php if (!empty($attributes)) { ?>
        <?php echo Form::Label($field, ucfirst($field) . ":") ?>
        <?php echo Form::Input($attributes[$field]["type"], str_replace(" ", "-", $field), $attributes[$field]["class"], $values[$field]) ?>
        <?php } ?>
    </div>
    <?php
    } ?>
    <div class="form-group">
        <?php if (!empty($viewPageName)) { ?>
        <div class="d-flex justify-content-center mt-3">
            <span class="mr-5">Help</span>
            <span classs="ml-5 mr-5">Terms & conditions</span>
            <span class="ml-5 mr-5">FAQs</span>
            <a href="<?php echo Directories::getLocation("pages") . $viewPageRequest ?>" class="no-outline ">
                <?php echo $viewPageName ?> &#x2192;</a>
        </div>
        <?php } ?>
    </div>
</form>