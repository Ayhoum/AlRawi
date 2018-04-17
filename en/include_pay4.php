<?php
ob_start();
include 'scripts/db_connection.php';
try
{
    require "initialize.php";

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

    $query = "SELECT * FROM `PRICES` WHERE Period = 'TPAKKET'";
    $getAmount = mysqli_query($mysqli_en,$query);
    if (mysqli_num_rows($getAmount) == 1) {
        while ($row = mysqli_fetch_assoc($getAmount)) {
            $eur = $row['AmountEur'];
            $cen = $row['AmountCen'];
            $periodPass = $row['TimeTxt'];
        }
    }
    $payment = $mollie->payments->create(array(
        "amount"       => $eur . "." . $cen,
        "description"  => "Alrawi Theorie ($periodPass)",
        "redirectUrl"  => "{$protocol}://{$hostname}{$path}/profile.php",
        "webhookUrl"   => "{$protocol}://{$hostname}{$path}/webhook-verification.php",
        "metadata"     => array(
            "order_id" => $order_id,
            "user_id"  => $userID,
            "period"  => $periodPass,
            "eur"  => $eur,
            "cen"  => $cen,
        ),
    ));

    database_write($order_id, $payment->status,$mysqli_en,$userID);

    header("Location: " . $payment->getPaymentUrl());
}
catch (Mollie_API_Exception $e)
{
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

function database_write ($order_id, $status, $mysqli_en, $userID)
{
    $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}', '{$status}','NOT_GIVEN')";
    $insertPayment =  mysqli_query($mysqli_en, $query);
    if (!$insertPayment) {
        die("Failed!" . mysqli_error($mysqli_en));
    }
}