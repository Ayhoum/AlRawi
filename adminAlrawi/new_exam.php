<?php
session_start();
ob_start();
//require_once 'test.php';
//$date = date('Y-m-d');
if($_SESSION['role'] != "MainAdmin"){
    header("Location: ../index.php");
}


//this one should be uploaded as an image directory
//$user_image = $_FILES['image']['name'];
//$user_image_temp = $_FILES['image']['tmp_name'];
//move_uploaded_file($user_image_temp, "../exam_images/exams/$user_image");

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

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

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
                    <a href="free_exams.php">
                        <i class="material-icons">library_books</i>
                        <span>Manage Free Exams</span>
                    </a>
                </li>
                <li class="header">EXAMS ISSUES</li>
                <li class="active">
                    <a href="new_exam.php">
                        <i class="material-icons">create_new_folder</i>
                        <span>New Exam</span>
                    </a>
                </li>
                <li>
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
        <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
<!--                        <div class="header">-->
<!--                            <h2>ADVANCED FORM EXAMPLE WITH VALIDATION</h2>-->
<!--                        </div>-->
                        <div class="body">
                            <form id="wizard_with_validation" method="POST" action="test.php" enctype="multipart/form-data">
                                <h3>Edit Free Exam (Response Questions)  - 25 Q</h3>
                                <fieldset>
