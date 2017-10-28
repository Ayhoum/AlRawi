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

    $newPer = ($countNew / $totalUsers) * 100;
    $trainingPer = ($countTraining / $totalUsers) * 100;
    $succeededPer = ($countSucceeded / $totalUsers) * 100;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Alrawi Theorie - Admin Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/1.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="dashboard.php">ADMINBSB - MATERIAL DESIGN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $_SESSION['username'] ?></b></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../index.php"><i class="material-icons">desktop_mac</i>Website</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="header">USERS ISSUES</li>
                    <li>
                        <a href="users.php">
                            <i class="material-icons">person</i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="header">EXAMS ISSUES</li>
                    <li>
                        <a href="users.php">
                            <i class="material-icons">create_new_folder</i>
                            <span>New Exam</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - Developed by <a target="_blank" href="http://www.el-semicolon.nl/">El-Semicolon</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo" class="active">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL USERS NO.</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalUsers; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW USERS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $todayUsers; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">insert_drive_file</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL EXAMS NO.</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">PURCHASES NO.</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="row clearfix">
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">LATEST USERS</div>
                            <ul class="dashboard-stat-list">

                                <?php
                                $query = "SELECT * FROM Users ORDER BY ID DESC LIMIT 6";
                                $select_users = mysqli_query($mysqli, $query);
                                while($row = mysqli_fetch_assoc($select_users)) {
                                    echo "<li>";
                                    echo $row['NAME'];
                                    echo "<span class='pull-right'>";
                                    echo "<i class='material-icons'>done</i>";
                                    echo "</span>";
                                    echo "</li>";
                                }
                                ?>
<!--                                <span class="pull-right">-->
<!--                                    <i class="material-icons">clear</i>-->
<!--                                </span>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">NUMBER OF USERS EACH MONTH</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    THIS MONTH
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
                                    <span class="pull-right"><b style="font-size:  20px;"><?php echo $usersNoThis; ?></b> <small><?php if($usersNoThis == 1){echo "User";}else{echo "Users";} ?></small></span>
                                </li>


                                <li>
                                    LAST MONTH
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
                                    <span class="pull-right"><b style="font-size:  20px;"><?php echo $usersNoLast; ?></b> <small><?php if($usersNoLast == 1){echo "User";}else{echo "Users";} ?></small></span>
                                </li>

                                <li>
                                    2 MONTHS AGO
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
                                    <span class="pull-right"><b style="font-size:  20px;"><?php echo $usersNo2; ?></b> <small><?php if($usersNo2 == 1){echo "User";}else{echo "Users";} ?></small></span>
                                </li>

                                <li>
                                    3 MONTHS AGO
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
                                    <span class="pull-right"><b style="font-size:  20px;"><?php echo $usersNo3; ?></b> <small><?php if($usersNo3 == 1){echo "User";}else{echo "Users";} ?></small></span>
                                </li>

                                <li>
                                    4 MONTHS AGO
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
                                    <span class="pull-right"><b style="font-size:  20px;"><?php echo $usersNo4; ?></b> <small><?php if($usersNo4 == 1){echo "User";}else{echo "Users";} ?></small></span>
                                </li>
                                <li>
                                    ALL
                                    <?php
                                    $allUsers = $usersNoThis + $usersNoLast + $usersNo2 + $usersNo3 + $usersNo4;
                                    ?>
                                    <span class="pull-right"><b style="font-size:  20px;"><?php echo $allUsers; ?></b> <small><?php if($allUsers == 1){echo "User";}else{echo "Users";} ?></small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>BROWSER USAGE</h2>
                        </div>
                        <div class="body">
                            <div id="donut_students" class="dashboard-donut-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>


    <script>
        var newUsers = <?php echo round($newPer, 1); ?>;
        var trainingUsers = <?php echo round($trainingPer, 1); ?>;
        var succeededUsers = <?php echo round($succeededPer, 1); ?>;
        initDonutChart();
        function initDonutChart() {
            Morris.Donut({
                resize: true,
                element: 'donut_students',
                data: [{
                    label: 'Succeeded',
                    value: succeededUsers
                }, {
                    label: 'Training',
                    value: trainingUsers
                }, {
                    label: 'New',
                    value: newUsers
                }],
                colors: ['rgb(255, 152, 0)', 'rgb(233, 30, 99)', 'rgb(244, 66, 66)'],
                formatter: function (y) {
                    return y + '%'
                }
            });
        }
    </script>

</body>

</html>