<?php

require_once "Mollie/API/Autoloader.php";
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/settings/profiles
 */
$mollie = new Mollie_API_Client;
$mollie->setApiKey("live_p8MRwt8RmmJHQdHy4H3tn3VG6RnABw");
