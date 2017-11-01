<?php
session_start();
ob_start();
include '../scripts/db_connection.php';
if($_GET['id']){
    $setId = $_GET['id'];
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
            <a class="navbar-brand" href="dashboard.php">Alrawi Theorie - Admin Dashboard</a>
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
                <li>
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
                <li class="header">FREE EXAMS ISSUES</li>
                <li>
                    <a href="new_question_set_free.php">
                        <i class="material-icons">create_new_folder</i>
                        <span>New Exam</span>
                    </a>
                </li>
                <li>
                    <a href="free_exams.php">
                        <i class="material-icons">library_books</i>
                        <span>Manage Free Exams</span>
                    </a>
                </li>
                <li class="header">EXAMS ISSUES</li>
                <li>
                    <a href="new_question_set.php">
                        <i class="material-icons">create_new_folder</i>
                        <span>New Exam</span>
                    </a>
                </li>
                <li class="active">
                    <a href="exams.php">
                        <i class="material-icons">library_books</i>
                        <span>Manage Exams</span>
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
        <!--        <div class="block-header">-->
        <!--           <h2>Free Exams</h2>-->
        <!--        </div>-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row clearfix">



                <?php
                $query = "SELECT * FROM QUESTION_SET WHERE ID = $setId";
                $select_exams = mysqli_query($mysqli, $query);
                while ($row = mysqli_fetch_assoc($select_exams)) {
                    $name = $row['EXAM_NAME'];
                    $begin = $row['BEGIN_ID'];
                    $beginValue = (($begin - 1));
                }
                    ?>

                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <div class="content">
                                    <div class="text text-center"><?php echo $setId;?></div>
                                    <div class="number text-center count-to" data-from="0" data-to="125" data-speed="1000"
                                         data-fresh-interval="20"><?php echo $name;?>
                                    </div>
                                    <div class="button-demo" style="margin-top: 15px;">
                                        <div class="col-md-12">
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 1; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 1) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>1</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 2; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 2) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>2</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 3; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 3) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>3</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 4; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 4) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>4</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 5; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 5) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>5</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 6; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 6) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>6</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 7; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 7) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>7</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 8; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 8) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>8</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 9; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 9) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>9</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 10; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 10) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>10</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 11; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 11) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>11</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 12; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 12) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>12</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 13; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 13) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>13</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 14; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 14) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>14</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 15; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 15) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>15</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 16; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 16) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>16</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 17; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 17) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>17</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 18; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 18) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>18</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 19; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 19) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>19</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 20; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 20) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>20</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 21; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 21) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>21</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 22; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 22) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>22</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 23; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 23) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>23</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 24; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 24) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>24</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 25; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 25) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>25</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 26; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 26) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>26</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 27; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 27) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>27</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 28; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 28) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>28</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 29; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 29) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>29</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 30; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 30) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>30</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 31; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 31) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>31</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 32; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 32) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>32</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 33; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 33) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>33</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 34; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 34) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>34</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 35; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 35) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>35</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 36; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 36) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>36</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 37; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 37) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>37</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 38; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 38) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>38</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 39; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 39) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>39</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 40; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 40) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>40</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 41; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 41) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>41</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 42; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 42) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>42</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 43; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 43) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>43</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 44; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 44) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>44</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 45; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 45) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>45</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 46; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 46) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>46</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 47; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 47) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>47</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 48; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 48) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>48</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 49; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 49) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>49</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 50; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 50) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>50</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 51; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 51) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>51</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 52; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 52) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>52</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 53; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 53) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>53</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 54; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 54) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>54</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 55; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 55) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>55</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 56; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 56) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>56</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 57; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 57) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>57</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 58; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 58) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>58</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 59; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 59) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>59</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 60; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 60) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>60</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 61; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 61) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>61</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 62; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 62) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>62</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 63; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 63) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>63</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 64; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 64) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>64</button></a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="edit_question.php?id=<?php echo $beginValue + 65; ?>&qset=<?php echo "$setId";?>"><button type="button" class="btn bg-indigo btn-block waves-effect"><?php $check = "SELECT 1 FROM EXAM_QUESTION WHERE NUMBER = ('$beginValue' + 65) LIMIT 1";$checkQuery = mysqli_query($mysqli,$check);if (mysqli_fetch_row($checkQuery)) {echo "<i class='material-icons'>done</i>";} ?>65</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                <a href="exams.php"><button type="button" class="btn btn-block btn-lg btn-success waves-effect">Back To Exams</button></a>


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

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>


<!-- Demo Js -->
<script src="js/demo.js"></script>


</html>

