<?php
/**
 * Created by PhpStorm.
 * User: aylos
 * Date: 13/12/2017
 * Time: 6:58 م
 */
include 'scripts/db_connection.php';

$email = $_GET['email'];


$query = "SELECT * From Users WHERE EMAIL = '{$email}' ";
$getAgent = mysqli_query($mysqli, $query);
if (mysqli_num_rows($getAgent) == 1) {
    while ($row = mysqli_fetch_assoc($getAgent)) {
        $id = $row['ID'];
    }
}

if(isset($_POST['new_submit'])){
    $pass = $_POST['password_new'];
    $pass2 = $_POST['password_new2'];

    if($pass == $pass2){
        $encCode = ['cost' => 11];
        $encPassword = password_hash($pass2, PASSWORD_BCRYPT, $encCode);
        $queryUpdate = "UPDATE Users SET PASSWORD = '{$encPassword}' WHERE EMAIL = '{$email}'";
        $run = mysqli_query($mysqli,$queryUpdate);

        $deleteQuery = "DELETE FROM PASSWORD_RESET WHERE USER_ID = '{$id}'";
        $runDelete=mysqli_query($mysqli,$deleteQuery);

        header("Location: login.php");
    }else{
        header("Location: forgot_password.php");
    }
}