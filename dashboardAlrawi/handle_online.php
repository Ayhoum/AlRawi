<?php
/**
 * Created by PhpStorm.
 * User: Ayhoum
 * Date: 4/2/2018
 * Time: 5:57 م
 */
include '../scripts/db_connection.php';

$onlineQuery = "SELECT * FROM Users WHERE ACTIVE_STATUS = 1";
$online_num_rows = mysqli_query($mysqli, $onlineQuery);
$onlineRows = mysqli_num_rows($online_num_rows);

echo $onlineRows;