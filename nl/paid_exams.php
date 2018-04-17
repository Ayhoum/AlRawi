<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 23-11-2017
 * Time: 18:08
 */
include 'scripts/db_connection.php';

?>
    <?php
$query = "SELECT *  FROM PAID_EXAM WHERE Users_ID = 1 ";
$result = mysqli_query($mysqli_nl, $query);
if (mysqli_num_rows($result) > 0 ){
    echo "Done ";
    while ($row = mysqli_fetch_assoc($result)){
        $qset_id = $row['QUESTION_SET_ID'];


        $query_1 = "SELECT * FROM EXAM_QUESTION WHERE QUESTION_SET_ID = '{$qset_id}'";
        $result_1 = mysqli_query($mysqli_nl, $query_1);
        if (mysqli_num_rows($result_1)> 0){
            while ($row1 = mysqli_fetch_assoc($result_1)){

                $number     =    $row1['NUMBER'];
                $question   =    $row1['QUESTION'];
                $right_ans  =    $row1['RIGHT_ANSWER'];
                $ans_2      =    $row1['ANSWER_2'];
                $ans_3      =    $row1['ANSWER_3'];
                $ans_4      =    $row1['ANSWER_4'];
                $pic        =    $row1['PICTURE'];
                $type       =    $row1['TYPE'];

                ?>

  
            <?php
            }
            echo 'Done2';
        } else
            echo 'Error2';
    }
} else{
    echo "error";
}
?>
