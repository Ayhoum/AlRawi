<?php
session_start();
ob_start();
include '../scripts/db_connection.php';
$date = date('Y-m-d');
if($_SESSION['role'] != "MainAdmin"){
    header("Location: ../index.php");
}
if(!isset($_GET['id'])){
    header("Location: user_list.php");
}
if (isset($_GET['id'])){
    $id = $_GET['id'];


    if(isset($_GET['delete'])){
        $deleteId = $_GET['delete'];

        $queryDelete = "DELETE FROM `PAID_EXAM` WHERE `PAYMENT_ID` = '{$deleteId}'";
        $run = mysqli_query($mysqli,$queryDelete);
        header("Location: user_info.php?id=$id");
    }


    if(isset($_GET['give_free_packet'])){

        $the_free_packet = $_GET['give_free_packet'];

        if($the_free_packet == "1week"){
            date_default_timezone_set('Europe/Amsterdam');
            $start_date = date('Y-m-d H:i:s ', time());

            $end_date = date("Y-m-d H:i:s ", strtotime('+20 days'));
        }else if($the_free_packet == "2week"){
            date_default_timezone_set('Europe/Amsterdam');
            $start_date = date('Y-m-d H:i:s ', time());

            $end_date = date("Y-m-d H:i:s ", strtotime('+35 days'));
        }else if($the_free_packet == "4week"){
            date_default_timezone_set('Europe/Amsterdam');
            $start_date = date('Y-m-d H:i:s ', time());

            $end_date = date("Y-m-d H:i:s ", strtotime('+60 days'));
        }
        $query = "INSERT INTO PAID_EXAM (Users_ID, PAYMENT_DATE, END_DATE )";
        $query .= "VALUES ('{$id}',
                             '{$start_date}',
                             '{$end_date}')";

        $result = mysqli_query($mysqli,$query);
        if(!$result){
            die("Failed!" . mysqli_error($mysqli));
        }
        header("Location: user_info.php?id=$id");
    }
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
                <a href="../index.php">
                    <img src="../images/adminLogo.png" alt="absolute admin" class="img-fluid logo-default"/> </a>

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
            </div>            <!-- END TOP NAVIGATION MENU -->
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
                        <a href="index.php"><i class="icon-grid"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <!--                                    <li><a href="user_profile.html">profile</a></li>-->
                            <li><a href="user_list.php">Users list</a></li>
                            <li><a href="free_packet.php">Give a free packet</a></li>
                            <li><a href="ba_users.php">Suspicious Users</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Free Exams</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li>
                                <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Free Exams Arabic</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_free_exam.php">New Exam</a></li>
                                    <li><a href="free_exams.php"> Manage Free Exams</a></li>
                                    <li style="background: #C35462;"><a href="add_free_exam_trucks.php">New <b style="color: #2A094A;">Trucks</b> Exam</a></li>
                                    <li style="background: #C35462;"><a href="free_exams_trucks.php"> Manage Free <b style="color: #2A094A;">Trucks</b> Exams</a></li>
                                </ul>
                            </li>
                            <li>

                                <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Free Exams English</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_free_exam_en.php">New Exam EN</a></li>
                                    <li><a href="free_exams_en.php"> Manage Free Exams EN</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">Free Exams Dutch</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_free_exam_nl.php">New Exam NL</a></li>
                                    <li><a href="free_exams_nl.php"> Manage Free Exams NL</a></li>
                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa  fa-dollar"></i> <span class="nav-label">Paid Exams</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Paid Exams Arabic</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_paid_exam.php">New Exam</a></li>
                                    <li><a href="paid_exams.php"> Manage Paid Exams</a></li>
                                    <li><a href="paid_exams_stats.php"> Paid Exams Stats</a></li>
                                </ul>
                            </li>
                            <li>

                                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Paid Exams English</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_paid_exam_en.php">New Exam EN</a></li>
                                    <li><a href="paid_exams_en.php"> Manage Paid Exams EN</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Paid Exams Dutch</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="add_paid_exam_nl.php">New Exam NL</a></li>
                                    <li><a href="paid_exams_nl.php"> Manage Paid Exams NL</a></li>
                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-search"></i> <span class="nav-label">Search</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_question.php">Search Question Arabic</a></li>
                            <li><a href="search_question_en.php">Search Question English</a></li>
                            <li><a href="search_question_nl.php">Search Question Dutch</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-secret"></i> <span class="nav-label">Private Sessions</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="manage_private_session.php">Manage Private Sessions</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="control_payments.php">Control Payments</a></li>
                            <li><a href="edit_prices.php">Edit Prices</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-check "></i> <span class="nav-label">Reservations</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="exam_res_list.php">Check Reservations</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </nav>        </aside>
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content-wrapper">
            <div class="content-wrapper container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h4 class="float-left">Data Tables  </h4>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                $activeQuery = "SELECT * FROM PAID_EXAM WHERE Users_ID = '{$id}'";
                                                $active = mysqli_query($mysqli,$activeQuery);
                                                    if(mysqli_num_rows($active) > 0){
                                                        while($row = mysqli_fetch_assoc($active)){
                                                            $paymentId = $row['PAYMENT_ID'];
                                                            $until = $row['END_DATE'];
                                                            $packStatus = $row['STATUS'];




                                                            if($packStatus == 'ACTIVE'){
                                                                $future = strtotime($until);
                                                                $timeFromDB = strtotime("now");
                                                                $timeLeft = $future-$timeFromDB;
                                                                $daysLeft = round((($timeLeft/24)/60)/60);
                                                                ?>

                                                            <div class="sale-state-box" style="background-color:rgb(201,176,84);box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                                <h3><?php echo $daysLeft?></h3>
                                                                <span>Active Until</span>
                                                                <span style="float: right;margin-top: -30px;"><a href="user_info.php?id=<?php echo $id;?>&delete=<?php echo $paymentId;?>"><button class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button></a></span>
                                                            </div>
                                            <?php
                                                            }else{
                                                                $past = strtotime($until);
                                                                $timeFromDB = strtotime("now");
                                                                $daysPassed = $timeFromDB-$past;
                                                                $daysPassed = round((($daysPassed/24)/60)/60);

?>
                                                                <div class="sale-state-box" style="background-color:rgb(255,41,73);box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                                    <h3><?php echo $daysPassed;?></h3>
                                                                    <span>Days ago</span>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="sale-state-box" style="background-color:rgb(244, 66, 66);box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                            <h3>No Active Packet</h3>
                                                        </div>
                                            <?php

                                                }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="user_info.php?id=<?php echo $id; ?>&give_free_packet=1week"><div class="sale-state-box" style="background-color: #6ea563;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3>20 days Free</h3>
                                            </div></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="user_info.php?id=<?php echo $id; ?>&give_free_packet=2week"><div class="sale-state-box" style="background-color: #6ea563;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3>35 days Free</h3>
                                                </div></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="user_info.php?id=<?php echo $id; ?>&give_free_packet=4week"><div class="sale-state-box" style="background-color: #6ea563;box-shadow: 3px 4px 5px rgba(0,0,0,0.2);">
                                                <h3>60 days Free</h3>
                                                </div></a>
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
                <?php
                $query = "SELECT * FROM Website";
                $getWeb = mysqli_query($mysqli,$query);
                while ($row = mysqli_fetch_assoc($getWeb)){
                    $website = $row['DevWeb'];
                }
                ?>
                <div>
                    <strong>Copyright</strong> <a target="_blank" href="<?php echo $website;?>">El-Semicolon;  </a> © <?php echo date('Y') ;?>
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