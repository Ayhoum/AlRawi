<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 20-11-2017
 * Time: 22:00
 */
include '../../scripts/db_connection.php';
if (isset($_GET['id']) && ($_GET['qset'])) {
$qset = $_GET['qset'];
$setId = $_GET['id'];
echo $setId.' - - - - - - '.$qset;
//
//    if (isset($_POST['update'])) {
//     $number =  $setId;
//     $question_set_id= $qset;
//     $question1 = $_POST['question'];
//     $right_ans1 = $_POST['right_answer'];
//     $answer_2 = $_POST['2nd_answer'];
//     $answer_3 = $_POST['3rd_answer'];
//     $answer_4 = $_POST['4th_answer'];
//     $picture = $_POST['picture'];
//     $type_1 = $_POST['type'];
//
//        $query = "UPDATE EXAM_QUESTION SET QUESTION = '{$question1}', RIGHT_ANWSER = '{$right_ans1}', ANSWER_2 = '{$answer_2}', ANSWER_3 = '{$answer_3}', ANSWER_4 = '{$answer_4}', PICTURE = '{$picture}', TYPE = '{$type_1}' WHERE NUMBER = '{$number}'";
//        $update_result = mysqli_query($mysqli, $query);
//
//    if (mysqli_num_rows($update_result) > 0) {
//        echo 'Question edited successfully';
//        header('Location: index.php');
//    } else {
//        echo 'error !!';
//    }
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Paid Exam Question</title>
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
                            <h4 class="float-left">Question</h4>
                        </div>
                    </div>
                </div><!-- end .page title-->

                <div class="row">
                    <!-- Start .panel -->
                    <?php
                    // Check if the question is exists in DB..
                    $select_query = "SELECT * FROM `EXAM_QUESTION` WHERE `NUMBER` = '{$setId}'";
                    $select_result = mysqli_query($mysqli, $select_query);
                    if (mysqli_num_rows($select_result) > 0) {
                        echo 'YES';
                    } else{
                        if (isset($_POST['submit'])) {
                            $question_set_id = 1 ;
                            $number = 5;
                            $question = $_POST['question'];
                            $right_ans = $_POST['right_answer'];
                            $answer_2 = $_POST['2nd_answer'];
                            $answer_3 = $_POST['3rd_answer'];
                            $answer_4 = $_POST['4th_answer'];
                            $pic = $_POST['picture'];
                            $type = $_POST['type'];
                            $query = "INSERT INTO `EXAM_QUESTION`(`NUMBER`, `QUESTION`, `RIGHT_ANWSER`, `ANSWER_2`, `ANSWER_3`, `ANSWER_4`, `PICTURE`, `TYPE`, `QUESTION_SET_ID`)";
                            $query .= "VALUES ( '{$number}',
                                                    '{$question}',
                                                    '{$right_ans}',
                                                    '{$answer_2}',
                                                    '{$answer_3}',
                                                    '{$answer_4}',
                                                    '{$pic}',
                                                    '{$type}',
                                                    '{$question_set_id}')";
                            $result = mysqli_query($mysqli, $query);
                            if (mysqli_num_rows($result) > 0) {
                                echo 'Question added successfully';
                                header('Location: index.php');
                            } else {
                                echo 'error !!';
                            }
                        }
//}
                        ?>
                        <div class="col-md-12">
                            <div class="panel panel-card margin-b-30">
                                <div class="panel-body  p-xl-3">

                                    <form  method="post" action="paid_question.php" data-toggle="validator">
                                        <div class="form-group row"><label>Question:</label>
                                            <input type="text" name="question" placeholder="Enter the question" class="form-control" required>
                                        </div>

                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group row"><label>Right Answer: </label>
                                            <input type="text" name="right_answer" placeholder="Type the right answer" class="form-control" required>
                                        </div>
                                        <div class="form-group row"><label>2ND Answer: </label>
                                            <input type="text" name="2nd_answer" placeholder="Type the 2nd answer" class="form-control" required>
                                        </div>
                                        <div class="form-group row"><label>3RD Answer: </label>
                                            <input type="text" name="3rd_answer" placeholder="Type the 3rd answer" class="form-control" required>
                                        </div>
                                        <div class="form-group row"><label>4TH Answer: </label>
                                            <input type="text" name="4th_answer" placeholder="Type the 4th answer" class="form-control" required>
                                        </div>

                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group row"><label>Picture: </label>
                                            <input type="text" name="picture" placeholder="" class="form-control" required>
                                        </div>

                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group row"><label>Question Type : </label>
                                            <select class="form-control m-b" name="type" required>
                                                <option value="">Select a question type</option>
                                                <option value="1">option 1</option>
                                                <option value="2">option 2</option>
                                                <option value="3">option 3</option>
                                            </select>
                                        </div>

                                        <div class="hr-line-dashed"></div>

                                        <div class="form-group row">
                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit" name="submit"><strong>Add Question</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    //                            while ($row = mysqli_fetch_assoc($select_result)) {
                    //                                $number = $row['NUMBER'];
                    //                                $question = $row['QUESTION'];
                    //                                $right_ans = $row['RIGHT_ANWSER'];
                    //                                $ans_2 = $row['ANSWER_2'];
                    //                                $ans_3 = $row['ANSWER_3'];
                    //                                $ans_4 = $row['ANSWER_4'];
                    //                                $pic = $row['PICTURE'];
                    //                                $type = $row['TYPE'];
                    //                                ?>
                    <!--                                <div class="col-md-12">-->
                    <!--                                    <div class="panel panel-card margin-b-30">-->
                    <!--                                        <div class="panel-body  p-xl-3">-->
                    <!---->
                    <!--                                            <form method="post" action="--><?php //echo $_SERVER['PHP_SELF']; ?><!--"-->
                    <!--                                                  data-toggle="validator">-->
                    <!--                                                <div class="form-group row"><label>Question:</label>-->
                    <!--                                                    <input type="text" name="question"-->
                    <!--                                                           placeholder="--><?php //echo $question ?><!--" class="form-control"-->
                    <!--                                                           required>-->
                    <!--                                                </div>-->
                    <!---->
                    <!--                                                <div class="hr-line-dashed"></div>-->
                    <!---->
                    <!--                                                <div class="form-group row"><label>Right Answer: </label>-->
                    <!--                                                    <input type="text" name="right_answer"-->
                    <!--                                                           placeholder="--><?php //echo $right_ans ?><!--" class="form-control"-->
                    <!--                                                           required>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="form-group row"><label>2ND Answer: </label>-->
                    <!--                                                    <input type="text" name="2nd_answer"-->
                    <!--                                                           placeholder="--><?php //echo $ans_2 ?><!--" class="form-control"-->
                    <!--                                                           required>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="form-group row"><label>3RD Answer: </label>-->
                    <!--                                                    <input type="text" name="3rd_answer"-->
                    <!--                                                           placeholder="--><?php //echo $ans_3 ?><!--" class="form-control"-->
                    <!--                                                           required>-->
                    <!--                                                </div>-->
                    <!--                                                <div class="form-group row"><label>4TH Answer: </label>-->
                    <!--                                                    <input type="text" name="4th_answer"-->
                    <!--                                                           placeholder="--><?php //echo $ans_4 ?><!--" class="form-control"-->
                    <!--                                                           required>-->
                    <!--                                                </div>-->
                    <!---->
                    <!--                                                <div class="hr-line-dashed"></div>-->
                    <!---->
                    <!--                                                <div class="form-group row"><label>Picture: </label>-->
                    <!--                                                    <input type="text" name="picture" placeholder="--><?php //echo $pic ?><!--"-->
                    <!--                                                           class="form-control" required>-->
                    <!--                                                </div>-->
                    <!---->
                    <!--                                                <div class="hr-line-dashed"></div>-->
                    <!---->
                    <!--                                                <div class="form-group row"><label>Question Type : </label>-->
                    <!--                                                    <select class="form-control m-b" name="type" required>-->
                    <!--                                                        <option value="">--><?php //echo $type ?><!--</option>-->
                    <!--                                                        <option value="1">option 1</option>-->
                    <!--                                                        <option value="2">option 2</option>-->
                    <!--                                                        <option value="3">option 3</option>-->
                    <!--                                                    </select>-->
                    <!--                                                </div>-->
                    <!---->
                    <!--                                                <div class="hr-line-dashed"></div>-->
                    <!---->
                    <!--                                                <div class="form-group row">-->
                    <!--                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs"-->
                    <!--                                                            type="submit" name="update"><strong>Edit Question</strong>-->
                    <!--                                                    </button>-->
                    <!--                                                </div>-->
                    <!--                                            </form>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!---->
                    <!--                                --><?php
                    //                            }
                    //                            ?>
                    <!---->
                    <!--                            --><?php
                    //                        }
                    }
                    ?>

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