<!--###############################################################################################################################################-->
                                    <h3>Question 1.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-1" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-1" id="break-1" value="Break" class="with-gap">
                                        <label for="break-1">Break</label>

                                        <input type="radio" name="action-1" id="release-1" value="Release" class="with-gap">
                                        <label for="release-1" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-1" id="nothing-1" value="Nothing" class="with-gap">
                                        <label for="nothing-1" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-1">Question Image</label>
                                        <input type="file" name="image-1">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 2.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-2" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-2" id="break-2" value="Break" class="with-gap">
                                        <label for="break-2">Break</label>

                                        <input type="radio" name="action-2" id="release-2" value="Release" class="with-gap">
                                        <label for="release-2" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-2" id="nothing-2" value="Nothing" class="with-gap">
                                        <label for="nothing-2" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-2">Question Image</label>
                                        <input type="file" name="image-2">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 3.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-3" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-3" id="break-3" value="Break" class="with-gap">
                                        <label for="break-3">Break</label>

                                        <input type="radio" name="action-3" id="release-3" value="Release" class="with-gap">
                                        <label for="release-3" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-3" id="nothing-3" value="Nothing" class="with-gap">
                                        <label for="nothing-3" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-3">Question Image</label>
                                        <input type="file" name="image-3">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 4.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-4" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-4" id="break-4" value="Break" class="with-gap">
                                        <label for="break-4">Break</label>

                                        <input type="radio" name="action-4" id="release-4" value="Release" class="with-gap">
                                        <label for="release-4" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-4" id="nothing-4" value="Nothing" class="with-gap">
                                        <label for="nothing-4" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-4">Question Image</label>
                                        <input type="file" name="image-4">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 5.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-5" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-5" id="break-5" value="Break" class="with-gap">
                                        <label for="break-5">Break</label>

                                        <input type="radio" name="action-5" id="release-5" value="Release" class="with-gap">
                                        <label for="release-5" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-5" id="nothing-5" value="Nothing" class="with-gap">
                                        <label for="nothing-5" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-5">Question Image</label>
                                        <input type="file" name="image-5">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 6.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-6" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-6" id="break-6" value="Break" class="with-gap">
                                        <label for="break-6">Break</label>

                                        <input type="radio" name="action-6" id="release-6" value="Release" class="with-gap">
                                        <label for="release-6" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-6" id="nothing-6" value="Nothing" class="with-gap">
                                        <label for="nothing-6" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-6">Question Image</label>
                                        <input type="file" name="image-6">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 7.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-7" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-7" id="break-7" value="Break" class="with-gap">
                                        <label for="break-7">Break</label>

                                        <input type="radio" name="action-7" id="release-7" value="Release" class="with-gap">
                                        <label for="release-7" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-7" id="nothing-7" value="Nothing" class="with-gap">
                                        <label for="nothing-7" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-7">Question Image</label>
                                        <input type="file" name="image-7">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 8.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-8" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-8" id="break-8" value="Break" class="with-gap">
                                        <label for="break-8">Break</label>

                                        <input type="radio" name="action-8" id="release-8" value="Release" class="with-gap">
                                        <label for="release-8" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-8" id="nothing-8" value="Nothing" class="with-gap">
                                        <label for="nothing-8" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-8">Question Image</label>
                                        <input type="file" name="image-8">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 9.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-9" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-9" id="break-9" value="Break" class="with-gap">
                                        <label for="break-9">Break</label>

                                        <input type="radio" name="action-9" id="release-9" value="Release" class="with-gap">
                                        <label for="release-9" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-9" id="nothing-9" value="Nothing" class="with-gap">
                                        <label for="nothing-9" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-9">Question Image</label>
                                        <input type="file" name="image-9">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 10.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-10" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-10" id="break-10" value="Break" class="with-gap">
                                        <label for="break-10">Break</label>

                                        <input type="radio" name="action-10" id="release-10" value="Release" class="with-gap">
                                        <label for="release-10" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-10" id="nothing-10" value="Nothing" class="with-gap">
                                        <label for="nothing-10" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-10">Question Image</label>
                                        <input type="file" name="image-10">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 11.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-11" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-11" id="break-11" value="Break" class="with-gap">
                                        <label for="break-11">Break</label>

                                        <input type="radio" name="action-11" id="release-11" value="Release" class="with-gap">
                                        <label for="release-11" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-11" id="nothing-11" value="Nothing" class="with-gap">
                                        <label for="nothing-11" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-11">Question Image</label>
                                        <input type="file" name="image-11">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 12.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-12" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-12" id="break-12" value="Break" class="with-gap">
                                        <label for="break-12">Break</label>

                                        <input type="radio" name="action-12" id="release-12" value="Release" class="with-gap">
                                        <label for="release-12" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-12" id="nothing-12" value="Nothing" class="with-gap">
                                        <label for="nothing-12" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-12">Question Image</label>
                                        <input type="file" name="image-12">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 13.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-13" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-13" id="break-13" value="Break" class="with-gap">
                                        <label for="break-13">Break</label>

                                        <input type="radio" name="action-13" id="release-13" value="Release" class="with-gap">
                                        <label for="release-13" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-13" id="nothing-13" value="Nothing" class="with-gap">
                                        <label for="nothing-13" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-13">Question Image</label>
                                        <input type="file" name="image-13">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 14.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-14" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-14" id="break-14" value="Break" class="with-gap">
                                        <label for="break-14">Break</label>

                                        <input type="radio" name="action-14" id="release-14" value="Release" class="with-gap">
                                        <label for="release-14" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-14" id="nothing-14" value="Nothing" class="with-gap">
                                        <label for="nothing-14" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-14">Question Image</label>
                                        <input type="file" name="image-14">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 15.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-15" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-15" id="break-15" value="Break" class="with-gap">
                                        <label for="break-15">Break</label>

                                        <input type="radio" name="action-15" id="release-15" value="Release" class="with-gap">
                                        <label for="release-15" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-15" id="nothing-15" value="Nothing" class="with-gap">
                                        <label for="nothing-15" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-15">Question Image</label>
                                        <input type="file" name="image-15">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 16.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-16" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-16" id="break-16" value="Break" class="with-gap">
                                        <label for="break-16">Break</label>

                                        <input type="radio" name="action-16" id="release-16" value="Release" class="with-gap">
                                        <label for="release-16" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-16" id="nothing-16" value="Nothing" class="with-gap">
                                        <label for="nothing-16" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-16">Question Image</label>
                                        <input type="file" name="image-16">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 17.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-17" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-17" id="break-17" value="Break" class="with-gap">
                                        <label for="break-17">Break</label>

                                        <input type="radio" name="action-17" id="release-17" value="Release" class="with-gap">
                                        <label for="release-17" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-17" id="nothing-17" value="Nothing" class="with-gap">
                                        <label for="nothing-17" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-17">Question Image</label>
                                        <input type="file" name="image-17">
                                    </div
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 18.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-18" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-18" id="break-18" value="Break" class="with-gap">
                                        <label for="break-18">Break</label>

                                        <input type="radio" name="action-18" id="release-18" value="Release" class="with-gap">
                                        <label for="release-18" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-18" id="nothing-18" value="Nothing" class="with-gap">
                                        <label for="nothing-18" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-18">Question Image</label>
                                        <input type="file" name="image-18">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 19.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-19" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-19" id="break-19" value="Break" class="with-gap">
                                        <label for="break-19">Break</label>

                                        <input type="radio" name="action-19" id="release-19" value="Release" class="with-gap">
                                        <label for="release-19" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-19" id="nothing-19" value="Nothing" class="with-gap">
                                        <label for="nothing-19" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-19">Question Image</label>
                                        <input type="file" name="image-19">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 20.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-20" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-20" id="break-20" value="Break" class="with-gap">
                                        <label for="break-20">Break</label>

                                        <input type="radio" name="action-20" id="release-20" value="Release" class="with-gap">
                                        <label for="release-20" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-20" id="nothing-20" value="Nothing" class="with-gap">
                                        <label for="nothing-20" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-20">Question Image</label>
                                        <input type="file" name="image-20">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 21.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-21" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-21" id="break-21" value="Break" class="with-gap">
                                        <label for="break-21">Break</label>

                                        <input type="radio" name="action-21" id="release-21" value="Release" class="with-gap">
                                        <label for="release-21" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-21" id="nothing-21" value="Nothing" class="with-gap">
                                        <label for="nothing-21" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-21">Question Image</label>
                                        <input type="file" name="image-21">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 22.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-22" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-22" id="break-22" value="Break" class="with-gap">
                                        <label for="break-22">Break</label>

                                        <input type="radio" name="action-22" id="release-22" value="Release" class="with-gap">
                                        <label for="release-22" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-22" id="nothing-22" value="Nothing" class="with-gap">
                                        <label for="nothing-22" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-22">Question Image</label>
                                        <input type="file" name="image-22">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 23.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-23" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-23" id="break-23" value="Break" class="with-gap">
                                        <label for="break-23">Break</label>

                                        <input type="radio" name="action-23" id="release-23" value="Release" class="with-gap">
                                        <label for="release-23" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-23" id="nothing-23" value="Nothing" class="with-gap">
                                        <label for="nothing-23" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-23">Question Image</label>
                                        <input type="file" name="image-23">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 24.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-24" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-24" id="break-24" value="Break" class="with-gap">
                                        <label for="break-24">Break</label>

                                        <input type="radio" name="action-24" id="release-24" value="Release" class="with-gap">
                                        <label for="release-24" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-24" id="nothing-24" value="Nothing" class="with-gap">
                                        <label for="nothing-24" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-24">Question Image</label>
                                        <input type="file" name="image-24">
                                    </div>
                                    <hr class="bg-indigo" style="height: 2px;"/>
