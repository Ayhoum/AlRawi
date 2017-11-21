<?php
session_start();
ob_start();
include '../../scripts/db_connection.php';
$date = date('Y-m-d');
if($_SESSION['role'] != "MainAdmin" || !isset($_GET['id'])){
    header("Location: ../index.php");
}
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "SELECT * FROM Users WHERE ID = $id";
$select_users = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_users)){
    $id      = $row['ID'];
    $email      = $row['EMAIL'];
    $password      = $row['PASSWORD'];
    $name       = $row['NAME'];
    $phone       = $row['PHONE'];
    $city       = $row['CITY'];
    $bd         = $row['BD'];
    $spent      = $row['SPENT'];
    $situation  = $row['SITUATION'];
    $reg        = $row['REG_DATE'];
    $newDate = date("d/m/Y", strtotime($reg));

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
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Free Exams</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="add_free_exam.php">New Exam</a></li>
                            <li><a href="manage_free_exams.php"> Manage FREE Exams</a></li>
                        </ul>
                    </li>
                    <li class="nav-heading"><span>PAID EXAMS</span></li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Paid Exams</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="add_paid_exam.php">New Exam</a></li>
                            <li><a href="manage_paid_exams.php"> Manage PAID Exams</a></li>
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


                            <h4 class="float-left">Data Tables  </h4>


                            <ol class="breadcrumb float-left float-md-right">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Data Tables  </li>
                            </ol>


                        </div>
                    </div>
                </div><!-- end .page title-->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-card recent-activites">
                            <!-- Start .panel -->
                            <div class="panel-heading">
                                <?php echo $name?>'s Inormation:
                            </div>
                            <div class="panel-body  p-xl-3">


                                <div class="col-md-12">
                                    <div class="row">
                                    <div class="col-md-4">
                                <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                    <h3><?php echo $id;?></h3>
                                    <span>ID</span>
                                </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                    <h3><?php echo $email;?></h3>
                                    <span>Email</span>
                                </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                    <h3><?php echo $name;?></h3>
                                    <span>Name</span>
                                </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $password?></h3>
                                                <span>Hashed Password</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $phone;?></h3>
                                                <span>Phone</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $city;?></h3>
                                                <span>City</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $bd;?></h3>
                                                <span>Birthday</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $spent;?></h3>
                                                <span>Spent</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="sale-state-box" style="<?php if($situation == "SUCCEEDED") {
                                                echo "background-color:rgb(255, 152, 0);";
                                            }elseif($situation == "NEW"){
                                                echo "background-color:rgb(244, 66, 66);";
                                            }else{
                                                echo "background-color:rgb(233, 30, 99);";
                                            }?>box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $situation;?></h3>
                                                <span>Situation</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="sale-state-box" style="background-color: #001d45;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3><?php echo $newDate;?></h3>
                                                <span>Registration Date</span>
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
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company © 2017
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

<!-- PAGE LEVEL FILES -->
<script src="assets/plugins/data-tables/jquery.dataTables.js"></script>
<script src="assets/plugins/data-tables/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/data-tables/dataTables.tableTools.js"></script>

<script src="assets/plugins/data-tables/dataTables.responsive.js"></script>
<script src="assets/plugins/data-tables/tables-data.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<!-- Custom FILES -->
<script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>