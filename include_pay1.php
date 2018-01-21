<?php
/**
 * Created by PhpStorm.
 * User: ayham
 * Date: 16/12/2017
 * Time: 7:21 م
 */

/*
 * Example 1 - How to prepare a new payment with the Mollie API.
 */
try
{
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    /*
     * Initialize the Mollie API library with your API key.
     *
     * See: https://www.mollie.com/dashboard/settings/profiles
     */
    require "initialize.php";
    /*
     * Generate a unique order id for this example. It is important to include this unique attribute
     * in the redirectUrl (below) so a proper return page can be shown to the customer.
     */
    $order_id = time();
    /*
     * Determine the url parts to these example files.
     */
    $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
    $hostname = $_SERVER['HTTP_HOST'];
    $path     = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
    /*
     * Payment parameters:
     *   amount        Amount in EUROs. This example creates a € 10,- payment.
     *   description   Description of the payment.
     *   redirectUrl   Redirect location. The customer will be redirected there after the payment.
     *   webhookUrl    Webhook location, used to report when the payment changes state.
     *   metadata      Custom metadata that is stored with the payment.
     */
    $payment = $mollie->payments->create(array(
        "amount"       => 10.35,
        "description"  => "إشتراك بالباقة الإبتدائية لموقع AlrawiTheorie (لمدة 20 يوم)",
        "redirectUrl"  => "{$protocol}://{$hostname}{$path}/buy_exam_week.php?order_id={$order_id}",
        "webhookUrl"   => "{$protocol}://{$hostname}{$path}/webhook-verification.php",
        "metadata"     => array(
            "order_id" => $order_id,
        ),
    ));
    /*
     * In this example we store the order with its payment status in a database.
     */
    database_write($order_id, $payment->status);
    /*
     * Send the customer off to complete the payment.
     */
    header("Location: " . $payment->getPaymentUrl());
}
catch (Mollie_API_Exception $e)
{
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
/*
 * NOTE: This example uses a text file as a database. Please use a real database like MySQL in production code.
 */
function database_write ($order_id, $status)
{
    $order_id = intval($order_id);
    $database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";
    file_put_contents($database, $status);
}