<?php
/**
 * Created by PhpStorm
 * User: Alaa
 * Date: 7-11-2017
 * Time: 12:00
 */
session_start();
ob_start();
include '../scripts/db_connection.php';
//if (isset($_GET['id']) && isset($_GET['qset'])) {
    $setId = 3;
    $qSet = 1;
//}
$changed = 0;
//require_once 'test.php';
//$date = date('Y-m-d');
if ($_SESSION['role'] != "MainAdmin") {
    header("Location: ../index.php");
}
?>
<?php
if (isset($_POST['submit'])){
    $question_1 = $_POST['question'];
    $right_ans= $_POST['right'];
    $ans_2 = $_POST['ans_2'];
    $ans_3 = $_POST['ans_3'];
    $ans_4 = $_POST['ans_4'];
    $picture = $_POST['picture'];
    $type = $_POST['type'];

    $query = "UPDATE EXAM_QUESTION SET QUESTION = '{$question_1}', RIGHT_ANWSER = '{$right_ans}', ANSWER_2 = '{$ans_3}', ANSWER_3 = '{$ans_3}', PICTURE = '{$picture}', TYPE = '{$type}' WHERE NUMBER = '{$setId}'";

    $result = mysqli_query($mysqli,$query);
    if(!$result) {
        die("Failed to create a new exam". mysqli_error($mysqli));
    } else {
        echo "done!";
    }
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet"/>

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet"/>
    <style>
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 10px;
            width: 100%;
        }

        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            width: 100%;
            filter: alpha(opacity=0);
        }
    </style>
</head>