<!--###############################################################################################################################################-->
                                    <h3>Question 25.</h3>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question-25" required>
                                            <label class="form-label">Question*</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="radio" name="action-25" id="break-25" value="Break" class="with-gap">
                                        <label for="break-25">Break</label>

                                        <input type="radio" name="action-25" id="release-25" value="Release" class="with-gap">
                                        <label for="release-25" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-25" id="nothing-25" value="Nothing" class="with-gap">
                                        <label for="nothing-25" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image-25">Question Image</label>
                                        <input type="file" name="image-25">
                                    </div>
                                </fieldset>

<!--###############################################################################################################################################-->
<!--###############################################################################################################################################-->
<!--###############################################################################################################################################-->
<!--###############################################################################################################################################-->

                                <h3>Edit Free Exam (First Part Questions)  - 20 Q</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control">
                                            <label class="form-label">First Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="surname" class="form-control">
                                            <label class="form-label">Last Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control">
                                            <label class="form-label">Email*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="address" cols="30" rows="3" class="form-control no-resize"></textarea>
                                            <label class="form-label">Address*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input min="18" type="number" name="age" class="form-control">
                                            <label class="form-label">Age*</label>
                                        </div>
                                        <div class="help-info">The warning step will show up if age is less than 18</div>
                                    </div>
                                </fieldset>

<!--###############################################################################################################################################-->
<!--###############################################################################################################################################-->
<!--###############################################################################################################################################-->
<!--###############################################################################################################################################-->

                                <h3>Edit Free Exam (Second Part Questions) - 20 Q</h3>
                                <fieldset>
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox">
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                    <input type="submit" name="submit" value="submit">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->

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

<!-- Jquery Validation Plugin Css -->
<script src="plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/forms/form-wizard.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>


</body>
</html>