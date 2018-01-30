<?php
/*
 * Example 2 - How to verify Mollie API Payments in a webhook.
 */

if (!isset($_SESSION['username'])){
    header("Location: login.php");

}

try
{
	/*
	 * Initialize the Mollie API library with your API key.
	 *
	 * See: https://www.mollie.com/dashboard/settings/profiles
	 */
	require "initialize.php";

	/*
	 * Retrieve the payment's current state.
	 */
	$payment  = $mollie->payments->get($_POST["id"]);
	$order_id = $payment->metadata->order_id;

	/*
	 * Update the order in the database.
	 */
	database_write($order_id, $payment->status);

	if ($payment->isPaid() == TRUE)
	{

	    if($_SESSION['period'] == '20'){

            if (isset($_SESSION['email'])){


                $name = $_SESSION['email'];
                $spentQuery = "SELECT * From Users WHERE EMAIL = '{$name}' ";
                $updateAgent = mysqli_query($mysqli, $spentQuery);
                if (mysqli_num_rows($updateAgent) == 1) {
                    while ($row = mysqli_fetch_assoc($updateAgent)) {
                        $id = $row['ID'];
                        $spent = $row['SPENT'];
                    }
                }
                $spent += 10.29;
                $updateQuery = "UPDATE Users SET SPENT = '{$spent}' WHERE ID = '{$id}'";
                $run = mysqli_query($mysqli,$updateQuery);



                $query = "SELECT * FROM Users WHERE EMAIL = '{$name}'";

                $result = mysqli_query($mysqli,$query);
                if (mysqli_num_rows($result) > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                    }
                    date_default_timezone_set('Europe/Amsterdam');
                    $start_date = date('Y-m-d H:i:s ', time());

                    $end_date = date("Y-m-d H:i:s ", strtotime('+20 days'));

                    $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE )";
                    $query1 .= "VALUES ('{$id}',
                             '{$start_date}',
                             '{$end_date}')";
                    $result1 = mysqli_query($mysqli,$query1);
                    header("Location: profile.php");
                }
            } else {
                header("Location:login.php");
            }

        }elseif ($_SESSION['period'] == '35'){

            if (isset($_SESSION['email'])){


                $name = $_SESSION['email'];
                $spentQuery = "SELECT * From Users WHERE EMAIL = '{$name}' ";
                $updateAgent = mysqli_query($mysqli, $spentQuery);
                if (mysqli_num_rows($updateAgent) == 1) {
                    while ($row = mysqli_fetch_assoc($updateAgent)) {
                        $id = $row['ID'];
                        $spent = $row['SPENT'];
                    }
                }
                $spent += 10.29;
                $updateQuery = "UPDATE Users SET SPENT = '{$spent}' WHERE ID = '{$id}'";
                $run = mysqli_query($mysqli,$updateQuery);



                $query = "SELECT * FROM Users WHERE EMAIL = '{$name}'";

                $result = mysqli_query($mysqli,$query);
                if (mysqli_num_rows($result) > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                    }
                    date_default_timezone_set('Europe/Amsterdam');
                    $start_date = date('Y-m-d H:i:s ', time());

                    $end_date = date("Y-m-d H:i:s ", strtotime('+35 days'));

                    $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE )";
                    $query1 .= "VALUES ('{$id}',
                             '{$start_date}',
                             '{$end_date}')";
                    $result1 = mysqli_query($mysqli,$query1);
                    header("Location: profile.php");
                }
            } else {
                header("Location:login.php");
            }

        }elseif ($_SESSION['period'] == '60'){

            if (isset($_SESSION['email'])){


                $name = $_SESSION['email'];
                $spentQuery = "SELECT * From Users WHERE EMAIL = '{$name}' ";
                $updateAgent = mysqli_query($mysqli, $spentQuery);
                if (mysqli_num_rows($updateAgent) == 1) {
                    while ($row = mysqli_fetch_assoc($updateAgent)) {
                        $id = $row['ID'];
                        $spent = $row['SPENT'];
                    }
                }
                $spent += 10.29;
                $updateQuery = "UPDATE Users SET SPENT = '{$spent}' WHERE ID = '{$id}'";
                $run = mysqli_query($mysqli,$updateQuery);



                $query = "SELECT * FROM Users WHERE EMAIL = '{$name}'";

                $result = mysqli_query($mysqli,$query);
                if (mysqli_num_rows($result) > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['ID'];
                    }
                    date_default_timezone_set('Europe/Amsterdam');
                    $start_date = date('Y-m-d H:i:s ', time());

                    $end_date = date("Y-m-d H:i:s ", strtotime('+60 days'));

                    $query1 = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE )";
                    $query1 .= "VALUES ('{$id}',
                             '{$start_date}',
                             '{$end_date}')";
                    $result1 = mysqli_query($mysqli,$query1);
                    header("Location: profile.php");
                }
            } else {
                header("Location:login.php");
            }

        }

		/*
		 * At this point you'd probably want to start the process of delivering the product to the customer.
		 */
	}
	elseif ($payment->isOpen() == FALSE)
	{
        header("Location: payment_failure.php");

        /*
         * The payment isn't paid and isn't open anymore. We can assume it was aborted.
         */
	}
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
