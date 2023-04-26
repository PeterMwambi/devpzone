<?php
// namespace App\Models\Authenticator;
/**
 * @author Peter Mwambi
 * @content Common Gateway Interface Authenticator
 * @date Mon May 24 2021 01:10:58 GMT+0300 (East Africa Time)
 * @updated Sat Jan 15 2022 22:02:51 GMT+0300 (East Africa Time)
 * 
 * Receives and Processes form requests 
 */

class Authenticator extends Validator
{


    private $cart;


    public function __construct(array $data, $form, $action = null, $identifier = null)
    {
        parent::__construct($data, $form, $action, $identifier);
    }

    /**
     * Output Error Message to GUI
     * @param null
     * @return string
     * 
     * Returns validation error messages from the parent
     * validator class
     * 
     */
    public function getMsg()
    {
        if (!$this->confirmRequestStatus()) {
            return $this->processErrorMsg();
        }
    }


    public function confirmRequest()
    {
        if (!$this->confirmRequestStatus()) {
            return false;
        }
        return true;
    }





    /**
     * @param null
     * @return bool
     * 
     * Sends recovery email with link to forgotten user account
     */

    /**
     * Subscription Authentication
     * @param null
     * @return bool
     * 
     * Checks if user email subscription has succeeded and returns
     * true otherwise returns false
     */

    public function approveSubscription()
    {
        if ($this->processUserSubscription()) {
            return true;
        }
        return false;
    }
    /**
     * @param null
     * @return bool
     * 
     * Insert user email to subscription table 
     * and returns true if insert query was successful
     * Otherwise returns false
     */
    private function processUserSubscription()
    {
        if ($this->confirmRequestStatus()) {
            $email = Sanitize::__email($this->data["email"]);
            $subscriberId = strtoupper(uniqid()) . rand(10000, 100000);
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $preferences = json_encode(array("Fashion News" => true, "Product Arrivals" => true, "Events" => true));
            $subscriptionData = array(
                "subscriber_id" => $subscriberId,
                "date_posted" => $dateAdded,
                "day_posted" => $dayAdded,
                "time_posted" => $timeAdded,
                "email" => $email,
                "preferences" => $preferences
            );
            $this->conn->setTable("subscriptions");
            $this->conn->setQueryItems($subscriptionData);
            $this->conn->queryDb("insert");
            return true;
        }
        return false;
    }
    public function administratorsLogin()
    {
        if (!$this->processAdministratorsLogin()) {
            return false;
        }
        return true;
    }

    private function processAdministratorsLogin()
    {
        if ($this->confirmRequestStatus()) {
            $username = ucfirst(Sanitize::__string($this->data["username"]));
            $password = Sanitize::__string($this->data["password"]);
            Session::generate("username", $username);
            Session::generate("password", $password);
            $dateLoggedin = date("l, d/m/Y");
            $timeLoggedin = date("g:iA");
            $lastSeen = $dateLoggedin . " at " . $timeLoggedin;
            $activity = json_encode(array("date" => $dateLoggedin, "time" => $timeLoggedin));
            $status = "active";
            $this->conn->setTable("administrators");
            $this->conn->setQueryItems(array("activity" => $activity, "last_seen" => $lastSeen, "status" => $status));
            $this->conn->setQueryIdentifier(array("username" => $username));
            $this->conn->queryDb("update");
            Session::generate("ADMIN-PASSKEY-PHRASE", Functions::encrypt($password));
            return true;
        }
        return false;
    }
    public function processAdministrator(string $action, $identifier = null)
    {
        if ($this->administratorsFactory($action, $identifier)) {
            return true;
        }
        return false;
    }

    private function administratorsFactory(string $action, $identifier = null)
    {
        if ($this->confirmRequestStatus()) {
            $username = Sanitize::__string($this->data["username"]);
            $employeeId = Sanitize::__string($this->data["employee-id"]);
            $password = Sanitize::__string($this->data["password"]);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $email_prefix = "@adeptdesigners.co.ke";
            $email = $username . $email_prefix;
            $admin_id = strtoupper(uniqid());
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $activity = array("last_seen" => $dayAdded . ", " . $dateAdded . " " . $timeAdded);
            switch ($action) {
                case 'add':
                    $adminProfileData = array(
                        "admin_id" => $admin_id,
                        "username" => $username,
                        "admin_email" => $email,
                        "password" => $password,
                        "employee_id" => $employeeId,
                        "date_added" => $dateAdded,
                        "day_added" => $dayAdded,
                        "time_added" => $timeAdded,
                        "activity" => json_encode($activity),
                        "status" => "inactive",
                    );
                    $this->conn->setTable("administrators");
                    $this->conn->setQueryItems($adminProfileData);
                    $this->conn->queryDb("insert");
                    return true;
                    break;
            }
        }
        return false;
    }
    public function processCategory(string $action, $identifier)
    {
        if ($this->categoryFactory($action, $identifier)) {
            return true;
        }
        return false;
    }

