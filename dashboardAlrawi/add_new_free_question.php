<?php
ob_start();
include '../scripts/db_connection.php';
if($_SESSION['role'] != "MainAdmin"){
    header("Location: ../index.php");
}

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
    $reason = $_POST['reason'];
    $type = $_POST['type'];
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
    $newPicture = date('Ymd') . date('Hms') . ".jpg";
    $newPicture_tmp = $_FILES['image']['tmp_name'];
    if (!empty($newPicture_tmp)) {
        move_uploaded_file($newPicture_tmp, "examsImages/free/$newPicture");
    }else{
        $newPicture = "Empty";
    }

    $query = "INSERT INTO `FREE_EXAM_QUESTION`(`NUMBER`, `QUESTION`, `RIGHT_ANSWER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `REASON`, `PICTURE`, `TYPE`, `FREE_QUESTION_SET_ID`)";
    $query .= "VALUES ( '{$setId}',
                            '{$question}',
                            '{$right_ans}',
                            '{$answer_2}',
                            '{$answer_3}',
                            '{$answer_4}',
                            '{$reason}',
                            '{$newPicture}',
                            '{$type}',
                            '{$qset}')";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        echo "ERROR!!" . mysqli_error($mysqli);
    } else {
        header("Location: manage_free_exams.php?id=$qset");
    }
}
//}

?>
<div class="col-md-12">
    <div class="panel panel-card margin-b-30">
        <div class="panel-body  p-xl-3">

            <form method="post" action="add_new_free_question.php?qset=<?php echo $qset;?>&id=<?php echo $setId;?>" data-toggle="validator" enctype="multipart/form-data">
                <div class="form-group row"><label>Question:</label>
                    <input type="text" name="question" style="direction: rtl;" placeholder="Enter the question" class="form-control" required>
                </div>

                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label>Right Answer: </label>
                    <input type="text" name="right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control" required>
                </div>
                <div class="form-group row"><label>2ND Answer: </label>
                    <input type="text" name="2nd_answer" style="direction: rtl;" placeholder="Type the 2nd answer" class="form-control">
                </div>
                <div class="form-group row"><label>3RD Answer: </label>
                    <input type="text" name="3rd_answer" style="direction: rtl;" placeholder="Type the 3rd answer" class="form-control">
                </div>
                <div class="form-group row"><label>4TH Answer: </label>
                    <input type="text" name="4th_answer" style="direction: rtl;" placeholder="Type the 4th answer" class="form-control">
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label>Reason: </label>
                    <input type="text" name="reason" style="direction: rtl;" placeholder="Type the Reason" class="form-control" required>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label>Picture: </label>
                    <input type="file" id="imgInp" name="image" class="form-control">
                    <img id="image" />
                </div>

                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label>Question Type : </label>
                    <select class="form-control m-b" style="direction: rtl;" name="type" required>
                        <option value="" disabled selected>Select a question type</option>
                        <option value="response">إستجابة</option>
                        <option value="yesNo">نعم / لا</option>
                        <option value="numInp">إدخال رقم</option>
                        <option value="multiChoice">اختيار من متعدد</option>
                        <option value="advantage">أفضلية</option>
                    </select>
                </div>

                <div class="hr-line-dashed"></div>

                <div class="form-group row">
                    <button class="btn btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Add Question</strong></button>
                </div>
            </form>
            <div class="form-group row">
                <a href="manage_free_exams.php?id=<?php echo $qset; ?>"><button class="btn btn-danger float-right m-t-n-xs"><strong>Back to manage exam</strong></button></a>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("imgInp").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
            document.getElementById("image").style = "height: 600px; width: 600px;";
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>