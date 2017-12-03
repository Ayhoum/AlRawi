<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 30-11-2017
 * Time: 19:50
 */
session_start();
ob_start();
require_once('phpmailer/class.phpmailer.php');
include 'scripts/db_connection.php';

?>

<?php
if (isset($_SESSION['username'])){

    $username = $_SESSION['username'];
    $query1  = "SELECT * FROM Users WHERE NAME = '{$username}'";
    $result1 = mysqli_query($mysqli, $query1);
    if (mysqli_num_rows($result1) > 0 ) {

        while ($row = mysqli_fetch_assoc($result1)) {

            $user_id = $row['ID'];


            if (isset($_POST['submit'])) {
                $time = $_POST['time'];
                $date = $_POST['date'];

                $date2 =  date('Y-m-d', strtotime($date));


//               date_default_timezone_get('Europe/Amsterdam');


                $query2 = "INSERT INTO BOOKED_SESSION (DATE, TIME, Users_ID)";
                $query2 .= " VALUES ('{$date2}',
                                     '{$time}',
                                     '{$user_id}')";
                $result2 = mysqli_query($mysqli, $query2);


            }


        }

    }

}

?>
<?php
if(isset($_POST['submit'])){


    $mail             = new PHPMailer(); // defaults to using php "mail()"

    $body             = "A new session has been applied form a student login to your dashboard to check it !";


    $address1= "semsemea.a@hotmail.com";

    $address3="aylosa@outlook.com";

    $mail->AddAddress($address1);

    $mail->AddbCC($address3);

    $mail->Subject    = "New Session";

    $mail->MsgHTML($body);
//    $pdf= "{$senderf}{$receiverf}{$mtrn1}{$mtrn5}{$mtrn10}{$agentid}{$accountid}.pdf";
//    $mail->AddAttachment("transaction_pdf/$pdf");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        header("Location: profile.php");
    }


}

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

    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="demos/travel/css/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/daterangepicker.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
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
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/colors.php?color=DE6262" type="text/css" />

    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Private Session</title>
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
                        <li><a href="#"><i class="icon-phone3"></i> +31-1234567890</a></li>
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
                                        <li><a href="adminAlrawi/dashboard.php" dir="rtl">لوحة التحكم <i class="icon-wrench"></i></a></li>
                                    <?php } else { ?>
                                        <li><a href="profile.php" dir="rtl">الملف الشخصي <i class="icon-user"></i></a></li>
                                    <?php } ?>
                                    <li><a href="logout.php" dir="rtl">تسجيل الخروج <i class="icon-line2-logout"></i></a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <li><a href="" data-scrollto="#booking-appointment-form" data-offset="100" data-easing="easeInOutExpo" data-speed="1200" class="bgcolor" style="color:#fff;">احجز امتحانك</a></li>

                    </ul>
                </div>
                <!-- .top-links end -->

            </div>

        </div>

    </div><!-- #top-bar end -->

    <!-- Header
    ============================================= -->
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
                        <li class="current"><a href="#"><div>الصفحة الرئيسية</div></a></li>
                        <li><a href="#"><div>خدماتنا</div></a></li>
                        <li><a href="#"><div>من نحن؟</div></a></li>
                        <!--<li><a href="#"><div>تسجيل الدخول</div></a></li>-->
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->

    <!-- Content
    ============================================= -->
    <section id="content style="width: 100%">

        <div class="content-wrap">

            <div class="container clearfix text-center" style="width: 100%;">

                <form action="#" method="post" class="nobottommargin">
                    <div class="input-daterange travel-date-group bottommargin-sm">
                        <div class="row">
                            <h2 class="text-center">اختر تاريخ وموعد الجلسة مع الاستاذ حسام الراوي</h2>
                            <div class="clear"></div>
                            <div class="col-sm-3"></div>

                            <div class="col-sm-6 bottommargin-sm">
                                <div class="input-group">
                                    <input type="text" name= "date" value="" class="sm-form-control tleft default" placeholder="MM/DD/YYYY">
                                    <span class="input-group-addon"  style="padding: 9px 12px;">
											<i class="icon-calendar2"></i>
                                    </span>
                                </div>

                                    <div class="input-group date">
                                        <input type="text" name="time" class="tleft sm-form-control datetimepicker1"  placeholder="00:00"/>
                                        <span class="input-group-addon" >
											<span class="icon-clock"></span>
                                    </span>
                                    </div>


                            </div>
                            <div class="col-sm-3"></div>

                        </div>
                        <div class="row">
                            <div class="clear"></div>
                            <input type="submit" name="submit" class="button button-rounded button-reveal button-large button-red tright" value="ارسال" >

                        </div>
                    </div>
                </form>
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
                        <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin row clearfix">
                            <div class="col-md-9">
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="sm-form-control required email" placeholder="أدخل بريدك الإلكتروني ليصلك كل جديد حول موقعنا">
                            </div>
                            <div class="col-md-3">
                                <button class="button button-rounded nomargin center btn-block" type="submit">اشترك معنا</button>
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
                                <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>

                            <div class="col-md-2 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-youtube nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-youtube"></i>
                                    <i class="icon-youtube"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>on YouTube</small></a>
                            </div>
                            <div class="col-md-2 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on Twitter</small></a>
                            </div>
                            <div class="col-md-2 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-instagram nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on Instagram</small></a>
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
<script type="text/javascript" src="js/functions.js"></script>

<script type="text/javascript">
    $(function() {
        $('.travel-date-group .default').datepicker({
            autoclose: true,
            startDate: "today",
        });

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