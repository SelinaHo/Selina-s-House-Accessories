<?php
    error_reporting(E_ERROR | E_PARSE);
   include('config.php');
   session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
   
   $user_check = $_SESSION && $_SESSION['login_user'] ;
   
   $ses_sql = mysqli_query($db,"select username from user where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $_SESSION && $_SESSION['login_user'];
   $fullname = $_SESSION ? $_SESSION['fullname'] : null;
   $cart = $_SESSION ? $_SESSION['cart'] : array();
?>