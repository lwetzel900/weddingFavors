<?php

session_set_cookie_params(3600, '/');
session_start();
require_once('../model/serviceDA.php');
require_once('../model/venueDA.php');
require_once('../model/userDA.php');
require_once('../model/adminDA.php');
require_once('../model/userSelectionDA.php');
require_once('../model/venueServiceDA.php');
require_once('../model/storeDA.php');
require_once('../model/valid.php');
require_once('../model/User.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'viewAdminLogin';
    }
}

$allServices = getAllServices();
$allVenues = getAllVenues();

switch ($action) {

    case 'viewAdminLogin':
        if (isset($_SESSION['user'])){
            session_unset($_SESSION['user']);
        }
        $errorMessage = "";
        include ('adminLogin.php');
        exit();
        break;

    case 'adminLogin':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email != NULL && emailExists($email)) {
            $storedPassword = getHashedPassword($email);
        } else {
            $errorMessage = "Invalid email";
            $stored_password = "";
            include('adminLogin.php');
            exit();
        }

        if (password_verify($password, $storedPassword)) {
            $_SESSION['user'] = getUserByEmail($email);
            if ($_SESSION['user']['userRole'] != 1) {
                header("Location: ../user");
                exit();
            }
            header("Location: ?action=adminWork");
            exit();
        } else {
            $errorMessage = "Stop Playing";
            include ('adminLogin.php');
            exit();
        }
        break;

    case 'adminWork':
        $galleryImages = getAllImages();
        include ('adminWork.php');
        break;

//admin user view
    case 'userUpdate':
        $allUsers = getAllUsers();
        include('manageUser.php');
        break;

    case 'deleteUser':
        $userID = filter_input(INPUT_POST, 'userID');
        deleteUser($userID);
        header("Location: ?action=userUpdate");
        break;
    case 'editUser':
        $userID = filter_input(INPUT_POST, 'userID');
        $_SESSION['user2'] = getUserByID($userID);
        $errorMessage = "";
        $firstName = $_SESSION['user2']['firstName'];
        $lastName = $_SESSION['user2']['lastName'];
        $userRole = $_SESSION['user2']['userRole'];
        include ('userEdit.php');
    case 'userEdit':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $userRole = filter_input(INPUT_POST, 'userRole');

        switch (TRUE) {
            case(!isValidName($firstName)):
                $errorMessage = 'Invalid First Name';
                include ('userEdit.php');
                break;
            case(!isValidName($lastName)):
                $errorMessage = 'Invalid Last Name';
                include ('userEdit.php');
                break;
            default :
                $errorMessage = "";
        }
        if (empty($errorMessage)) {
            $userID = $_SESSION['user2']['userID'];
            updateUser($userID, $userRole);
            header("Location: ?action=userUpdate");
        }
        break;

//venue views
    case 'venueUpdate':
        include('venueUpdate.php');
        break;

    case 'deleteVenue':
        $venueID = filter_input(INPUT_POST, 'venueID');
        $imageLocation = filter_input(INPUT_POST, 'imageLocation');
        deleteVenue($venueID);
        unlink("../" . $imageLocation); //not sure if this is right
        header("Location: ?action=venueUpdate");
        break;

    case 'venueAdd':
        $venueName = filter_input(INPUT_POST, 'name');
        $venueCity = filter_input(INPUT_POST, 'city');
        $venueState = filter_input(INPUT_POST, 'state');

        $place = 'venue';
        $vPicture = uploadPicture($place);

        if (empty($vPicture)) {
            $vPicture = "images/venue/venueDefault.jpg";
        }

        insertVenue($venueName, $venueCity, $venueState, $vPicture);
        header("Location: ?action=venueUpdate");
        break;

