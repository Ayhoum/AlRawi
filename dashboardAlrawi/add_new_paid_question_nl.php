<?php
ob_start();
include '../nl/scripts/db_connection.php';
if($_SESSION['role'] != "MainAdmin"){
    header("Location: ../index.php");
}

if (isset($_GET['id']) && ($_GET['qset'])) {
    $qset = $_GET['qset'];
    $setId = $_GET['id'];
}else{
    header("Location: index.php");
}
    if (isset($_POST['submit'])) {


        $question = $_POST['question'];
        $question = mysqli_escape_string($mysqli_nl,$question);
        $type = $_POST['type'];
        $type = mysqli_escape_string($mysqli_nl,$type);


        if($type == "response"){
            $right_ans = $_POST['response_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
        }else if($type == "yesNo"){
            $right_ans = $_POST['yesno_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
        }else if($type == "numInp"){
            $right_ans = $_POST['inp_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
        }else if($type == "multiChoice2"){
            $right_ans = $_POST['multi2_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
            $answer_2  = $_POST['multi2_2nd_answer'];
            $answer_2 = mysqli_escape_string($mysqli_nl,$answer_2);
        }else if($type == "multiChoice3"){
            $right_ans = $_POST['multi3_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
            $answer_2 = $_POST['multi3_2nd_answer'];
            $answer_2 = mysqli_escape_string($mysqli_nl,$answer_2);
            $answer_3 = $_POST['multi3_3rd_answer'];
            $answer_3 = mysqli_escape_string($mysqli_nl,$answer_3);
        }else if($type == "multiChoice4"){
            $right_ans = $_POST['multi4_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
            $answer_2 = $_POST['multi4_2nd_answer'];
            $answer_2 = mysqli_escape_string($mysqli_nl,$answer_2);
            $answer_3 = $_POST['multi4_3rd_answer'];
            $answer_3 = mysqli_escape_string($mysqli_nl,$answer_3);
            $answer_4 = $_POST['multi4_4th_answer'];
            $answer_4 = mysqli_escape_string($mysqli_nl,$answer_4);
        }else if($type == "advantage3"){
            $right_ans = $_POST['adv3_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
            $answer_2 = $_POST['adv3_2nd_answer'];
            $answer_2 = mysqli_escape_string($mysqli_nl,$answer_2);
            $answer_3 = $_POST['adv3_3rd_answer'];
            $answer_3 = mysqli_escape_string($mysqli_nl,$answer_3);
        }else if($type == "advantage4"){
            $right_ans = $_POST['adv4_right_answer'];
            $right_ans = mysqli_escape_string($mysqli_nl,$right_ans);
            $answer_2 = $_POST['adv4_2rd_answer'];
            $answer_2 = mysqli_escape_string($mysqli_nl,$answer_2);
            $answer_3 = $_POST['adv4_3rd_answer'];
            $answer_3 = mysqli_escape_string($mysqli_nl,$answer_3);
            $answer_4 = $_POST['adv4_4th_answer'];
            $answer_4 = mysqli_escape_string($mysqli_nl,$answer_4);
        }

        $reason = $_POST['reason'];
        $reason = mysqli_escape_string($mysqli_nl,$reason);

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
            move_uploaded_file($newPicture_tmp, "examsImagesNL/paid/$newPicture");
        }else{
            $newPicture = "Empty";
        }

        $query = "INSERT INTO `EXAM_QUESTION`(`NUMBER`, `QUESTION`, `RIGHT_ANSWER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `REASON`, `PICTURE`, `TYPE`, `QUESTION_SET_ID`)";
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
        $result = mysqli_query($mysqli_nl, $query);
        if (!$result) {
            echo "ERROR!!" . mysqli_error($mysqli_nl);
        } else {
            header("Location: manage_paid_exams_nl.php?id=$qset");
        }
    }
//}

?>
<div class="col-md-12">
    <div class="panel panel-card margin-b-30">
        <div class="panel-body  p-xl-3">
        <form method="post" action="add_new_paid_question_nl.php?qset=<?php echo $qset;?>&id=<?php echo $setId;?>" data-toggle="validator" enctype="multipart/form-data">
            <div class="form-group row"><label>Question Type : </label>
                <select onchange="getType()" id="type" class="form-control m-b" style="direction: ltr;" name="type" required>
                    <option value="" disabled selected>Select a question type</option>
                    <option value="response">Gevaarherkenning</option>
                    <option value="yesNo">Ja / Nee</option>
                    <option value="numInp">Nummer Invoeren</option>
                    <option value="multiChoice2">Meerkeuze Vraag (2)</option>
                    <option value="multiChoice3">Meerkeuze Vraag (3)</option>
                    <option value="multiChoice4">Meerkeuze Vraag (4)</option>
                    <option value="advantage3">Voorrang (3)</option>
                    <option value="advantage4">Voorrang (4)</option>
                </select>
            </div>

            <div class="form-group row"><label>Question:</label>
                <input type="text" name="question" style="direction: ltr;" placeholder="Enter the question" class="form-control" required>
            </div>

            <div class="hr-line-dashed"></div>


            <div class="slide responseSlide" id="responseSlide">
                <div class="form-group row"><label>Right Answer : </label>
                    <select id="right_answer" class="form-control m-b" style="direction: ltr;" name="response_right_answer">
                        <option value="" disabled selected>Select the answer</option>
                        <option value="Remmen">Remmen</option>
                        <option value="Gas los laten">Gas los laten</option>
                        <option value="Niets">Niets</option>
                    </select>
                </div>
            </div>

            <div class="slide yesOrNoSlide" id="yesOrNoSlide">
                <div class="form-group row"><label>Right Answer : </label>
                    <select id="yesno_right_answer" class="form-control m-b" style="direction: ltr;" name="yesno_right_answer">
                        <option value="" disabled selected>Select the answer</option>
                        <option value="Ja">Ja</option>
                        <option value="Nee">Nee</option>
                    </select>
                </div>
            </div>

            <div class="slide numInpSlide" id="numInpSlide">
                <div class="form-group row"><label>Right Answer : </label>
                    <input type="text" name="inp_right_answer" id="inp_right_answer" style="direction: ltr;" placeholder="Type the right answer" class="form-control">
                </div>
            </div>

            <div class="slide multiChoice2Slide" id="multiChoice2Slide">
                <div class="form-group row"><label>Right Answer : </label>
                    <input type="text" name="multi2_right_answer" style="direction: ltr;" placeholder="Type the right answer" class="form-control">
                </div>
                <div class="form-group row"><label>2d Answer : </label>
                    <input type="text" name="multi2_2nd_answer" style="direction: ltr;" placeholder="Type the 2nd answer" class="form-control">
                </div>
            </div>

            <div class="slide multiChoice3Slide" id="multiChoice3Slide">
                <div class="form-group row"><label>Right Answer : </label>
                    <input type="text" name="multi3_right_answer" style="direction: ltr;" placeholder="Type the right answer" class="form-control">
                </div>
                <div class="form-group row"><label>2nd Answer : </label>
                    <input type="text" name="multi3_2nd_answer" style="direction: ltr;" placeholder="Type the 2nd answer" class="form-control">
                </div>
                <div class="form-group row"><label>3rd Answer : </label>
                    <input type="text" name="multi3_3rd_answer" style="direction: ltr;" placeholder="Type the 3rd answer" class="form-control">
                </div>
            </div>

            <div class="slide multiChoice4Slide" id="multiChoice4Slide">
                <div class="form-group row"><label>Right Answer : </label>
                    <input type="text" name="multi4_right_answer" style="direction: ltr;" placeholder="Type the right answer" class="form-control">
                </div>
                <div class="form-group row"><label>2nd Answer : </label>
                    <input type="text" name="multi4_2nd_answer" style="direction: ltr;" placeholder="Type the 2nd answer" class="form-control">
                </div>
                <div class="form-group row"><label>3rd Answer : </label>
                    <input type="text" name="multi4_3rd_answer" style="direction: ltr;" placeholder="Type the 3rd answer" class="form-control">
                </div>
                <div class="form-group row"><label>4th Answer : </label>
                    <input type="text" name="multi4_4th_answer" style="direction: ltr;" placeholder="Type the 4th answer" class="form-control">
                </div>
            </div>

            <div class="slide advantage3Slide" id="advantage3Slide">
                <div class="form-group row"><label>Right Answer : </label>
                    <input type="text" name="adv3_right_answer" style="direction: ltr;" placeholder="Type the right answer" class="form-control">
                </div>
                <div class="form-group row"><label>2nd Answer : </label>
                    <input type="text" name="adv3_2nd_answer" style="direction: ltr;" placeholder="Type the 2nd answer" class="form-control">
                </div>
                <div class="form-group row"><label>3rd Answer : </label>
                    <input type="text" name="adv3_3rd_answer" style="direction: ltr;" placeholder="Type the 3rd answer" class="form-control">
                </div>
            </div>

            <div class="slide advantage4Slide" id="advantage4Slide">
                <div class="form-group row"><label>Right Answer : </label>
                    <input type="text" name="adv4_right_answer" style="direction: ltr;" placeholder="Type the right answer" class="form-control">
                </div>
                <div class="form-group row"><label>2nd Answer : </label>
                    <input type="text" name="adv4_2nd_answer" style="direction: ltr;" placeholder="Type the 2nd answer" class="form-control">
                </div>
                <div class="form-group row"><label>3rd Answer : </label>
                    <input type="text" name="adv4_3rd_answer" style="direction: ltr;" placeholder="Type the 3rd answer" class="form-control">
                </div>
                <div class="form-group row"><label>3rd Answer : </label>
                    <input type="text" name="adv4_4th_answer" style="direction: ltr;" placeholder="Type the 4th answer" class="form-control">
                </div>
            </div>


            <div class="form-group row"><label>Reason: </label>
                <input type="text" name="reason" style="direction: ltr;" placeholder="Type the Reason" class="form-control" required>
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
                <a href="manage_paid_exams_nl.php?id=<?php echo $qset; ?>"><button class="btn btn-danger float-right m-t-n-xs"><strong>Back to manage exam</strong></button></a>
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