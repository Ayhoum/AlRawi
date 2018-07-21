<?php

session_start();
ob_start();
include '../db_connection.php';
require '../PHPMailer/PHPMailerAutoload.php';
require('../fpdf/fpdf.php');
require ('../fpdf/invoice.php');

try
{
	require "initialize.php";

	$payment  = $mollie->payments->get($_POST["id"]);
	$order_id = $payment->metadata->order_id;
    $eur = $payment->metadata->eur;
    $cen = $payment->metadata->cen;
    $firstName = $payment->metadata->fn;
    $lastName = $payment->metadata->ln;
    $streetName = $payment->metadata->stN;
    $HouseNum = $payment->metadata->HoN;
    $cityName = $payment->metadata->Ci;
    $postCode = $payment->metadata->PC;
    $email = $payment->metadata->mail;

    database_write($order_id, $payment->status, $mysqli, $firstName, $lastName);

	if ($payment->isPaid() == TRUE)
	{
        $query = "UPDATE `EXAM_RES` SET `status` = '{$status}', `Estatus` = 'GIVEN' WHERE `first_name` = '{$firstName}' AND `last_name` = '{$lastName}' AND `order_id` = '{$order_id}'";
        $insertPayment =  mysqli_query($mysqli, $query);

        $mail = new PHPMailer();

        $mail->Host = "smtp.gmail.com";

//$mail->isSMTP();
        $mail->isHTML();
        $mail->CharSet = 'UTF-8';
        $mail->SMTPAuth = true;

        $mail->Username = "alrawitheorie@gmail.com";
        $mail->Password = "654987@As";

        $mail ->SMTPSecure = "ssl";

        $mail->Port = 465;

        $mail->Subject = "Exam Reservation";

        $body = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
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
											<td align=\"center\" width=\"60\" height=\"2\" style=\" width: 60px; height: 2px; font-size: 1px;\"><img src=\"https://www.alrawitheorie.nl/images/2.png\"></td>
										</tr>
									</table>
								</td>

							</tr>
						</table>
						<!-- /// Header -->

						<!-- / Hero subheader -->
						<table class=\"container hero-subheader\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"620\" style=\"width: 620px;\">
							<tr>
								<td class=\"hero-subheader__title\" style=\"direction:rtl;font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;\" align=\"center\">تم استلام طلبكم!</td>
							</tr>

							<tr>
								<td class=\"hero-subheader__content\" style=\"direction:rtl;font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 90px 0;\" align=\"right\">لقد قمتم بتقديم طلب للحجز للامتحان النظري باللغة العربية!
								<br>سنقوم بالتواصل معكم في أقرب فرصة ممكنة لتثبيت الحجز.
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

														<td class=\"info-bullets__content\" style=\"color: #969696; font-size: 16px;\">06-87460636</td>
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
														<td align=\"middle\" width=\"60\" height=\"2\" style=\" width: 60px; height: 2px; font-size: 1px;\"><img src=\"https://www.alrawitheorie.nl/images/1.png\"></td>
													</tr>
												</table>
											</td>
										</tr>

										<tr>
											<td style=\"color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;\">Copyright &copy; 2018 <a href=\"https://www.alrawitheorie.nl/\" target=\"_blank\" style=\"text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;\">Al Rawi Theorie</a>. <br />All rights reserved.</td>
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

        $mail->Body = $body;




        define('EURO', chr(128) );
        define('EURO_VAL', 6.55957 );

// Xavier Nicolay 2004
// Version 1.02

//////////////////////////////////////
// Public functions                 //
//////////////////////////////////////
//  function sizeOfText( $texte, $larg )
//  function addSociete( $nom, $adresse )
//  function fact_dev( $libelle, $num )
//  function addDevis( $numdev )
//  function addFacture( $numfact )
//  function addDate( $date )
//  function addClient( $ref )
//  function addPageNumber( $page )
//  function addClientAdresse( $adresse )
//  function addReglement( $mode )
//  function addEcheance( $date )
//  function addNumTVA($tva)
//  function addReference($ref)
//  function addCols( $tab )
//  function addLineFormat( $tab )
//  function lineVert( $tab )
//  function addLine( $ligne, $tab )
//  function addRemarque($remarque)
//  function addCadreTVAs()
//  function addCadreEurosFrancs()
//  function addTVAs( $params, $tab_tva, $invoice )
//  function temporaire( $texte )

$date = date('d-m-Y');

        $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
        $pdf->AddPage();
//        $pdf->Image("../../images/aslogo.png", $pdf->GetX(), $pdf->GetY(), 33.78);
$pdf->addSociete( $firstName . ' ' . $lastName,
    $streetName . ' ' . $HouseNum."\n" .
    $postCode . ' ' . $cityName);
        $pdf->fact_dev( "Rijschool Arghout", "" );
        $pdf->temporaire( "Rijschool Arghout" );
        $pdf->addDate($date);
//        $pdf->addClient("210");
        $pdf->addPageNumber("1");
        $pdf->addClientAdresse("Rijschool Arghout \nKvK. 53578988 \nBelasting NL220431644B01");
        $pdf->addReglement("Theorie Examen");
        $pdf->addEcheance($date);
//        $pdf->addNumTVA("");
//$pdf->addReference("Devis ... du ....");
        $cols=array( "Order Id"    => 45,
            "Description"  => 65,
            "Amount (exc. BTW)"      => 40,
            "Amount (inc. BTW)" => 40 );
        $pdf->addCols($cols);
        $cols=array( "Order Id"    => "C",
            "Description"  => "C",
            "Amount (exc. BTW)"      => "C",
            "Amount (inc. BTW)" => "C" );
        $pdf->addLineFormat( $cols);

        $y    = 109;
        $line = array( "Order Id"    => $order_id,
            "Description"  => "Theorie examen met tolk",
            "Amount (exc. BTW)"      => EURO." 247,93",
            "Amount (inc. BTW)" => EURO." 300,00");
        $size = $pdf->addLine( $y, $line );
        $y   += $size + 2;

//$pdf->addCadreTVAs();

// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
//$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
//    array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
//$tab_tva = array( "1"       => 19.6,
//    "2"       => 5.5);
//$params  = array( "RemiseGlobale" => 1,
//    "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
//    "remise"         => 0,       // {montant de la remise}
//    "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
//    "FraisPort"     => 1,
//    "portTTC"        => 10,      // montant des frais de ports TTC
//    // par defaut la TVA = 19.6 %
//    "portHT"         => 0,       // montant des frais de ports HT
//    "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
//    "AccompteExige" => 1,
//    "accompte"         => 0,     // montant de l'acompte (TTC)
//    "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
//    "Remarque" => "Avec un acompte, svp..." );
//
//$pdf->addTVAs( $params, $tab_tva, $tot_prods);
//$pdf->addCadreEurosFrancs();
        $attachments = $pdf->Output('S');
        $mail->addStringAttachment($attachments,"order_".$order_id.".pdf");




        $mail->setFrom('info@alrawitheorie.nl', 'Alrawi Theorie');
        $mail->addReplyTo('alrawitheorie@gmail.com');
        $mail->addAddress($email);
        if($mail->send()){
            echo "Done!";
        }





        $selectQuery = "SELECT * FROM `EXAM_RES` WHERE `order_id` = '{$order_id}'";
        $selectRun = mysqli_query($mysqli,$selectQuery);

        if(mysqli_num_rows($selectRun) > 0){
            while ($row = mysqli_fetch_assoc($selectRun)){
                $name1 = $row['first_name'] . ' ' . $row['last_name'];
                $bsn1 = $row['bsn'];
                $dob1 = $row['dob'];
                $strH1 = $row['str_name'] . ' ' . $row['house_num'];
                $postC1 = $row['postcode'] . ' ' . $row['city_name'];
                $email1 = $row['email'];
                $phone1 = $row['phone'];
                $place1 = $row['place'];
                $time1 = $row['dateAndTime'];
                $dialect1 = $row['dialect'];
                $note1 = $row['note'];
            }
        }







        $mail1 = new PHPMailer();

        $mail1->Host = "smtp.gmail.com";

//$mail->isSMTP();
        $mail1->isHTML();
        $mail1->CharSet = 'UTF-8';
        $mail1->SMTPAuth = true;

        $mail1->Username = "alrawitheorie@gmail.com";
        $mail1->Password = "654987@As";

        $mail1 ->SMTPSecure = "ssl";

        $mail1->Port = 465;

        $mail1->Subject = "New Exam Reservation";

        $body1 = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
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
		.tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-c3ow1{border-color:inherit;text-align:center;vertical-align:top;background: #e4e4e4}
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
											<td align=\"center\" width=\"60\" height=\"2\" style=\" width: 60px; height: 2px; font-size: 1px;\"><img src=\"https://www.alrawitheorie.nl/images/2.png\"></td>
										</tr>
									</table>
								</td>

							</tr>
						</table>
						<!-- /// Header -->

						<!-- / Hero subheader -->
						<table class=\"tg\">
    <tr>
        <th class=\"tg-c3ow1\">Name: </th>
        <th class=\"tg-c3ow\">$name1</th>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">BSN: </td>
        <td class=\"tg-c3ow\">$bsn1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Date Of Birth:</td>
        <td class=\"tg-c3ow\">$dob1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Street Name + House No.</td>
        <td class=\"tg-c3ow\">$strH1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Postcode + City Name</td>
        <td class=\"tg-c3ow\">$postC1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Email</td>
        <td class=\"tg-c3ow\">$email1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Phone Number</td>
        <td class=\"tg-c3ow\">$phone1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Wanted City</td>
        <td class=\"tg-c3ow\">$place1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Wanted Time</td>
        <td class=\"tg-c3ow\">$time1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Dialect</td>
        <td class=\"tg-c3ow\">$dialect1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Notes</td>
        <td class=\"tg-c3ow\">$note1</td>
    </tr>
    <tr>
        <td class=\"tg-c3ow1\">Order Id</td>
        <td class=\"tg-c3ow\">$order_id</td>
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

														<td class=\"info-bullets__content\" style=\"color: #969696; font-size: 16px;\">06-87460636</td>
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
														<td align=\"middle\" width=\"60\" height=\"2\" style=\" width: 60px; height: 2px; font-size: 1px;\"><img src=\"https://www.alrawitheorie.nl/images/1.png\"></td>
													</tr>
												</table>
											</td>
										</tr>

										<tr>
											<td style=\"color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;\">Copyright &copy; 2018 <a href=\"https://www.alrawitheorie.nl/\" target=\"_blank\" style=\"text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;\">Al Rawi Theorie</a>. <br />All rights reserved.</td>
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

        $mail1->addStringAttachment($attachments,"order_".$order_id.".pdf");
        $mail1->Body = $body1;
        $mail1->setFrom('info@alrawitheorie.nl', 'Alrawi Theorie');
        $mail1->addReplyTo('alrawitheorie@gmail.com');
        $mail1->addAddress("nadia_ster30@hotmail.com");
        $mail1->addBCC("aylosa@outlook.com");
        if($mail1->send()){
            echo "Done!";
        }













    }
	elseif ($payment->isOpen() == FALSE)
	{
        $query = "UPDATE `EXAM_RES` SET `status` = '{$status}', `Estatus` = 'CLOSED' WHERE `first_name` = '{$firstName}' AND `last_name` = '{$lastName}' AND `order_id` = '{$order_id}'";
        $insertPayment =  mysqli_query($mysqli, $query);
        if (!$insertPayment) {
            die("Failed!" . mysqli_error($mysqli));
        }
	}elseif ($payment->isFailed() == TRUE){
        $query = "UPDATE `EXAM_RES` SET `status` = '{$status}', `Estatus` = 'NOT_GIVEN_FAIL' WHERE `first_name` = '{$firstName}' AND `last_name` = '{$lastName}' AND `order_id` = '{$order_id}'";
        $insertPayment =  mysqli_query($mysqli, $query);
        if (!$insertPayment) {
            die("Failed!" . mysqli_error($mysqli));
        }
    }elseif ($payment->isExpired() == TRUE){
        $query = "UPDATE `EXAM_RES` SET `status` = '{$status}', `Estatus` = 'EXPIRED' WHERE `first_name` = '{$firstName}' AND `last_name` = '{$lastName}' AND `order_id` = '{$order_id}'";
        $insertPayment =  mysqli_query($mysqli, $query);
        if (!$insertPayment) {
            die("Failed!" . mysqli_error($mysqli));
        }
    }elseif ($payment->isCancelled() == TRUE){
        $query = "UPDATE `EXAM_RES` SET `status` = '{$status}', `Estatus` = 'CANCELLED' WHERE `first_name` = '{$firstName}' AND `last_name` = '{$lastName}' AND `order_id` = '{$order_id}'";
        $insertPayment =  mysqli_query($mysqli, $query);
        if (!$insertPayment) {
            die("Failed!" . mysqli_error($mysqli));
        }
    }
}
catch (Mollie_API_Exception $e)
{
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

function database_write ($order_id, $status,$mysqli, $firstName, $lastName)
{
    $query = "UPDATE `EXAM_RES` SET `status` = '{$status}', `Estatus` = 'NOT_GIVEN' WHERE `first_name` = '{$firstName}' AND `last_name` = '{$lastName}' AND `order_id` = '{$order_id}' ";
    $insertPayment =  mysqli_query($mysqli, $query);
    if (!$insertPayment) {
        die("Failed!" . mysqli_error($mysqli));
    }
}