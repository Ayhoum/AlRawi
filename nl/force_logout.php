<?php
session_start();
ob_start();
include 'scripts/db_connection.php';

if (isset($_SESSION['username'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM Users WHERE EMAIL = '{$email}' ";
    $result = mysqli_query($mysqli_nl, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['ID'];
        }
    }
}
echo $user_id;
$queryUpdate = "UPDATE Users SET ACTIVE_STATUS = '0' WHERE ID = '{$user_id}'";
$updateStatue = mysqli_query($mysqli_nl,$queryUpdate);

session_destroy();
header("Location: login.php?reason=anotherUser");
?>