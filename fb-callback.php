<?php
ob_start();

session_start();

require_once 'include/Facebook/autoload.php';

require_once 'scripts/db_connection.php';

$fb = new Facebook\Facebook([
    'app_id' => '1973832622891754', // Replace {app-id} with your app id
    'app_secret' => '51a14598cbecc6b9a7897f3338fd167d',
    'default_graph_version' => 'v2.2',
]);

//$helper = $fb->getRedirectLoginHelper();
//
//try {
//    $accessToken = $helper->getAccessToken();
//} catch(Facebook\Exceptions\FacebookResponseException $e) {
//    // When Graph returns an error
//    echo 'Graph returned an error: ' . $e->getMessage();
//    exit;
//} catch(Facebook\Exceptions\FacebookSDKException $e) {
//    // When validation fails or other local issues
//    echo 'Facebook SDK returned an error: ' . $e->getMessage();
//    exit;
//}
//
//
//
//if (! isset($accessToken)) {
//    if ($helper->getError()) {
//        header('HTTP/1.0 401 Unauthorized');
//        echo "Error: " . $helper->getError() . "\n";
//        echo "Error Code: " . $helper->getErrorCode() . "\n";
//        echo "Error Reason: " . $helper->getErrorReason() . "\n";
//        echo "Error Description: " . $helper->getErrorDescription() . "\n";
//    } else {
//        header('HTTP/1.0 400 Bad Request');
//        echo 'Bad request';
//    }
//    exit;
//}
//
//// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());
//
//// The OAuth 2.0 client handler helps us manage access tokens
//$oAuth2Client = $fb->getOAuth2Client();
//
//// Get the access token metadata from /debug_token
//$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);
//
//
//// Validation (these will throw FacebookSDKException's when they fail)
//$tokenMetadata->validateAppId('1973832622891754'); // Replace {app-id} with your app id
//// If you know the user ID this access token belongs to, you can validate it here
////$tokenMetadata->validateUserId('123');
//$tokenMetadata->validateExpiration();
//
//if (! $accessToken->isLongLived()) {
//    // Exchanges a short-lived access token for a long-lived one
//    try {
//        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
//    } catch (Facebook\Exceptions\FacebookSDKException $e) {
//        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
//        exit;
//    }
//
//    echo '<h3>Long-lived</h3>';
//    var_dump($accessToken->getValue());
//}
//
//$_SESSION['fb_access_token'] = (string) $accessToken;
//
//// User is logged in with a long-lived access token.
//// You can redirect them to a members-only page.
////header('Location: https://example.com/members.php');



# Create the login helper object
$helper = $fb->getRedirectLoginHelper();

# Get the access token and catch the exceptions if any
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

# If the
if (isset($accessToken)) {
    // Logged in!
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
    // But we shall we the same page

    // Sets the default fallback access token so
    // we don't have to pass it to each request
    $fb->setDefaultAccessToken($accessToken);

    try {
        $response = $fb->get('/me?fields=email,name');
        $userNode = $response->getGraphUser();
    }catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }


    // Print the user Details
//    echo "Welcome !<br><br>";
//    echo 'Name: ' . $userNode->getName().'<br>';
//
//    echo 'User ID: ' . $userNode->getId().'<br>';
//    echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
//
//    $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
//    echo "Picture<br>";
//    echo "<img src='$image' /><br><br>";


    $email = $userNode->getProperty('email');
    $name = $userNode->getName();

    $date = date('Y-m-d');


    //Insert Into database
    $select_query = "SELECT * FROM `Users` WHERE `EMAIL` = '{$email}' ";
    echo $select_query;
    $select_result = mysqli_query($mysqli,$select_query);

    if (mysqli_num_rows($select_result) > 0){
        $role = "user";
        $_SESSION['username'] = $name;
        $_SESSION['role'] = $role;

        header("Location: profile.php");



    } else{

        $insert_query  = "INSERT INTO `Users` (`NAME` ,`EMAIL`, `SPENT`, `SITUATION`, `REG_DATE`)";

        $insert_query .= " VALUES ('{$name}','{$email}', '0', 'NEW', '{$date}')";

        echo $insert_query;

        $insert_result = mysqli_query($mysqli, $insert_query);

        $_SESSION['username'] = $name;

        echo $_SESSION['username'];

        header("Location: profile.php");

    }


}else{
    $permissions  = ['email, location, birthday'];
    $loginUrl = $helper->getLoginUrl($redirect,$permissions);
    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}

?>

