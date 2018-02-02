<?php
/**
 * Created by PhpStorm.
 * User: aylos
 * Date: 13/12/2017
 * Time: 6:58 م
 */
include 'scripts/db_connection.php';



if(isset($type) && $type == 'Fmatch'){
    echo "<script>alert('كلمتي المرور غير متطابقتين');</script>";
}

if(isset($_GET['code'])){
    $code = $_GET['code'];
}else{
    header("Location: index.php");
}
if(isset($_GET['email'])){
    $email = $_GET['email'];
}else{
    header("Location: index.php");
}

$query = "SELECT * From Users WHERE EMAIL = '{$email}' ";
$getAgent = mysqli_query($mysqli, $query);
if (mysqli_num_rows($getAgent) == 1) {
    while ($row = mysqli_fetch_assoc($getAgent)) {
        $id = $row['ID'];
    }
}else{
    header("Location: wrong_email.php");
}

$query = "SELECT * From PASSWORD_RESET WHERE CODE = '{$code}' ";
$getCode = mysqli_query($mysqli,$query);
if (mysqli_num_rows($getCode) <= 0) {
    header("Location: wrong_code.php");
}


if(isset($_POST['new_submit'])){
    $pass = $_POST['password_new'];
    $pass2 = $_POST['password_new2'];

    if($pass == $pass2){
        $encCode = ['cost' => 11];
        $encPassword = password_hash($pass2, PASSWORD_BCRYPT, $encCode);
        $queryUpdate = "UPDATE Users SET PASSWORD = '{$encPassword}' WHERE EMAIL = '{$email}'";
        $run = mysqli_query($mysqli,$queryUpdate);

        $deleteQuery = "DELETE FROM PASSWORD_RESET WHERE USER_ID = '{$id}'";
        $runDelete=mysqli_query($mysqli,$deleteQuery);

        header("Location: login.php");
    }else{
        header("Location: update_password.php?code=<?php echo $code;?>&email=<?php echo $email;?>&type='Fmatch'");
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
    <title>Al Rawi Theorie</title>

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
                            <form id="login_form" name="forgot_form" class="nobottommargin" action="update_password.php?code=<?php echo $code;?>&email=<?php echo $email;?>" method="post">
                                <h3 class="text-center">قم باستعادة كلمة المرور</h3>

                                <div class="col_full">
                                    <label for="password_new">كلمة المرور الجديدة</label>
                                    <input type="password" id="password_new" name="password_new" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full">
                                    <label for="password_new2">إعادة كلمة المرور الجديدة</label>
                                    <input type="password" id="password_new2" name="password_new2" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" style="width: 100%" id="new_submit" name="new_submit" value="Retrieve">استعادة</button>
                                </div>
                                <div class="col_full topmargin-sm nobottommargin">
                                    <a href="login.php" class="fright text-center" style="width: 100%">تسجيل الدخول</a>
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
