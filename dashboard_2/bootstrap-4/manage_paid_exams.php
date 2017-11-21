<?php
session_start();
ob_start();
include '../../scripts/db_connection.php';

if (isset($_GET['id'])) {
$setId = $_GET['id'];
//$qSet = $_GET['qset'];
}
$changed = 0;
//require_once 'test.php';
//$date = date('Y-m-d');
if ($_SESSION['role'] != "MainAdmin") {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Absolute Admin</title>
    <meta name="keywords" content="HTML5,CSS3,Admin Template" />
    <meta name="description" content="" />
    <meta name="Author" content="Psd2allconversion [www.psd2allconversion.com]" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/metis-menu/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/simple-line-icons-master/css/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/c3/c3.min.css" rel="stylesheet">
    <link href="assets/plugins/widget/widget.css" rel="stylesheet">
    <link href="assets/plugins/calendar/fullcalendar.min.css" rel="stylesheet">
    <link href="assets/plugins/ui/jquery-ui.css" rel="stylesheet">

    <!-- THEME CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme/dark.css" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->

</head>
<body>

<!-- wrapper -->
<div id="wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.html">
                    <img src="assets/images/logo.png" alt="absolute admin" class="img-fluid logo-default"/> </a>

            </div><div class="menu-toggler sidebar-toggler">
                <a href="javascript:;" class="navbar-minimalize minimalize-styl-2  float-left "><i class="fa fa-bars"></i></a>
            </div>

            <div class="search-bar">
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">

                    </div>
                </form>
            </div>
            <!-- END LOGO -->

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav float-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="page_user_profile_1.html">view all</a>
                            </li>
                            <li>  <ul class="dropdown-menu-list scroller" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 New Email</span> </h3>
                                <a href="page_user_profile_1.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller"  data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> 12 New Inbox. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> 10 Spam. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> 2 Trash. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> 5 Social. </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                        </a>
                        <ul class="dropdown-menu extended tasks animated flipInX">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">12 pending</span> tasks</h3>
                                <a href="app_todo.html">view all</a>
                            </li>
                            <li>

                                <ul class="dropdown-menu-list scroller" data-handle-color="#637283" data-initialized="1">
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New release v1.2 </span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 40%;" class="progress-bar progress-bar-success" >
                                                            <span class="sr-only">40% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Application deployment</span>
                                                        <span class="percent">65%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 65%;" class="progress-bar progress-bar-danger">
                                                            <span class="sr-only">65% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile app release</span>
                                                        <span class="percent">98%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 98%;" class="progress-bar progress-bar-success" >
                                                            <span class="sr-only">98% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">10%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 10%;" class="progress-bar progress-bar-warning">
                                                            <span class="sr-only">10% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Web server upgrade</span>
                                                        <span class="percent">58%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 58%;" class="progress-bar progress-bar-info" >
                                                            <span class="sr-only">58% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">85%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 85%;" class="progress-bar progress-bar-success" >
                                                            <span class="sr-only">85% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New UI release</span>
                                                        <span class="percent">38%</span>
                                                    </span>
                                            <span class="progress progress-striped">
                                                        <span style="width: 38%;" class="progress-bar progress-bar-important" >
                                                            <span class="sr-only">38% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                            <img alt="" class="rounded-circle" src="assets/images/avtar-1.jpg">

                        </a>
                        <div class="dropdown-menu dropdown-menu-default">
                            <a class="dropdown-item" href="#"><i class="icon-user"></i> My Profile </a>
                            <a class="dropdown-item" href="#"><i class="icon-calendar"></i> My Calendar </a>
                            <a class="dropdown-item" href="#"><i class="icon-envelope-open"></i> My Inbox
                                <span class="badge badge-danger"> 3 </span>
                            </a>
                            <a class="dropdown-item" href="#"><i class="icon-rocket"></i> My Tasks
                                <span class="badge badge-success"> 7 </span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="icon-lock"></i> Lock Screen </a>
                            <a class="dropdown-item" href="#">
                                <i class="icon-key"></i> Log Out </a>
                        </div>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT dropdown-divider -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT dropdown-divider -->

    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="index.php"><i class="icon-grid"></i> <span class="nav-label">Dashboard</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in">
                            <li><a href="index.php">Home</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Free Exams</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="add_free_exam.php">New Exam</a></li>
                            <li><a href="free_exams.php"> Manage FREE Exams</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Paid Exams</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="add_paid_exam.php">New Exam</a></li>
                            <li><a href="paid_exams.php"> Manage PAID Exams</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <!--                                    <li><a href="user_profile.html">profile</a></li>-->
                            <li><a href="user_list.php">User list</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </nav>
            <!-- END SIDEBAR -->
        </aside>


        <!-- BEGIN CONTENT BODY -->
        <div class="page-content-wrapper">
            <div class="content-wrapper container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">

                            <h4 class="float-left">Manage Paid Exams</h4>

                            <ol class="breadcrumb float-left float-md-right">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Empty Page</li>
                            </ol>

                        </div>
                    </div>
                </div><!-- end .page title-->


                <?php
                $query = "SELECT * FROM QUESTION_SET WHERE ID = $setId";
                $select_exams = mysqli_query($mysqli, $query);
                while ($row = mysqli_fetch_assoc($select_exams)) {
                    $name = $row['EXAM_NAME'];
                    $begin = $row['BEGIN_ID'];
                    $beginValue = (($begin - 1));
                }
                ?>
                <div class="panel panel-card margin-b-30">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        EXAM NAME : <?php echo $name;?>
                    </div>
                        <div class="panel-body  p-xl-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 1; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 1) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>1</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 2; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 2) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>2</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 3; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 3) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>3</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 4; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 4) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>4</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 5; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 5) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>5</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 6; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 6) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>6</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 7; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 7) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>7</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 8; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 8) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>8</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 9; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 9) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>9</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 10; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 10) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>10</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 11; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 11) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>11</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 12; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 12) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>12</button></a>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px ;">
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 13; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 13) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>13</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 14; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 14) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>14</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 15; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 15) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>15</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 16; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 16) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>16</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 17; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 17) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>17</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 18; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 18) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>18</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 19; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 19) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>19</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 20; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 20) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>20</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 21; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 21) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>21</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 22; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 22) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>22</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 23; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 23) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>23</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 24; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 24) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>24</button></a>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px ;">
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 25; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 25) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>25</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 26; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 26) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>26</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 27; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 27) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>27</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 28; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 28) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>28</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 29; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 29) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>29</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 30; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 30) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>30</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 31; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 31) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>31</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 32; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 32) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>32</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 33; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 33) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>33</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 34; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 34) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>34</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 35; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 35) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>35</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 36; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 36) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>36</button></a>
                                        </div>
                                    </div >
                                    <div class="row" style="margin-top:15px ;">
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 37; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 37) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>37</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 38; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 38) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>38</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 39; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 39) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>39</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 40; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 40) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>40</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 41; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 41) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>41</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 42; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 42) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>42</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 43; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 43) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>43</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 44; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 44) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>44</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 45; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 45) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>45</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 46; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 46) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>46</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 47; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 47) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>47</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 48; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 48) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>48</button></a>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px ;">
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 49; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 49) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>49</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 50; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 50) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>50</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 51; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 51) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>51</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 52; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 52) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>52</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 53; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 53) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>53</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 54; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 54) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>54</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 55; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 55) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>55</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 56; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 56) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>56</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 57; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 57) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>57</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 58; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 58) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>58</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 59; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 59) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>59</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 60; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 60) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>60</button></a>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:15px ;">
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 61; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 61) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>61</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 62; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 62) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>62</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 63; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 63) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>63</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 64; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 64) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>64</button></a>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="paid_question.php?id=<?php echo $beginValue + 65; ?>&qset=<?php echo "$setId";?>"> <button style="width: 100%" type="button" class="btn btn-primary"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 65) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='fa fa-check' aria-hidden='true'></i>";} ?>65</button></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>


                                <div class="clearfix"></div>
                                <div class="footer">
                                    <div>
                                        <strong>Copyright</strong> El-Semicolon; © 2017
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTAINER -->
</div>
<!-- /wrapper -->


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>


<!-- PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div><!-- /PRELOADER -->


<!-- JAVASCRIPT FILES -->

<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/metis-menu/metisMenu.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/tether.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/slim-scroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/c3/d3.v3.min.js" charset="utf-8"></script>
<script src="assets/plugins/c3/c3.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/calendar/moment.min.js"></script>
<script src="assets/plugins/calendar/fullcalendar.min.js"></script>
<script src="assets/plugins/ui/jquery-ui.js"></script>


<!-- PAGE LEVEL FILES -->
<script src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script src="assets/plugins/data-tables/dataTables.tableTools.js"></script>
<script src="assets/plugins/data-tables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/data-tables/dataTables.responsive.js"></script>
<script src="assets/plugins/data-tables/tables-data.js"></script>
<!-- Custom FILES -->
<script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>