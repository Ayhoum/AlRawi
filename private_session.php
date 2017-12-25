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
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
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
                $time    = $_POST['time'];
                $date    = $_POST['date'];
                $subject = $_POST['subject'];
                $status = "UNAPPROVED";
                $date2 =  date('Y-m-d', strtotime($date));


//               date_default_timezone_get('Europe/Amsterdam');


                $query2 = "INSERT INTO `BOOKED_SESSION` (`DATE`, `TIME`, `SUBJECT`, `STATUS`,  `Users_ID`)";
                $query2 .= " VALUES ('{$date2}',
                                     '{$time}',
                                     '{$subject}',
                                     '{$status}',
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
    $mail->CharSet = 'UTF-8';
    $mail->IsHTML(true);

    $body             = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
	<title>Portfolio - Responsive Email Template</title>
	<style type=\"text/css\">
		/* ----- Custom Font Import ----- */
		/*@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);*/
		@import url(https://fontlibrary.org/face/droid-arabic-kufi);

		/* ----- Text Styles ----- */
		table{
			font-family: 'DroidArabicKufiRegular';
			-webkit-font-smoothing: antialiased;
			-moz-font-smoothing: antialiased;
			font-smoothing: antialiased;
		}

		@media only screen and (max-width: 700px){
			/* ----- Base styles ----- */
			.full-width-container{
				padding: 0 !important;
			}

			.container{
				width: 100% !important;
			}

			/* ----- Header ----- */
			.header td{
				padding: 30px 15px 30px 15px !important;
			}

			/* ----- Projects list ----- */
			.projects-list{
				display: block !important;
			}

			.projects-list tr{
				display: block !important;
			}

			.projects-list td{
				display: block !important;
			}

			.projects-list tbody{
				display: block !important;
			}

			.projects-list img{
				margin: 0 auto 25px auto;
			}

			/* ----- Half block ----- */
			.half-block{
				display: block !important;
			}

			.half-block tr{
				display: block !important;
			}

			.half-block td{
				display: block !important;
			}

			.half-block__image{
				width: 100% !important;
				background-size: cover;
			}

			.half-block__content{
				width: 100% !important;
				box-sizing: border-box;
				padding: 25px 15px 25px 15px !important;
			}

			/* ----- Hero subheader ----- */
			.hero-subheader__title{
				padding: 80px 15px 15px 15px !important;
				font-size: 35px !important;
			}

			.hero-subheader__content{
				padding: 0 15px 90px 15px !important;
			}

			/* ----- Title block ----- */
			.title-block{
				padding: 0 15px 0 15px;
			}

			/* ----- Paragraph block ----- */
			.paragraph-block__content{
				padding: 25px 15px 18px 15px !important;
			}

			/* ----- Info bullets ----- */
			.info-bullets{
				display: block !important;
			}

			.info-bullets tr{
				display: block !important;
			}

			.info-bullets td{
				display: block !important;
			}

			.info-bullets tbody{
				display: block;
			}

			.info-bullets__icon{
				text-align: center;
				padding: 0 0 15px 0 !important;
			}

			.info-bullets__content{
				text-align: center;
			}

			.info-bullets__block{
				padding: 25px !important;
			}

			/* ----- CTA block ----- */
			.cta-block__title{
				padding: 35px 15px 0 15px !important;
			}

			.cta-block__content{
				padding: 20px 15px 27px 15px !important;
			}

			.cta-block__button{
				padding: 0 15px 0 15px !important;
			}
		}
	</style>

	<!--[if gte mso 9]><xml>
	<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
	</o:OfficeDocumentSettings>
</xml><![endif]-->
</head>

<body style=\"padding: 0; margin: 0;\" bgcolor=\"#eeeeee\">

<!-- / Full width container -->
<table class=\"full-width-container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" bgcolor=\"#eeeeee\" style=\"width: 100%; height: 100%; padding: 30px 0 30px 0;\">
	<tr>
		<td align=\"center\" valign=\"top\">
			<!-- / 700px container -->
			<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"700\" bgcolor=\"#ffffff\" style=\"width: 700px;\">
				<tr>
					<td align=\"center\" valign=\"top\">
						<!-- / Header -->
						<table class=\"container header\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" style=\"width: 620px;\">
							<tr>
								<td class=\"info-bullets__block\" style=\"padding: 30px 30px 15px 30px;\" align=\"center\">
									<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
										<tr>
											<td align=\"center\" width=\"60\" height=\"2\" style=\" width: 60px; height: 2px; font-size: 1px;\"><img src=\"http://shop.alrawitheorie.nl/images/2.png\"></td>
										</tr>
									</table>
								</td>

							</tr>
						</table>
						<!-- /// Header -->

						<!-- / Hero subheader -->
						<table class=\"container hero-subheader\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" style=\"width: 620px;\">
							<tr>
								<td class=\"hero-subheader__title\" style=\"direction:rtl;font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;\" align=\"center\">أهلاً وسهلا بكم!</td>
							</tr>

							<tr>
								<td class=\"hero-subheader__content\" style=\"direction:rtl;font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 90px 0;\" align=\"right\">طلب جديد من $username لإجراء جلسة خاصة.
								<br>يرجى تسجيل الدخول للوحة التحكم للإطلاع على التفاصيل والموافقة على الجلسة
								</td>
							</tr>
						</table>
						<!-- /// Hero subheader -->



						<!-- / Divider -->
						<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"padding-top: 25px;\" align=\"center\">
							<tr>
								<td align=\"center\">
									<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" align=\"center\" style=\"border-bottom: solid 1px #eeeeee; width: 620px;\">
										<tr>
											<td align=\"center\">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!-- /// Divider -->

						<!-- / Info Bullets -->
						<table class=\"container info-bullets\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
							<tr>
								<td align=\"center\">
									<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" align=\"center\" style=\"width: 620px;\">
										<tr>
											<td class=\"info-bullets__block\" style=\"padding: 30px 30px 15px 30px;\" align=\"center\">
												<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
													<tr>
														<td class=\"info-bullets__icon\" style=\"padding: 0 15px 0 0;\">
															<img src=\"https://cdn1.iconfinder.com/data/icons/material-communication/20/email-32.png\">
														</td>

														<td class=\"info-bullets__content\" style=\"color: #969696; font-size: 16px;\">info@alrawitheorie.nl</td>
													</tr>
												</table>
											</td>
										</tr><tr>
											<td class=\"info-bullets__block\" style=\"padding: 30px 30px 15px 30px;\" align=\"center\">
												<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
													<tr>
														<td class=\"info-bullets__icon\" style=\"padding: 0 15px 0 0;\">
															<img src=\"https://cdn1.iconfinder.com/data/icons/material-communication/18/phone-32.png\">
														</td>

														<td class=\"info-bullets__content\" style=\"color: #969696; font-size: 16px;\">(541) 754-3010</td>
													</tr>
												</table>
											</td>

										</tr>

										<tr>
											<td class=\"info-bullets__block\" style=\"padding: 30px;\" align=\"center\">
												<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
													<tr>
														<td class=\"info-bullets__icon\" style=\"padding: 0 15px 0 0;\">
															<img src=\"https://cdn2.iconfinder.com/data/icons/finance-solid-icons-vol-3/48/106-32.png\">
														</td>

														<td class=\"info-bullets__content\" style=\"color: #969696; font-size: 16px;\">Huizen, The Netherlands</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!-- /// Info Bullets -->

						<!-- / Social nav -->
						<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
							<tr>
								<td align=\"center\">
									<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" align=\"center\" style=\"border-top: 1px solid #eeeeee; width: 620px;\">
										<tr>
											<td align=\"center\" style=\"padding: 30px 0 30px 0;\">
												<a href=\"https://ar-ar.facebook.com/Alrawi1rijbewijs/\">
													<img src=\"https://cdn2.iconfinder.com/data/icons/social-media-2151/512/1_Media_social_website_facebook-48.png\" border=\"0\">
												</a>
											</td>

											<td align=\"center\" style=\"padding: 30px 0 30px 0;\">
												<a href=\"https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw\">
													<img src=\"https://cdn2.iconfinder.com/data/icons/social-media-2151/512/11_Media_social_website_youtube-48.png\" border=\"0\">
												</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!-- /// Social nav -->

						<!-- / Footer -->
						<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
							<tr>
								<td align=\"center\">
									<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" align=\"center\" style=\"border-top: 1px solid #eeeeee; width: 620px;\">
										<tr>
											<td style=\"text-align: center; padding: 50px 0 10px 0;\">
												<a href=\"#\" style=\"font-size: 28px; text-decoration: none; color: #d5d5d5;\">Al Rawi Theorie</a>
											</td>
										</tr>

										<tr>
											<td align=\"middle\">
												<table width=\"60\" height=\"2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 60px; height: 2px;\">
													<tr>
														<td align=\"middle\" width=\"60\" height=\"2\" style=\" width: 60px; height: 2px; font-size: 1px;\"><img src=\"http://shop.alrawitheorie.nl/images/1.png\"></td>
													</tr>
												</table>
											</td>
										</tr>

										<tr>
											<td style=\"color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;\">Copyright &copy; 2018 <a href=\"http://www.alrawitheorie.nl/\" target=\"_blank\" style=\"text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;\">Al Rawi Theorie</a>. <br />All rights reserved.</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!-- /// Footer -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>";


    $address1= "alrawitheorie@gmail.com";


    $mail->AddAddress($address1);

    $mail->Subject    = "New Private Session";

    $mail->MsgHTML($body);

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


    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.css" type="text/css" />
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
                        <li><a href="#"><i class="icon-phone3"></i> +31-687460636</a></li>
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
                                        <li><a href="dashboardAlrawi/index.php" dir="rtl">لوحة التحكم <i class="icon-wrench"></i></a></li>
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
    <section id="content" style="width: 100%">

        <div class="content-wrap">

            <div class="container clearfix text-center" style="width: 100%;">

                <form action="private_session.php" method="post" class="nobottommargin">
                    <div class="input-daterange travel-date-group bottommargin-sm">
                        <div class="row">
                            <h2 class="text-center">اختر تاريخ وموعد الجلسة مع الاستاذ حسام الراوي</h2>
                            <h3 class="text-center" style="direction: rtl; color: red">تكلفة الجلسة 5.00 € لمدة ساعة</h3>
                            <h5 class="text-center" >بعد الانتهاء من حجز الموعد سوف يتم الرد عليك من قبل الأستاذ حسام بقبول أو عدم قبول موعد الجلسة<br>في حال قبول الموعد سوف يتم إرسال طلب الدفع إليك حيث يمكنك الدفع من خلال تسجيل الدخول إلى صفحتك الشخصية</h5>

                            <div class="clear"></div>
                            <div class="col-sm-3"></div>

                            <div class="col-sm-6 bottommargin-sm">


                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" style="width: 100%;"  placeholder="املأ موضوع للجلسة"/>
                                </div>
                                <div class="clear"></div>

                                <div class="input-group">
                                    <input type="text" name= "date" value="" class="sm-form-control tleft default" placeholder="التاريخ">
                                    <span class="input-group-addon"  style="padding: 9px 12px;">
											<i class="icon-calendar2"></i>
                                    </span>
                                </div>

                                <div class="clear"></div>

                                    <div class="input-group date">
                                        <input type="text" name="time" class="tleft sm-form-control datetimepicker1"  placeholder="الساعة"/>
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
                                    <span>Call Us:</span>
                                    +31-687460636
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
                    Developed & Designed by <a target="_blank" href="http://www.el-semicolon.nl"> El-SemiColon; <img src="images/logoES.png" style="width: 64px;height: 64px;"/></a>
                </div>

            </div>

        </div><!-- #copyrights end -->


    </footer><!-- #footer end -->
    </section><!-- #content end -->
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
<script type="text/javascript" src="scripts/datepicker.js"></script>
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