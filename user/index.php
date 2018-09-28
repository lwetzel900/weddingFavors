<?php

session_set_cookie_params(3600, '/');
session_start();
require_once('../model/serviceDA.php');
require_once('../model/venueDA.php');
require_once('../model/userDA.php');
require_once('../model/userSelectionDA.php');
require_once('../model/venueServiceDA.php');
require_once('../model/valid.php');
require_once('../model/User.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'viewUserLogin';
    }
}

$allServices = getAllServices();
$allVenues = getAllVenues();

switch ($action) {

    case 'register':
        $errorMessage = "";
        $firstName = "";
        $lastName = "";
        $email = "";
        $address = "";
        $city = "";
        $zip = "";
        $phone = "";
        $password = "";
        include('registration.php');
        break;
    case 'addUser':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
//        $emailString = filter_input(INPUT_POST, 'email');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');

        switch (TRUE) {
            case (!emailExists($email)):
                $errorMessage = 'Email is Already Registered';
                include ('registration.php');
                break;
            case(!isValidName($firstName)):
                $errorMessage = 'Invalid First Name';
                include ('registration.php');
                break;
            case(!isValidName($lastName)):
                $errorMessage = 'Invalid Last Name';
                include ('registration.php');
                break;
            case (!isValidEmail($email)):
                $errorMessage = 'Invalid Email';
                include ('registration.php');
                break;
            case(!isValidAddress($address)):
                $errorMessage = 'Invalid Address';
                include ('registration.php');
                break;
            case(!isValidName($city)):
                $errorMessage = 'Invalid City';
                include ('registration.php');
                break;
            case(!isValidZip($zip)):
                $errorMessage = 'Invalid Zip';
                include ('registration.php');
                break;
            case(!isValidPhone($phone)):
                $errorMessage = 'Invalid Phone';
                include ('registration.php');
                break;
            case(!isValidPassword($password)):
                $errorMessage = 'Invalid Password';
                include ('registration.php');
                break;
            default :
                $errorMessage = "";
        }
        if (empty($errorMessage)) {
            $user = new User($firstName, $lastName, $email, $address, $city, $zip, $phone, hashPassword($password));
            $user->add();
            $_SESSION['user'] = getUserByEmail($email);
            header("Location: ?action=userProfile");
        }
        break;

//user views
    case 'viewUserLogin':
        if (isset($_SESSION['user'])){
            session_unset($_SESSION['user']);
        }
        $errorMessage = "";
        include('userLogin.php');
        exit();
        break;
    case 'userLogin':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email != NULL && emailExists($email)) {
            $storedPassword = getHashedPassword($email);
        } else {
            $errorMessage = "Invalid email";
            $stored_password = "";
            include('userLogin.php');
            exit();
        }

        if (password_verify($password, $storedPassword)) {
            $_SESSION['user'] = getUserByEmail($email);
            if ($_SESSION['user']['userRole'] == 1) {
                header("Location: ../admin");
                exit();
            }
            header("Location: ?action=userProfile");
            exit();
        } else {
            $errorMessage = "Invalid password ";
            include('userLogin.php');
            exit();
        }
        break;

    case 'userProfile':
        If (empty($_SESSION['user'])) {
            header("Location: .");
            exit();
        } else {
            $firstName = $_SESSION['user']['firstName'];
            $lastName = $_SESSION['user']['lastName'];
            $userID = $_SESSION['user']['userID'];

            if (idExistInUserSelection($userID)) {
                $allTogether = getUserVenueServiceByUserID($userID);
            }
        }
        include('userProfile.php');
        exit();
        break;

    case 'selectVenue':
        $firstName = $_SESSION['user']['firstName'];
        $lastName = $_SESSION['user']['lastName'];
        $userID = $_SESSION['user']['userID'];

        $venueID = filter_input(INPUT_POST, 'venue');
        $venueName = getVenueNameByID($venueID);
        $_SESSION['venue'] = $venueID;
        $venueServices = getServiceNamesFromVS($venueID);
        include ('showServiceOptions.php');
        //header("Location: ?action=selectServices");
        break;

    case'selectServices':
        $firstName = $_SESSION['user']['firstName'];
        $lastName = $_SESSION['user']['lastName'];
        $userID = $_SESSION['user']['userID'];
        deleteIDUserSelection($userID, $_SESSION['venue']);

        $service = filter_input(INPUT_POST, 'services', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $servicesSelected = convertServices($service);

        if (!empty($servicesSelected)) {
            foreach ($service as $serv) {
                insertIntoSelection($_SESSION['user']['userID'], $_SESSION['venue'], $serv);
            }
        }
        header("Location: ?action=userProfile");
        break;

    case'showOptions';
        include ('showVenueOptions.php');
        break;

    case 'visitorShow':
        include ('visitorShow.php');
        break;

    case'logout':
//        if (!empty($_SESSION['user'])) {
//            header("Location: ?action=userProfile");
//            exit();
//            break;
//        } else {
            session_unset();
            header("Location: ..");
            exit();
//        }
        break;
}; //end of switch

function convertServices($services) {
    $serviceName = array();

    foreach ($services as $serv) {
        $serviceName[] = getServiceTypeByID($serv);
    }
    return $serviceName;
}
