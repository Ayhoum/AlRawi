<?php
session_start();
ob_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}elseif(isset($_GET['user_id'])){
    $userID = $_GET['user_id'];
    include 'test_make_payment.php';
}else{
    header("Location: profile.php");
}