    private function categoryFactory(string $action, $identifier = null)
    {
        if ($this->confirmRequestStatus() && !empty($action)) {
            $categoryName = Sanitize::__string($this->data["category-name"]);
            $categoryDescription = Sanitize::__string($this->data["category-description"]);
            $gender = Sanitize::__string($this->data["gender"]);
            $table = "category";
            $categoryId = strtoupper(uniqid());
            Session::generate("IDENTIFIER", $categoryId);
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $dateUpdated = date("d/m/Y");
            $timeUpdated = date("g:iA");
            $this->conn->setTable($table);
            switch ($action) {
                case 'add':
                    $categoryData = array(
                        "category_id" => $categoryId,
                        "category_name" => $categoryName,
                        "gender" => $gender,
                        "category_description" => $categoryDescription,
                        "date_added" => $dateAdded,
                        "time_added" => $timeAdded,
                        "day_added" => $dayAdded
                    );
                    $this->conn->setQueryItems($categoryData);
                    $this->conn->queryDb("insert");
                    return true;
                    break;
                case 'update':
                    if (!empty($identifier)) {
                        $categoryData = array(
                            "category_name" => $categoryName,
                            "gender" => $gender,
                            "category_description" => $categoryDescription,
                            "date_updated" => $dateUpdated,
                            "time_updated" => $timeUpdated
                        );
                        $queryIdentifier = array("category_id" => $identifier);
                        $this->conn->setQueryItems($categoryData);
                        $this->conn->setQueryIdentifier($queryIdentifier);
                        $this->conn->queryDb("update");
                        return true;
                    }
                    return false;
                    break;
            }
        }
        return false;
    }

    public function processSubCategory(string $action, $identifier)
    {
        if ($this->subCategoryFactory($action, $identifier)) {
            return true;
        }
        return false;
    }

    private function subCategoryFactory(string $action, $identifier = null)
    {
        if ($this->confirmRequestStatus()) {
            $subCategoryName = Sanitize::__string($this->data["sub-category-name"]);
            $subCategoryDescription = Sanitize::__string($this->data["sub-category-description"]);
            $categoryName = Sanitize::__string($this->data["category-name"]);
            $this->conn->runSQL("SELECT category_id FROM category WHERE category_name = ? LIMIT 1", array($categoryName), 1);
            $result = $this->conn->getOutput();
            $categoryId = $result->category_id;
            $table = "sub_category";
            $this->conn->setTable($table);
            $subCategoryId = strtoupper(uniqid());
            Session::generate("IDENTIFIER", $subCategoryId);
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $dateUpdated = date("d/m/Y");
            $timeUpdated = date("g:iA");
            switch ($action) {
                case 'add':
                    $subCategoryData = array(
                        "sub_category_id" => $subCategoryId,
                        "category_id" => $categoryId,
                        "sub_category_name" => $subCategoryName,
                        "sub_category_description" => $subCategoryDescription,
                        "date_added" => $dateAdded,
                        "time_added" => $timeAdded,
                        "day_added" => $dayAdded
                    );
                    $this->conn->setQueryItems($subCategoryData);
                    $this->conn->queryDb("insert");
                    return true;
                    break;
                case 'update':
                    if (!empty($identifier)) {
                        $subCategoryData = array(
                            "category_id" => $categoryId,
                            "sub_category_name" => $subCategoryName,
                            "sub_category_description" => $subCategoryDescription,
                            "date_updated" => $dateUpdated,
                            "time_updated" => $timeUpdated
                        );
                        $queryIdentifier = array("sub_category_id" => $identifier);
                        $this->conn->setQueryItems($subCategoryData);
                        $this->conn->setQueryIdentifier($queryIdentifier);
                        $this->conn->queryDb("update");
                        return true;
                    }
                    return false;
                    break;
            }
        }
        return false;
    }
    public function processProduct(string $action, string $card, $identifier = null)
    {
        if ($this->productFactory($action, $card, $identifier)) {
            return true;
        }
        return false;
    }

