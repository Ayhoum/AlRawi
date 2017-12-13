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


if (isset($_GET['id'])){

    $qId = $_GET['id'];

}else{
    header("Location: profile.php");
}
if (isset($_POST['submit'])){

    for ($i = 1; $i <= 65; $i++){

        if(!empty($_POST['selector'.$i]))
        {

            ${'selector_' . $i} = $_POST['selector'.$i];

        } else {

            ${'selector_' . $i} = "0";

        }
    }
}else{
    header("Location: profile.php");
}

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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


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

    <script>
        var pri =0;
        var sec =0;
    </script>

</head>
<body style="background: #fde7e7">
<div class="se-pre-con"><div class="pre-pre"></div></div>

<div id="wrapper" class="clearfix">

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

                <h2 class="text-center" id="result"></h2>
                <h4>الاسئلــة</h4>

                <?php


                // GET THE QUESTION FROM DB
                $query = " SELECT * FROM `FREE_EXAM_QUESTION` WHERE `FREE_QUESTION_SET_ID` = '{$qId}'";
                $result = mysqli_query($mysqli, $query);
                if (mysqli_num_rows($result) > 0) {
                    $x = 1;


                    while ($row = mysqli_fetch_assoc($result)) {

                        $number          = $row['NUMBER'];
                        $number = $number - ($qId - 1) * 65;
                        $question        = $row['QUESTION'];
                        $right_answer    = $row['RIGHT_ANSWER'];
                        $second_answer   = $row['ANSWER_2'];
                        $third_answer    = $row['ANSWER_3'];
                        $forth_answer    = $row['ANSWER_4'];
                        $picture         = $row['PICTURE'];
                        $reason          = $row['REASON'];
                        $type            = $row['TYPE'];


                        if ( ${'selector_' . $x} == $right_answer ){
                        if($x<=25){
                            ?>
                            <script>
                                pri++;
                            </script>

                        <?php
                        }else{
                        ?>
                            <script>
                                sec++;
                            </script>
                        <?php
                        }
                        ?>
                            <div class="tabs side-tabs tabs-bordered clearfix" id="tab-5">

                                <!-- THIS IS A BULLSHIT -->

                                <!--            <ul class="tab-nav clearfix">-->
                                <!--                <li><a href="#">  --><?php //echo "السؤال رقم: " .$number ;?><!-- <i class="fa fa-check" aria-hidden="true"></i> </a></li>-->
                                <!--            </ul>-->

                                <div class="tab-container" style="background: rgba(50, 205, 50, 0.1);">

                                    <div class="tab-content clearfix" style="direction: rtl"  >

                                        <div class="fancy-title title-bottom-border">
                                            <h3>السؤال <?php echo $number ;?>:  <span><?php    echo $question ; ?> </span> </h3>
                                        </div>

                                        <div class="row" >
                                            <div class="col-sm-6">
                                                <img src="dashboardAlrawi/examsImages/free/<?php echo $picture ?>" class="img-fluid img-thumbnail" >

                                            </div>

                                            <div class="col-sm-6">
                                                <h4> الاجابات : </h4>
                                                <?php
                                                if ($type == "response"){
                                                    ?>


                                                    <p <?php if ($right_answer == "فرامل"){ echo "style= 'color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?> >فرامل</p>
                                                    <p <?php if ($right_answer == "رفع قدم عن الوقود"){ echo "style= 'color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>>رفع قدم عن الوقود</p>
                                                    <p <?php if ($right_answer == "لا شئ"){ echo "style= 'color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>>لا شيء</p>


                                                    <?php
                                                }
                                                elseif ($type == "yesNo"){
                                                    ?>
                                                    <p <?php if ($right_answer == "نعم"){ echo "style= 'color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?> >نعم</p>
                                                    <p <?php if ($right_answer == "لا"){ echo "style= 'color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>>لا</p>

                                                    <?php
                                                } elseif ($type == "numInp"){
                                                    ?>
                                                    <p style= 'color: green;margin-bottom: 10px;font-size:18px;'><?php echo ${'selector_' . $x}; ?></p>
                                                    <?php
                                                }elseif ($type == "multiChoice"){
                                                    ?>

                                                    <p style= 'color: green;margin-bottom: 10px;font-size:18px;'><?php echo $right_answer; ?></p>
                                                    <p style= 'margin-bottom: 10px;font-size:18px;'><?php echo $second_answer; ?></p>
                                                    <?php
                                                    if ($third_answer != "0") {
                                                        ?>
                                                        <p style= 'margin-bottom: 10px;font-size:18px;'><?php echo $third_answer; ?></p>
                                                        <?php
                                                    }

                                                    if ($forth_answer != "0"){
                                                        ?>
                                                        <p style= 'margin-bottom: 10px;font-size:18px;'><?php echo $forth_answer; ?></p>

                                                        <?php
                                                    }

                                                }



                                                ?>
                                            </div>
                                        </div>
                                        <div class="line" style="margin: 10px 0;"></div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>السبب:</h4>
                                                <p style="font-size:18px;"><?php echo $reason ?></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="line"></div>
                        <?php
                        $x++;
                        }  else{
                        ?>
                            <div class="tabs side-tabs tabs-bordered clearfix" id="tab-5">


                                <!-- THIS IS A BULLSHIT -->

                                <!--            <ul class="tab-nav clearfix">-->
                                <!--                <li><a href="#">  --><?php //echo "السؤال رقم: " .$number ;?><!-- <i class="fa fa-check" aria-hidden="true"></i> </a></li>-->
                                <!--            </ul>-->

                                <div class="tab-container" style="background: rgba(255, 0, 0, 0.2);">

                                    <div class="tab-content clearfix" style="direction: rtl"  >

                                        <div class="fancy-title title-bottom-border">
                                            <h3>السؤال <?php echo $number ;?>: <span><?php    echo $question ; ?> </span> </h3>
                                        </div>

                                        <div class="row" >
                                            <div class="col-sm-6">
                                                <img src="dashboardAlrawi/examsImages/free/<?php echo $picture ?>" class="img-fluid img-thumbnail" >

                                            </div>

                                            <div class="col-sm-6">
                                                <h4> الاجابات : </h4>

                                                <?php
                                                if ($type == "response"){
                                                    ?>


                                                    <p <?php if ( ${'selector_' . $x} == "فرامل"){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";} elseif ($right_answer == 'فرامل'){ echo "style='color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?> >فرامل</p>
                                                    <p <?php if ( ${'selector_' . $x} == "رفع قدم عن الوقود"){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";} elseif ($right_answer == 'رفع قدم عن الوقود'){ echo "style='color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>>رفع قدم عن الوقود</p>
                                                    <p <?php if ( ${'selector_' . $x} == "لا شئ"){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";} elseif ($right_answer == 'لا شئ'){ echo "style='color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>>لا شيء</p>


                                                    <?php
                                                } elseif ($type == "yesNo"){
                                                    ?>
                                                    <p <?php if ( ${'selector_' . $x} == "نعم"){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";} elseif ($right_answer == 'نعم'){ echo "style='color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?> >نعم</p>
                                                    <p <?php if ( ${'selector_' . $x} == "لا"){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";} elseif ($right_answer == 'لا'){ echo "style='color: green;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>>لا</p>

                                                    <?php
                                                } elseif ($type == "numInp"){
                                                    ?>
                                                    <p style= 'color: green;margin-bottom: 10px;font-size:18px;'><?php echo $right_answer; ?></p>
                                                    <p style= 'color: red;margin-bottom: 10px;font-size:18px;'><?php echo ${'selector_' . $x}; ?></p>

                                                    <?php
                                                }elseif ($type == "multiChoice"){

                                                    ?>
                                                    <p style= 'color: green;margin-bottom: 10px;font-size:18px;'><?php echo $right_answer; ?></p>
                                                    <p <?php if ( ${'selector_' . $x} == $second_answer){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>><?php echo $second_answer; ?></p>
                                                    <?php
                                                    if ($third_answer != "0") {
                                                        ?>
                                                        <p <?php if ( ${'selector_' . $x} == $third_answer){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>><?php echo $third_answer; ?></p>
                                                        <?php
                                                    }
                                                    if ($forth_answer != "0"){
                                                        ?>
                                                        <p <?php if ( ${'selector_' . $x} == $forth_answer){ echo "style= 'color: red;margin-bottom: 10px;font-size:18px;'";}else{echo "style= 'margin-bottom: 10px;font-size:18px;'";} ?>><?php echo $forth_answer; ?></p>
                                                        <?php
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="line" style="margin: 10px 0;"></div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>السبب:</h4>
                                                <p style="font-size:18px;"><?php echo $reason ?></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="line"></div>
                            <?php
                            $x++;
                        }
                        ?>





                        <?php
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

                <div class="col_full">

                    <div class="widget clearfix">

                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="#" role="form" method="post" class="nobottommargin row clearfix">
                            <div class="col-md-9">
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="sm-form-control required email" placeholder="أدخل بريدك الإلكتروني ليصلك كل جديد حول موقعنا">
                            </div>
                            <div class="col-md-3">
                                <button class="button button-rounded nomargin center btn-block" type="submit">اشترك معنا</button>
                            </div>
                        </form>

                        <div class="line line-sm"></div>

                        <div class="row">

                        </div>

                    </div>

                </div>

                <div class="col_full col_last">

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

                    <div class="widget subscribe-widget clearfix">
                        <div class="row">

                            <div class="col-md-4 clearfix bottommargin-sm">
                                <a href="https://ar-ar.facebook.com/Alrawi1rijbewijs/" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="https://ar-ar.facebook.com/Alrawi1rijbewijs/"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>

                            <div class="col-md-4 clearfix bottommargin-sm">
                                <a href="https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw" class="social-icon si-dark si-colored si-youtube nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-youtube"></i>
                                    <i class="icon-youtube"></i>
                                </a>
                                <a href="https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>on YouTube</small></a>
                            </div>
                            <div class="col-md-4 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-instagram nobottommargin" style="margin-right: 10px;">

                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Secured</strong><br></small></a>
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

                <div class="text-center">
                    Copyrights &copy; 2018 All Rights Reserved by Al Rawi Theorie.<br>
                    <div class="copyright-links"><a href="#">شروط الإستخدام</a> / <a href="#">سياسات الخصوصية</a></div>
                </div>

                <div class="text-center topmargin-sm">
                    Developed & Designed by <a href="http://www.el-semicolon.nl"> El-SemiColon; </a>
                </div>

            </div>

        </div><!-- #copyrights end -->



    </footer><!-- #footer end -->
</div>

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

<script>
    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function() {
// Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

    $(window).load(function() {
// Animate loader off screen
        $(".pre-pre").fadeOut("slow");
    });

    alert(pri);
    alert(sec);
    jQuery("#result").hide();

    if(pri>12 && sec>34 ){
        jQuery("#result").show();
        jQuery("#result").text("ناجح");
    }else{
        jQuery("#result").show();
        jQuery("#result").text("راسب");
    }

</script>

</body>

</html>