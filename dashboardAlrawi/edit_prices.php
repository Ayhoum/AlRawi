<?php
session_start();
ob_start();
include '../scripts/db_connection.php';

if(isset($_POST['update'])){
    for($i=1;$i<4;$i++){
        $eurAmount = $_POST['eur_amount'.$i];
        $cenAmount = $_POST['cen_amount'.$i];
        $text = $_POST['text'.$i];
        $timeTxt = $_POST['timeTxt'.$i];
        $period = $_POST['period'.$i];
        $fullPeriod = $timeTxt . " " . $period;

        $query  = "UPDATE PRICES SET 
                    AmountEur = '{$eurAmount}', 
                    AmountCen = '{$cenAmount}', 
                    Text = '{$text}',
                    TimeTxt = '{$fullPeriod}'
                    WHERE ID = $i";
        $result = mysqli_query($mysqli, $query);
    }
        header("Location: edit_prices.php");
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
                            <li><a href="free_packet.php">Give a free packet</a></li>
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
                    <li class="nav-heading"><span>SEARCH QUESTION</span></li>
                    <li>
                        <a href="#"><i class="fa fa-search"></i> <span class="nav-label">Search</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_question.php">Search Question</a></li>
                        </ul>
                    </li>
                    <li class="nav-heading"><span>PRIVATE SESSIONS ISSUES</span></li>
                    <li>
                        <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Private Sessions</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="manage_private_session.php">Manage Private Sessions</a></li>
                        </ul>
                    </li>
                    <li class="nav-heading"><span>PAYMENTS ISSUES</span></li>
                    <li>
                        <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Payments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="control_payments.php">Control Payments</a></li>
                            <li><a href="edit_prices.php">Edit Prices</a></li>
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
                            <h4 class="float-left">Edit Packets Prices</h4>
                        </div>
                    </div>
                </div><!-- end .page title-->



                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-card margin-b-30">
                            <!-- Start .panel -->
                            <div class="panel-heading">
                                Edit Packets Price
                            </div>
                            <div class="panel-body  p-xl-3">
                                <form method="post" action="edit_prices.php" class="form-horizontal" data-toggle="validator">
                                    <?php
                                    $query = "SELECT * FROM PRICES";
                                    $getName = mysqli_query($mysqli,$query);
                                    while ($row = mysqli_fetch_assoc($getName)){
                                        $ID = $row['ID'];
                                        $AmountEur = $row['AmountEur'];
                                        $AmountCen = $row['AmountCen'];
                                        $Text = $row['Text'];
                                        $TimeTxt = $row['TimeTxt'];
                                        $TimeTxt = preg_replace("/[^0-9,.]/", "", $TimeTxt)

                                    ?>
                                        <div class="form-group row"><label class="col-sm-12 text-center form-control-label" style="font-size: 20px">Packet <?php echo $ID ?></label>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                <label class="col-md-4 text-center">Euros</label>
                                                <input name="eur_amount<?php echo $ID ?>" value="<?php echo $AmountEur?>" type="text" class="form-control col-md-7" required>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 text-center">Cents</label>
                                                    <input name="cen_amount<?php echo $ID ?>" value="<?php echo $AmountCen?>" type="text" class="form-control col-md-7" required>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 text-center">Text</label>
                                                    <input name="text<?php echo $ID ?>" style="direction: rtl" value="<?php echo $Text?>" type="text" class="form-control col-md-7" required>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 text-center">Period</label>
                                                    <input name="timeTxt<?php echo $ID ?>" value="<?php echo $TimeTxt?>" type="text" class="form-control col-md-7" required>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-4 text-center">Days/Hours</label>
                                                    <select name="period<?php echo $ID ?>" class="col-md-7" required>
                                                        <option value="" disabled selected>--Select--</option>
                                                        <option value="hours">Hour/Hours</option>
                                                        <option value="days">Day/Days</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php
                                    }
                                    ?>


                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-8 col-sm-offset-0">
                                            <input name= "update" class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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