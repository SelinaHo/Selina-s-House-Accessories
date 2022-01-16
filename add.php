<?php
include('./phpConfig/session.php');
if(!isset($_SESSION['login_user'])) {
    header('location: ./login.php');
    return;
}
if (!in_array($_GET['id'], $_SESSION['cart'])) {
    array_push($_SESSION['cart'], $_GET['id']);
    $_SESSION['message'] = 'Product added to cart';
} else {
    $_SESSION['message'] = 'Product already in cart';
}
header('location: ./shop.php');
