<?php
include '../scripts/db_connection.php';
?>

<?php
// insert questions into DB.
$counter = 1;
while ($counter >= 1 && $counter <= 25) {
    if (isset($_POST['submit'])) {
//this one should be uploaded as an image directory

//        $user_image = $_FILES['image-'.$counter]['name'];
//        $user_image_temp = $_FILES['image-'.$counter]['tmp_name'];
//        move_uploaded_file($user_image_temp, "../exam_images/exams/$user_image");

        $question = $_POST['question-'. $counter];
        $right_answer = $_POST['action-' . $counter];
        //if statement to determine which option is right!
        if ($right_answer = "break") {
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
        $picture = "https://www.thesun.co.uk/wp-content/uploads/2017/03/nintchdbpict000292275276.jpg?strip=all&w=960";
        $type = "response";
        $last_id = 2;

        $query = "INSERT INTO EXAM_QUESTION(QUESTION, RIGHT_ANWSER, ANSWER_2, ANSWER_3, ANSWER_4, PICTURE, TYPE, QUESTION_SET_ID)";
        $query .= "VALUES(  '{$question}',
                        '{$right_answer}',
                        '{$answer_2}',
                        '{$answer_3}',
                        '{$answer_4}',
                        '{$picture}',
                        '{$type}',
                        '{$last_id}') ";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Failed to create a new exam". mysqli_error($mysqli));
        } else {
            echo "Exam created";
        }
        $counter++;
    }
}
?>
