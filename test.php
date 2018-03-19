<?php
include 'scripts/db_connection.php';
//, strtotime('+' . $txt)

$end_date = date("Y-m-d H:i:s ");
$a_date = '2018-03-18 14:18:43';
echo $end_date;
echo "<br>";
$a_date = date("Y-m-d H:i:s", strtotime($a_date.'+1 hour'));
echo $a_date;
echo "<br>";
echo "<br>";
if($a_date < $end_date){
    echo "1";
}else{
    echo "0";
}

?>