<?php
/**
 * Created by PhpStorm.
 * User: aylos
 * Date: 13/12/2017
 * Time: 6:58 م
 */
include 'scripts/db_connection.php';

$email = $_GET['email'];

if(isset($_POST['new_submit'])){
    $pass = $_POST['password_new'];
    $pass2 = $_POST['password_new2'];

    if($pass == $pass2){
        $queryUpdate = "UPDATE Users SET PASSWORD = '{$pass2}' WHERE EMAIL = '{$email}'";
        $run = mysqli_query($mysqli,$queryUpdate);
        header("Location: login.php");

    }else{
        echo "<script>alert('كلمتي السر غير متطابقتين');</script>";
        header("Location: forgot_password.php");
    }
}