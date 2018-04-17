<?php
ob_start();
session_start();

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
    <title>Al Rawi Theorie | Facebook Sign up</title>

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
                                <h4 class="text-center" style="color: red; direction: rtl">عذراً، لزيـادة الأمان في الموقع فإن خدمة التسجيل عن طريق الفيس بوك متوقفة حالياً</h4>
                                <h5 class="text-center">منصة فيس بوك تواجه عدة مشاكل بعملية التنسيق مع عمليات التسجيل في المواقع</h5>
                                <h5 class="text-center" style="direction: rtl">لذلك يرجى تسجيل حساب جديد عن طريق الايميل! ومراسلتنا في حال كان لديكم باقات مشتراة</h5>
                            <div class="col_full nobottommargin">
                                    <a href="signup.php"><button class="button button-3d button-black nomargin" style="width: 100%" id="login_submit" name="login_submit">تسجيل حسـاب جديد</button></a>
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

<script>

    if($(window).width() < 767) {
        jQuery('.button-blue').html('<i class="icon-facebook"></i>');
        jQuery('.button-blue').addClass('width_full');
    }else{
        jQuery('.button-blue').html('<i class="icon-facebook"></i> سجـل الدخول عن طريق الفيس بوك');

    }

</script>

</body>
</html>