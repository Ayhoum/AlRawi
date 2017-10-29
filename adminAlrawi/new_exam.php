<?php
session_start();
ob_start();
include '../scripts/db_connection.php';
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
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                            <form id="wizard_with_validation" method="POST">
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
                                        <input type="radio" name="action-1" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-1" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-1" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-1">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-1" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-2" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-2" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-2" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-2">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-2" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-3" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-3" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-3" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-3">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-3" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-4" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-4" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-4" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-4">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-4" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-5" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-5" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-5" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-5">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-5" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-6" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-6" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-6" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-6">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-6" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-7" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-7" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-7" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-7">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-7" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-8" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-8" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-8" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-8">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-8" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-9" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-9" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-9" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-9">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-9" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-10" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-10" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-10" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-10">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-10" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-11" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-11" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-11" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-11">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-11" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-12" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-12" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-12" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-12">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-12" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-13" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-13" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-13" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-13">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-13" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-14" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-14" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-14" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-14">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-14" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-15" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-15" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-15" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-15">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-15" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-16" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-16" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-16" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-16">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-16" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-17" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-17" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-17" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-17">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-17" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
                                    </div>
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
                                        <input type="radio" name="action-18" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-18" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-18" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-18">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-18" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-19" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-19" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-19" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-19">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-19" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-20" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-20" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-20" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-20">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-20" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-21" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-21" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-21" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-21">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-21" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-22" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-22" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-22" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-22">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-22" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-23" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-23" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-23" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-23">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-23" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-24" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-24" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-24" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-24">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-24" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                        <input type="radio" name="action-25" id="break" value="Break" class="with-gap">
                                        <label for="break">Break</label>

                                        <input type="radio" name="action-25" id="release" value="Release" class="with-gap">
                                        <label for="release" class="m-l-20">Release Gas!</label>

                                        <input type="radio" name="action-25" id="nothing" value="Nothing" class="with-gap">
                                        <label for="nothing" class="m-l-20">Nothing</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Question Image</label>
                                        <input type="file" name="image-25">
                                    </div>

                                    <div class="form-group">
                                        <select name="type-25" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="choose">Choose</option>
                                            <option value="int">Entery</option>
                                            <option value="advantage">Advantage</option>
                                        </select>
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
                                            <input type="text" name="name" class="form-control" required>
                                            <label class="form-label">First Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="surname" class="form-control" required>
                                            <label class="form-label">Last Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control" required>
                                            <label class="form-label">Email*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="address" cols="30" rows="3" class="form-control no-resize" required></textarea>
                                            <label class="form-label">Address*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input min="18" type="number" name="age" class="form-control" required>
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
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
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
<script src="js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

</html>