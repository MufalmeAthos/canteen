<?php
include 'inc/header.php';
session_start();

$id = $_GET['delete'];

$user = mysqli_query($conn,"SELECT * FROM `products` WHERE `pid` = '$id'");
$row =mysqli_fetch_array($user);

$sql = mysqli_query($conn,"DELETE FROM `products` WHERE `pid` = '$id'");

if ($sql === true) {
    echo "Product Deleted successfully";
    echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo'<META HTTP-EQUIV="Refresh" content="2; URL=dashboard.php">';
}
?>