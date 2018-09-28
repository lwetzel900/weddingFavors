<?php

session_set_cookie_params(3600, '/');
session_start();
require_once('../model/storeDA.php');
require_once ('../model/valid.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'storeHome';
    }
}
$pages = totalPages();
$categoryNames = getAllCategories();
$allPoducts = getAllProducts();
$title = "All Products";

switch ($action) {

    case 'storeHome':
//        $page = 1;
//        $allPoducts = getAllProductsPaged(2);
        include ('storeHome.php');
        unset($_SESSION['message']);
        break;
    case 'category':
        if (filter_input(INPUT_POST, 'search')) {
            $description = filter_input(INPUT_POST, 'search');
            if (!isValidSearch($description)) {
                $message = "We don't have anything by that name. Please enter another term";
                include ('storeHome.php');
                break;
            }
            $allPoducts = getProductsByCategoryString($description);
            $title = $description;
        } else {
            $ID = filter_input(INPUT_POST, 'categorySelect');
            $allPoducts = getProductsByCategoryID($ID);
            $title = getCategoryNameByID($ID);
        }

        if (empty($allPoducts)) {
            $message = "We don't have anything by that name. Please enter another term";
        }

        include ('storeHome.php');
        break;
    case 'addProduct':
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $productID = filter_input(INPUT_POST, 'productID');
        $quantity = filter_input(INPUT_POST, 'quantity');
        $_SESSION['cart'][$productID] = round($quantity, 0);
        $message = "Item has been added to cart";
        include ('storeHome.php');
        break;
    case 'cart':
        $cart = getCartItems();
        include('cartView.php');
        break;
    case 'checkout':
        if (empty($_SESSION['user'])) {
            $message = "Must be logged in to checkout";
            include('cartView.php');
            break;
        } else if (empty($_SESSION['cart'])) {
            $message = "There's nothing in your cart";
            include('storeHome.php');
            break;
        }
        if (!isset($idOrder)) {
            $idOrder = insertOrder($_SESSION['user']['userID']);
            $ship = 0;
            foreach (getCartItems() as $items) {
                insertLineItem($items['id'], $items['quantity'], $idOrder);
                $ship += $items['quantity'];
            }
            $invoice = getAllLineItems($idOrder);
            $subtotal = cartSubtotal();
            $salesTax = 0;$shipping = 0;
            if (($_SESSION['user']['zip'] >= 5001 && $_SESSION['user']['zip'] <= 52809) || ($_SESSION['user']['zip'] >= 68119 && $_SESSION['user']['zip'] <= 68120)) {
                //information for this taken from http://www.structnet.com/instructions/zip_min_max_by_state.html
                $salesTax = $subtotal * 0.06;
            } else {
                $shipping = $ship * 5;
            }
            $total = $subtotal + $salesTax + $shipping;
        }

        include('invoice.php');
        unset($_SESSION['cart']);
        break;
}