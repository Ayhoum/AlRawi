<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 11-12-2017
 * Time: 17:17
 */
session_start();
ob_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
include 'scripts/db_connection.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>الامتـحــان | مراجعــة الاجابـات</title>

</head>
<body>
<section id="content" >
    <div class="content-wrap">

        <div class="container clearfix " style="direction: rtl">

            <h4>الاسئلــة</h4>

    <?php
    if (isset($_GET)){

    $qId = 1;

    // GET THE QUESTION FROM DB
    $query = " SELECT * FROM `FREE_EXAM_QUESTION` WHERE `FREE_QUESTION_SET_ID` = '{$qId}'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {


    while ($row = mysqli_fetch_assoc($result)) {

    $number = $row['NUMBER'];
    $question = $row['QUESTION'];
    $right_answer = $row['RIGHT_ANSWER'];
    $second_answer = $row['ANSWER_2'];
    $third_answer = $row['ANSWER_3'];
    $forth_answer = $row['ANSWER_4'];
    $picture = $row['REASON'];
    $reason = $row['PICTURE'];
    $type = $row['TYPE'];


    ?>



            <div class="tabs side-tabs tabs-bordered clearfix" id="tab-5">

                <ul class="tab-nav clearfix">
                    <li><a href="#tabs-17"><i class="icon-home2"></i>  <?php echo "السؤال رقم :" .$number ;?></a></li>
                </ul>
                <?php
                    if ($type){


                    }
                ?>

                <div class="tab-container">




                    <div class="tab-content clearfix" style="direction: rtl" id="tabs-17">

                        <div class="fancy-title title-bottom-border">
                            <h3>السؤال:  <span><?php    echo $question ; ?> </span> </h3>

                        </div>
                        <div class="row" >

                            <div class="col-sm-8">
                                <img src="<?php echo $picture ?>">
                            </div>

                            <div class="col-sm-4">
                            <h4> الاجابات : </h4>
                            <?php
                                if ($type == "response"){
    
                                    echo " الاجابة الأولى : فرامل" .  "<br>";
                                    echo " الاجابة االثانية : رفع قدم عن الوقود" . "<br>";
                                    echo " الاجابة الثالثة : لا شئ" .  "<br>";
    
                                } elseif ($type == "yesNo"){
    
                                    echo " الاجابة الأولى : نعم " . "<br>";
                                    echo " الاجابة االثانية : لا " . "<br>";
    
                                } elseif ($type == "numInp"){
                                    echo " الاجابة الصحيحة : " . $right_answer. "<br>";
    
                                }elseif ($type == "multiChoice"){
    
    
                                    echo " الاجابة الأولى : " . $right_answer. "<br>";
                                    echo " الاجابة االثانية : " . $second_answer. "<br>";
    
                                    if ($third_answer != "0") {
    
                                        echo " الاجابة الثالثة : " . $third_answer . "<br>";
                                    }
    
                                    if ($forth_answer != "0"){
    
                                    echo " الاجابة الرابعة : " . $forth_answer. "<br>";
    
                                    }
    
                                }
    
    
    
                            ?>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        <div class="line"></div>

        <?php
            }

            }


            }
            ?>



        </div>
    </div>
</section>

<!-- External JavaScripts
	============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>


</body>

</html>