//service views
    case 'servicesUpdate':
        unset($_SESSION['service']);
        include('serviceUpdate.php');
        break;

    case 'deleteService':
        $serviceID = filter_input(INPUT_POST, 'serviceID');
        $imageLocation = filter_input(INPUT_POST, 'imageLocation');
        deleteService($serviceID);
        unlink("../" . $imageLocation); //not sure if this is right
        header("Location: ?action=servicesUpdate");
        break;

    case 'editServiceView':
        $serviceID = filter_input(INPUT_POST, 'serviceID');
        $name = VenueName($serviceID);
        $_SESSION['service'] = getServiceByID($serviceID);
        $type = $_SESSION['service']['serviceType'];
        $pic = $_SESSION['service']['servicePicture'];
        $description = $_SESSION['service']['serviceDescription'];
        include('editService.php');
        break;

    case 'updateService':
        $serviceID = filter_input(INPUT_POST, 'ID');
        $serviceType = filter_input(INPUT_POST, 'type');
        $serviceDescription = filter_input(INPUT_POST, 'description');

        $place = 'service';
        $servicePicture = uploadPicture($place);

        if (empty($servicePicture)) {
            $servicePicture = $_SESSION['service']['servicePicture'];
        }

        updateService($serviceID, $serviceType, $serviceDescription, $servicePicture);

        $venueID = filter_input(INPUT_POST, 'venueSelect', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        foreach ($venueID as $id => $i) {
            if (checkVenueService($i, $serviceID)) {
                deleteServiceFromVenue($i, $serviceID);
            }
            insertVenueService($i, $serviceID);
        }
        header("Location: ?action=servicesUpdate");
        break;

    case 'serviceAdd':
        $serviceID = filter_input(INPUT_POST, 'ID');
        $serviceType = filter_input(INPUT_POST, 'type');
        $serviceDescript = filter_input(INPUT_POST, 'description');
//$servicePicture = filter_input(INPUT_POST, 'pic');
        $venueID = filter_input(INPUT_POST, 'venueSelect', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

        $place = 'service';
        $servicePicture = uploadPicture($place);

        if (empty($servicePicture)) {
            $servicePicture = "images/service/serviceDefault.jpg";
        }

        $serviceIDReturned = insertServices($serviceType, $serviceDescript, $servicePicture);
        foreach ($venueID as $id => $i) {
            insertVenueService($i, $serviceIDReturned);
        }
        header("Location: ?action=servicesUpdate");
        break;

//Store views and actions
    case 'storeUpdate':
//            $allPoducts = getAllProducts();
        header("Location: ../store");
        break;

    case 'category':
        $name = filter_input(INPUT_POST, 'categoryName');
        $name = trim($name);
        $name = ucwords(strtolower($name));
        $catID = insertCategory($name);
        $_SESSION['message'] = "{$name} has been added.";
        header("Location: ../store");
        break;

    case 'productAdd':
        $categoryNames = getAllCategories();
        $vendorNames = getAllVendors();
        include ('addProduct.php');
        break;

    case'addProduct':
        $productName = filter_input(INPUT_POST, 'productName');
        $productSKU = filter_input(INPUT_POST, 'SKU');
        $vendorSKU = filter_input(INPUT_POST, 'vendorSKU');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price');
        $vendorID = filter_input(INPUT_POST, 'vendorSelect');
        $categoryID = filter_input(INPUT_POST, 'categorySelect', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $categories = filter_input(INPUT_POST, 'categories');
        $productID = addProduct($productName, $productSKU, $vendorSKU, $description, $price, $vendorID, $categoryID);
        if (!empty($categoryID)) {
            foreach ($categoryID as $id => $i) {
                insertLink($productID, $i);
            }
        }
        if (!empty($categories)) {
            $categoriesNames = explode(',', $categories);
            foreach ($categoriesNames as $name) {
                $name = trim($name);
                $name = ucwords(strtolower($name));
                $catID = insertCategory($name);
                insertLink($productID, $catID);
            }
        }
        $_SESSION['message'] = "Product Added";
        header("Location: ../store");

        exit();
        break;

    case 'edit':
        $categoryNames = getAllCategories();
        $vendorNames = getAllVendors();
        $product = getSingleProduct(filter_input(INPUT_POST, 'editID'));
        $productID = $product['productID'];
        $productName = $product['productName'];
        $SKU = $product['productSKU'];
        $vendorSKU = $product['vendorSKU'];
        $description = $product['description'];
        $price = $product['price'];
        $vendorID = $product['vendorID'];
//            $categoryID = $product['categoryID'];
        include('productEdit.php');
        break;

    case 'edited':
        $productID = filter_input(INPUT_POST, 'productID');
        $productName = filter_input(INPUT_POST, 'productName');
        $productSKU = filter_input(INPUT_POST, 'SKU');
        $vendorSKU = filter_input(INPUT_POST, 'vendorSKU');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price');
        $vendorID = filter_input(INPUT_POST, 'vendorSelect');
        $categoryID = filter_input(INPUT_POST, 'categorySelect', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $categories = filter_input(INPUT_POST, 'categories');
        updateProduct($productID, $productName, $productSKU, $vendorSKU, $description, $price, $vendorID);

        if (!empty($categoryID)) {
            foreach ($categoryID as $id => $i) {
                insertLink($productID, $i);
            }
        }
        if (!empty($categories)) {
            $categoriesNames = explode(',', $categories);
            foreach ($categoriesNames as $name) {
                $name = trim($name);
                $name = ucwords(strtolower($name));
                $catID = insertCategory($name);
                insertLink($productID, $catID);
            }
        }
        $_SESSION['message'] = "{$productName} has been updated.";
        header("Location: ../store");
        exit();
        break;

    case'deleteProduct':
        deleteProduct(filter_input(INPUT_POST, 'deleteID'));
        header("Location: ../store");
        break;

//image views and actions
    case 'uploadImage':
        $place = 'gallery';
        $picPlace = uploadPicture($place);
        insertImage($picPlace);
        header("Location: ?action=adminWork");
        break;

    case 'deleteImage';
        $imageID = filter_input(INPUT_POST, 'imageID');
        $imageLocation = filter_input(INPUT_POST, 'imageLocation');
        deleteFromImages($imageID);
        unlink("../" . $imageLocation); //not sure if this is right
        header("Location: ?action=adminWork");
        break;

    case'logout':
        session_unset();
        header("Location: ..");
        exit();
        break;
}

function uploadPicture($place) {
//taken from moodle
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
//$file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
//$file_type = $_FILES['image']['type'];
//$temp = $_FILES['image']['name'];
        $temp = explode('.', $file_name);
        $temp = end($temp);
        $file_ext = strtolower($temp);

        $extensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "file extension not in whitelist: " . join(',', $extensions);
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../images/$place/" . $file_name); //not sure if this is right
            $imageURL = "images/$place/" . $file_name;
//echo "Success";
        } else {
//var_dump($errors);
        }
    }
    return $imageURL;
}
