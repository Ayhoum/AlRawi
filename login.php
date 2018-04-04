<?php
session_start();
ob_start();
if(isset($_SESSION['email'])){
    header("Location: profile.php");
}
   //
//require_once 'include/Facebook/autoload.php';
//
//$fb = new Facebook\Facebook([
//    'app_id' => '1973832622891754', // Replace {app-id} with your app id
//    'app_secret' => '51a14598cbecc6b9a7897f3338fd167d',
//    'default_graph_version' => 'v2.2',
//]);
//
//$helper = $fb->getRedirectLoginHelper();
//
//$permissions = ['email']; // Optional permissions
//$loginUrl = $helper->getLoginUrl('https://www.alrawitheorie.nl/fb-callback.php', $permissions);


include 'scripts/db_connection.php';


?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <link rel="stylesheet" href="css/remodal.css">
    <link rel="stylesheet" href="css/remodal-default-theme.css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>

        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/2.png) center no-repeat #fff2f2;
        }

        .pre-pre {
            position: fixed;
            left: 0;
            top: 150px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/preloader@2x.gif) center no-repeat;
        }
    </style>
    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Log In</title>

<style>
.width_full{
    width: 100%;
    text-align: center;
}
</style>
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
                                    <input type="email" id="login_username" name="login_username" value="" class="form-control not-dark" required/>
                                </div>

                                <div class="col_full">
                                    <label for="login_password">كلمة المرور:</label>
                                    <input type="password" id="login_password" name="login_password" value="" class="form-control not-dark" required/>
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" style="width: 100%" id="login_submit" name="login_submit" value="login">تسجيل الدخول</button>
                                </div>

                                <div class="col_full topmargin-sm nobottommargin">
                                <a href="facebook_error.php" class="button button-border button-rounded button-blue" style="direction: rtl"></a>
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
                    <div class="row center"><small>Developed by <a target="_blank" href="http://www.el-semicolon.nl">El-Semicolon; <img src="images/logoES.png" style="width: 64px;height: 64px;"/></a></small></div>

                </div>
            </div>

        </div>

    </section><!-- #content end -->

</div><!-- #wrapper end -->
<div class="remodal" data-remodal-id="modal">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h2 style="text-align: center">حدث خطأ أثناء تسجيل الدخول</h2>
    <p style="direction: rtl">
        لقد تم حظر حسابكم مع الأسف<br>وذلك نتيجة لاشتباهنا بأنه يتم استخدام الحساب الواحد من قبل أكثر من شخص<br>يرجى التواصل مع إدارة الموقع لحل المشكلة
    </p>
    <br>
    <button data-remodal-action="confirm" class="remodal-confirm">حسناً</button>
</div>


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

<script>

        if($(window).width() < 767) {
            jQuery('.button-blue').html('<i class="icon-facebook"></i>');
            jQuery('.button-blue').addClass('width_full');
        }else{
            jQuery('.button-blue').html('<i class="icon-facebook"></i> سجـل الدخول عن طريق الفيس بوك');

        }

</script>
<script src="js/remodal.js"></script>

<script>
    var inst;
    var openModal = function () {
        inst = $('[data-remodal-id=modal]').remodal({
            closeOnOutsideClick:false
        });
        inst.open();
        $(document).on('confirmation', '.remodal', function () {
            console.log('Confirmation button is clicked');
        });
    };


    var inst2;
    var openModal2 = function () {
        inst2 = $('[data-remodal-id=modal2]').remodal({
            closeOnOutsideClick:false
        });
        inst2.open();
        $(document).on('confirmation', '.remodal', function () {
            console.log('Confirmation button is clicked');
        });
    };
</script>
</body>

<?php

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
            $id = $row['ID'];
            $status = $row['ACTIVE_STATUS'];
            $accountStat = $row['ACCOUNT_STATUS'];
            if($accountStat == "ACTIVE"){
            if ((password_verify($pass, $hash))) {
                if($status == 1){
                    $role = "user";
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $name;
                    $_SESSION['role'] = $role;

                    $queryUpdate = "UPDATE Users SET ACTIVE_STATUS = '0' WHERE ID = '{$id}'";
                    $updateStatue = mysqli_query($mysqli,$queryUpdate);

                    $selectQuery = "SELECT * FROM `SUS_USERS` WHERE USER_ID = '{$id}'";
                    $runSelect = mysqli_query($mysqli,$selectQuery);
                    if(mysqli_num_rows($runSelect) > 0){
                        while($row= mysqli_fetch_assoc($runSelect)){
                            $Rid = $row['ID'];
                            $times = $row['TIMES'];
                            $time = $row['TIME'];
                            $times++;
                        }

                        date_default_timezone_set('Europe/Amsterdam');
                        if(date('Y-m-d H:i:s') < date("Y-m-d H:i:s", strtotime($time.'+2 hour'))){
                            $now = date('Y-m-d H:i:s');
                            $queryUpdate = "UPDATE SUS_USERS SET TIMES = '{$times}',TIME ='{$now}' WHERE ID = '{$Rid}'";
                            $updateStatue = mysqli_query($mysqli,$queryUpdate);
                            if($times > 1){

                                $selectB = "SELECT * FROM BUSERS WHERE USER_ID = '{$id}'";
                                $runSelectB = mysqli_query($mysqli,$selectB);

                                if(mysqli_num_rows($runSelectB) == 0){
                                    $queryUpdate = "INSERT INTO `BUSERS`(`USER_ID`) VALUES ('{$id}')";
                                    $updateStatue = mysqli_query($mysqli,$queryUpdate);
                                }

                                $queryUpdate = "UPDATE Users SET ACCOUNT_STATUS = 'BLOCKED' WHERE ID = '{$id}'";
                                $updateStatue = mysqli_query($mysqli,$queryUpdate);

                                $queryDelete = "DELETE FROM `SUS_USERS` WHERE USER_ID = '{$id}'";
                                $runDelete = mysqli_query($mysqli,$queryDelete);
                            }
                        }

                    }else{
                        date_default_timezone_set('Europe/Amsterdam');
                        $now = date('Y-m-d H:i:s');
                        $queryInsert = "INSERT INTO `SUS_USERS`(`USER_ID`,`TIME`) VALUES ('{$id}','{$now}')";
                        $runInsert = mysqli_query($mysqli,$queryInsert);
                    }



                    header("Location: profile.php");

                }else{
                    $role = "user";
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $name;
                    $_SESSION['role'] = $role;
                    $queryUpdate = "UPDATE Users SET ACTIVE_STATUS = '1' WHERE ID = '{$id}'";
                    $updateStatue = mysqli_query($mysqli,$queryUpdate);

                    header("Location: profile.php");
                }
            } else {
                header("Location: wrong_login.php");

            }
            }else{
                ?>
<script>openModal();</script>
            <?php
            }
        }
    }else {
        header("Location: wrong_login.php");

    }
}
?>
</html>