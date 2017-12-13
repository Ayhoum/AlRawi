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

		$body = "$name $bsn $dob $strName $houseNum $postcode $cityName $email $phone $place $dateAndTime $dialect $note";

		// Uncomment the following Lines of Code if you want to Force reCaptcha Validation

		// if( !isset( $_POST['g-recaptcha-response'] ) ) {
		// 	echo '{ "alert": "error", "message": "Captcha not Submitted! Please Try Again." }';
		// 	die;
		// }

		$mail->MsgHTML( $body );
		$sendEmail = $mail->Send();

		if( $sendEmail == true ):
			echo '{ "alert": "success", "message": "' . $message_success . '" }';
		else:
			echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
		endif;

} else {
	echo '{ "alert": "error", "message": "An <strong>unexpected error</strong> occured. Please Try Again later." }';
}

?>