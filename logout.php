<?php
session_start();
ob_start();
?>

<?php

$_SESSION['username'] = null;
$_SESSION['role']  = null;
$_SESSION['email'] =null;
header("Location: index.php");
?>