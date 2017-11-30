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
    if (isset($_GET['exam_id'])) {
        $exam_set_id = $_GET['exam_id'];
        echo $exam_set_id;

        $query1 = "SELECT * FROM Users WHERE  Name ='{$name}' ";
        $result1 = mysqli_query($mysqli, $query1);
        if (mysqli_num_rows($result1) > 0) {
            echo 'Done';
            while ($row = mysqli_fetch_assoc($result1)) {
                $user_id = $row['ID'];
                echo $user_id;

                $query2  = "INSERT INTO `PAID_EXAM`(`Users_ID`, `QUESTION_SET_ID`)";
                $query2 .= " VALUES('{$user_id}', 
                                    '{$exam_set_id}')";
                $result2 = mysqli_query($mysqli, $query2);
                if (!$result2 ){
                    echo "ERROR";
                } else {
                    echo " PAID SUCCESSFULLY ";
                }
            }
        } else {
            echo mysqli_errno($result1);
        }
    }
} else {
    header('Location:login.php');
}

?>
