<?php

//store database
//*************************** product functions ********************************
function getAllProducts() {
    global $db;

    $query = "select * from product";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function getSingleProduct($productID) {
//get product by id
    global $db;

    $query = "select * from Product
            WHERE productID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $productID);
    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function getCategoryNameByID($categoryID) {
//gets gategory name using id from category table returns name
    global $db;

    $query = "SELECT categoryName FROM category
WHERE categoryID =:idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $categoryID);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    return $results[0];
}

function addProduct($productName, $productSKU, $vendorSKU, $description, $price, $vendorID) {
//adds product and returns new id
    global $db;

    $query = "insert into product
                    (productName, productSKU, vendorSKU, description,
                        price,vendorID)
                    VALUES
                    (:namePlace,:skuPlace, :vendorSKUPlace, :descriptPlace, 
                            :pricePlace,:vendorIdPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':namePlace', $productName);
    $statement->bindValue(':skuPlace', $productSKU);
    $statement->bindValue(':vendorSKUPlace', $vendorSKU);
    $statement->bindValue(':descriptPlace', $description);
    $statement->bindValue(':pricePlace', $price);
    $statement->bindValue(':vendorIdPlace', $vendorID);
//    $statement->bindValue(':categoryIdPlace', $categoryID);

    $statement->execute();
    $productID = $db->lastInsertId();
    $statement->closeCursor();

    return $productID;
}

function updateProduct($productID, $productName, $productSKU, $vendorSKU, $description, $price, $vendorID) {
//updates products in product table and returns productid
    global $db;

    $query = 'UPDATE product
                SET productName=:namePlace, productSKU=:skuPlace,
                vendorSKU=:vendorSKUPlace, description=:descriptPlace,
                price=:pricePlace,vendorID=:vendorIdPlace
                 WHERE productID = :productIdPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':productIdPlace', $productID);
    $statement->bindValue(':namePlace', $productName);
    $statement->bindValue(':skuPlace', $productSKU);
    $statement->bindValue(':vendorSKUPlace', $vendorSKU);
    $statement->bindValue(':descriptPlace', $description);
    $statement->bindValue(':pricePlace', $price);
    $statement->bindValue(':vendorIdPlace', $vendorID);
//    $statement->bindValue(':categoryIdPlace', $categoryID);

    $statement->execute();
    $ID = $db->lastInsertId();
    $statement->closeCursor();

    return $ID;
}

//deletes product by id
function deleteProduct($productID) {
//deletes product by id
    global $db;

    $query = 'DELETE FROM product
              WHERE productID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $productID);
    $statement->execute();
    $statement->closeCursor();
}

function getProductsByCategoryID($categoryID) {
//joins product and linking table to return products by category using categoryid
    global $db;

    $query = "SELECT p.* FROM product p 
join productcategorylink link on p.productID = link.productID
WHERE link.categoryID =:idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $categoryID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function getProductsByCategoryString($description) {
//selects products using wildcards and string for searching
    global $db;
$description = "%$description%";
    $query = "select * from Product
            where (productName LIKE :descriptionPlace) 
            OR (description LIKE :descriptionPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':descriptionPlace', $description);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;

//    INSERT INTO productcategorylink (productID) 
//SELECT productID FROM product 
//where (productName LIKE '%Natural%') 
//OR (description LIKE '%Natural%');
//
//UPDATE `productcategorylink` SET `categoryID`=11 WHERE categoryID=123
}

function totalPages() {
    global $db;

    $query = "select count(*) from product";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_COLUMN);
    $statement->closeCursor();

    return ceil($results / 20);
}

function getAllProductsPaged($page) {
    global $db;

    $limit = 10;
    $offset = ($page - 1) * $limit;
    $query = "SELECT * FROM product LIMIT :offPlace,:limit";

    $statement = $db->prepare($query);
    $statement->bindParam(':limit', intval($limit), PDO::PARAM_INT);
    $statement->bindParam(':offPlace', intval($offset), PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

//*************************** category functions  ******************************
function getAllCategories() {
//get all category names
    global $db;

    $query = "select * from category
            ORDER BY categoryName ASC";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function insertCategory($categoryName) {
//insert new category name in category table and return new categoryID
    global $db;

    $query = "INSERT INTO category(categoryName) 
            VALUES (:categoryNamePlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':categoryNamePlace', $categoryName);

    $statement->execute();
    $categoryID = $db->lastInsertId();
    $statement->closeCursor();

    return $categoryID;
}

function insertLink($productID, $categoryID = 123) {
//insert product into linking table and return product id
    global $db;

    $query = "INSERT INTO productcategorylink(productID,categoryID) 
            VALUES (:idPlace,:categoryIDPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $productID);
    $statement->bindValue(':categoryIDPlace', $categoryID);

    $statement->execute();
    $categoryID = $db->lastInsertId();
    $statement->closeCursor();

    return $categoryID;
}

//************************* vendor functions ***********************************
function getAllVendors() {
//gets all vendors
    global $db;

    $query = "select * from vendor";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

//*************************** order and lineItem functions *********************
function insertOrder($userID) {
//inserts into order table by userid and returns orderID    
    global $db;

    $query = "INSERT INTO orders(userID) VALUES (:IDplace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':IDplace', $userID);

    $statement->execute();
    $orderID = $db->lastInsertId();
    $statement->closeCursor();

    return $orderID;
}

function insertLineItem($productID, $quantity, $orderID) {
//inserts into lineItem table for use with incoice
    global $db;

    $query = "INSERT INTO lineitem(productID, quantity, orderID) 
            VALUES (:productIDplace, :quantityPlace, :orderIDplace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':productIDplace', $productID);
    $statement->bindValue(':quantityPlace', $quantity);
    $statement->bindValue(':orderIDplace', $orderID);

    $statement->execute();
//    $orderID = $db->lastInsertId();
    $statement->closeCursor();

//    return $orderID;
}

function getAllLineItems($orderID) {
//gets all line items associated with an order using orderID
    global $db;

    $query = "select productID, quantity from lineitem where orderID = :IDPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':IDPlace', $orderID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    $items = array();
    foreach ($results as $i) {
        // Get product data from db
        $productID = $i['productID'];
        $product = getSingleProduct($productID);
        $linePrice = round($product['price'] * $i['quantity'], 2);
        // Store data in items array
//        $items[$productID]['id'] = $product['productID'];
        $items[$productID]['name'] = $product['productName'];
        $items[$productID]['description'] = $product['description'];
        $items[$productID]['quantity'] = $i['quantity'];
        $items[$productID]['price'] = $product['price'];
        $items[$productID]['linePrice'] = $linePrice;
    }
    return $items;
}

//***************************** cart functions *********************************
function getCartItems() {
//gets all items out of session for use in cart display
    $items = array();
    foreach ($_SESSION['cart'] as $productID => $quantity) {
        // Get product data from db
        $product = getSingleProduct($productID);
        $price = $product['price'];
        $linePrice = round($price * $quantity, 2);
        // Store data in items array
        $items[$productID]['id'] = $product['productID'];
        $items[$productID]['name'] = $product['productName'];
        $items[$productID]['description'] = $product['description'];
        $items[$productID]['quantity'] = $quantity;
        $items[$productID]['price'] = $price;
        $items[$productID]['linePrice'] = $linePrice;
    }
    return $items;
}

function cartSubtotal() {
//subtotals the cart
    $subtotal = 0;
    $cart = getCartItems();
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    return $subtotal;
}
