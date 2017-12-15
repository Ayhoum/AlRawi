<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
//if (!isset($_SESSION['username'])) {
//    header("Location: login.php");
//}
//if (isset($_GET['exam_id'])) {
//    $setId = $_GET['exam_id'];
//} else {
//    header('Location: profile.php');
//}
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="El-SemiColon;"/>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
        body{
            font-family: 'DroidArabicKufiRegular';
        }
        .navbar-brand-centered {
            position: absolute;
            left: 50%;
            display: block;
            width: 160px;
            text-align: center;
            background-color: transparent;
        }
        .navbar>.container .navbar-brand-centered,
        .navbar>.container-fluid .navbar-brand-centered {
            margin-left: -80px;
        }

    </style>

</head>



<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-centered">22:00</div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav">
                <li class="text-center"><a href="#"><button onclick="stopExam()" id="stopBut" class="btn btn-danger" >إيقاف الإمتحان</button></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="text-center"><a href="#"><i class="fa fa-flag fa-2x" aria-hidden="true"></i></a></li>
                <li class="dropdown text-center">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="text-center"><a href="#">Action</a></li>
                        <li class="text-center"><a href="#">Another action</a></li>
                        <li class="text-center"><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="text-center"><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li class="text-center"><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

</body>
</html>
