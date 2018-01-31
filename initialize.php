<?php
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}

require_once "scripts/src/Mollie/API/Autoloader.php";
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/settings/profiles
 */
$mollie = new Mollie_API_Client;
$mollie->setApiKey("live_eqrfQpkDsEkaUdUvutpHqvWkHbWRVR");
