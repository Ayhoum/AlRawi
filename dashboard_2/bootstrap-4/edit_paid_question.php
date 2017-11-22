<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 21-11-2017
 * Time: 18:37
 */
include '../../scripts/db_connection.php';
?>
<?php

    if (isset($_POST['submit'])) {
        $question_set_id = "SELECT QUESTION_SET_ID from EXAM_QUESTION WHERE NUMBER = '{$setId}'";
        $number = $setId;

        $question1 = $_POST['question'];
        $right_ans1 = $_POST['right_answer'];
        $answer_2 = $_POST['2nd_answer'];
        $answer_3 = $_POST['3rd_answer'];
        $answer_4 = $_POST['4th_answer'];
        $picture = $_POST['picture'];
        $type_1 = $_POST['type'];


        $query = "UPDATE `EXAM_QUESTION`SET ";
        $query .= "`QUESTION`='{$question1}',";
        $query .= "`RIGHT_ANWSER`='{$right_ans1}',";
        $query .= "`ANSWER_2`='{$answer_2}',";
        $query .= "`ANSWER_3`='{$answer_3}',";
        $query .= "`ANSWER_4`='{$answer_4}',";
        $query .= "`PICTURE`='{$picture}',";
        $query .= "`TYPE`='{$type_1}'";

        $query.= "WHERE NUMBER = '{$setId}'";

        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) > 0) {
            echo 'Question edited successfully';
        } else {
            echo 'error !!';
        }
    }
?>
<?php
$query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId";
$select_question = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($select_question)) {
    $number     =    $row['NUMBER'];
    $question   =    $row['QUESTION'];
    $right_ans  =    $row['RIGHT_ANWSER'];
    $ans_2      =    $row['ANSWER_2'];
    $ans_3      =    $row['ANSWER_3'];
    $ans_4      =    $row['ANSWER_4'];
    $pic        =    $row['PICTURE'];
    $type       =    $row['TYPE'];
    ?>
        <div class="col-md-12">
            <div class="panel panel-card margin-b-30">
                <div class="panel-body  p-xl-3">

                    <form   method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" data-toggle="validator">
                        <div class="form-group row"><label>Question:</label>
                            <input type="text" name="question" placeholder="<?php echo $question ?>" class="form-control" required>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row"><label>Right Answer: </label>
                            <input type="text" name="right_answer" placeholder="<?php echo $right_ans ?>" class="form-control" required>
                        </div>
                        <div class="form-group row"><label>2ND Answer: </label>
                            <input type="text" name="2nd_answer" placeholder="<?php echo $ans_2 ?>" class="form-control" required>
                        </div>
                        <div class="form-group row"><label>3RD Answer: </label>
                            <input type="text" name="3rd_answer" placeholder="<?php echo $ans_3 ?>" class="form-control" required>
                        </div>
                        <div class="form-group row"><label>4TH Answer: </label>
                            <input type="text" name="4th_answer" placeholder="<?php echo $ans_4 ?>" class="form-control" required>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row"><label>Picture: </label>
                            <input type="text" name="picture" placeholder="<?php echo $pic ?>" class="form-control" required>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group row"><label>Question Type : </label>
                            <select class="form-control m-b" name="type" required>
                                    <option value=""><?php echo $type ?></option>
                                    <option value="1">option 1</option>
                                    <option value="2">option 2</option>
                                    <option value="3">option 3</option>
                                </select>
                        </div>


                        <div class="hr-line-dashed"></div>

                        <div class="form-group row">
                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Edit Question</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
}
?>
