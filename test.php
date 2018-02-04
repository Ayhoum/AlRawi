<?php
include 'scripts/db_connection.php';
//, strtotime('+' . $txt)

$end_date = date("Y-m-d H:i:s ");
echo $end_date;
echo "<br>";
$end_date = date("Y-m-d H:i:s", strtotime($end_date.'+1 hour'));
echo $end_date;
?>