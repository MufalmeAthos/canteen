<?php
session_start();
if(!isset($_SESSION['valid']) || (trim($_SESSION['valid']) == '') )
{
    header('location:index.php');
    exit();
}
    $session = $_SESSION['valid'];
    $user = mysqli_query($conn,"SELECT * FROM users WHERE username='$session'");
    $row =mysqli_fetch_array($user);

    $manager = mysqli_query($conn,"SELECT * FROM manager WHERE email='$session'");
    $mrow =mysqli_fetch_array($manager);

    $chef = mysqli_query($conn,"SELECT * FROM chef WHERE email='$session'");
    $crow =mysqli_fetch_array($chef);

    $waiter = mysqli_query($conn,"SELECT * FROM waiter WHERE email='$session'");
    $wrow =mysqli_fetch_array($waiter);
?>