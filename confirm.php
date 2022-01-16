<?php
include('./phpConfig/config.php');

$id = mysqli_escape_string($db, $_GET['product_id']);
$username = mysqli_escape_string($db, $_GET['username']);

$sql = "UPDATE `order` SET `is_confirm` = '1' WHERE `product_id` = '$id' and `username` = '$username'";
$result = mysqli_query($db, $sql);
if($result == true) {
    header('location: admin.php');
}
else {
    echo $result;
}
 ?>