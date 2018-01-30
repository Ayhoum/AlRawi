$checkQuery = "SELECT * FROM PAID_EXAM WHERE Users_ID = '{$id}' AND STATUS = 'ACTIVE' ORDER BY PAYMENT_ID DESC LIMIT 1";
$getPayment = mysqli_query($mysqli, $checkQuery);
if (mysqli_num_rows($getPayment) == 1) {
while ($row = mysqli_fetch_assoc($getPayment)) {
$payid = $row['PAYMENT_ID'];
$end_date = $row['END_DATE'];
}
$today_date = date_default_timezone_set('Europe/Amsterdam');
$today_date = date('Y-m-d H:i:s ', time());

if ($end_date < $today_date) {
$update_query = "UPDATE `PAID_EXAM` SET `STATUS` = 'NOT ACTIVE' WHERE `PAYMENT_ID` = '{$payid}'";
$result_update = mysqli_query($mysqli, $update_query);
header("Location: pricing_table.php");
}


}