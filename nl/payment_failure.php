<?php
/**
 * Created by PhpStorm.
 * User: aylos
 * Date: 8/12/2017
 * Time: 3:34 م
 */
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 30-11-2017
 * Time: 19:50
 */
session_start();
ob_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}

$_SESSION['period'] = null;
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


    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/daterangepicker.css" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


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

    <link rel="stylesheet" href="css/colors.php?color=DE6262" type="text/css" />

    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Payment Failure </title>
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
                                        <li><a href="adminAlrawi/dashboard.php" dir="rtl">لوحة التحكم <i class="icon-wrench"></i></a></li>
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
                        <li><a target="_blank" href="https://www.theorie-leren.nl/shop/school/al-rawi-theorie.html"><div>فحوص الإنجليزي والهولندي</div></a></li>                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->

    <!-- Content
    ============================================= -->
    <section id="content" style="width: 100%">

        <div class="content-wrap">

            <div class="container clearfix " style="width: 100%; direction: rtl">

						<h4 class="text-center">لقـد حدث خطـأ اثنـاء عمليـة الدفـع يرجى المعاودة في وقت لاحق</h4>

						<div class="style-msg2 errormsg">
							<div class="msgtitle">راجــع الاسبــاب التاليــة :</div>
							<div class="sb-msg">

								<ul style="margin-right:10px ">
									<li>من المحتمل عدم تواجد رصيد كافي في حسابك.</li>
									<li>من المحتمل ان يكون هناك خطأ وقع اثناء عملية الاتصال بالبنك.</li>
									<li>من المحتمل ان الاتصال بالانترنت قد انقطع. </li>
									<li> من المحتمل ان يكون السيرفر متوقف.</li>
								</ul>
							</div>
						</div>

                <div class="center">
                    <a href="profile.php" class="button button-rounded button-reveal button-large button-border "><i class="icon-user"></i><span>اذهب الى الصفحة الشخصية</span></a>
                </div>

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

                        <div class="row">
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


<!-- Date & Time Picker JS -->
<script type="text/javascript" src="js/components/moment.js"></script>
<script type="text/javascript" src="demos/travel/js/datepicker.js"></script>
<script type="text/javascript" src="js/components/timepicker.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="js/components/daterangepicker.js"></script>

<!-- Footer Scripts
============================================= -->

<script type="text/javascript">
    $(function() {
        $('.travel-date-group .default').datepicker({
            autoclose: true,
            startDate: "today",
        });111111111

        $('.travel-date-group .today').datepicker({
            autoclose: true,
            startDate: "today",
            todayHighlight: true
        });

        $('.travel-date-group .past-enabled').datepicker({
            autoclose: true,
        });
        $('.travel-date-group .format').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
        });

        $('.travel-date-group .autoclose').datepicker();

        $('.travel-date-group .disabled-week').datepicker({
            autoclose: true,
            daysOfWeekDisabled: "0"
        });

        $('.travel-date-group .highlighted-week').datepicker({
            autoclose: true,
            daysOfWeekHighlighted: "0"
        });

        $('.travel-date-group .mnth').datepicker({
            autoclose: true,
            minViewMode: 1,
            format: "mm/yy"
        });

        $('.travel-date-group .multidate').datepicker({
            multidate: true,
            multidateSeparator: " , "
        });

        $('.travel-date-group .input-daterange').datepicker({
            autoclose: true
        });

        $('.travel-date-group .inline-calendar').datepicker();

        $('.datetimepicker').datetimepicker({
            showClose: true
        });

        $('.datetimepicker1').datetimepicker({
            format: 'HH:mm',
            showClose: false
        });

        $('.datetimepicker2').datetimepicker({
            inline: true,
            sideBySide: true
        });

    });

    $(function() {
        // .daterange1
        $(".daterange1").daterangepicker({
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light"
        });

        // .daterange2
        $(".daterange2").daterangepicker({
            "opens": "center",
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            },
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light"
        });

        // .daterange3
        $(".daterange3").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            },
            function(start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old.");
            });

        // reportrange
        function cb(start, end) {
            $(".reportrange span").html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        cb(moment().subtract(29, 'days'), moment());

        $(".reportrange").daterangepicker({
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light",
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        // .daterange4
        $(".daterange4").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light"
        });

        $(".daterange4").on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $(".daterange4").on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });

</script>

</body>
</html>