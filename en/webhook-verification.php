<?php

session_start();
ob_start();
include 'scripts/db_connection.php';
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

try
{
	require "initialize.php";

	$payment  = $mollie->payments->get($_POST["id"]);
	$order_id = $payment->metadata->order_id;
    $userID = $payment->metadata->user_id;
    $periodPass = $payment->metadata->period;
    $eur = $payment->metadata->eur;
    $cen = $payment->metadata->cen;

    database_write($order_id, $payment->status, $mysqli_en, $userID);

	if ($payment->isPaid() == TRUE)
	{
        $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}','FULLY DONE','GIVEN')";
        $insertPayment =  mysqli_query($mysqli_en, $query);

        $spentQuery = "SELECT * From Users WHERE ID = '{$userID}' ";
        $updateAgent = mysqli_query($mysqli_en, $spentQuery);
        if (mysqli_num_rows($updateAgent) == 1) {
            while ($row = mysqli_fetch_assoc($updateAgent)) {
                $spent = $row['SPENT'];
                $spent = $spent + $eur + ($cen/100);
                $updateQuery = "UPDATE Users SET SPENT = '{$spent}' WHERE ID = '{$userID}'";
                $run = mysqli_query($mysqli_en,$updateQuery);
            }
        }


        date_default_timezone_set('Europe/Amsterdam');
        $start_date = date('Y-m-d H:i:s ', time());
        $end_date = date("Y-m-d H:i:s ", strtotime('+' . $periodPass));


        $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE, STATUS )";
        $query1 .= "VALUES ('{$userID}',
                             '{$start_date}',
                             '{$end_date}',
                             'ACTIVE')";
        $result1 = mysqli_query($mysqli_en,$query1);
	}
	elseif ($payment->isOpen() == FALSE)
	{
        $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}','FULLY FAIL','NOT_GIVEN')";
        $insertPayment =  mysqli_query($mysqli_en, $query);
        if (!$insertPayment) {
            die("Failed!" . mysqli_error($mysqli_en));
        }

	}
}
catch (Mollie_API_Exception $e)
{
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

function database_write ($order_id, $status,$mysqli_en, $userID)
{
    $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}', '{$status}','NOT_GIVEN')";
    $insertPayment =  mysqli_query($mysqli_en, $query);
    if (!$insertPayment) {
        die("Failed!" . mysqli_error($mysqli_en));
    }
}