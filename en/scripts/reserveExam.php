<?php

require_once('../include/phpmailer/PHPMailerAutoload.php');

$toemails = array();

$toemails[] = array(
				'email' => 'alrawitheorie@gmail.com', // Your Email Address
				'name' => 'AlRawi Theorie' // Your Name
			);

// Form Processing Messages
$message_success = 'قمنا باستلام طلب الحجز الخاص بك بنجاح. سيتم التواصل معكم في أقرب فرصة ممكنة!';

// Add this only if you use reCaptcha with your Contact Forms
$recaptcha_secret = ''; // Your reCaptcha Secret

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);
// If you intend you use SMTP, add your SMTP Code after this Line


if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$firstName = $_POST['first-name'];
	$lastName = $_POST['last-name'];
	$name = $firstName . " " . $lastName;
	$bsn = $_POST['bsn'];
    $dob = $_POST['dob'];
    $strName = $_POST['str-name'];
    $houseNum = $_POST['house-num'];
    $postcode = $_POST['postcode'];
    $cityName = $_POST['city-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$place = $_POST['place'];
    $dateAndTime = $_POST['dateAndTime'];
    $dialect = $_POST['dialect'];
    $note = $_POST['note'];


	$subject = 'حجز إمتحان نظري مع مترجم';


		$mail->SetFrom( $email , $name );
		$mail->AddReplyTo( $email , $name );
		foreach( $toemails as $toemail ) {
			$mail->AddAddress( $toemail['email'] , $toemail['name'] );
		}
		$mail->Subject = $subject;

		$name = isset($name) ? "الاسم: $name<br><br>" : '';
        $bsn = isset($bsn) ? "BSN: $bsn<br><br>" : '';
        $dob = isset($dob) ? "تاريخ الميلاد: $dob<br><br>" : '';
    $strName = isset($strName) ? "اسم الشارع: $strName<br><br>" : '';
    $houseNum = isset($houseNum) ? "رقم الشارع: $houseNum<br><br>" : '';
    $postcode = isset($postcode) ? "الرمز البريدي: $postcode<br><br>" : '';
    $cityName = isset($cityName) ? "اسم المدينة: $cityName<br><br>" : '';
    $email = isset($email) ? "البريد الإلكتروني: $email<br><br>" : '';
    $phone = isset($phone) ? "رقم الهاتف: $phone<br><br>" : '';
    $place = isset($place) ? "المكان المرغوب للتقديم: $place<br><br>" : '';
    $dateAndTime = isset($dateAndTime) ? "التاريخ المرغوب للتقديم: $dateAndTime<br><br>" : '';
    $dialect = isset($dialect) ? "اللهجة: $dialect<br><br>" : '';
    $note = isset($note) ? "الملاحظات الإضافية: $note<br><br>" : '';

		$body = "
	
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
    <td class=\"hero-subheader__title\" style=\"direction:rtl;font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;\" align=\"center\">حجز إمتحان نظري</td>
</tr>

<tr>
    <td class=\"hero-subheader__content\" style=\"direction:rtl;font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 90px 0;\" align=\"right\">
    		$name $bsn $dob $strName $houseNum $postcode $cityName $email $phone $place $dateAndTime $dialect $note
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

		// Uncomment the following Lines of Code if you want to Force reCaptcha Validation

		// if( !isset( $_POST['g-recaptcha-response'] ) ) {
		// 	echo '{ "alert": "error", "message": "Captcha not Submitted! Please Try Again." }';
		// 	die;
		// }

		$mail->MsgHTML( $body );
		$sendEmail = $mail->Send();

		if( $sendEmail == true ):
			echo $message_success;
		else:
			echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
		endif;

} else {
	echo '{ "alert": "error", "message": "An <strong>unexpected error</strong> occured. Please Try Again later." }';
}

?>