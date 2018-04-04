<?php
ob_start();
include '../scripts/db_connection.php';
if($_SESSION['role'] != "MainAdmin"){
    //header("Location: ../index.php");
}

if (isset($_GET['id']) && ($_GET['qset'])) {
    $qset = $_GET['qset'];
    $setId = $_GET['id'];
}
if (isset($_POST['submit'])) {


    $question = $_POST['question'];
    $type = $_POST['type'];

    if($type == "response"){
        $right_ans = $_POST['response_right_answer'];
    }else if($type == "yesNo"){
        $right_ans = $_POST['yesno_right_answer'];
    }else if($type == "numInp"){
        $right_ans = $_POST['inp_right_answer'];
    }else if($type == "multiChoice2"){
        $right_ans = $_POST['multi2_right_answer'];
        $answer_2  = $_POST['multi2_2nd_answer'];
    }else if($type == "multiChoice3"){
        $right_ans = $_POST['multi3_right_answer'];
        $answer_2 = $_POST['multi3_2nd_answer'];
        $answer_3 = $_POST['multi3_3rd_answer'];
    }else if($type == "multiChoice4"){
        $right_ans = $_POST['multi4_right_answer'];
        $answer_2 = $_POST['multi4_2nd_answer'];
        $answer_3 = $_POST['multi4_3rd_answer'];
        $answer_4 = $_POST['multi4_4th_answer'];
    }else if($type == "advantage3"){
        $right_ans = $_POST['adv3_right_answer'];
        $answer_2 = $_POST['adv3_2nd_answer'];
        $answer_3 = $_POST['adv3_3rd_answer'];
    }else if($type == "advantage4"){
        $right_ans = $_POST['adv4_right_answer'];
        $answer_2 = $_POST['adv4_2rd_answer'];
        $answer_3 = $_POST['adv4_3rd_answer'];
        $answer_4 = $_POST['adv4_4th_answer'];
    }

    $reason = $_POST['reason'];

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
    if (!empty($newPicture_tmp)) {
        move_uploaded_file($newPicture_tmp, "examImagesTrucks/free/$newPicture");
    }else{
        $newPicture = "Empty";
    }

    $query = "INSERT INTO `FREE_EXAM_QUESTION_TRUCK`(`NUMBER`, `QUESTION`, `RIGHT_ANSWER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `REASON`, `PICTURE`, `TYPE`, `FREE_QUESTION_SET_TRUCK_ID`)";
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
        header("Location: manage_free_exams_trucks.php?id=$qset");
    }
}
//}

