<?php
session_start();
ob_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 30-11-2017
 * Time: 18:43
 */
include 'scripts/db_connection.php';
function database_read ($order_id){
    $order_id = intval($order_id);
    $database = "orders/order-{$order_id}.txt";

    $status  = @file_get_contents($database);

    return $status ? $status : "unknown order";
}
$status = database_read($_GET["order_id"]);

if($status == "paid"){

?>
<?php
if (isset($_SESSION['email'])){
    $name = $_SESSION['email'];
    $spentQuery = "SELECT * From Users WHERE EMAIL = '{$name}' ";
    $updateAgent = mysqli_query($mysqli, $spentQuery);
    if (mysqli_num_rows($updateAgent) == 1) {
        while ($row = mysqli_fetch_assoc($updateAgent)) {
            $id = $row['ID'];
            $spent = $row['SPENT'];
        }
    }
    $spent += 15.29;
    $updateQuery = "UPDATE Users SET SPENT = '{$spent}' WHERE ID = '{$id}'";
    $run = mysqli_query($mysqli,$updateQuery);


    $query = "SELECT * FROM Users WHERE EMAIL = '{$name}'";

    $result = mysqli_query($mysqli,$query);
    if (mysqli_num_rows($result) > 0 ){
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
        }

            date_default_timezone_set('Europe/Amsterdam');
            $start_date = date('Y-m-d H:i:s ', time());

            $end_date = date("Y-m-d H:i:s ", strtotime('+35 days'));

            $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE )";
            $query1 .= "VALUES ('{$id}',
                             '{$start_date}',
                             '{$end_date}')";

            $result1 = mysqli_query($mysqli,$query1);


        header("Location: profile.php");
    }


}
else {
    header("Location:login.php");
}

}else{
    header("Location: payment_failure.php");
}


?>
