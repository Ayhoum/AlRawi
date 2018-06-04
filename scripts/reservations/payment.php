<?php
ob_start();
include '../db_connection.php';
try
{
    require "initialize.php";
    if( isset($_POST['Exam_Submit']) ) {

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

    $order_id = time();

    $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
    $hostname = $_SERVER['HTTP_HOST'];
    $path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
    /*   Payment parameters:
     *   amount        Amount in EUROs. This example creates a € 10,- payment.
     *   description   Description of the payment.
     *   redirectUrl   Redirect location. The customer will be redirected there after the payment.
     *   webhookUrl    Webhook location, used to report when the payment changes state.
     *   metadata      Custom metadata that is stored with the payment.
     */

    $eur = 300;
    $cen = 00;
    $payment = $mollie->payments->create(array(
        "amount"       => $eur . "." . $cen,
        "description"  => "Alrawi Theorie Exam Reservation",
        "redirectUrl"  => "https://alrawitheorie.nl/index.php",
        "webhookUrl"   => "{$protocol}://{$hostname}{$path}/webhook-verification.php",
        "metadata"     => array(
            "order_id" => $order_id,
            "fn"       => $firstName,
            "ln"       => $lastName,
            "stN"       => $strName,
            "HoN"       => $houseNum,
            "Ci"       => $cityName,
            "PC"       => $postcode,
            "mail"       => $email,
            "eur"  => $eur,
            "cen"  => $cen,
        ),
    ));

    database_write($order_id, $payment->status,$mysqli,$firstName,$lastName,$bsn,$dob,$strName,$houseNum,$postcode,$cityName,$email,$phone,$place,$dateAndTime,$dialect,$note);

    header("Location: " . $payment->getPaymentUrl());
    }else{
        header("Location: ../../index.php");
    }
}
catch (Mollie_API_Exception $e)
{
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

function database_write ($order_id, $status, $mysqli, $firstName,$lastName,$bsn,$dob,$strName,$houseNum,$postcode,$cityName,$email,$phone,$place,$dateAndTime,$dialect,$note)
{
    $query = "INSERT INTO EXAM_RES (first_name, 
                                    last_name, 
                                    bsn, 
                                    dob, 
                                    str_name, 
                                    house_num, 
                                    postcode, 
                                    city_name, 
                                    email, 
                                    phone, 
                                    place, 
                                    dialect,
                                    dateAndTime, 
                                    note, 
                                    order_id, 
                                    status, 
                                    Estatus) 
              VALUES ('{$firstName}', 
                      '{$lastName}', 
                      '{$bsn}', 
                      '{$dob}', 
                      '{$strName}', 
                      '{$houseNum}', 
                      '{$postcode}', 
                      '{$cityName}', 
                      '{$email}', 
                      '{$phone}', 
                      '{$place}', 
                      '{$dialect}', 
                      '{$dateAndTime}',
                      '{$note}', 
                      '{$order_id}', 
                      '{$status}', 
                      'NOT_GIVEN')";
    $insertPayment =  mysqli_query($mysqli, $query);
    if (!$insertPayment) {
        die("Failed!" . mysqli_error($mysqli));
    }
}
