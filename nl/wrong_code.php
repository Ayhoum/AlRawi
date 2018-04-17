<?php
session_start();
ob_start();
include 'scripts/db_connection.php';

if(isset($_POST['code_submit'])){
    $code = $_POST['forgot_code'];
    $email = $_POST['forgot_username'];

    $query = "SELECT * From Users WHERE EMAIL = '{$email}' ";
    $getAgent = mysqli_query($mysqli_nl, $query);
    if (mysqli_num_rows($getAgent) == 1) {
        while ($row = mysqli_fetch_assoc($getAgent)) {
            $id = $row['ID'];
        }
    }

    $codeQuery = "SELECT * FROM PASSWORD_RESET WHERE USER_ID = '{$id}' AND CODE = '{$code}'";
    $getCode = mysqli_query($mysqli_nl, $codeQuery);
    if (mysqli_num_rows($getCode) != 1) {
        header("Location: insert_code.php");
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
                            <h4 class="text-center">الرابط الذي اتبعته يبدو أن صلاحيته قد انتهت يرجى طلب إستعادة كلمة المرور مرة أخرى</h4>

                            <div class="col_full nobottommargin">
                                <a href="index.php"><button type="button" class="button button-3d button-black nomargin" style="width: 100%" id="new_submit" name="new_submit" value="Retrieve">الصفحة الرئيسية</button></a>
                            </div>
                            <div class="col_full topmargin-sm nobottommargin">
                                <a href="forgot_password.php" class="fright text-center" style="width: 100%">إستعادة كلمة المرور</a>
                            </div>
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