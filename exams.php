<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
$countSucceeded = 0;
$countOthers = 0;

$query = "SELECT * FROM Users ORDER BY ID DESC";
$select_users = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_users)) {
    if ($row['SITUATION'] == "SUCCEEDED") {
        $countSucceeded++;
    } else {
        $countOthers++;
    }
}
$totalUsers = $countOthers + $countSucceeded;

$name = $_SESSION['username'];
$query1 = "SELECT * FROM Users WHERE  Name ='{$name}' ";
$result1 = mysqli_query($mysqli, $query1);

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $user_id = $row['ID'];

        $query2 = "SELECT * FROM  `PAID_EXAM` WHERE Users_ID = '{$user_id}' ORDER BY  `PAYMENT_ID` DESC LIMIT 1";
        $result2 = mysqli_query($mysqli, $query2);

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $payment_id = $row ['PAYMENT_ID'];
                $user_id = $row['Users_ID'];
                $status = $row['STATUS'];
                $end_date = $row['END_DATE'];

                $today_date = date_default_timezone_set('Europe/Amsterdam');
                $today_date = date('Y-m-d H:i:s ', time());

                if ($end_date >= $today_date) {

                    ?>

                    <!DOCTYPE html>
                    <html dir="ltr" lang="en-US">
                    <head>

                        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                        <meta name="author" content="SemiColonWeb"/>

                        <!-- Stylesheets
                        ============================================= -->
                        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic"
                              rel="stylesheet" type="text/css"/>
                        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
                        <link rel="stylesheet" href="style.css" type="text/css"/>
                        <link rel="stylesheet" href="css/swiper.css" type="text/css"/>

                        <!-- Medical Demo Specific Stylesheet -->
                        <link rel="stylesheet" href="demos/medical/medical.css" type="text/css"/>
                        <!-- / -->
                        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi"
                              type="text/css"/>
                        <link rel="stylesheet" href="css/dark.css" type="text/css"/>
                        <link rel="stylesheet" href="css/font-icons.css" type="text/css"/>
                        <link rel="stylesheet" href="demos/medical/css/medical-icons.css" type="text/css"/>
                        <link rel="stylesheet" href="css/animate.css" type="text/css"/>
                        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css"/>

                        <link rel="stylesheet" href="demos/medical/fonts.css" type="text/css"/>

                        <link rel="stylesheet" href="css/responsive.css" type="text/css"/>
                        <meta name="viewport" content="width=device-width, initial-scale=1"/>

                        <link rel="stylesheet" href="css/colors.php?color=DE6262" type="text/css"/>

                        <!-- Document Title
                        ============================================= -->
                        <title>Al Rawi Theorie | Home</title>
                        <link rel="icon" href="images/1.png" type="image/x-icon">

                        <style>
                            .form-control.error {
                                border: 2px solid red;
                            }

                            .no-js #loader {
                                display: none;
                            }

                            .js #loader {
                                display: block;
                                position: absolute;
                                left: 100px;
                                top: 0;
                            }

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


                    </head>

                    <!--<body class="stretched" data-loader-html="<div id='css3-spinner-svg-pulse-wrapper'><svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='http://www.w3.org/2000/svg' viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'><path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round' d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' /></svg></div>">-->
                    <body style="background: #fde7e7">
                    <div class="se-pre-con">
                        <div class="pre-pre"></div>
                    </div>


                    <!-- Document Wrapper
                    ============================================= -->
                    <div id="wrapper" class="clearfix">

                        <!-- Top Bar
                        ============================================= -->
                        <div id="top-bar">

                            <div class="container clearfix">

                                <div class="col_half hidden-xs nobottommargin">

                                    <!-- Top Links
                                    ============================================= -->
                                    <div class="top-links">
                                        <ul>
                                            <!--<li><a href="#"><i class="icon-time"></i> Timings</a></li>-->
                                            <li><a href="#"><i class="icon-phone3"></i> +31-1234567890</a></li>
                                            <li><a href="#" class="nott"><i class="icon-envelope2"></i>
                                                    info@alrawitheorie.nl</a>
                                            </li>
                                        </ul>
                                    </div><!-- .top-links end -->

                                </div>

                                <div class="col_half col_last fleft nobottommargin">

                                    <!-- Top Links
                                    ============================================= -->
                                    <div class="top-links">
                                        <ul>
                                            <!--<li><a href="#">EN</a>-->
                                            <!--<ul>-->
                                            <!--<li><a href="#"><img src="images/icons/flags/french.png" alt="French"> FR</a></li>-->
                                            <!--<li><a href="#"><img src="images/icons/flags/italian.png" alt="Italian"> IT</a></li>-->
                                            <!--<li><a href="#"><img src="images/icons/flags/german.png" alt="German"> DE</a></li>-->
                                            <!--</ul>-->
                                            <!--</li>-->
                                            <?php if (!isset($_SESSION['role'])) { ?>
                                                <li><a href="#" class="button-red" style="color:#fff;">حسابي</a>
                                                    <ul>
                                                        <li><a href="login.php" dir="rtl">تسجيل الدخول <i
                                                                        class="icon-line2-login"></i></a></li>
                                                        <li><a href="signup.php" dir="rtl">حساب جديد! <i
                                                                        class="icon-line2-pencil"></i></a></li>
                                                    </ul>
                                                </li>
                                            <?php } else { ?>
                                                <li><a href="#" class="button-red"
                                                       style="color:#fff;"><?php echo $_SESSION['username']; ?></a>
                                                    <ul>
                                                        <?php if ($_SESSION['role'] == "MainAdmin") { ?>
                                                            <li><a href="adminAlrawi/dashboard.php" dir="rtl">لوحة
                                                                    التحكم <i
                                                                            class="icon-wrench"></i></a></li>
                                                        <?php } else { ?>
                                                            <li><a href="profile.php" dir="rtl">الملف الشخصي <i
                                                                            class="icon-user"></i></a></li>
                                                        <?php } ?>
                                                        <li><a href="logout.php" dir="rtl">تسجيل الخروج <i
                                                                        class="icon-line2-logout"></i></a></li>
                                                    </ul>
                                                </li>
                                            <?php } ?>

                                            <li><a href="" data-scrollto="#booking-appointment-form" data-offset="100"
                                                   data-easing="easeInOutExpo" data-speed="1200" class="bgcolor"
                                                   style="color:#fff;">احجز امتحانك</a></li>

                                        </ul>
                                    </div>
                                    <!-- .top-links end -->

                                </div>

                            </div>

                        </div><!-- #top-bar end -->

                        <!-- Header
                        ============================================= -->
                        <header id="header">

                            <div id="header-wrap">

                                <div class="container clearfix">

                                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                                    <!-- Logo
                                    ============================================= -->
                                    <div id="logo">
                                        <a href="index.php" class="standard-logo"><img src="images/1.png"
                                                                                       alt="Canvas Logo"></a>
                                        <a href="index.php" class="retina-logo"><img src="images/2.png"
                                                                                     alt="Canvas Logo"></a>
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

                        <!-- Content
                        ============================================= -->
                        <section id="content">

                            <div class="content-wrap" style="padding-bottom: 0 ">

                                <div class="container clearfix">

                                    <?php
                                    $query = "SELECT * FROM QUESTION_SET WHERE STATUS = 'VISIBLE'";
                                    $result = mysqli_query($mysqli, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['ID'];
                                            $name = $row['EXAM_NAME'];
                                            $begin = $row['BEGIN_ID'];
                                            $beginValue = (($begin - 1));
                                            ?>
                                            <div class="col-md-3 col-sm-6 bottommargin">
                                                <div class="team">
                                                    <div class="team-image">
                                                        <img src="images/1.png" alt="Exam">
                                                    </div>
                                                    <div class="team-desc team-desc-bg">
                                                        <div class="team-title"><h4><?php echo $name; ?></h4>
                                                            <span> PAID </span>
                                                        </div>
                                                        <a href="exam_interface.php?exam_id=<?php echo $id ?>"
                                                           class="button button-xlarge button-dark button-rounded tright">إبدأ الامتحان
                                                            <i class="icon-circle-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                    }

                                    ?>
                                </div>

                            </div>
                        </section><!-- #content end -->

                        <!-- Footer
                        ============================================= -->
                        <footer id="footer" style="background-color: #F5F5F5;border-top: 2px solid rgba(0,0,0,0.06);">

                            <div class="container" style="border-bottom: 1px solid rgba(0,0,0,0.06);">

                                <!-- Footer Widgets
                                ============================================= -->
                                <div class="footer-widgets-wrap clearfix">

                                    <div class="col_full">

                                        <div class="widget clearfix">

                                            <div class="widget-subscribe-form-result"></div>
                                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form"
                                                  method="post" class="nobottommargin row clearfix">
                                                <div class="col-md-9">
                                                    <input type="email" id="widget-subscribe-form-email"
                                                           name="widget-subscribe-form-email"
                                                           class="sm-form-control required email"
                                                           placeholder="أدخل بريدك الإلكتروني ليصلك كل جديد حول موقعنا">
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="button button-rounded nomargin center btn-block"
                                                            type="submit">
                                                        اشترك معنا
                                                    </button>
                                                </div>
                                            </form>

                                            <div class="line line-sm"></div>

                                            <div class="row">
                                                <!--								<div class="clear-bottommargin-sm clearfix">-->
                                                <!---->
                                                <!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
                                                <!--										<ul>-->
                                                <!--											<li><a href="#">Home</a></li>-->
                                                <!--											<li><a href="#">About</a></li>-->
                                                <!--											<li><a href="#">FAQs</a></li>-->
                                                <!--											<li><a href="#">Support</a></li>-->
                                                <!--											<li><a href="#">Contact</a></li>-->
                                                <!--										</ul>-->
                                                <!--									</div>-->
                                                <!---->
                                                <!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
                                                <!--										<ul>-->
                                                <!--											<li><a href="#">Shop</a></li>-->
                                                <!--											<li><a href="#">Portfolio</a></li>-->
                                                <!--											<li><a href="#">Blog</a></li>-->
                                                <!--											<li><a href="#">Events</a></li>-->
                                                <!--											<li><a href="#">Forums</a></li>-->
                                                <!--										</ul>-->
                                                <!--									</div>-->
                                                <!---->
                                                <!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
                                                <!--										<ul>-->
                                                <!--											<li><a href="#">Corporate</a></li>-->
                                                <!--											<li><a href="#">Agency</a></li>-->
                                                <!--											<li><a href="#">eCommerce</a></li>-->
                                                <!--											<li><a href="#">Personal</a></li>-->
                                                <!--											<li><a href="#">One Page</a></li>-->
                                                <!--										</ul>-->
                                                <!--									</div>-->
                                                <!---->
                                                <!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
                                                <!--										<ul>-->
                                                <!--											<li><a href="#">Restaurant</a></li>-->
                                                <!--											<li><a href="#">Wedding</a></li>-->
                                                <!--											<li><a href="#">App Showcase</a></li>-->
                                                <!--											<li><a href="#">Magazine</a></li>-->
                                                <!--											<li><a href="#">Landing Page</a></li>-->
                                                <!--										</ul>-->
                                                <!--									</div>-->
                                                <!---->
                                                <!--								</div>-->
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

                                                <div class="col-md-2 clearfix bottommargin-sm">
                                                    <a href="#"
                                                       class="social-icon si-dark si-colored si-facebook nobottommargin"
                                                       style="margin-right: 10px;">
                                                        <i class="icon-facebook"></i>
                                                        <i class="icon-facebook"></i>
                                                    </a>
                                                    <a href="#">
                                                        <small style="display: block; margin-top: 3px;"><strong>Like
                                                                us</strong><br>on
                                                            Facebook
                                                        </small>
                                                    </a>
                                                </div>

                                                <div class="col-md-2 clearfix bottommargin-sm">
                                                    <a href="#"
                                                       class="social-icon si-dark si-colored si-youtube nobottommargin"
                                                       style="margin-right: 10px;">
                                                        <i class="icon-youtube"></i>
                                                        <i class="icon-youtube"></i>
                                                    </a>
                                                    <a href="#">
                                                        <small style="display: block; margin-top: 3px;">
                                                            <strong>Subscribe</strong><br>on YouTube
                                                        </small>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 clearfix bottommargin-sm">
                                                    <a href="#"
                                                       class="social-icon si-dark si-colored si-twitter nobottommargin"
                                                       style="margin-right: 10px;">
                                                        <i class="icon-twitter"></i>
                                                        <i class="icon-twitter"></i>
                                                    </a>
                                                    <a href="#">
                                                        <small style="display: block; margin-top: 3px;"><strong>Follow
                                                                us</strong><br>on Twitter
                                                        </small>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 clearfix bottommargin-sm">
                                                    <a href="#"
                                                       class="social-icon si-dark si-colored si-instagram nobottommargin"
                                                       style="margin-right: 10px;">
                                                        <i class="icon-instagram"></i>
                                                        <i class="icon-instagram"></i>
                                                    </a>
                                                    <a href="#">
                                                        <small style="display: block; margin-top: 3px;"><strong>Follow
                                                                us</strong><br>on Instagram
                                                        </small>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 clearfix bottommargin-sm">
                                                    <a href="#"
                                                       class="social-icon si-dark si-colored si-instagram nobottommargin"
                                                       style="margin-right: 10px;">

                                                    </a>
                                                    <a href="#">
                                                        <small style="display: block; margin-top: 3px;">
                                                            <strong>Secured</strong><br>
                                                        </small>
                                                    </a>
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
                                        Developed & Designed by <a href="www.el-semicolon.nl"> El-SemiColon; </a>
                                    </div>

                                </div>

                            </div><!-- #copyrights end -->


                        </footer><!-- #footer end -->

                    </div><!-- #wrapper end -->

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

                    <script type="text/javascript">

                        $("#template-medical-form").validate({
                            submitHandler: function (form) {
                                var formButton = $(form).find('button'),
                                    formButtonText = formButton.html();

                                formButton.prop('disabled', true).html('<i class="icon-line-loader icon-spin norightmargin"></i>');
                                $(form).ajaxSubmit({
                                    target: '#medical-form-result',
                                    success: function () {
                                        formButton.prop('disabled', false).html(formButtonText);
                                        $(form).find('.form-control').val('');
                                        $('#medical-form-result').attr('data-notify-msg', $('#medical-form-result').html()).html('');
                                        SEMICOLON.widget.notifications($('#medical-form-result'));
                                    }
                                });
                            }
                        });

                    </script>

                    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
                    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
                    <script>
                        //paste this code under the head tag or in a separate js file.
                        // Wait for window load
                        $(window).load(function () {
// Animate loader off screen
                            $(".se-pre-con").fadeOut("slow");
                        });

                        $(window).load(function () {
// Animate loader off screen
                            $(".pre-pre").fadeOut("slow");
                        });
                    </script>

                    </body>
                    </html>

                    <?php
                } else {
                    $update_query = "UPDATE `PAID_EXAM` SET `STATUS` = 'NOT ACTIVE' WHERE `PAYMENT_ID` = '{$payment_id}'";
                    $result_update = mysqli_query($mysqli, $update_query);

                    header("Location: pricing_table.php");

            }
            }
        }
    }

}

    ?>