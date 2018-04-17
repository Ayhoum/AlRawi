<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 11-12-2017
 * Time: 16:41
 */

session_start();
ob_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
include 'scripts/db_connection.php';

?>

<?php
    $name = $_SESSION['username'];
    $status = "SUCCEEDED";

    $query = "UPDATE `Users` SET `SITUATION` = '{$status}' WHERE `NAME` = '{$name}'";

    $result = mysqli_query($mysqli, $query);


        header("Location: profile.php");






?>
