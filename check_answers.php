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

<!DOCTYPE html >
<html lang="en-US">
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
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />


    <link rel="stylesheet" href="css/swiper.css" type="text/css" />

    <!-- Medical Demo Specific Stylesheet -->
    <link rel="stylesheet" href="demos/medical/medical.css" type="text/css" />
    <!-- / -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="demos/medical/css/medical-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="demos/medical/fonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/colors.php?color=DE6262" type="text/css" />


    <style>
        .form-control.error { border: 2px solid red; }


        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/2.png) center no-repeat #fff2f2;
        }

        .pre-pre {
            position: fixed;
            left: 0;
            top: 150px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/preloader@2x.gif) center no-repeat;
        }
    </style>




<!-- Document Title
============================================= -->
    <title>الامتـحــان | مراجعــة الاجابـات</title>
    <link rel="icon" href="images/1.png" type="image/x-icon">

</head>
<body>
<!-- Header
   ============================================= -->
<header id="header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="index.php" class="standard-logo"><img src="images/1.png" alt="Canvas Logo"></a>
                <a href="index.php" class="retina-logo"><img src="images/2.png" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-3">

                <ul>
                    <li class="current"><a href="index.php"><div>الصفحة الرئيسية</div></a></li>
                </ul>

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->


<section id="content" style="width: 100%" >
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
                    <li><a href="#tabs-17">  <?php echo "السؤال رقم: " .$number ;?></a></li>
                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix" style="direction: rtl" id="tabs-17">

                        <div class="fancy-title title-bottom-border">
                            <h3>السؤال:  <span><?php    echo $question ; ?> </span> </h3>
                        </div>

                        <div class="row" >
                            <div class="col-sm-7">
                                <img src="<?php echo $picture ?>" class="img-fluid img-thumbnail" >

                            </div>

                            <div class="col-sm-5">
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


            <div class="center">
                <a href="profile.php" class="button button-rounded button-reveal button-large button-border "><i class="icon-user"></i><span>اذهب الى الصفحة الشخصية</span></a>
            </div>

        </div>
    </div>
</section>



<footer id="footer" style="background-color: #F5F5F5;border-top: 2px solid rgba(0,0,0,0.06);">

    <div class="container" style="border-bottom: 1px solid rgba(0,0,0,0.06);">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="col_full ">

                <div class="widget clear-bottommargin-sm clearfix">

                    <div class="row">

                        <div class="col-md-6 bottommargin-sm text-center">
                            <div class="footer-big-contacts">
                                <span>Call Us:</span>
                                +(31) 6 12345678
                            </div>
                        </div>

                        <div class="col-md-6 bottommargin-sm text-center">
                            <div class="footer-big-contacts">
                                <span>Send an Email:</span>
                                info@alrawitheorie.nl
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights" class="nobg">

        <div class="container clearfix">

            <div class="col_half">
                Copyrights &copy; 2017 All Rights Reserved by Al Rawi Theorie.<br>
                <div class="copyright-links"><a href="#">شروط الإستخدام</a> / <a href="#">سياسات الخصوصية</a></div>
            </div>

            <div class="col_half col_last tright">
                <div class="copyrights-menu copyright-links clearfix" style="direction: rtl">
                    <a href="#">الصفحة الرئيسية</a>  -<a href="#">من نحن؟</a>-<a href="#">الأسئلة الأكثر شيوعاً</a>-  <a href="#">تواصل معنا</a>
                </div>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer><!-- #footer end -->



<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
	============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>



</body>

</html>