<body class="theme-indigo">
<!-- Page Loader -->
<!--<div class="page-loader-wrapper">-->
<!--    <div class="loader">-->
<!--        <div class="preloader">-->
<!--            <div class="spinner-layer pl-red">-->
<!--                <div class="circle-clipper left">-->
<!--                    <div class="circle"></div>-->
<!--                </div>-->
<!--                <div class="circle-clipper right">-->
<!--                    <div class="circle"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <p>Please wait...</p>-->
<!--    </div>-->
<!--</div>-->
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="dashboard.php">Alrawi Theorie - Admin Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                                class="material-icons">more_vert</i></a></li>
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
                <img src="images/user.png" width="48" height="48" alt="User"/>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b><?php echo $_SESSION['username'] ?></b></div>
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
<!--    <aside id="rightsidebar" class="right-sidebar">-->
<!--        <div class="tab-content">-->
<!--            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">-->
<!--                <ul class="demo-choose-skin">-->
<!--                    <li data-theme="red">-->
<!--                        <div class="red"></div>-->
<!--                        <span>Red</span>-->
<!--                    </li>-->
<!--                    <li data-theme="pink">-->
<!--                        <div class="pink"></div>-->
<!--                        <span>Pink</span>-->
<!--                    </li>-->
<!--                    <li data-theme="purple">-->
<!--                        <div class="purple"></div>-->
<!--                        <span>Purple</span>-->
<!--                    </li>-->
<!--                    <li data-theme="deep-purple">-->
<!--                        <div class="deep-purple"></div>-->
<!--                        <span>Deep Purple</span>-->
<!--                    </li>-->
<!--                    <li data-theme="indigo" class="active">-->
<!--                        <div class="indigo"></div>-->
<!--                        <span>Indigo</span>-->
<!--                    </li>-->
<!--                    <li data-theme="blue">-->
<!--                        <div class="blue"></div>-->
<!--                        <span>Blue</span>-->
<!--                    </li>-->
<!--                    <li data-theme="light-blue">-->
<!--                        <div class="light-blue"></div>-->
<!--                        <span>Light Blue</span>-->
<!--                    </li>-->
<!--                    <li data-theme="cyan">-->
<!--                        <div class="cyan"></div>-->
<!--                        <span>Cyan</span>-->
<!--                    </li>-->
<!--                    <li data-theme="teal">-->
<!--                        <div class="teal"></div>-->
<!--                        <span>Teal</span>-->
<!--                    </li>-->
<!--                    <li data-theme="green">-->
<!--                        <div class="green"></div>-->
<!--                        <span>Green</span>-->
<!--                    </li>-->
<!--                    <li data-theme="light-green">-->
<!--                        <div class="light-green"></div>-->
<!--                        <span>Light Green</span>-->
<!--                    </li>-->
<!--                    <li data-theme="lime">-->
<!--                        <div class="lime"></div>-->
<!--                        <span>Lime</span>-->
<!--                    </li>-->
<!--                    <li data-theme="yellow">-->
<!--                        <div class="yellow"></div>-->
<!--                        <span>Yellow</span>-->
<!--                    </li>-->
<!--                    <li data-theme="amber">-->
<!--                        <div class="amber"></div>-->
<!--                        <span>Amber</span>-->
<!--                    </li>-->
<!--                    <li data-theme="orange">-->
<!--                        <div class="orange"></div>-->
<!--                        <span>Orange</span>-->
<!--                    </li>-->
<!--                    <li data-theme="deep-orange">-->
<!--                        <div class="deep-orange"></div>-->
<!--                        <span>Deep Orange</span>-->
<!--                    </li>-->
<!--                    <li data-theme="brown">-->
<!--                        <div class="brown"></div>-->
<!--                        <span>Brown</span>-->
<!--                    </li>-->
<!--                    <li data-theme="grey">-->
<!--                        <div class="grey"></div>-->
<!--                        <span>Grey</span>-->
<!--                    </li>-->
<!--                    <li data-theme="blue-grey">-->
<!--                        <div class="blue-grey"></div>-->
<!--                        <span>Blue Grey</span>-->
<!--                    </li>-->
<!--                    <li data-theme="black">-->
<!--                        <div class="black"></div>-->
<!--                        <span>Black</span>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div role="tabpanel" class="tab-pane fade" id="settings">-->
<!--                <div class="demo-settings">-->
<!--                    <p>GENERAL SETTINGS</p>-->
<!--                    <ul class="setting-list">-->
<!--                        <li>-->
<!--                            <span>Report Panel Usage</span>-->
<!--                            <div class="switch">-->
<!--                                <label><input type="checkbox" checked><span class="lever"></span></label>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <span>Email Redirect</span>-->
<!--                            <div class="switch">-->
<!--                                <label><input type="checkbox"><span class="lever"></span></label>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <p>SYSTEM SETTINGS</p>-->
<!--                    <ul class="setting-list">-->
<!--                        <li>-->
<!--                            <span>Notifications</span>-->
<!--                            <div class="switch">-->
<!--                                <label><input type="checkbox" checked><span class="lever"></span></label>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <span>Auto Updates</span>-->
<!--                            <div class="switch">-->
<!--                                <label><input type="checkbox" checked><span class="lever"></span></label>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <p>ACCOUNT SETTINGS</p>-->
<!--                    <ul class="setting-list">-->
<!--                        <li>-->
<!--                            <span>Offline</span>-->
<!--                            <div class="switch">-->
<!--                                <label><input type="checkbox"><span class="lever"></span></label>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <span>Location Permission</span>-->
<!--                            <div class="switch">-->
<!--                                <label><input type="checkbox" checked><span class="lever"></span></label>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </aside>-->
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- Advanced Form Example With Validation -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="header">
                                        <h2>Edit Exam Question</h2>
                                    </div>
            <div class="row clearfix">

