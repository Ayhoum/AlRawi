<?php
session_start();
ob_start();
include '../scripts/db_connection.php';
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

$paidQuery = "SELECT * FROM PAID_EXAM";
$paid_num_rows = mysqli_query($mysqli, $paidQuery);
$paidRows = mysqli_num_rows($paid_num_rows);

$examsQuery = "SELECT * FROM QUESTION_SET";
$exams_num_rows = mysqli_query($mysqli, $examsQuery);
$examsRows = mysqli_num_rows($exams_num_rows);
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
                        <a href="javascript:" class="navbar-minimalize minimalize-styl-2  float-left "><i class="fa fa-bars"></i></a>
                    </div>

                    <!-- END LOGO -->

                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav float-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                    <img alt="" class="rounded-circle" src="assets/images/avtar-3.jpg">
                                </a>
                                <div class="dropdown-menu dropdown-menu-default">
                                    <a class="dropdown-item" href="../logout.php">
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
                            <li class="nav-heading"><span>USERS ISSUES</span></li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <!--                                    <li><a href="user_profile.html">profile</a></li>-->
                                    <li><a href="user_list.php">Users list</a></li>
                                </ul>
                            </li>
                            <li class="nav-heading"><span>FREE EXAMS</span></li>
                            <li>
                                <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Free Exams</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_free_exam.php">New Exam</a></li>
                                    <li><a href="free_exams.php"> Manage Free Exams</a></li>
                                </ul>
                            </li>
                            <li class="nav-heading"><span>PAID EXAMS</span></li>
                            <li>
                                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Paid Exams</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_paid_exam.php">New Exam</a></li>
                                    <li><a href="paid_exams.php"> Manage Paid Exams</a></li>
                                    <li><a href="paid_exams_stats.php"> Paid Exams Stats</a></li>
                                </ul>
                            </li>
                            <li class="nav-heading"><span>PRIVATE SESSIONS</span></li>
                            <li>
                                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Private Sessions</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="manage_private_session.php">Manage Private Sessions</a></li>
                                </ul>
                            </li>

                        </ul>
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
                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div class="row">

                            <div class="col-md-6 col-lg-3">
                                <div class="card white-text clearfix" style="background-color: #E91E63 !important;">

                                    <div class="card-content clearfix">
                                        <i class="icon-user background-icon"></i>
                                        <p class="card-stats-title right card-title  wdt-lable">TOTAL USERS NO.</p>
                                        <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $totalUsers; ?></h4>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="card white-text clearfix" style="background-color: #FF9800 !important;">

                                    <div class="card-content clearfix">
                                        <i class="fa fa-user-plus background-icon"></i>
                                        <p class="card-stats-title right card-title  wdt-lable">NEW USERS NO.</p>
                                        <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $todayUsers ?></h4>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="card white-text clearfix" style="background-color: #8BC34A !important;">

                                    <div class="card-content clearfix">
                                        <i class="fa fa-file-text-o background-icon"></i>
                                        <p class="card-stats-title right card-title  wdt-lable">TOTAL EXAMS NO.</p>
                                        <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $examsRows ?></h4>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="card white-text clearfix" style="background-color: #00BCD4 !important;">

                                    <div class="card-content clearfix">
                                        <i class="fa fa-shopping-cart background-icon"></i>
                                        <p class="card-stats-title right card-title  wdt-lable">PURCHASES NO.</p>
                                        <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $paidRows ?></h4>

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">


                                <div class="panel cyan white-text panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="panel-heading cyan">
                                        Latest Users
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        <div class="card-block">
                                        <div class="margin-t-10">

                                            <?php
                                            $query = "SELECT * FROM Users ORDER BY ID DESC LIMIT 6";
                                            $select_users = mysqli_query($mysqli, $query);
                                            while($row = mysqli_fetch_assoc($select_users)) {
                                                echo "<div class='black-text message-content'>";
                                                echo "<div>";
                                                if($row['SITUATION'] == "TRAINING"){
                                                    echo "<small class='right white-text'><i class='fa fa-check'></i></small>";
                                                }
                                                echo "<strong>" . $row['NAME'] . "</strong>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            ?>
                                        </div>
                                        </div>
                                    </div>
                                </div><!-- End .panel -->
                            </div>
                                <div class="col-md-6">


                                    <div class="panel white-text panel-card recent-activites" style="background-color: #009688 !important;">
                                        <!-- Start .panel -->
                                        <div class="panel-heading" style="background-color: #009688 !important;">
                                            NUMBER OF USERS EACH MONTH
                                        </div>
                                        <div class="panel-body  p-xl-3">

                                            <div class="margin-t-10">
                                                <div class="card-block">

                                                <div class='black-text message-content'>
                                                    <div>

                                                        <?php
                                                        $date = date("Y-m-d", strtotime('last day of this month'));
                                                        $dateMin = date("Y-m-d", strtotime('first day of this month'));
                                                        $usersNoThis = 0;
                                                        $query = "SELECT * FROM Users";
                                                        $select_users = mysqli_query($mysqli, $query);
                                                        while($row = mysqli_fetch_assoc($select_users)) {
                                                            if ($row['REG_DATE'] > $dateMin && $row['REG_DATE'] < $date) {
                                                                $usersNoThis++;
                                                            }
                                                        }
                                                        ?>
                                                        <strong>THIS MONTH</strong>
                                                        <small class="float-right"><b style="font-size:  20px;"><?php echo $usersNoThis; ?></b> <small><?php if($usersNoThis == 1){echo "User";}else{echo "Users";} ?></small></small>
                                                    </div>
                                                </div>

                                                <div class='black-text message-content'>
                                                    <div>

                                                        <?php
                                                        $date = date("Y-m-d", strtotime('last day of last month'));
                                                        $dateMin = date("Y-m-d", strtotime('first day of last month'));
                                                        $usersNoLast = 0;
                                                        $query = "SELECT * FROM Users";
                                                        $select_users = mysqli_query($mysqli, $query);
                                                        while($row = mysqli_fetch_assoc($select_users)) {
                                                            if ($row['REG_DATE'] > $dateMin && $row['REG_DATE'] < $date) {
                                                                $usersNoLast++;
                                                            }
                                                        }
                                                        ?>
                                                        <strong>LAST MONTH</strong>
                                                        <small class="float-right"><b style="font-size:  20px;"><?php echo $usersNoLast; ?></b> <small><?php if($usersNoLast == 1){echo "User";}else{echo "Users";} ?></small></small>
                                                    </div>
                                                </div>

                                                <div class='black-text message-content'>
                                                    <div>

                                                        <?php
                                                        $date = date("Y-m-d", strtotime('last day of -2 month'));
                                                        $dateMin = date("Y-m-d", strtotime('first day of -2 month'));
                                                        $usersNo2 = 0;
                                                        $query = "SELECT * FROM Users";
                                                        $select_users = mysqli_query($mysqli, $query);
                                                        while($row = mysqli_fetch_assoc($select_users)) {
                                                            if ($row['REG_DATE'] > $dateMin && $row['REG_DATE'] < $date) {
                                                                $usersNo2++;
                                                            }
                                                        }
                                                        ?>
                                                        <strong>2 MONTHS AGO</strong>
                                                        <small class="float-right"><b style="font-size:  20px;"><?php echo $usersNo2; ?></b> <small><?php if($usersNo2 == 1){echo "User";}else{echo "Users";} ?></small></small>
                                                    </div>
                                                </div>

                                                <div class='black-text message-content'>
                                                    <div>
                                                        <?php
                                                        $date = date("Y-m-d", strtotime('last day of -3 month'));
                                                        $dateMin = date("Y-m-d", strtotime('first day of -3 month'));
                                                        $usersNo3 = 0;
                                                        $query = "SELECT * FROM Users";
                                                        $select_users = mysqli_query($mysqli, $query);
                                                        while($row = mysqli_fetch_assoc($select_users)) {
                                                            if ($row['REG_DATE'] > $dateMin && $row['REG_DATE'] < $date) {
                                                                $usersNo3++;
                                                            }
                                                        }
                                                        ?>
                                                        <strong>3 MONTHS AGO</strong>
                                                        <small class="float-right"><b style="font-size:  20px;"><?php echo $usersNo3; ?></b> <small><?php if($usersNo3 == 1){echo "User";}else{echo "Users";} ?></small></small>
                                                    </div>
                                                </div>



                                                <div class='black-text message-content'>
                                                    <div>
                                                        <?php
                                                        $date = date("Y-m-d", strtotime('last day of -4 month'));
                                                        $dateMin = date("Y-m-d", strtotime('first day of -4 month'));
                                                        $usersNo4 = 0;
                                                        $query = "SELECT * FROM Users";
                                                        $select_users = mysqli_query($mysqli, $query);
                                                        while($row = mysqli_fetch_assoc($select_users)) {
                                                            if ($row['REG_DATE'] > $dateMin && $row['REG_DATE'] < $date) {
                                                                $usersNo4++;
                                                            }
                                                        }
                                                        ?>
                                                        <strong>4 MONTHS AGO</strong>
                                                        <small class="float-right"><b style="font-size:  20px;"><?php echo $usersNo4; ?></b> <small><?php if($usersNo4 == 1){echo "User";}else{echo "Users";} ?></small></small>
                                                    </div>
                                                </div>

                                                <div class='black-text message-content'>
                                                    <div>
                                                        <?php
                                                        $allUsers = $usersNoThis + $usersNoLast + $usersNo2 + $usersNo3 + $usersNo4;
                                                        ?>
                                                        <strong>ALL</strong>
                                                        <small class="float-right"><b style="font-size:  20px;"><?php echo $allUsers; ?></b> <small><?php if($allUsers == 1){echo "User";}else{echo "Users";} ?></small></small>
                                                    </div>
                                                </div>


                                            </div>
                                            </div>

                                        </div>
                                    </div><!-- End .panel -->


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
                                            <div id="students"></div>
                                        </div>
                                    </div>
                                </div><!-- End .panel --> 

                            </div>
                        </div>

                    </div> 
                    <div class="clearfix"></div>
                    <div class="footer">
                        <?php
                        $query = "SELECT * FROM Website";
                        $getWeb = mysqli_query($mysqli,$query);
                        while ($row = mysqli_fetch_assoc($getWeb)){
                            $website = $row['DevWeb'];
                        }
                        ?>
                        <div>
                            <strong>Copyright</strong> <a target="_blank" href="<?php echo $website;?>">El-Semicolon;</a> © <?php echo date('Y') ;?>
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


       <script>
           var newUsers = <?php echo round($newPer, 1); ?>;
           var trainingUsers = <?php echo round($trainingPer, 1); ?>;
           var succeededUsers = <?php echo round($succeededPer, 1); ?>;
           var chart = c3.generate({
               bindto: '#students',
               data: {
                   columns: [
                       ['Succeeded', succeededUsers],
                       ['Training', trainingUsers],
                       ['New', newUsers]
                   ],
                   type : 'donut',
                   colors: {
                       Succeeded: '#ff9800',
                       Training: '#e91e63',
                       New: '#f44242'

                   },
                   onclick: function (d, i) { console.log("onclick", d, i); },
                   onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                   onmouseout: function (d, i) { console.log("onmouseout", d, i); }
               },
               donut: {
                   title: "Students situation"
               }
           });
       </script>
    </body>
</html>