<?php
error_reporting(E_ERROR | E_PARSE);
include('./phpConfig/config.php');
session_start();
if (isset($_SESSION['login_user'])) {
    if (strcmp($_SESSION['role'], 'admin') == 0) {
        header('location: admin.php');
    }
    else {
        header("location: index.php");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);
    $error = "";

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['fullname'] = $row['full_name'];
        $_SESSION['role'] = $row['role'];
        if(strcmp($row['role'], 'admin') == 0) {
            header('location: admin.php');
        }
        else {
            header("location: index.php");
        }
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>