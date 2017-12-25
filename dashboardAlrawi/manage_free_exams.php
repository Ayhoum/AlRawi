<?php
session_start();
ob_start();
include '../scripts/db_connection.php';

if (isset($_GET['id'])) {
    $setId = $_GET['id'];
}

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

                            <h4 class="float-left">Manage Free Exams</h4>

                        </div>
                    </div>
                </div><!-- end .page title-->


                <?php
                $query = "SELECT * FROM FREE_QUESTION_SET WHERE ID = $setId";
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
                        FREE EXAM NAME : <?php echo $name;?>
                    </div>
                    <div class="panel-body  p-xl-3">
                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 1 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 1 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>1 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 1 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">1 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 2 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 2 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>2 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 2 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">2 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 3 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 3 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>3 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 3 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">3 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 4 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 4 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>4 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 4 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">4 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 5 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 5 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>5 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 5 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">5 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 6 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 6 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>6 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 6 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">6 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 7 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 7 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>7 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 7 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">7 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 8 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 8 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>8 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 8 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">8 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 9 ) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 9 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>9 </button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 9 ; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">9 </button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 10) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 10; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>10</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 10; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">10</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 11) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 11; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>11</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 11; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">11</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 12) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 12; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>12</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 12; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">12</button></a><?php } ?></div>

                            </div>
                            <div class="row" style="margin-top:25px ;">

                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 13) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 13; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>13</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 13; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">13</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 14) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 14; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>14</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 14; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">14</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 15) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 15; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>15</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 15; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">15</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 16) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 16; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>16</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 16; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">16</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 17) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 17; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>17</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 17; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">17</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 18) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 18; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>18</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 18; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">18</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 19) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 19; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>19</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 19; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">19</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 20) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 20; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>20</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 20; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">20</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 21) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 21; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>21</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 21; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">21</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 22) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 22; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>22</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 22; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">22</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 23) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 23; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>23</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 23; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">23</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 24) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 24; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>24</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 24; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">24</button></a><?php } ?></div>
                            </div>
                            <div class="row" style="margin-top:25px ;">

                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 25) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 25; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>25</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 25; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">25</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 26) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 26; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>26</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 26; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">26</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 27) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 27; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>27</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 27; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">27</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 28) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 28; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>28</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 28; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">28</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 29) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 29; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>29</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 29; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">29</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 30) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 30; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>30</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 30; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">30</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 31) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 31; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>31</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 31; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">31</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 32) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 32; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>32</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 32; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">32</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 33) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 33; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>33</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 33; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">33</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 34) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 34; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>34</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 34; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">34</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 35) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 35; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>35</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 35; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">35</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 36) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 36; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>36</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 36; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">36</button></a><?php } ?></div>
                            </div >
                            <div class="row" style="margin-top:25px ;">

                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 37) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 37; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>37</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 37; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">37</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 38) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 38; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>38</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 38; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">38</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 39) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 39; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>39</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 39; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">39</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 40) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 40; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>40</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 40; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">40</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 41) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 41; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>41</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 41; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">41</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 42) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 42; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>42</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 42; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">42</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 43) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 43; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>43</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 43; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">43</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 44) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 44; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>44</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 44; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">44</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 45) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 45; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>45</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 45; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">45</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 46) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 46; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>46</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 46; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">46</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 47) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 47; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>47</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 47; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">47</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 48) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 48; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>48</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 48; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">48</button></a><?php } ?></div>

                            </div>
                            <div class="row" style="margin-top:25px ;">

                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 49) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 49; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>49</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 49; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">49</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 50) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 50; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>50</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 50; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">50</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 51) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 51; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>51</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 51; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">51</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 52) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 52; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>52</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 52; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">52</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 53) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 53; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>53</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 53; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">53</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 54) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 54; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>54</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 54; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">54</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 55) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 55; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>55</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 55; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">55</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 56) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 56; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>56</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 56; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">56</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 57) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 57; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>57</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 57; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">57</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 58) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 58; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>58</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 58; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">58</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 59) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 59; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>59</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 59; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">59</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 60) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 60; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>60</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 60; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">60</button></a><?php } ?></div>

                            </div>
                            <div class="row" style="margin-top:25px ;">
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 61) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 61; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>61</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 61; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">61</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 62) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 62; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>62</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 62; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">62</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 63) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 63; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>63</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 63; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">63</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 64) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 64; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>64</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 64; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">64</button></a><?php } ?></div>
                                <div class="col-md-1"><?php $check = "SELECT 1 FROM FREE_EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 65) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {?><a href="free_question.php?source=edit&id=<?php echo $beginValue + 65; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary"><i class='fa fa-check' aria-hidden='true'></i><br>65</button></a><?php }else{ ?><a href="free_question.php?source=add&id=<?php echo $beginValue + 65; ?>&qset=<?php echo $setId ?>"><button style="width: 100%" type="button" class="btn btn-primary">65</button></a><?php } ?></div>
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