?>
<div class="col-md-12">
    <div class="panel panel-card margin-b-30">
        <div class="panel-body  p-xl-3">

            <form method="post" action="add_new_free_question_trucks.php?qset=<?php echo $qset;?>&id=<?php echo $setId;?>" data-toggle="validator" enctype="multipart/form-data">

                <div class="form-group row"><label>Question Type : </label>
                    <select onchange="getType()" id="type" class="form-control m-b" style="direction: rtl;" name="type" required>
                        <option value="" disabled selected>Select a question type</option>
                        <option value="response">إستجابة</option>
                        <option value="yesNo">نعم / لا</option>
                        <option value="numInp">إدخال رقم</option>
                        <option value="multiChoice2">اختيار من متعدد (2)</option>
                        <option value="multiChoice3">اختيار من متعدد (3)</option>
                        <option value="multiChoice4">اختيار من متعدد (4)</option>
                        <option value="advantage3">أفضلية (3)</option>
                        <option value="advantage4">أفضلية (4)</option>
                    </select>
                </div>

                <div class="form-group row"><label>Question:</label>
                    <input type="text" name="question" style="direction: rtl;" placeholder="Enter the question" class="form-control" required>
                </div>

                <div class="hr-line-dashed"></div>


                <div class="slide responseSlide" id="responseSlide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <select id="right_answer" class="form-control m-b" style="direction: rtl;" name="response_right_answer">
                            <option value="" disabled selected>Select the answer</option>
                            <option value="فرامل">فرامل</option>
                            <option value="رفع قدم عن الوقود">رفع قدم عن الوقود</option>
                            <option value="لا شئ">لا شئ</option>
                        </select>
                    </div>
                </div>

                <div class="slide yesOrNoSlide" id="yesOrNoSlide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <select id="yesno_right_answer" class="form-control m-b" style="direction: rtl;" name="yesno_right_answer">
                            <option value="" disabled selected>Select the answer</option>
                            <option value="نعم">نعم</option>
                            <option value="لا">لا</option>
                        </select>
                    </div>
                </div>

                <div class="slide numInpSlide" id="numInpSlide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <input type="text" name="inp_right_answer" id="inp_right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control">
                    </div>
                </div>

                <div class="slide multiChoice2Slide" id="multiChoice2Slide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <input type="text" name="multi2_right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>2d Answer : </label>
                        <input type="text" name="multi2_2nd_answer" style="direction: rtl;" placeholder="Type the 2nd answer" class="form-control">
                    </div>
                </div>

                <div class="slide multiChoice3Slide" id="multiChoice3Slide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <input type="text" name="multi3_right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>2nd Answer : </label>
                        <input type="text" name="multi3_2nd_answer" style="direction: rtl;" placeholder="Type the 2nd answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>3rd Answer : </label>
                        <input type="text" name="multi3_3rd_answer" style="direction: rtl;" placeholder="Type the 3rd answer" class="form-control">
                    </div>
                </div>

                <div class="slide multiChoice4Slide" id="multiChoice4Slide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <input type="text" name="multi4_right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>2nd Answer : </label>
                        <input type="text" name="multi4_2nd_answer" style="direction: rtl;" placeholder="Type the 2nd answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>3rd Answer : </label>
                        <input type="text" name="multi4_3rd_answer" style="direction: rtl;" placeholder="Type the 3rd answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>4th Answer : </label>
                        <input type="text" name="multi4_4th_answer" style="direction: rtl;" placeholder="Type the 4th answer" class="form-control">
                    </div>
                </div>

                <div class="slide advantage3Slide" id="advantage3Slide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <input type="text" name="adv3_right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>2nd Answer : </label>
                        <input type="text" name="adv3_2nd_answer" style="direction: rtl;" placeholder="Type the 2nd answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>3rd Answer : </label>
                        <input type="text" name="adv3_3rd_answer" style="direction: rtl;" placeholder="Type the 3rd answer" class="form-control">
                    </div>
                </div>

                <div class="slide advantage4Slide" id="advantage4Slide">
                    <div class="form-group row"><label>Right Answer : </label>
                        <input type="text" name="adv4_right_answer" style="direction: rtl;" placeholder="Type the right answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>2nd Answer : </label>
                        <input type="text" name="adv4_2nd_answer" style="direction: rtl;" placeholder="Type the 2nd answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>3rd Answer : </label>
                        <input type="text" name="adv4_3rd_answer" style="direction: rtl;" placeholder="Type the 3rd answer" class="form-control">
                    </div>
                    <div class="form-group row"><label>3rd Answer : </label>
                        <input type="text" name="adv4_4th_answer" style="direction: rtl;" placeholder="Type the 4th answer" class="form-control">
                    </div>
                </div>


                <div class="form-group row"><label>Reason: </label>
                    <input type="text" name="reason" style="direction: rtl;" placeholder="Type the Reason" class="form-control" required>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group row"><label>Picture: </label>
                    <input type="file" id="imgInp" name="image" class="form-control">
                    <img id="image" />
                </div>




                <div class="hr-line-dashed"></div>

                <div class="form-group row">
                    <button class="btn btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Add Question</strong></button>
                </div>
            </form>
            <div class="form-group row">
                <a href="manage_free_exams_trucks.php?id=<?php echo $qset; ?>"><button class="btn btn-danger float-right m-t-n-xs"><strong>Back to manage exam</strong></button></a>
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