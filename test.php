<?php
include 'scripts/db_connection.php';

date_default_timezone_set('Europe/Amsterdam');
$query = "SELECT * FROM PRICES WHERE Period = 'TPAKKET'";
$select_price1 = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_price1)) {
    $eur = $row['AmountEur'];
    $cen = $row['AmountCen'];
    $txt = $row['TimeTxt'];
}$end_date = date("Y-m-d H:i:s ", strtotime('+' . $txt));
echo $end_date;
?>