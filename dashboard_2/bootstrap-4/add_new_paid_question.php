<?php
include '../../scripts/db_connection.php';

if (isset($_GET['id']) && ($_GET['qset'])) {
    $qset = $_GET['qset'];
    $setId = $_GET['id'];
}
    if (isset($_POST['submit'])) {
        $question = $_POST['question'];
        $right_ans = $_POST['right_answer'];
        $answer_2 = $_POST['2nd_answer'];
        $answer_3 = $_POST['3rd_answer'];
        $answer_4 = $_POST['4th_answer'];
        $pic = $_POST['picture'];
        $type = $_POST['type'];

        $query = "INSERT INTO `EXAM_QUESTION`(`NUMBER`, `QUESTION`, `RIGHT_ANSWER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `PICTURE`, `TYPE`, `QUESTION_SET_ID`)";
        $query .= "VALUES ( '{$setId}',
                            '{$question}',
                            '{$right_ans}',
                            '{$answer_2}',
                            '{$answer_3}',
                            '{$answer_4}',
                            '{$pic}',
                            '{$type}',
                            '{$qset}')";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            echo "ERROR!!" . mysqli_error($mysqli);
        } else {
            header("Location: manage_paid_exams.php?id=$qset");
        }
    }
//}

?>
<div class="col-md-12">
    <div class="panel panel-card margin-b-30">
        <div class="panel-body  p-xl-3">

        <form  method="post" action="add_new_paid_question.php?qset=<?php echo $qset;?>&id=<?php echo $setId;?>" data-toggle="validator">
            <div class="form-group row"><label>Question:</label>
                <input type="text" name="question" placeholder="Enter the question" class="form-control" required>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="form-group row"><label>Right Answer: </label>
                <input type="text" name="right_answer" placeholder="Type the right answer" class="form-control" required>
            </div>
            <div class="form-group row"><label>2ND Answer: </label>
                <input type="text" name="2nd_answer" placeholder="Type the 2nd answer" class="form-control" required>
            </div>
            <div class="form-group row"><label>3RD Answer: </label>
                <input type="text" name="3rd_answer" placeholder="Type the 3rd answer" class="form-control" required>
            </div>
            <div class="form-group row"><label>4TH Answer: </label>
                <input type="text" name="4th_answer" placeholder="Type the 4th answer" class="form-control" required>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="form-group row"><label>Picture: </label>
                <input type="text" name="picture" placeholder="" class="form-control" required>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="form-group row"><label>Question Type : </label>
                <select class="form-control m-b" name="type" required>
                        <option value="">Select a question type</option>
                        <option value="1">option 1</option>
                        <option value="2">option 2</option>
                        <option value="3">option 3</option>
                    </select>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="form-group row">
                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Add Question</strong></button>
            </div>
        </form>
    </div>
    </div>
</div>
