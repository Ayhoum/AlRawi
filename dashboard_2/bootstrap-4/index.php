<?php
session_start();
ob_start();
include '../../scripts/db_connection.php';
$date = date('Y-m-d');
if($_SESSION['role'] != "MainAdmin"){
    header("Location: ../index.php");
}
$countNew = 0;
$countSucceeded = 0;
$countTraining = 0;
$todayUsers = 0;

$query = "SELECT * FROM Users ORDER BY ID DESC";
$select_users = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_users)){
    if($row['SITUATION'] == "NEW"){
        $countNew++;
    }
    elseif ($row['SITUATION'] == "TRAINING"){
        $countTraining++;
    }
    elseif ($row['SITUATION'] == "SUCCEEDED"){
        $countSucceeded++;
    }
    if($row['REG_DATE'] == $date){
        $todayUsers++;
    }
    $totalUsers = $countNew + $countSucceeded + $countTraining ;
    if($totalUsers != 0){
        $newPer = ($countNew / $totalUsers) * 100;
        $trainingPer = ($countTraining / $totalUsers) * 100;
        $succeededPer = ($countSucceeded / $totalUsers) * 100;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Al-Rawi Admin Dashboard</title>
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
 <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css"/>
        <!-- THEME CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme/dark.css" rel="stylesheet" type="text/css" />

        <!-- PAGE LEVEL SCRIPTS -->

    </head>
    <body>

       <div id="wrapper">
            <!-- BEGIN HEADER -->
           <div class="page-header navbar fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.php">
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
                                    <li><a href="manage_free_exams.php"> Manage FREE Exams</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Paid Exams</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_paid_exam.php">New Exam</a></li>
                                    <li><a href="manage_paid_exams.php"> Manage PAID Exams</a></li>
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
                                   
                                            <h4 class="float-left">Dashboard</h4>

                                            <ol class="breadcrumb float-left float-md-right">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                                <li class="breadcrumb-item">Dashboard</li>
                                            </ol>
                                        
                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div class="row">

                            <div class="col-md-6 col-lg-3">
                                <div class="card orange white-text clearfix">

                                    <div class="card-content clearfix">
                                        <i class="icon-user background-icon"></i>
                                        <p class="card-stats-title right card-title  wdt-lable">All Users</p>
                                        <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $totalUsers; ?></h4>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="card green white-text clearfix">

                                    <div class="card-content clearfix">
                                        <i class="icon-graph background-icon"></i>
                                        <p class="card-stats-title right card-title  wdt-lable">New Users</p>
                                        <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $todayUsers ?></h4>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        STUDENTS STATS
                                    </div>
                                    <div class="card-block">
                                        <div class="margin-t-10">
                                            <div id="spline"></div>
                                        </div>
                                    </div>
                                </div><!-- End .panel --> 

                            </div>
                        </div>
                        <div class="row">

                        </div>

                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        Calendar
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu panel-dropdown" role="menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="dropdown-dropdown-divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block text-xs-center">

                                        <div id="cw-body"></div>


                                    </div>
                                </div><!-- End .panel -->
                            </div>
                            <div class="col-sm-4">
                                <div class="card panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        Chat
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu panel-dropdown" role="menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="dropdown-dropdown-divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block text-xs-center">



                                        <!--Widget body-->
                                        <div id="demo-chat-body" class="in ">
                                            <div class="scrollerchat h600">
                                                <div class="pad-all">
                                                    <ul class="list-unstyled media-block">
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="assets/images/avatar1.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor">
                                                                <div class="speech">                                                               
                                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i>09:23AM
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="assets/images/avatar2.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">                                                              
                                                                    <p>Hi, I want to buy a new shoes.</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:23AM
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="assets/images/avatar1.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor">
                                                                <div class="speech">

                                                                    <p>Shipment is free. You\'ll get your shoes tomorrow!</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:25
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="assets/images/avatar2.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">

                                                                    <p>Wow, that\'s great!</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:27
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="assets/images/avatar2.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">

                                                                    <p>Ok. Thanks for the answer. Appreciated.</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:28
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="assets/images/avatar1.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor">
                                                                <div class="speech">

                                                                    <p>You are welcome! <br> Is there anything else I can do for you today?</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:30
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-right">
                                                                <img src="assets/images/avatar2.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor speech-right">
                                                                <div class="speech">

                                                                    <p>Nope, That\'s it.</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:31
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="mar-btm">
                                                            <div class="media-left">
                                                                <img src="assets/images/avatar1.png" class="rounded-circle img-sm" alt="Profile Picture">
                                                            </div>
                                                            <div class="media-body pad-hor">
                                                                <div class="speech">

                                                                    <p>Thank you for contacting us today</p>
                                                                    <p class="speech-time">
                                                                        <i class="fa fa-clock-o fa-fw"></i> 09:32
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </div>

                                            <!--Widget footer-->
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-xs-8">
                                                        <input type="text" placeholder="Enter your text" class="form-control chat-input">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <button class="btn btn-primary btn-block" type="submit">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div><!-- End .panel -->
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
        <script src="assets/plugins/map/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/plugins/map/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/plugins/morris_chart/morris.js"></script>
        <script src="assets/plugins/morris_chart/raphael-2.1.0.min.js"></script>
        <!-- PAGE LEVEL FILES -->
        <script src="assets/plugins/data-tables/jquery.dataTables.js"></script>
        <script src="assets/plugins/data-tables/dataTables.tableTools.js"></script>
        <script src="assets/plugins/data-tables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/plugins/data-tables/dataTables.responsive.js"></script>
        <script src="assets/plugins/data-tables/tables-data.js"></script>
        <!-- Custom FILES -->
        <script type="text/javascript" src="assets/js/custom.js"></script>
            <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script type="text/javascript" src="assets/js/index.js"></script>
    </body>
</html>