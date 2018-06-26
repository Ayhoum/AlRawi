<?php
session_start();
ob_start();
include '../nl/scripts/db_connection.php';
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
                            <h4 class="float-left">Paid Exams</h4>
                        </div>
                    </div>
                </div><!-- end .page title-->
                <div class="panel panel-card margin-b-30">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-center">
                                    <a href="" class="desc">ID</a>
                                </td>
                                <td class="text-center">
                                    <a href="">Exam Name</a>
                                </td>
                                <td class="text-center">
                                    <a href="">Status</a>
                                </td>
                                <td class="text-center">
                                    <a href="">Number of Question</a>
                                </td>
                                <td class="text-center">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM QUESTION_SET";
                            $select_exams = mysqli_query($mysqli_nl, $query);

                            while ($row = mysqli_fetch_assoc($select_exams)) {
                            $id = $row['ID'];
                            $name = $row['EXAM_NAME'];
                            $begin = $row['BEGIN_ID'];
                            $status = $row['STATUS'];
//                            $beginValue = (($begin - 1));
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $id;?></td>
                                <td class="text-center"><?php echo $name;?></td>
                                <td class="text-center"><?php echo $status;?></td>
                                <?php
                                $query = "SELECT * FROM EXAM_QUESTION WHERE	QUESTION_SET_ID = $id";
                                $select_ques = mysqli_query($mysqli_nl, $query);
                                $numRow = mysqli_num_rows($select_ques);
                                ?>
                                <td class="text-center"><?php echo $numRow; ?></td>
                                <td class="text-center">
                                    <?php if($status == "VISIBLE"){?>
                                        <a href="paid_exams_nl.php?change_to_invisible=<?php echo $id ?>" data-toggle="tooltip" title="" class="btn btn-secondary" data-original-title="View"><i class="fa fa-eye-slash"></i></a>

                                    <?php }else{ ?>
                                        <a href="paid_exams_nl.php?change_to_visible=<?php echo $id ?>" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="View"><i class="fa fa-eye"></i></a>

                                    <?php } ?>
                                    <a href="edit_paid_exam_info_nl.php?id=<?php echo $id;?>"  data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="Delete"><i class="fa fa-cog fa-spin"></i></a>

                                    <a href="manage_paid_exams_nl.php?id=<?php echo $id; ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
        </div>

                <?php

                if(isset($_GET['change_to_visible'])){

                    $the_exam_id = $_GET['change_to_visible'];
                    $query = "UPDATE QUESTION_SET SET STATUS = 'VISIBLE' WHERE ID = {$the_exam_id}";
                    $exam_query = mysqli_query($mysqli_nl, $query);
                    if(!$exam_query){
                        die("Failed!" . mysqli_error($mysqli_nl));
                    }
                    header("Location: paid_exams_nl.php");
                }

                if(isset($_GET['change_to_invisible'])){
                    $the_exam_id = $_GET['change_to_invisible'];
                    $query = "UPDATE QUESTION_SET SET STATUS = 'INVISIBLE' WHERE ID = {$the_exam_id}";
                    $exam_query = mysqli_query($mysqli_nl, $query);
                    if(!$exam_query){
                        die("Failed!" . mysqli_error($mysqli_nl));
                    }
                    header("Location: paid_exams_nl.php");
                }
                ?>

                <div class="clearfix"></div>
                <div class="footer">
                    <?php
                    $query = "SELECT * FROM Website";
                    $getWeb = mysqli_query($mysqli_nl,$query);
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