<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
if(isset($_POST['login_submit'])) {

    $email = $_POST['login_username'];
    $email = mysqli_real_escape_string($mysqli, $email);
    $pass = $_POST['login_password'];
    $pass = mysqli_real_escape_string($mysqli, $pass);


    $query = "SELECT * From Users WHERE EMAIL = '{$email}' ";
    $getHashAgent = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($getHashAgent) == 1) {
        while ($row = mysqli_fetch_assoc($getHashAgent)) {
            $hash = $row['PASSWORD'];
            $name = $row['NAME'];
            if ((password_verify($pass, $hash))) {
                $role = "user";
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $name;
                $_SESSION['role'] = $role;
                echo 'Welcome Agent';
                header("Location: profile.php");
            } else {
                echo "Enter a Valid Data !! ";
            }
        }
    }
}

?>

<?php
// Include FB config file && User class
require_once 'fbconfing.php';
//require_once 'User.php';

if(isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string)$accessToken;

        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;

        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    // Redirect the user back to the same page if url has "code" parameter in query string
    if (isset($_GET['code'])) {
        header('Location: login.php');
    }

    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch (FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: login.php");
        exit;
    } catch (FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    // Initialize User class
    $user = new User();

    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid'     => $fbUserProfile['id'],
        'first_name'    => $fbUserProfile['first_name'],
        'last_name'     => $fbUserProfile['last_name'],
        'email'         => $fbUserProfile['email'],
        'gender'        => $fbUserProfile['gender'],
        'locale'        => $fbUserProfile['locale'],
        'picture'       => $fbUserProfile['picture']['url'],
        'link'          => $fbUserProfile['link']
    );
    $userData = $user->checkUser($fbUserData);

    // Put user data into session
    $_SESSION['userData'] = $userData;

    // Get logout url
    $logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');

    // Render facebook profile data
    if(!empty($userData)){
        $output  = '<h1>Facebook Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }

}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

    // Render facebook login button
    $output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/fblogin-btn.png"></a>';
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


<!--    //FaceBook Button//-->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=321305235019959';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


<!--     facebook SDK-->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '321305235019959',
                xfbml      : true,
                version    : 'v2.11'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Log In</title>


</head>

<body class="stretched" style="background: #fde7e7">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #fde7e7;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container vertical-middle divcenter clearfix">

                    <div class="row center">
                        <a href="index.php"><img src="images/2.png" alt="Al Rawi Logo"></a>
                    </div>

                    <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                        <div class="panel-body" style="padding: 40px;">
                            <form id="login_form" name="login_form" class="nobottommargin" action="#" method="post">
                                <h3 class="text-center">قم بتسجيل الدخول لحسابك</h3>

                                <div class="col_full">
                                    <label for="login_username">البريد الإلكتروني:</label>
                                    <input type="email" id="login_username" name="login_username" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full">
                                    <label for="login_password">كلمة المرور:</label>
                                    <input type="password" id="login_password" name="login_password" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" style="width: 100%" id="login_submit" name="login_submit" value="login">تسجيل الدخول</button>
                                </div>
                                <!--                                FaceBook Button-->

                                <div class="center-bloc topmargin-sm" >
                                    <h6 style="direction: rtl">  أو سجــل الدخــول عن طريق حساب ال Facebook الخاص بـك</h6>
                                    <div class="fb-login-button" data-width="100%" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>                                </div>


                                <div class="col_full topmargin-sm nobottommargin">
                                    <a href="forgot_password.php" class="fright text-center" style="width: 100%">نسيت كلمة المرور؟</a>
                                    <a href="signup.php" class="fright text-center" style="width: 100%">قم بتسجيل حساب جديد</a>
                                </div>
                            </form>


                        </div>


                    </div>

                    <div class="row center"><small>Copyrights &copy; All Rights Reserved by Alrawi Theorie Wbsite</small></div>
                    <div class="row center"><small>Developed by <a target="_blank" href="http://www.el-semicolon.nl">El-Semicolon</a></small></div>

                </div>
            </div>

        </div>

    </section><!-- #content end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>