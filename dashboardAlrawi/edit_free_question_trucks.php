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

    $question1 = $_POST['question'];
    $right_ans1 = $_POST['right_answer'];
    $answer_2 = $_POST['2nd_answer'];
    $answer_3 = $_POST['3rd_answer'];
    $answer_4 = $_POST['4th_answer'];
    $reason_1 = $_POST['reason'];
    $type_1 = $_POST['type'];
    if(empty($answer_4)){
        $answer_4 = "0";
    }
    if(empty($answer_3)){
        $answer_3 = "0";
    }
    if(empty($answer_2)){
        $answer_2 = "0";
    }
    $newPicture = $_FILES['image']['name'];
    $date = date('YmdHis');
    $time=round(microtime(),8);
    $time = $time * 100000000;
    $newPicture = $date . $time . ".jpg";
    $newPicture_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($newPicture_tmp, "examImagesTrucks/free/" . $newPicture);
    if (!empty($newPicture_tmp)) {
        $query = "SELECT * FROM FREE_EXAM_QUESTION_TRUCK WHERE NUMBER = $setId";
        $select_ques = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($select_ques)) {
            $oldPicture = $row['PICTURE'];
        }
        if (file_exists("examImagesTrucks/free/$oldPicture")) {
            unlink("examImagesTrucks/free/$oldPicture");
        }
    } elseif (empty($newPicture_tmp)) {
        $query = "SELECT * FROM FREE_EXAM_QUESTION_TRUCK WHERE NUMBER = $setId";
        $select_ques = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($select_ques)) {
            $newPicture = $row['PICTURE'];
        }
    }

    $query = "UPDATE `FREE_EXAM_QUESTION_TRUCK` SET ";
    $query .= "`QUESTION`='{$question1}',";
    $query .= "`RIGHT_ANSWER`='{$right_ans1}',";
    $query .= "`ANSWER_2`='{$answer_2}',";
    $query .= "`ANSWER_3`='{$answer_3}',";
    $query .= "`ANSWER_4`='{$answer_4}',";
    $query .= "`REASON`='{$reason_1}',";
    $query .= "`PICTURE`='{$newPicture}',";
    $query .= "`TYPE`='{$type_1}',";
    $query .= "`FREE_QUESTION_SET_TRUCK_ID`='{$qset}' ";

    $query.= "WHERE NUMBER = '{$setId}'";

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "ERROR!!" . mysqli_error($mysqli);
    } else {
        header("Location: manage_free_exams_trucks.php?id=$qset");
    }
}
?>

<?php
$query = "SELECT * FROM FREE_EXAM_QUESTION_TRUCK WHERE NUMBER = $setId";
$select_question = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($select_question)) {
    $number     =    $row['NUMBER'];
    $question   =    $row['QUESTION'];
    $right_ans  =    $row['RIGHT_ANSWER'];
    $ans_2      =    $row['ANSWER_2'];
    $ans_3      =    $row['ANSWER_3'];
    $ans_4      =    $row['ANSWER_4'];
    $reason     =    $row['REASON'];
    $pic        =    $row['PICTURE'];
    $type       =    $row['TYPE'];
    ?>
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30">
            <div class="panel-body  p-xl-3">

                <form method="post" action="edit_free_question_trucks.php?qset=<?php echo $qset;?>&id=<?php echo $setId;?>" data-toggle="validator" enctype="multipart/form-data">

                    <div class="form-group row"><label>Question:</label>
                        <input type="text" name="question" style="direction: rtl;" value="<?php echo $question ?>" class="form-control" required>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group row"><label>Right Answer: </label>
                        <input type="text" name="right_answer" style="direction: rtl;" value="<?php echo $right_ans ?>" class="form-control" required>
                    </div>
                    <div class="form-group row"><label>2ND Answer: </label>
                        <input type="text" name="2nd_answer" style="direction: rtl;" value="<?php if($ans_2 != "0")echo $ans_2 ?>" class="form-control">
                    </div>
                    <div class="form-group row"><label>3RD Answer: </label>
                        <input type="text" name="3rd_answer" style="direction: rtl;" value="<?php if($ans_3 != "0")echo $ans_3 ?>" class="form-control">
                    </div>
                    <div class="form-group row"><label>4TH Answer: </label>
                        <input type="text" name="4th_answer" style="direction: rtl;" value="<?php if($ans_4 != "0")echo $ans_4 ?>" class="form-control">
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group row"><label>Reason: </label>
                        <input type="text" name="reason" style="direction: rtl;" value="<?php echo $reason ?>" class="form-control" required>
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
                                        <center><img src="examImagesTrucks/free/<?php echo $pic; ?>"
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
                        <select id="type" class="form-control m-b" style="direction: rtl;" name="type" required>
                            <option value="" disabled selected>Select a question type</option>
                            <option value="response" <?php if ($type == "response" ){echo "selected"; }?>>إستجابة</option>
                            <option value="yesNo" <?php if ($type == "yesNo" ){echo "selected"; }?>>نعم / لا</option>
                            <option value="numInp" <?php if ($type == "numInp" ){echo "selected"; }?>>إدخال رقم</option>
                            <option value="multiChoice2" <?php if ($type == "multiChoice2" ){echo "selected"; }?>>اختيار من متعدد (2)</option>
                            <option value="multiChoice3" <?php if ($type == "multiChoice3" ){echo "selected"; }?>>اختيار من متعدد (3)</option>
                            <option value="multiChoice4" <?php if ($type == "multiChoice4" ){echo "selected"; }?>>اختيار من متعدد (4)</option>
                            <option value="advantage3" <?php if ($type == "advantage3" ){echo "selected"; }?>>أفضلية (3)</option>
                            <option value="advantage4" <?php if ($type == "advantage4" ){echo "selected"; }?>>أفضلية (4)</option>
                        </select>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group row">
                        <button class="btn btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Edit Question</strong></button>
                    </div>
                </form>
                <div class="form-group row">
                    <a href="manage_free_exams_trucks.php?id=<?php echo $qset; ?>"><button class="btn btn-danger float-right m-t-n-xs"><strong>Back to manage exam</strong></button></a>
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