    private function productFactory(string $action, string $card, $identifier = null)
    {
        if ($this->confirmRequestStatus()) {
            if (Session::exists("IDENTIFIER")) {
                $productId = Session::getValue("IDENTIFIER");
            } else {
                $productId = strtoupper(uniqid());
                Session::generate("IDENTIFIER", $productId);
            }
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $productName = Sanitize::__string($this->data["product-name"]);
            $categoryName = Sanitize::__string($this->data["category-name"]);
            $subCategoryName = Sanitize::__string($this->data["sub-category-name"]);
            $this->conn->runSQL("SELECT category_id FROM category WHERE category_name = ? LIMIT 1", array($categoryName), 1);
            $result = $this->conn->getOutput();
            $categoryId = $result->category_id;
            $this->conn->runSQL("SELECT sub_category_id FROM sub_category WHERE sub_category_name = ? LIMIT 1", array($subCategoryName), 1);
            $result = $this->conn->getOutput();
            $subCategoryId = $result->sub_category_id;
            $marketPrice = Sanitize::__string($this->data["market-price"]);
            $discountedPrice = Sanitize::__string($this->data["discounted-price"]);
            $productDescription = Sanitize::__string($this->data["product-description"]);
            $productFeatures = Sanitize::__string($this->data["product-features"]);
            $description = array("product-description" => $productDescription, "product-features" => $productFeatures);
            $status = "Avilable";
            switch ($action) {
                case 'add':
                    switch ($card) {
                        case 'productsFirstCard':
                            $productData = array(
                                "product_id" => $productId,
                                "product_name" => $productName,
                                "category_id" => $categoryId,
                                "sub_category_id" => $subCategoryId,
                                "date_added" => $dateAdded,
                                "day_added" => $dayAdded,
                                "time_added" => $timeAdded
                            );
                            $productDetailsData = array(
                                "product_id" => $productId,
                                "market_price" => $marketPrice,
                                "product_description" => json_encode($description),
                                "discounted_price" => $discountedPrice,
                                "reviews" => 0,
                                "status" => $status,
                            );
                            $this->conn->runSQL("SELECT products.product_id FROM products 
                            WHERE products.product_id = ? LIMIT 1", array($productId), 1);
                            $count = $this->conn->getCount();
                            if ($count > 0) {
                                $this->conn->setTable("products");
                                $this->conn->setQueryItems($productData);
                                $this->conn->setQueryIdentifier(array("product_id" => $productId));
                                $this->conn->queryDb("update");
                                $status = true;
                            } else {
                                $this->conn->setTable("products");
                                $this->conn->setQueryItems($productData);
                                $this->conn->queryDb("insert");
                                $status = true;
                            }
                            $this->conn->runSQL("SELECT product_id FROM product_details
                            WHERE product_id = ? LIMIT 1", array($productId), 1);
                            $count = $this->conn->getCount();
                            if ($count > 0) {
                                $this->conn->setTable("product_details");
                                $this->conn->setQueryItems($productDetailsData);
                                $this->conn->setQueryIdentifier(array("product_id" => $productId));
                                $this->conn->queryDb("update");
                                $status = true;
                            } else {
                                $this->conn->setTable("product_details");
                                $this->conn->setQueryItems($productDetailsData);
                                $this->conn->queryDb("insert");
                                $status = true;
                            }

                            if ($status) {
                                return true;
                            } else {
                                return false;
                            }
                            break;
                        case 'productsThirdCard':
                            $productDescriptionData = array(
                                "product_id" => $productId,
                                "product_description" => json_encode($description)
                            );
                            $this->conn->runSQL("SELECT product_id FROM product_details
                            WHERE product_id = ? LIMIT 1", array($productId), 1);
                            $count = $this->conn->getCount();
                            if ($count > 0) {
                                $this->conn->setTable("product_details");
                                $this->conn->setQueryItems($productDescriptionData);
                                $this->conn->setQueryIdentifier(array("product_id" => $productId));
                                $this->conn->queryDb("update");
                                return true;
                            } else {
                                $this->conn->setTable("product_details");
                                $this->conn->setQueryItems($productDescriptionData);
                                $this->conn->queryDb("insert");
                                return true;
                            }
                            break;
                    }
                    break;
                case 'update':
                    if (!empty($identifier)) {
                        switch ($card) {
                            case 'productsFirstCard':
                                $productData = array(
                                    "product_name" => $productName,
                                    "category_id" => $categoryId,
                                    "sub_category_id" => $subCategoryId,
                                    "date_added" => $dateAdded,
                                    "day_added" => $dayAdded,
                                    "time_added" => $timeAdded
                                );
                                $productDetailsData = array(
                                    "market_price" => $marketPrice,
                                    "discounted_price" => $discountedPrice,
                                    "status" => $status,
                                );
                                $updateArray = array(
                                    "date_updated" => $dayAdded . ", " . $dateAdded,
                                    "time_updated" => $timeAdded
                                );
                                $this->conn->setTable("products");
                                $this->conn->setQueryItems($updateArray);
                                $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                                $this->conn->queryDb("update");
                                //Update Product fields
                                $this->conn->setTable("products");
                                $this->conn->setQueryItems($productData);
                                $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                                $this->conn->queryDb("update");
                                //Update product details fields
                                $this->conn->setTable("product_details");
                                $this->conn->setQueryItems($productDetailsData);
                                $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                                $this->conn->queryDb("update");
                                return true;
                                break;
                            case 'productsThirdCard':
                                $productDescriptionData = array(
                                    "product_description" => json_encode($description)
                                );
                                $this->conn->setTable("product_details");
                                $this->conn->setQueryItems($productDescriptionData);
                                $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                                $this->conn->queryDb("update");
                                $updateArray = array(
                                    "date_updated" => $dayAdded . ", " . $dateAdded,
                                    "time_updated" => $timeAdded
                                );
                                $this->conn->setTable("products");
                                $this->conn->setQueryItems($updateArray);
                                $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                                $this->conn->queryDb("update");
                                return true;
                                break;
                        }
                        break;
                        return true;
                    }
            }
        }
        return false;
    }


    public function processPurchases(string $action, $identifier = null)
    {
        if (!empty($action)) {
            if ($this->purchasesFactory($action, $identifier)) {
                return true;
            }
            return false;
        }
        return false;
    }


    private function purchasesFactory(string $action,  $identifier = null)
    {
        if ($this->confirmRequestStatus()) {
            $purchaseId = strtoupper(uniqid());
            $supplierActivityId = strtoupper(uniqid());
            if (Session::exists("IDENTIFIER")) {
                $productId = Session::getValue("IDENTIFIER");
            } else {
                $productId = strtoupper(uniqid());
                //Generate product identifier
                Session::generate("IDENTIFIER", $productId);
            }
            $supplier = Sanitize::__string($this->data["supplier-name"]);
            $buyingPrice = Sanitize::__string($this->data["buying-price"]);
            $paymentMethod = Sanitize::__string($this->data["payment-method"]);
            $transactionId = Sanitize::__string($this->data["transaction-id"]);
            $paymentStatus = Sanitize::__string($this->data["payment-status"]);
            $balance = Sanitize::__string($this->data["balance"]);
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $this->conn->runSQL("SELECT supplier_id FROM suppliers WHERE supplier_name = ? LIMIT 1", array($supplier), 1);
            $supplierId = $this->conn->getOutput()->supplier_id;

            switch ($action) {
                case 'add':
                    //Adding new record to purchases
                    //Check if product id is present in purchases table
                    $this->conn->runSQL("SELECT product_id FROM purchases WHERE product_id = ? LIMIT 1", array($productId), 1);
                    $count = $this->conn->getCount();
                    //if present
                    if ($count) {
                        //Generate Purchase Array
                        $purchaseArray = array(
                            "supplier_id" => $supplierId,
                            "product_id" => $productId,
                            "amount_paid" => $buyingPrice,
                            "balance" => !empty($balance) ? $balance : "nill",
                            "payment_method" => $paymentMethod,
                            "transaction_id" => !empty($transactionId) ? $transactionId : "n/a",
                            "payment_status" => $paymentStatus,
                            "date_added" => $dateAdded,
                            "day_added" => $dayAdded,
                            "time_added" => $timeAdded
                        );
                        //update purchases table with product id as identifier
                        $this->conn->setTable("purchases");
                        $this->conn->setQueryItems($purchaseArray);
                        $this->conn->setQueryIdentifier(array("product_id" => $productId));
                        $this->conn->queryDb("update");
                    } else {
                        //Generate Purchase array
                        $purchaseArray = array(
                            "purchase_id" => $purchaseId,
                            "supplier_id" => $supplierId,
                            "product_id" => $productId,
                            "amount_paid" => $buyingPrice,
                            "balance" => !empty($balance) ? $balance : "nill",
                            "payment_method" => $paymentMethod,
                            "transaction_id" => !empty($transactionId) ? $transactionId : "n/a",
                            "payment_status" => $paymentStatus,
                            "date_added" => $dateAdded,
                            "day_added" => $dayAdded,
                            "time_added" => $timeAdded
                        );
                        //Insert new record into purchases table
                        $this->conn->setTable("purchases");
                        $this->conn->setQueryItems($purchaseArray);
                        $this->conn->queryDb("insert");
                    }


                    $this->conn->runSQL("SELECT product_id FROM supplier_activity WHERE product_id = ? LIMIT 1", array($productId), 1);
                    $count = $this->conn->getCount();
                    if ($count > 0) {
                        $supplierActivityArray = array(
                            "supplier_activity_id" => $supplierActivityId,
                            "supplier_id" => $supplierId,
                            "purchase_id" => $purchaseId,
                            "payment_status" => $paymentStatus,
                            "date_added" => $dateAdded,
                            "day_added" => $dayAdded,
                            "time_added" => $timeAdded
                        );
                        //update supplier activity table
                        $this->conn->setTable("supplier_activity");
                        $this->conn->setQueryItems($supplierActivityArray);
                        $this->conn->setQueryIdentifier(array("purchase_id" => $purchaseId));
                        $this->conn->queryDb("update");
                    } else {
                        $supplierActivityArray = array(
                            "supplier_activity_id" => $supplierActivityId,
                            "supplier_id" => $supplierId,
                            "product_id" => $productId,
                            "purchase_id" => $purchaseId,
                            "payment_status" => $paymentStatus,
                            "date_added" => $dateAdded,
                            "day_added" => $dayAdded,
                            "time_added" => $timeAdded
                        );
                        //Insert into supplier activity table
                        $this->conn->setTable("supplier_activity");
                        $this->conn->setQueryItems($supplierActivityArray);
                        $this->conn->queryDb("insert");
                        //Generate product identifier
                        Session::generate("IDENTIFIER", $productId);
                    }
                    //Check if product Id already exists. If absent insert new product id
                    $this->conn->runSQL("SELECT product_id FROM products WHERE product_id = ?", array($productId), 1);
                    $count = $this->conn->getCount();
                    if ($count > 0) {
                        //Update products table and insert a supplierId to the added product
                        $this->conn->setTable("products");
                        $this->conn->setQueryItems(array("supplier_id" => $supplierId, "purchase_id" => $purchaseId));
                        $this->conn->setQueryIdentifier(array("product_id" => $productId));
                        $this->conn->queryDb("update");
                    } else {
                        $this->conn->setTable("products");
                        $this->conn->setQueryItems(array("purchase_id" => $purchaseId, "supplier_id" => $supplierId, "product_id" => $productId));
                        $this->conn->queryDb("insert");
                        //Generate product identifier
                        Session::generate("IDENTIFIER", $productId);
                    }
                    return true;
                    break;
                case 'update':
                    if (!empty($identifier)) {
                        $purchaseArray = array(
                            "supplier_id" => $supplierId,
                            "amount_paid" => $buyingPrice,
                            "balance" => !empty($balance) ? $balance : "0",
                            "payment_method" => $paymentMethod,
                            "transaction_id" => !empty($transactionId) ? $transactionId : "n/a",
                            "payment_status" => $paymentStatus,
                        );
                        $supplierActivityArray = array(
                            "supplier_id" => $supplierId,
                            "payment_status" => $paymentStatus,
                            "date_added" => $dateAdded,
                            "day_added" => $dayAdded,
                            "time_added" => $timeAdded
                        );

                        $this->conn->setTable("purchases");
                        $this->conn->setQueryItems($purchaseArray);
                        $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                        $this->conn->queryDb("update");

                        $this->conn->setTable("products");
                        $this->conn->setQueryItems(array("supplier_id" => $supplierId));
                        $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                        $this->conn->queryDb("update");


                        $this->conn->setTable("supplier_activity");
                        $this->conn->setQueryItems($supplierActivityArray);
                        $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                        $this->conn->queryDb("update");
                        $updateArray = array(
                            "date_updated" => $dayAdded . ", " . $dateAdded,
                            "time_updated" => $timeAdded
                        );
                        $this->conn->setTable("products");
                        $this->conn->setQueryItems($updateArray);
                        $this->conn->setQueryIdentifier(array("product_id" => $identifier));
                        $this->conn->queryDb("update");
                        return true;
                    }
                    return false;
                    break;
            }
        }
        return false;
    }



    public function getDateTime(string $selection)
    {
        if (!empty($selection)) {
            switch ($selection) {
                case 'date':
                    return date("d/m/Y");
                    break;
                case 'day':
                    return date("l");
                    break;
                case 'time':
                    return date("g:iA");
                    break;
                default:
                    return false;
                    break;
            }
        }
        return false;
    }

    public function processSuppliers(string $action, $identifier = null)
    {
        if ($this->suppliersFactory($action, $identifier)) {
            return true;
        }
        return false;
    }

    private function suppliersFactory(string $action, $identifier = null)
    {
        if ($this->confirmRequestStatus()) {
            $supplierId = strtoupper(strtoupper(uniqid()));
            Session::generate("IDENTIFIER", $supplierId);
            $supplierName = Sanitize::__string($this->data["supplier-name"]);
            $company = Sanitize::__string($this->data["company"]);
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $email = Sanitize::__string($this->data["suppliers-email"]);
            $website = Sanitize::__string($this->data["website"]);
            $supplierArray = array(
                "supplier_id" => $supplierId,
                "supplier_name" => $supplierName, "company" => $company,
                "phone_number" => $phoneNumber,
                "suppliers_email" => $email, "website" => $website
            );
            switch ($action) {
                case 'add':
                    $this->conn->setTable("suppliers");
                    $this->conn->setQueryItems($supplierArray);
                    $this->conn->queryDb("insert");
                    return true;
                    break;
                case 'update':
                    $supplierArray = array(
                        "supplier_name" => $supplierName, "company" => $company,
                        "phone_number" => $phoneNumber,
                        "suppliers_email" => $email, "website" => $website
                    );
                    if (!empty($identifier)) {
                        $this->conn->setTable("suppliers");
                        $this->conn->setQueryItems($supplierArray);
                        $this->conn->setQueryIdentifier(array("supplier_id" => $identifier));
                        $this->conn->queryDb("update");
                        return true;
                    }
                    return false;
                    break;
            }
        }
        return false;
    }



    public function processEmployee($action, string $card, $identifier = null)
    {
        if ($this->employeeFactory($action, $card, $identifier)) {
            return true;
        }
        return false;
    }
    private function employeeFactory(string $action, string $card, $identifier = null)
    {
        if ($this->confirmRequestStatus()) {
            $employeeId = Session::exists("IDENTIFIER") ? Session::getValue("IDENTIFIER") : strtoupper(uniqid());
            $firstname = Sanitize::__string($this->data["firstname"]);
            $middlename = Sanitize::__string($this->data["middlename"]);
            $lastname = Sanitize::__string($this->data["lastname"]);
            $name = null;
            $selectedName = null;
            if (!empty($middlename)) {
                $selectedName =  "middlename";
                $name = $middlename;
            }
            if (!empty($lastname)) {
                $selectedName = "lastname";
                $name = $lastname;
            };
            $name = !empty($name) ? $name : null;
            $currentEmail = Sanitize::__string($this->data["current-email"]);
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $dob = Sanitize::__string($this->data["dob"]);
            $gender = Sanitize::__string($this->data["gender"]);
            $nationality = Sanitize::__string($this->data["nationality"]);
            $nationalID = Sanitize::__string($this->data["national-id"]);
            $maritalStatus = Sanitize::__string($this->data["marital-status"]);
            $role = Sanitize::__string($this->data["role"]);
            $salary = Sanitize::__string($this->data["salary"]);
            $username = Sanitize::__string($this->data["username"]);
            $password = password_hash($firstname . $lastname, PASSWORD_DEFAULT);
            $activity = date("l, d/m/Y g:iA");
            $status = "not active";
            $activationStatus = "Not yet activated";
            $county = Sanitize::__string($this->data["county"]);
            $city = Sanitize::__string($this->data["city"]);
            $role = Sanitize::__string($this->data["role"]);
            $residence = Sanitize::__string($this->data["residence"]);
            $postalAddress = Sanitize::__string($this->data["postal-address"]);
            $bankAccountNo = Sanitize::__string($this->data["bank-account-no"]);
            $bank = Sanitize::__string($this->data["bank"]);
            $salaryPaid = Sanitize::__string($this->data["salary-paid"]);
            $paymentMethod = Sanitize::__string($this->data["payment-method"]);
            $dateAdded = date("d/M/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");

            switch ($card) {
                case 'employeesFirstCard':
                    switch ($action) {
                        case 'add':
                            $employeeArray = array(
                                "employee_id" => $employeeId,
                                "firstname" => $firstname,
                                "middlename" => $middlename,
                                "lastname" => $lastname,
                                "selected_name" => $selectedName,
                                "role" => $role,
                                "salary" => $salary,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            if (!is_null($name)) {
                                $workEmail = $name . "@adeptdesigners.co.ke";
                            }
                            $employeeAccountArray = array(
                                "employee_id" => $employeeId,
                                "username" => $username,
                                "work_email" => strtolower($workEmail),
                                "password" => $password,
                                "work_email" => strtolower($workEmail),
                                "last_seen" => $activity,
                                "status" => $status,
                                "date_activated" => $activationStatus,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            break;
                        case 'update':
                            $employeeArray = array(
                                "firstname" => $firstname,
                                "middlename" => $middlename,
                                "lastname" => $lastname,
                                "selected_name" => $selectedName,
                                "role" => $role,
                                "salary" => $salary,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            if (!is_null($name)) {
                                $workEmail = $name . "@adeptdesigners.co.ke";
                            }
                            $employeeAccountArray = array(
                                "username" => $username,
                                "work_email" => strtolower($workEmail),
                                "password" => $password,
                                "work_email" => strtolower($workEmail),
                                "last_seen" => $activity,
                                "status" => $status,
                                "date_activated" => $activationStatus,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            break;
                    }
                    break;
                case 'employeesSecondCard':
                    switch ($action) {
                        case 'add':
                            $employeeArray = array(
                                "employee_id" => $employeeId,
                                "gender" => $gender,
                                "date_of_birth" => $dob,
                                "nationality" => $nationality,
                                "national_id" => $nationalID,
                                "marital_status" => $maritalStatus,
                                "residence" => $residence,
                                "county" => $county,
                                "city" => $city,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            $employeeAccountArray = array(
                                "employee_id" => $employeeId,
                                "last_seen" => $activity,
                                "status" => $status,
                                "date_activated" => $activationStatus,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            break;
                        case 'update':
                            $employeeArray = array(
                                "gender" => $gender,
                                "date_of_birth" => $dob,
                                "nationality" => $nationality,
                                "national_id" => $nationalID,
                                "marital_status" => $maritalStatus,
                                "residence" => $residence,
                                "county" => $county,
                                "city" => $city,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            $employeeAccountArray = array(
                                "last_seen" => $activity,
                                "status" => $status,
                                "date_activated" => $activationStatus,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            break;
                    }
                    break;
                case 'employeesThirdCard':
                    switch ($action) {
                        case 'add':
                            $employeeArray = array(
                                "employee_id" => $employeeId,
                                "current_email" => $currentEmail,
                                "phone_number" => $phoneNumber,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            $employeeAccountArray = array(
                                "employee_id" => $employeeId,
                                "last_seen" => $activity,
                                "status" => $status,
                                "postal_address" => $postalAddress,
                                "bank_account_no" => $bankAccountNo,
                                "bank" => $bank,
                                "salary_paid" => $salaryPaid,
                                "payment_method" => $paymentMethod,
                                "date_activated" => $activationStatus,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            break;
                        case 'update':
                            $employeeArray = array(
                                "current_email" => $currentEmail,
                                "phone_number" => $phoneNumber,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            $employeeAccountArray = array(
                                "last_seen" => $activity,
                                "status" => $status,
                                "postal_address" => $postalAddress,
                                "bank_account_no" => $bankAccountNo,
                                "bank" => $bank,
                                "salary_paid" => $salaryPaid,
                                "payment_method" => $paymentMethod,
                                "date_activated" => $activationStatus,
                                "time_added" => $timeAdded,
                                "day_added" => $dayAdded,
                                "date_added" => $dateAdded,
                            );
                            break;
                    }
                    break;
            }
            switch ($action) {
                case 'add':
                    $this->conn->runSQL("SELECT employees.employee_id FROM employees INNER JOIN employee_account ON
                            employee_account.employee_id = employees.employee_id WHERE employees.employee_id = ? LIMIT 1", array($employeeId), 1);
                    $count = $this->conn->getCount();
                    if ($count > 0) {
                        $this->conn->setTable("employees");
                        $this->conn->setQueryItems($employeeArray);
                        $this->conn->setQueryIdentifier(array("employee_id" => $employeeId));
                        $this->conn->queryDb("update");
                        $this->conn->setTable("employee_account");
                        $this->conn->setQueryItems($employeeAccountArray);
                        $this->conn->setQueryIdentifier(array("employee_id" => $employeeId));
                        $this->conn->queryDb("update");
                        return true;
                    } else {
                        $this->conn->setTable("employees");
                        $this->conn->setQueryItems($employeeArray);
                        $this->conn->queryDb("insert");
                        $this->conn->setTable("employee_account");
                        $this->conn->setQueryItems($employeeAccountArray);
                        $this->conn->queryDb("insert");
                        Session::generate("IDENTIFIER", $employeeId);
                        return true;
                    }
                    break;
                case 'update':
                    if (!empty($identifier)) {
                        $this->conn->setTable("employees");
                        $this->conn->setQueryItems($employeeArray);
                        $this->conn->setQueryIdentifier(array("employee_id" => $identifier));
                        $this->conn->queryDb("update");
                        $this->conn->setTable("employee_account");
                        $this->conn->setQueryItems($employeeAccountArray);
                        $this->conn->setQueryIdentifier(array("employee_id" => $identifier));
                        $this->conn->queryDb("update");
                        return true;
                    }
                    break;
            }
        }
        return false;
    }



    public function processClient($action, $identifier = null)
    {
        if ($this->clientFactory($action, $identifier)) {
            return true;
        }
        return false;
    }

    private function clientFactory(string $action,  $identifier = null)
    {

        if ($this->confirmRequestStatus()) {
            $userId = strtoupper(uniqid());
            $username = Sanitize::__string($this->data["username"]);
            $firstname = Sanitize::__string($this->data["firstname"]);
            $lastname = Sanitize::__string($this->data["lastname"]);
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $email = Sanitize::__email($this->data["user-email"]);
            $password = Sanitize::__string($this->data["password"]);
            $dateAdded = date("d/M/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $userActivityData = array("date_added" => $dateAdded, "day_added" => $dayAdded, "time_added" => $timeAdded);
            $userActivity = json_encode($userActivityData);
            switch ($action) {
                case 'login':
                    if (!empty($username) && !empty($password)) {
                        $this->conn->runSQL("SELECT username, password 
                                        FROM users WHERE username = ?
                                        LIMIT 1", array($username), 1);
                        if ($this->conn->getCount()) {
                            $encryptedAuth = $username . " " . $password;
                            $encryptedAuth = Functions::encrypt($encryptedAuth);
                            Session::generate("CLIENT_PASSKEY_AUTHENTICATOR", $encryptedAuth);
                            return true;
                        }
                        return false;
                    }
                    return false;
                    break;
                case 'register':
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $userArray = array(
                        "user_id" => $userId,
                        "username" => $username,
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "user_email" => $email,
                        "phone_number" => $phoneNumber,
                        "password" => $password,
                        "date_added" => $dateAdded,
                        "day_added" => $dayAdded,
                        "time_added" => $timeAdded,
                        "activity" => $userActivity
                    );

                    $this->conn->setTable("users");
                    $this->conn->setQueryItems($userArray);
                    if ($this->conn->queryDb("insert")) {
                        return true;
                    } else {
                        return false;
                    }
                    return false;
                    break;
                case 'update':
                    break;
            }
        }
        return false;
    }


    public function processCheckout()
    {
        if ($this->checkoutFactory()) {
            return true;
        }
        return false;
    }

    private function checkoutFactory()
    {
        if ($this->confirmRequestStatus() && Functions::decrypt(Session::getValue("CLIENT_PASSKEY_AUTHENTICATOR"))) {
            $customerId = strtoupper(uniqid());
            $orderId = strtoupper(uniqid());
            $firstname = Sanitize::__string($this->data["firstname"]);
            $lastname = Sanitize::__string($this->data["lastname"]);
            $customerName = $firstname . " " . $lastname;
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $email = Sanitize::__string($this->data["customer-email"]);
            $residence = Sanitize::__string($this->data["residence"]);
            $pickupStation = Sanitize::__string($this->data["pickup-station"]);
            $nationalId = Sanitize::__string($this->data["national-id"]);
            $orderDetails = (Session::exists("cart") && is_array(Session::getValue("cart"))) ? Session::getValue("cart") : array();
            $this->cart = new Cart;
            $cartTotalPrice = (string)$this->cart->getTotalPrice();
            $dateAdded = date("d/M/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            if (count($orderDetails)) {
                $orderDetailsData = json_encode($orderDetails);
            }

            $this->conn->runSQL("SELECT user_id FROM users WHERE username = ? LIMIT 1", array(Session::getValue("client-username")), 1);
            $userId = $this->conn->getOutput()->user_id;

            $customerArray = array(
                "customer_id" => $customerId,
                "user_id" => $userId,
                "customer_name" => $customerName,
                "phone_number" => $phoneNumber,
                "customer_email" => $email,
                "residence" => $residence,
                "national_id" => $nationalId,
            );

            $orderArray = array(
                "order_id" => $orderId,
                "customer_id" => $customerId,
                "user_id" => $userId,
                "date_added" => $dateAdded,
                "day_added" => $dayAdded,
                "time_added" => $timeAdded,
            );


            $orderDetailsArray = array(
                "order_id" => $orderId,
                "order_details" => $orderDetailsData,
                "pickup_station" => $pickupStation,
                "amount_due" => $cartTotalPrice,
                "amount_paid" => 0,
                "balance" => $cartTotalPrice,
                "payment_status" => "pending",
                "payment_method" => "pending",
                "transaction_id" => "pending"
            );

            $this->conn->setTable("customers");
            $this->conn->setQueryItems($customerArray);
            $this->conn->queryDb("insert");

            $this->conn->setTable("orders");
            $this->conn->setQueryItems($orderArray);
            $this->conn->queryDb("insert");

            $this->conn->setTable("order_details");
            $this->conn->setQueryItems($orderDetailsArray);
            $this->conn->queryDb("insert");

            return true;
        }
        return false;
    }



    public function processOrderPayment(string $reference, string $identifier)
    {
        if ($this->orderPaymentFactory($reference, $identifier)) {
            return true;
        }
        return false;
    }


    private function orderPaymentFactory(string $reference, string $identifier)
    {
        if ($this->confirmRequestStatus() && !empty($identifier)) {
            $paymentAmount = Sanitize::__string($this->data["payment-amount"]);
            $paymentMethod  = Sanitize::__string($this->data["payment-method"]);
            $paymentStatus = Sanitize::__string($this->data["payment-status"]);
            $transactionId = !empty($this->data["transaction-id"]) ? Sanitize::__string($this->data["transaction-id"]) : "n/a";
            $balance = Sanitize::__string($this->data["balance"]);
            $datePaid = date("d/M/Y");
            $dayPaid = date("l");
            $timePaid = date("g:iA");
            $table = "order_details";
            $field = "order_id";

            switch ($reference) {
                case 'orders':
                    $orderId = $identifier;
                    break;
                case 'customers':
                    $this->conn->runSQL("SELECT orders.order_id FROM orders INNER JOIN 
                    customers ON customers.customer_id = orders.customer_id WHERE customers.customer_id = ?", array($identifier), 1);
                    $orderId = $this->conn->getOutput()->order_id;
                    break;
            }
            $orderPaymentArray = array(
                "amount_paid" => $paymentAmount,
                "payment_method" => $paymentMethod,
                "payment_status" => $paymentStatus,
                "transaction_id" => $transactionId,
                "balance" => $balance,
                "date_paid" => $datePaid,
                "day_paid" => $dayPaid,
                "time_paid" => $timePaid
            );
            $this->conn->setTable($table);
            $this->conn->setQueryItems($orderPaymentArray);
            $this->conn->setQueryIdentifier(array($field => $orderId));
            if ($this->conn->queryDb("update")) {
                return true;
            }
        }
        return false;
    }
}
