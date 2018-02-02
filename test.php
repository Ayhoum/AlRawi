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




function setCookie(c_name, value, expirehours) {

var exdate = new Date();
exdate.setHours(exdate.getHours() + expirehours);
document.cookie = c_name + "=" + value + ";path=/" + ((expirehours ==null) ? "" : ";expires=" + exdate.toGMTString());
}
setCookie('question', $('.QuestionsSlideShow').slick('slickCurrentSlide'), 1);
