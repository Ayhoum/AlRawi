<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
require_once 'phpmailer/class.phpmailer.php';
if(isset($_POST['forgot_submit'])) {

    $email = $_POST['forgot_username'];
    $email = mysqli_real_escape_string($mysqli, $email);


    $query = "SELECT * From Users WHERE EMAIL = '{$email}' ";
    $getAgent = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($getAgent) == 1) {
        while ($row = mysqli_fetch_assoc($getAgent)) {
            $id = $row['ID'];
        }
    }



    $code = rand(10000,99999);

    $codeQuery = "INSERT INTO PASSWORD_RESET (USER_ID, CODE) VALUES ('{$id}', '{$code}') ";
    $insertCode = mysqli_query($mysqli,$codeQuery);



    $mail             = new PHPMailer(); // defaults to using php "mail()"
    $mail->CharSet = 'UTF-8';
    $mail->IsHTML(true);

    $body             = "







<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
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
								<td class=\"hero-subheader__title\" style=\"direction:rtl;font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;\" align=\"center\">إعادة تعيين كلمة المرور</td>
							</tr>

							<tr>
								<td class=\"hero-subheader__content\" style=\"direction:rtl;font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 90px 0;\" align=\"right\">الكود الخاص بك:<br>
								$code
								</td>
							</tr>
						</table>

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
</html>
";


    $address1= $email;
    $mail->AddAddress($address1);

    $mail->Subject    = "إستعادة كلمة المرور";

    $mail->MsgHTML($body);

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    header("Location: insert_code.php");

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
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Log In</title>

</head>

<body class="stretched" style="background: #fde7e7">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #fde7e7;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container vertical-middle divcenter clearfix">

                    <div class="row center">
                        <a href="index.php"><img src="images/2.png" alt="Al Rawi Logo"></a>
                    </div>

                    <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                        <div class="panel-body" style="padding: 40px;">
                            <form id="login_form" name="forgot_form" class="nobottommargin" action="forgot_password.php" method="post">
                                <h3 class="text-center">قم باستعادة كلمة المرور</h3>

                                <div class="col_full">
                                    <label for="forgot_username">البريد الإلكتروني:</label>
                                    <input type="email" id="forgot_username" name="forgot_username" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" style="width: 100%" id="forgot_submit" name="forgot_submit" value="Retrieve">استعادة</button>
                                </div>
                                <div class="col_full topmargin-sm nobottommargin">
                                    <a href="login.php" class="fright text-center" style="width: 100%">تسجيل الدخول</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row center"><small>Copyrights &copy; All Rights Reserved by Alrawi Theorie Wbsite</small></div>
                    <div class="row center"><small>Developed by <a target="_blank" href="http://www.el-semicolon.nl">El-Semicolon</a></small></div>

                </div>
            </div>

        </div>

    </section><!-- #content end -->

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

</body>
</html>