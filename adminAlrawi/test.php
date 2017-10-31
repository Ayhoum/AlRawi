<?php
include '../scripts/db_connection.php';
?>

<?php
if(isset($_GET['id'])){
    $setId = $_GET['id'];
}

// insert questions into DB.
$counter = 1;
if (isset($_POST['submit'])) {

while ($counter >= 1 && $counter <= 25) {

//this one should be uploaded as an image directory

    if (!isset($_FILES['image-1'])){
        $user_image = " ";
        echo "Hi";
    }else{
        echo  "'image-'.$counter";
        $user_image = $_FILES['image-1']['name'];
        $user_image_temp = $_FILES['image-1']['tmp_name'];
        while (file_exists('exam_images/exams/'.$user_image)) {
            $user_image = date('Ymd'). date('his') . ".jpg";
        }
        move_uploaded_file($user_image_temp, "exam_images/exams/$user_image");
    }





        $question = $_POST['question-'. $counter];
        $right_answer = $_POST['action-' . $counter];
        echo $right_answer . "\n";
        //if statement to determine which option is right!
        if ($right_answer == "Break") {
            $answer_2 = "Release";
            $answer_3 = "Nothing";
        } elseif ($right_answer == "Release") {
            $answer_2 = "Break";
            $answer_3 = "Nothing";
        } else {
            $right_answer = "Nothing";
            $answer_2 = "Break";
            $answer_3 = "Release";
        }
        $answer_4 = "";
        $type = "response";

        $query = "INSERT INTO EXAM_QUESTION(QUESTION, RIGHT_ANWSER, ANSWER_2, ANSWER_3, ANSWER_4, PICTURE, TYPE, QUESTION_SET_ID)";
        $query .= "VALUES(  '{$question}',
                        '{$right_answer}',
                        '{$answer_2}',
                        '{$answer_3}',
                        '{$answer_4}',
                        '{$user_image}',
                        '{$type}',
                        '{$setId}') ";
        $result = mysqli_query($mysqli, $query);
        $counter++;
    }
}
if (!$result) {
    die("Failed to create a new exam". mysqli_error($mysqli));
} else {
    echo "Exam created";
}
?>
