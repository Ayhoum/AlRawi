<?php
session_start();
ob_start();
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 30-11-2017
 * Time: 18:43
 */
include 'scripts/db_connection.php';

?>
<?php
if (isset($_SESSION['username'])){
    $name = $_SESSION['username'];

    $query = "SELECT * FROM Users WHERE NAME = '{$name}'";

    $result = mysqli_query($mysqli,$query);
    if (mysqli_num_rows($result) > 0 ){
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];


            date_default_timezone_set('Europe/Amsterdam');
            $start_date = date('Y-m-d H:i:s ', time());
            echo $start_date;

            $end_date = date("Y-m-d H:i:s ", strtotime('+2 weeks'));
            echo  $end_date;

            $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE )";
            $query1 .= "VALUES ('{$id}',
                             '{$start_date}',
                             '{$end_date}')";

            $result1 = mysqli_query($mysqli,$query1);
            if (mysqli_num_rows($result) > 0 ){
                echo 'DONE';
            } else
                echo "FUCK";


        }


    }


} else {
    header('Location:login.php');
}

?>