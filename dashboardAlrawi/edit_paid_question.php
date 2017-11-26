<?php
ob_start();
include '../scripts/db_connection.php';
if ($_SESSION['role'] != "MainAdmin") {
    header("Location: ../index.php");
}
if (isset($_GET['id']) && ($_GET['qset'])) {
    $qset = $_GET['qset'];
    $setId = $_GET['id'];
}
?>
<?php

if (isset($_POST['submit'])) {

//        $question_set_id = 1;
//        $number = 4;

    $question1 = $_POST['question'];
    $right_ans1 = $_POST['right_answer'];
    $answer_2 = $_POST['2nd_answer'];
    $answer_3 = $_POST['3rd_answer'];
    $answer_4 = $_POST['4th_answer'];
    $reason_1 = $_POST['reason'];
    $type_1 = $_POST['type'];

    $newPicture = $_FILES['image']['name'];
    $newPicture = date('Ymd') . date('Hms') . ".jpg";
    $newPicture_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($newPicture_tmp, "examsImages/paid/" . $newPicture);
    if (!empty($newPicture_tmp)) {
        $query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId";
        $select_ques = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($select_ques)) {
            $oldPicture = $row['PICTURE'];
        }
        if (file_exists("examsImages/paid/$oldPicture")) {
            unlink("examsImages/paid/$oldPicture");
            echo "<script>alert('Done');</script>";
        }
    } elseif (empty($newPicture_tmp)) {
        $query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId";
        $select_ques = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($select_ques)) {
            $newPicture = $row['PICTURE'];
        }
    }



    $query = "UPDATE `EXAM_QUESTION` SET ";
    $query .= "`QUESTION`='{$question1}',";
    $query .= "`RIGHT_ANSWER`='{$right_ans1}',";
    $query .= "`ANSWER_2`='{$answer_2}',";
    $query .= "`ANSWER_3`='{$answer_3}',";
    $query .= "`ANSWER_4`='{$answer_4}',";
    $query .= "`REASON`='{$reason_1}',";
    $query .= "`PICTURE`='{$newPicture}',";
    $query .= "`TYPE`='{$type_1}',";
    $query .= "`QUESTION_SET_ID`='{$qset}' ";

    $query .= "WHERE NUMBER = '{$setId}'";

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "ERROR!!" . mysqli_error($mysqli);
    } else {
        header("Location: manage_paid_exams.php?id=$qset");
    }
}
?>

<?php
$query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId";
$select_question = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($select_question)) {
    $number = $row['NUMBER'];
    $question = $row['QUESTION'];
    $right_ans = $row['RIGHT_ANSWER'];
    $ans_2 = $row['ANSWER_2'];
    $ans_3 = $row['ANSWER_3'];
    $ans_4 = $row['ANSWER_4'];
    $reason = $row['REASON'];
    $pic = $row['PICTURE'];
    $type = $row['TYPE'];
    ?>
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
            <div class="panel-body  p-xl-3">

                <form method="post" action="edit_paid_question.php?qset=<?php echo $qset; ?>&id=<?php echo $setId; ?>"
                      data-toggle="validator" enctype="multipart/form-data">
                    <div class="form-group row"><label>Question:</label>
                        <input type="text" name="question" value="<?php echo $question ?>" class="form-control"
                               required>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group row"><label>Right Answer: </label>
                        <input type="text" name="right_answer" value="<?php echo $right_ans ?>" class="form-control"
                               required>
                    </div>
                    <div class="form-group row"><label>2ND Answer: </label>
                        <input type="text" name="2nd_answer" value="<?php echo $ans_2 ?>" class="form-control" required>
                    </div>
                    <div class="form-group row"><label>3RD Answer: </label>
                        <input type="text" name="3rd_answer" value="<?php echo $ans_3 ?>" class="form-control" required>
                    </div>
                    <div class="form-group row"><label>4TH Answer: </label>
                        <input type="text" name="4th_answer" value="<?php echo $ans_4 ?>" class="form-control" required>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group row"><label>Reason: </label>
                        <input type="text" name="reason" value="<?php echo $reason ?>" class="form-control" required>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group row"><label>Picture: </label>
                        <input type="file" id="imgInp" name="image" class="form-control">
                        <div class="col-md-12">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-6">
                                    <h5 class="text-center">Old:  </h5>
                                    <?php
                                        if($pic != "Empty") {
                                            ?>
                                            <center><img src="examsImages/paid/<?php echo $pic; ?>"
                                                         style="width: 200px;height: 200px;"/></center>
                                            <?php
                                        }else{
                                            echo "<h5 class='text-center'>No old picture!</h5>";
                                        }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center">New:  </h5><center><img id="image"/></center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group row"><label>Question Type : </label>
                        <select class="form-control m-b" name="type" required>
                            <option value=""></option>
                            <option value="1" <?php if ($type == 1) {
                                echo "selected";
                            } ?>>option 1
                            </option>
                            <option value="2" <?php if ($type == 2) {
                                echo "selected";
                            } ?>>option 2
                            </option>
                            <option value="3" <?php if ($type == 3) {
                                echo "selected";
                            } ?>>option 3
                            </option>
                        </select>
                    </div>


                    <div class="hr-line-dashed"></div>

                    <div class="form-group row">
                        <button class="btn btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Edit
                                Question</strong></button>
                    </div>
                </form>
                <div class="form-group row">
                    <a href="manage_paid_exams.php?id=<?php echo $qset; ?>">
                        <button class="btn btn-danger float-right m-t-n-xs"><strong>Back to manage exam</strong>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>
<script>
    document.getElementById("imgInp").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
            document.getElementById("image").style = "height: 200px; width: 200px;";
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>