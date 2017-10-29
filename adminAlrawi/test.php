<?php
include '../scripts/db_connection.php';
?>

<?php
// insert questions into DB.
$counter = 1;
while ($counter >= 1 && $counter <= 25){

    $question = $_POST['question-'+ $counter];
    $right_answer =$_POST['action-'+$counter];
    //if statement to determine which option is right!
    if ($right_answer = "break"){
        $answer_2 = "release";
        $answer_3 = "nothing";
    } elseif ($right_answer = "release") {
        $answer_2 = "break";
        $answer_3 = "nothing";
    } else {
            $right_answer = "nothing";
            $answer_2 = "break";
            $answer_3 = "release";
    }
    $answer_4 = 0;
    $picture = $_POST['image-' + $counter];
    $type = "response";
    $last_id = mysqli_insert_id($mysqli);

    $query  = "INSERT INTO `EXAM_QUESTION`( QUESTION, RIGHT_ANWSER, ANSWER_2, ANSWER_3, ANSWER_4, PICTURE, TYPE, QUESTION_SET_ID)";
    $query .= "VALUES(  '{$question}',
                        '{$right_answer}',
                        '{$answer_2}',
                        '{$answer_3}',
                        '{$answer_4}',
                        '{$picture}',
                        '{$type}',
                        '{$last_id}') ";
    $result = mysqli_query($mysqli, $query);
        if(!$result){
            die("Failed to create a new exam");
        } else{
            echo "Exam created";
        }
    $counter++;
};

?>
