<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 7-11-2017
 * Time: 17:43
 */
session_start();
ob_start();
include '../scripts/db_connection.php';
//if (isset($_GET['id']) && isset($_GET['qset'])) {

//}
$changed = 0;
//require_once 'test.php';
//$date = date('Y-m-d');
if ($_SESSION['role'] != "MainAdmin") {
    header("Location: ../index.php");
}
?>
<?php
if (isset($_POST['submit'])){
    $setId = 3;
    $qSet = 1;
    $question = $_POST['question'];
    $right_ans= $_POST['right'];
    $ans_2 = $_POST['ans_2'];
    $ans_3 = $_POST['ans_3'];
    $ans_4 = $_POST['ans_4'];
    $picture = $_POST['picture'];
    $type = $_POST['type'];
    echo $setId. $question. $right_ans. $ans_2. $ans_3. $ans_4. $picture. $type;
     $query = "INSERT INTO `EXAM_QUESTION`(`NUMBER`, `QUESTION`, `RIGHT_ANWSER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `PICTURE`, `TYPE`, `QUESTION_SET_ID`)"
    .$query = "                    VALUES ( '{$setId}',
                                            '{$question}',
                                            '{$right_ans}',
                                            '{$ans_2}',
                                            '{$ans_3}',
                                            '{$ans_4}',
                                            '{$picture}',
                                            '{$type}',
                                            '{$qSet}')";
    $result = mysqli_query($mysqli,$query);
    if(!$result) {
    die("Failed to create a new exam". mysqli_error($mysqli));
    } else {
    echo "done!";
    }
}
?>
<form method="post" action="add_new_question.php">
    Question:       <input type="text" name="question" value=""> <br>
    Right Answer:   <input type="text" name="right" value=""> <br>
    Second Answer:  <input type="text" name="ans_2" value=""> <br>
    Third Answer:   <input type="text" name="ans_3" value=""> <br>
    Fourth Answer:  <input type="text" name="ans_4" value=""> <br>
    Picture:        <input type="text" name="picture" value=""> <br>
    Type:           <input type="text" name="type" value=""> <br>
                    <input type="submit" name="submit" value="add">
</form>