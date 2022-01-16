<?php
include('./phpConfig/config.php');
include('./phpConfig/session.php');
error_reporting(E_PARSE);

$sql = "SELECT * FROM product WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
$result = mysqli_query($db, $sql);
$username = $_SESSION['login_user'];
while ($row = $result->fetch_assoc()) {
    $product_id = $row['id'];
    $false = false;
    $query = "INSERT INTO `order`(`username`, `product_id`, `quantity`, `is_confirm`) VALUES ('$username', '$product_id', 1, '$false')";
    $run_query = mysqli_query($db, $query);
}
$_SESSION['cart'] = array();
header('location: ./shop.php');
?>