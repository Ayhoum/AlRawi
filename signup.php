<?php
include 'scripts/db_connection.php';

if(isset($_POST['signup_submit'])) {
    //Sender

    $userName       = $_POST['signup_username'];
    $userName       = mysqli_real_escape_string($mysqli,$userName);

    $password   = $_POST['signup_password'];
    $password   = mysqli_real_escape_string($mysqli,$password);

    $phone         = $_POST['signup_phone'];
    $phone         = mysqli_real_escape_string($mysqli,$phone);

    $birthday         = $_POST['signup_birthday'];
    $birthday         = mysqli_real_escape_string($mysqli,$birthday);

    $city        = $_POST['signup_city'];
    $city         = mysqli_real_escape_string($mysqli,$city);

    $encCode = ['cost' => 11];
    $encPassword = password_hash($password, PASSWORD_BCRYPT, $encCode);


    if(!empty($userName) && !empty($password) && !empty($phone) && !empty($birthday) && !empty($city)){
        $query = "INSERT INTO Users(EMAIL,
                                PASSWORD,
                                PHONE,
                                CITY,
                                BD) ";
        $query .= "VALUES('{$userName}',
                    '{$encPassword}',
                    '{$phone}',
                    '{$city}',
                    '{$birthday}') ";
        $insertUser =  mysqli_query($mysqli, $query);
        if (!$insertUser) {
            die("Failed!" . mysqli_error($mysqli));
        }else{
            header("Location: https://www.google.com");
        }
    }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="en-US">
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
    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="demos/travel/css/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/daterangepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Al Rawi Theorie | Sign Up</title>

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
                        <div class="panel-body travel-date-group" style="padding: 40px;">
                            <form id="signup-form" name="signup-form" class="nobottommargin" action="#" method="post">
                                <h3 class="text-center">قم بإنشاء حساب جديد</h3>

                                <div class="col_full">
                                    <label for="login-form-username">البريد الإلكتروني (اسم المستخدم):</label>
                                    <input type="email" id="signup_username" name="signup_username" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_half">
                                    <label for="login-form-password">كلمة مرور جديدة:</label>
                                    <input type="password" id="signup_password" name="signup_password" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="login-form-password">إعادة كلمة المرور:</label>
                                    <input type="password" id="signup_password_re" name="signup_password_re" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full">
                                    <label for="login-form-username">رقم الهاتف:</label>
                                    <input type="text" id="signup_phone" name="signup_phone" value="" class="form-control not-dark" />
                                </div>
                                <div class="col_half">
                                    <label for="login-form-username">تاريخ الميلاد:</label>
                                    <input type="text" value="" id="signup_birthday" name="signup_birthday" class="sm-form-control past-enabled" placeholder="DD/MM/YYYY">
                                </div>
                                <div class="col_half col_last">
                                    <label for="login-form-username">المدينة:</label>
                                    <input type="text" id="signup_city" name="signup_city" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" style="width: 100%" id="signup_submit" name="signup_submit" value="signup">إنشاء الحساب</button>
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
<!-- Date & Time Picker JS -->
<script type="text/javascript" src="js/components/moment.js"></script>
<script type="text/javascript" src="demos/travel/js/datepicker.js"></script>
<script type="text/javascript" src="js/components/timepicker.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="js/components/daterangepicker.js"></script>
<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>


<script type="text/javascript">
    $(function() {
        $('.travel-date-group .past-enabled').datepicker({
            autoclose: true
        });
    });
</script>
</body>
</html>