<?php
$query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = {$setId} AND QUESTION_SET_ID  = {$qSet}";
$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) > 0 ) {
    while ($row = mysqli_fetch_assoc($result)) {
        $question = $row['QUESTION'];
        $right = $row['RIGHT_ANWSER'];
        $ans2 = $row['ANSWER_2'];
        $ans3 = $row['ANSWER_3'];
        $ans4 = $row['ANSWER_4'];
        $picture = $row['PICTURE'];
        $type = $row['TYPE'];
    }
    ?>
<!--    <form id="form_validation" method="POST" novalidate="novalidate"-->
<!--          action="edit_question.php?id=--><?php //echo $setId ?><!--"-->
<!--          enctype="multipart/form-data">-->
<!--        <h3>Update Question</h3>-->
<!--        <fieldset>-->
<!--            <!--###############################################################################################################################################-->-->
<!--            <div class="row clearfix">-->
<!--                <div class="card">-->
<!--                    <div class="body">-->
<!--                        <h3>Question --><?php //echo $setId; ?><!--</h3>-->
<!--                        <div class="form-group form-float">-->
<!--                            <div class="form-line">-->
<!--                                <input type="text" class="form-control" name="question"-->
<!--                                       value="--><?php //echo $question; ?><!--" required>-->
<!--                                <label class="form-label">Question*</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <input type="radio" name="action" id="break" value="Break"-->
<!--                                                                               class="with-gap" --><?php //if ($right == "Break") {
//                                                                            echo "checked";
//                                                                        } ?><!-->-->
<!--                                                                        <label for="break">Break</label>-->
<!---->
<!--                                                                        <input type="radio" name="action" id="release" value="Release"-->
<!--                                                                               class="with-gap" --><?php //if ($right == "Release") {
//                                                                            echo "checked";
//                                                                        } ?><!-->-->
<!--                                                                        <label for="release" class="m-l-20">Release Gas!</label>-->
<!---->
<!--                                                                        <input type="radio" name="action" id="nothing" value="Nothing"-->
<!--                                                                               class="with-gap" --><?php //if ($right == "Nothing") {
//                                                                            echo "checked";
//                                                                        } ?><!-->-->
<!--                                                                        <label for="nothing" class="m-l-20">Nothing</label>-->
<!--                                                                    </div>-->
<!---->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <p>-->
<!--                                                                            <b>Question Type</b>-->
<!--                                                                        </p>-->
<!--                                                                        <select name="type" class="form-control show-tick">-->
<!--                                                                            <option disabled>---Select Type---</option>-->
<!--                                                                            <option value="response" --><?php //if ($type == "response") {
//                                                                                echo "selected";
//                                                                            } ?><!-->Response-->
<!--                                                                            </option>-->
<!--                                                                            <option value="choices" --><?php //if ($type == "choices") {
//                                                                                echo "selected";
//                                                                            } ?><!-->Choices-->
<!--                                                                            </option>-->
<!--                                                                            <option value="advantage" --><?php //if ($type == "advantage") {
//                                                                                echo "selected";
//                                                                            } ?><!-->Advantage-->
<!--                                                                            </option>-->
<!--                                                                            <option value="number" --><?php //if ($type == "number") {
//                                                                                echo "selected";
//                                                                            } ?><!-->Number-->
<!--                                                                            </option>-->
<!--                                                                        </select>-->
<!---->
<!--                                                                    </div>-->
<!---->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <div class="fileUpload btn btn-primary">-->
<!--                                                                            <span>Upload</span><br/>-->
<!--                                                                            <input type="file" name="image" id="imgInp" class="upload"/>-->
<!--                                                                        </div>-->
<!--                                                                        <div class="align-center">-->
<!--                                                                            <span>The New Image</span><br/>-->
<!--                                                                            <img id="blah" width="250" height="250" src="#" alt="#"/>-->
<!--                                                                            <br/>-->
<!--                                                                            <br/>-->
<!--                                                                            <br/>-->
<!--                                                                            --><?php
//                                                                            if (file_exists("exam_images/exams/$picture")) {
//                                                                                ?>
<!--                                                                                <span>The Already Image</span><br/>-->
<!--                                                                                <img src="exam_images/exams/--><?php //echo $picture; ?><!--"-->
<!--                                                                                     id="preview-image"-->
<!--                                                                                     alt="New Image" width="250" height="250"/>-->
<!--                                                                            --><?php //} else {
//                                                                                echo "No Image";
//                                                                            } ?>
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                        <input type="submit" class="btn btn-block btn-lg btn-success waves-effect"-->
<!--                               name="update" value="Submit Changes"/>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </fieldset>-->
<!---->
<!--    </form>-->

    <!--    <form  name ="update" action="edit_question_2.php" method="post">-->
<!--        Question:       <input type="text" name="question" value="--><?php //echo $question ?><!--"> <br>-->
<!--        Right Answer:   <input type="text" name="right" value="--><?php //echo $right ?><!--"> <br>-->
<!--        Second Answer:  <input type="text" name="ans_2" value="--><?php //echo $ans2 ?><!--"> <br>-->
<!--        Third Answer:   <input type="text" name="ans_3" value="--><?php //echo $ans3 ?><!--"> <br>-->
<!--        Fourth Ansswer: <input type="text" name="ans_4" value="--><?php //echo $ans4 ?><!--"> <br>-->
<!--        Picture:        <input type="text" name="picture" value="--><?php //echo $picture ?><!--">-->
<!--        Type:           <input type="text" name="type" value="--><?php //echo $type ?><!--"> <br>-->
<!--        <input type="submit" name="submit" value="update">-->
<!--    </form>-->
    <?php
} else {
    header("Location: add_new_question.php");
}
?>
