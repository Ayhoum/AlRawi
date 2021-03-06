<?php

session_start();
ob_start();
include 'scripts/db_connection.php';
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
$countSucceeded = 0;
$countOthers = 0;
$email = $_SESSION['email'];
$query = "SELECT * FROM Users WHERE EMAIL = '{$email}'";
$select_users = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_users)) {
    $userID = $row['ID'];
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
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


    <!--  Pricing Tables Style  -->
    <link rel="stylesheet" href="css/components/pricing-table.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />



    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Home</title>
    <link rel="icon" href="images/1.png" type="image/x-icon">

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




</head>

<!--<body class="stretched" data-loader-html="<div id='css3-spinner-svg-pulse-wrapper'><svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='http://www.w3.org/2000/svg' viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'><path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round' d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' /></svg></div>">-->
<body style="background: #fde7e7">
<div class="se-pre-con"><div class="pre-pre"></div></div>


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
                        <li><a href="#">WhatsApp: +31-687460636</a></li>
                        <li><a href="#" class="nott"><i class="icon-envelope2"></i> info@alrawitheorie.nl</a></li>
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
                        <?php if(!isset($_SESSION['role'])) { ?>
                            <li><a href="#" class="button-red" style="color:#fff;">حسابي</a>
                                <ul>
                                    <li><a href="login.php" dir="rtl">تسجيل الدخول <i class="icon-line2-login"></i></a></li>
                                    <li><a href="signup.php" dir="rtl">حساب جديد! <i class="icon-line2-pencil"></i></a></li>
                                </ul>
                            </li>
                        <?php }
                        else { ?>
                            <li><a href="#" class="button-red" style="color:#fff;"><?php echo $_SESSION['username']; ?></a>
                                <ul>
                                    <?php if($_SESSION['role'] == "MainAdmin"){?>
                                        <li><a href="dashboardAlrawi/index.php" dir="rtl">لوحة التحكم <i class="icon-wrench"></i></a></li>
                                    <?php } else { ?>
                                        <li><a href="profile.php" dir="rtl">الملف الشخصي <i class="icon-user"></i></a></li>
                                    <?php } ?>
                                    <li><a href="logout.php" dir="rtl">تسجيل الخروج <i class="icon-line2-logout"></i></a></li>
                                </ul>
                            </li>
                        <?php } ?>

<!--                        <li><a href="" data-scrollto="#booking-appointment-form" data-offset="100" data-easing="easeInOutExpo" data-speed="1200" class="bgcolor" style="color:#fff;">احجز امتحانك</a></li>-->

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
                    <a href="index.php" class="standard-logo"><img src="images/1.png" alt="Canvas Logo"></a>
                    <a href="index.php" class="retina-logo"><img src="images/2.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-3">

                    <ul>
                        <li class="current"><a href="index.php"><div>الصفحة الرئيسية</div></a></li>
                        <li><a target="_blank" href="blog.php"><div>المدونة</div></a></li>
                        <li><a target="_blank" href="https://www.theorie-leren.nl/shop/school/al-rawi-theorie.html"><div>فحوص الإنجليزي والهولندي</div></a></li>
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->

    <!-- Content
		============================================= -->

    <section id="content" style="width: 100%;">

            <div class="container clearfix ">



<!--    <div class="divider"><i class="icon-circle"></i></div>-->


    <div class="fancy-title title-dotted-border title-center topmargin-lg">
        <h2 class="pricing-section--title center" style="color: #0f0e0f">إشتر إحدى الباقات التالية</h2>
    </div>

                <div class="center-block text-center bottommargin" style="font-size: 16px;color: red; font-weight: 700">
                    <span>كافة الباقات تحتوي الإمتحانات ذاتها أما الإختلاف فهو بمدة الإشتراك</span>
                </div>
    <div class="pricing bottommargin clearfix">

        <div class="col-md-3">

            <div class="pricing-box">
                <div class="pricing-title">
                    <h3 class="text-center">البــاقة  الابتدائيــة</h3>
                </div>
                <?php
                $query = "SELECT * FROM PRICES WHERE Period = 'FPAKKET'";
                $select_price1 = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_price1)) {
                    $eur = $row['AmountEur'];
                    $cen = $row['AmountCen'];
                    $txt = $row['Text'];
                }
                ?>
                <div class="pricing-price">
                    <span class="price-unit">€</span><?php echo $eur; ?><span style="font-size: 14px;">.<?php echo $cen; ?></span>
                </div>
                <div class="pricing-features">
                    <ul>
                        <li> صلاحية الدخول لجميع<strong> الامتحانات العربيـة</strong></li>
                        <li>صالحة لمدة<strong> <?php echo $txt; ?> </strong></li>
                    </ul>
                </div>
                <div class="pricing-action">
                    <a href="payment_1.php?user_id=<?php echo $userID;?>" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                </div>
            </div>

        </div>

        <div class="col-md-3">
        <div class="pricing-box best-price">
            <div class="pricing-title ">
                <h3 class="text-center">البـاقة الأسـاسيــة</h3>
                <span> الأكثــر مبيــعاً</span>
            </div>
            <?php
            $query = "SELECT * FROM PRICES WHERE Period = 'SPAKKET'";
            $select_price1 = mysqli_query($mysqli, $query);
            while($row = mysqli_fetch_assoc($select_price1)) {
                $eur = $row['AmountEur'];
                $cen = $row['AmountCen'];
                $txt = $row['Text'];
            }
            ?>
            <div class="pricing-price">
                <span class="price-unit">€</span><?php echo $eur; ?><span style="font-size: 14px;">.<?php echo $cen; ?></span>
            </div>
            <div class="pricing-features">
                <ul>
                    <li> صلاحية الدخول لجميع<strong> الامتحانات العربيـة</strong></li>
                    <li>صالحة لمدة<strong> <?php echo $txt; ?> </strong></li>
                </ul>
            </div>
            <div class="pricing-action">
                <a href="payment_2.php?user_id=<?php echo $userID;?>" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
            </div>
        </div>

        </div>

        <div class="col-md-3">

            <div class="pricing-box">
                <div class="pricing-title">
                    <h3 class="text-center">البــاقة المتقدمــة</h3>
                </div>
                <?php
                $query = "SELECT * FROM PRICES WHERE Period = 'TPAKKET'";
                $select_price1 = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_price1)) {
                    $eur = $row['AmountEur'];
                    $cen = $row['AmountCen'];
                    $txt = $row['Text'];
                }
                ?>
                <div class="pricing-price">
                    <span class="price-unit">€</span><?php echo $eur; ?><span style="font-size: 14px;">.<?php echo $cen; ?></span>
                </div>
                <div class="pricing-features">
                    <ul>
                        <li> صلاحية الدخول لجميع<strong> الامتحانات العربيـة</strong></li>
                        <li>صالحة لمدة<strong> <?php echo $txt; ?> </strong></li>
                    </ul>
                </div>
                <div class="pricing-action">
                    <a href="payment_4.php?user_id=<?php echo $userID;?>" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                </div>
            </div>

        </div>

        <div class="col-md-3">

            <div class="pricing-box">
                <div class="pricing-title">
                    <h3 class="text-center">الباقـة الانكليزية والهولندية</h3>
                </div>
                <div class="pricing-price">
                    <span class="price-unit">بحسـب الباقـة</span>
                </div>
                <div class="pricing-features">
                    <ul>
                        <li> صلاحية الدخول لجميع الامتحانات<strong> الانكليـزية</strong></li>
                        <li> صلاحية الدخول لجميع الامتحانات<strong> الهولنديـة</strong></li>
                    </ul>
                </div>
                <div class="pricing-action">
                    <a href="https://www.theorie-leren.nl/shop/school/al-rawi-theorie.html" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                </div>
            </div>

        </div>



    </div>

            </div>
    </section>



    <div class="center bottommargin-lg">
        <a href="profile.php" class="button button-rounded button-reveal button-large button-border "><i class="icon-user"></i><span>العودة إلى الصفحة الشخصية</span></a>
    </div>




    <!-- Footer
    ============================================= -->
    <footer id="footer" style="background-color: #F5F5F5;border-top: 2px solid rgba(0,0,0,0.06);">

        <div class="container" style="border-bottom: 1px solid rgba(0,0,0,0.06);">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col_full">

                    <div class="widget clearfix">

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
                                    <span>WhatsApp:</span>
                                    +31-687460636
                                    <span>سنسعى للرد خلال 24 ساعة</span>
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
                                <a target="_blank" href="https://ar-ar.facebook.com/Alrawi1rijbewijs/" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a target="_blank" href="https://ar-ar.facebook.com/Alrawi1rijbewijs/"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>

                            <div class="col-md-4 clearfix bottommargin-sm">
                                <a target="_blank" href="https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw" class="social-icon si-dark si-colored si-youtube nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-youtube"></i>
                                    <i class="icon-youtube"></i>
                                </a>
                                <a target="_blank" href="https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>on YouTube</small></a>
                            </div>
                            <div class="col-md-4 clearfix bottommargin-sm">
                                <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=bS2dmJ42SXiBo81RyJN9genp1MWdffCftw7i4uOYRX2mh7vBMQkfmrRq2jue"></script></span>
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
                    <div class="copyright-links"><a href="terms_and_conditions.php">شروط الإستخدام</a> / <a href="terms_and_conditions.php">سياسات الخصوصية</a></div>
                </div>

                <div class="text-center topmargin-sm">
                    Developed & Designed by <a target="_blank" href="http://www.el-semicolon.nl"> El-SemiColon; <img src="images/logoES.png" style="width: 64px;height: 64px;"/> </a>
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
        submitHandler: function(form) {
            var formButton = $(form).find('button'),
                formButtonText = formButton.html();

            formButton.prop('disabled', true).html('<i class="icon-line-loader icon-spin norightmargin"></i>');
            $(form).ajaxSubmit({
                target: '#medical-form-result',
                success: function() {
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
    $(window).load(function() {
// Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

    $(window).load(function() {
// Animate loader off screen
        $(".pre-pre").fadeOut("slow");
    });
</script>

</body>
</html>
