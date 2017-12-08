<?php
require_once "scripts/src/Mollie/API/Autoloader.php";
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/settings/profiles
 */
$mollie = new Mollie_API_Client;
$mollie->setApiKey("test_Vr3yxP9prDQku8yrwNzMUpGFJ42Maf");