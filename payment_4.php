<?php
session_start();
ob_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}else{
    include 'include_pay4.php';
}

