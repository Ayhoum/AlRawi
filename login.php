<?php
ob_start();

   session_start();
   session_unset();

require_once 'include/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '1973832622891754', // Replace {app-id} with your app id
    'app_secret' => '51a14598cbecc6b9a7897f3338fd167d',
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://shop.alrawitheorie.nl/fb-callback.php', $permissions);


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

                                <div class="col_full topmargin-sm nobottommargin">
                                <a href="<?php echo htmlspecialchars($loginUrl) ?>" class="button button-border button-rounded button-blue" style="direction: rtl"><i class="icon-facebook"></i> سجـل الدخول عن طريق الفيس بوك</a>
<!--                                --><?php //echo '<a href="' . . '">Log in with Facebook!</a>'; ?>
                                </div>



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