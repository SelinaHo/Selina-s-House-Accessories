<?php
error_reporting(E_ERROR | E_PARSE);
$error = null;
include('./phpConfig/config.php');
session_start();
if (isset($_SESSION['login_user'])) {
    header("location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($db, $_POST['match-password']);
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);

    $sql = "SELECT * FROM user WHERE username = '$myusername'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $error = "Account already existed";
    } else if ($mypassword == $confirmpassword) {
        $sql = "INSERT INTO `user`(`username`, `password`, `full_name`, `role`) VALUES ('$myusername','$mypassword','$fullname', 'user')";
        $query = mysqli_query($db, $sql, MYSQLI_ASSOC);
        if ($query == true) {
            $_SESSION['login_user'] = $myusername;
            $_SESSION['fullname'] = $fullname;
            header("location: index.php");
        }
    } else {
        $error = 'Error Password! Please try again';
    }
}

?>