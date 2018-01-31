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

    database_write($order_id, $payment->status, $mysqli, $userID);

	if ($payment->isPaid() == TRUE)
	{
        $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}','FULLY DONE','GIVEN')";
        $insertPayment =  mysqli_query($mysqli, $query);

        $spentQuery = "SELECT * From Users WHERE ID = '{$userID}' ";
        $updateAgent = mysqli_query($mysqli, $spentQuery);
        if (mysqli_num_rows($updateAgent) == 1) {
            while ($row = mysqli_fetch_assoc($updateAgent)) {
                $spent = $row['SPENT'];
                if($periodPass == '20'){
                    $spent = $spent + 10.35;
                }elseif($periodPass == '35'){
                    $spent = $spent + 15.35;
                }elseif ($periodPass == '60'){
                    $spent = $spent + 25.35;
                }
                $updateQuery = "UPDATE Users SET SPENT = '{$spent}' WHERE ID = '{$userID}'";
                $run = mysqli_query($mysqli,$updateQuery);
            }
        }


        date_default_timezone_set('Europe/Amsterdam');
        $start_date = date('Y-m-d H:i:s ', time());
        if($periodPass == '20'){
            $end_date = date("Y-m-d H:i:s ", strtotime('+20 days'));
        }elseif($periodPass == '35'){
            $end_date = date("Y-m-d H:i:s ", strtotime('+35 days'));
        }elseif ($periodPass == '60'){
            $end_date = date("Y-m-d H:i:s ", strtotime('+60 days'));
        }

        $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE, STATUS )";
        $query1 .= "VALUES ('{$userID}',
                             '{$start_date}',
                             '{$end_date}',
                             'ACTIVE')";
        $result1 = mysqli_query($mysqli,$query1);
	}
	elseif ($payment->isOpen() == FALSE)
	{
        $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}','FULLY FAIL','NOT_GIVEN')";
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

function database_write ($order_id, $status,$mysqli, $userID)
{
    $query = "INSERT INTO PAYMENTS (order_id, user_id, status, website_status) VALUES ('{$order_id}', '{$userID}', '{$status}','NOT_GIVEN')";
    $insertPayment =  mysqli_query($mysqli, $query);
    if (!$insertPayment) {
        die("Failed!" . mysqli_error($mysqli));
    }
}