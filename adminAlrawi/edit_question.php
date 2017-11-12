<?php
session_start();
ob_start();
include '../scripts/db_connection.php';
if (isset($_GET['id']) && isset($_GET['qset'])) {
    $setId = $_GET['id'];
    $qSet = $_GET['qset'];
}
$changed = 0;
//require_once 'test.php';
//$date = date('Y-m-d');
if ($_SESSION['role'] != "MainAdmin") {
    header("Location: ../index.php");
}


if (isset($_POST['update'])) {
    $id = $setId;
    $newQuestion = $_POST['question'];
    $newRight = $_POST['action'];
    $newPicture = $_FILES['image']['name'];
    $newPicture = date('Ymd') . date('Hms') . ".jpg";
    $newPicture_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($newPicture_tmp, "exam_images/exams/".$newPicture);
    if (!empty($newPicture)) {
        $query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId";
        $select_ques = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($select_ques)) {
            $oldPicture = $row['PICTURE'];
        }
        if(file_exists("exam_images/exams/$oldPicture")){
            unlink("exam_images/exams/$oldPicture");
            echo "<script>alert('Done');</script>";
        }
    }elseif (empty($newPicture)) {
        $query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId";
        $select_ques = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($select_ques)) {
            $newPicture = $row['PICTURE'];
        }
    }
    $newType = $_POST['type'];
    if ($newRight == "Break") {
        $new2 = "Release";
        $new3 = "Nothing";
    } elseif ($newRight == "Release") {
        $new2 = "Break";
        $new3 = "Nothing";
    } else {
        $new2 = "Break";
        $new3 = "Release";
    }
    $updateQuery = "UPDATE EXAM_QUESTION SET QUESTION = '{$newQuestion}', RIGHT_ANWSER = '{$newRight}', ANSWER_2 = '{$new2}', ANSWER_3 = '{$new3}', PICTURE = '{$newPicture}', TYPE = '{$newType}' WHERE NUMBER = '{$id}'";
    $update = mysqli_query($mysqli, $updateQuery);
    if (!$update) {
        die("Failed to create a new exam" . mysqli_error($mysqli));
    } else {
        echo "Exam created";
    }
}




if (isset($_POST['submit'])) {
    $id = $setId;
    $question = $_POST['question'];
    $right = $_POST['action'];
    $picture = $_FILES['image']['name'];
    $picture = date('Ymd') . date('Hms') . ".jpg";
    $picture_tmp = $_FILES['image']['tmp_name'];
    if (!empty($picture)) {
        move_uploaded_file($picture_tmp, "exam_images/exams/".$picture);
    }else{
        $picture = "Empty";
    }
    $type = $_POST['type'];
    if ($right == "Break") {
        $new2 = "Release";
        $new3 = "Nothing";
        $new4 = " ";
    } elseif ($right == "Release") {
        $new2 = "Break";
        $new3 = "Nothing";
        $new4 = " ";
    } else {
        $new2 = "Break";
        $new3 = "Release";
        $new4 = " ";
    }

    $query = "INSERT INTO EXAM_QUESTION(NUMBER,
                                QUESTION,
                                RIGHT_ANWSER,
                                ANSWER_2,
                                ANSWER_3,
                                ANSWER_4,
                                PICTURE,
                                TYPE,
                                QUESTION_SET_ID) ";
    $query .= "VALUES('{$setId}',
                    '{$question}',
                    '{$right}',
                    '{$new2}',
                    '{$new3}',
                    '{$new4}',
                    '{$picture}',
                    '{$type}',
                    '{$qSet}') ";

    $insertQuestion =  mysqli_query($mysqli, $query);
    if (!$insertQuestion) {
        die("Failed to create a new exam" . mysqli_error($mysqli));
    }
    else {
        header("Location: manage_one_exam.php?id=$qSet");
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!--                        <div class="header">-->
            <!--                            <h2>ADVANCED FORM EXAMPLE WITH VALIDATION</h2>-->
            <!--                        </div>-->
            <div class="row clearfix">

                <?php
                $query = "SELECT * FROM EXAM_QUESTION WHERE NUMBER = $setId  && Question_Set_ID = $qSet LIMIT 0 , 65";
                $check_ques = mysqli_query($mysqli, $query);
                if (mysqli_num_rows($check_ques) > 0) {
                    while ($row = mysqli_fetch_assoc($check_ques)) {
                        $question = $row['QUESTION'];
                        $right = $row['RIGHT_ANWSER'];
                        $ans2 = $row['ANSWER_2'];
                        $ans3 = $row['ANSWER_3'];
                        $ans4 = $row['ANSWER_4'];
                        $picture = $row['PICTURE'];
                        $type = $row['TYPE'];
                        ?>

                        <form id="form_validation" method="POST" novalidate="novalidate"
                              action="edit_question.php?id=<?php echo $setId ?>"
                              enctype="multipart/form-data">
                            <h3>Update Question</h3>
                            <fieldset>
                                <!--###############################################################################################################################################-->
                                <div class="row clearfix">
                                    <div class="card">
                                        <div class="body">
                                            <h3>Question <?php echo $setId; ?></h3>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="question"
                                                           value="<?php echo $question; ?>" required>
                                                    <label class="form-label">Question*</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="action" id="break" value="Break"
                                                       class="with-gap" <?php if ($right == "Break") {
                                                    echo "checked";
                                                } ?>>
                                                <label for="break">Break</label>

                                                <input type="radio" name="action" id="release" value="Release"
                                                       class="with-gap" <?php if ($right == "Release") {
                                                    echo "checked";
                                                } ?>>
                                                <label for="release" class="m-l-20">Release Gas!</label>

                                                <input type="radio" name="action" id="nothing" value="Nothing"
                                                       class="with-gap" <?php if ($right == "Nothing") {
                                                    echo "checked";
                                                } ?>>
                                                <label for="nothing" class="m-l-20">Nothing</label>
                                            </div>

                                            <div class="form-group">
                                                <p>
                                                    <b>Question Type</b>
                                                </p>
                                                <select name="type" class="form-control show-tick">
                                                    <option disabled>---Select Type---</option>
                                                    <option value="response" <?php if ($type == "response") {
                                                        echo "selected";
                                                    } ?>>Response
                                                    </option>
                                                    <option value="choices" <?php if ($type == "choices") {
                                                        echo "selected";
                                                    } ?>>Choices
                                                    </option>
                                                    <option value="advantage" <?php if ($type == "advantage") {
                                                        echo "selected";
                                                    } ?>>Advantage
                                                    </option>
                                                    <option value="number" <?php if ($type == "number") {
                                                        echo "selected";
                                                    } ?>>Number
                                                    </option>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <div class="fileUpload btn btn-primary">
                                                    <span>Upload</span><br/>
                                                    <input type="file" name="image" id="imgInp" class="upload"/>
                                                </div>
                                                <div class="align-center">
                                                    <span>The New Image</span><br/>
                                                    <img id="blah" width="250" height="250" src="#" alt="#"/>
                                                    <br/>
                                                    <br/>
                                                    <br/>
                                                    <?php
                                                    if (file_exists("exam_images/exams/$picture")) {
                                                        ?>
                                                        <span>The Already Image</span><br/>
                                                        <img src="exam_images/exams/<?php echo $picture; ?>"
                                                             id="preview-image"
                                                             alt="New Image" width="250" height="250"/>
                                                    <?php } else {
                                                        echo "No Image";
                                                    } ?>
                                                </div>
                                            </div>

                                            <input type="submit" class="btn btn-block btn-lg btn-success waves-effect"
                                                   name="update" value="Submit Changes"/>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>

                        </form>

                        <?php


                    }
                } else {
                    echo " no questions founded";
                    ?>


<!--                    <form id="form_validation" method="POST" novalidate="novalidate"-->
<!--                          action="edit_question.php?id=--><?php //echo $setId ?><!--&qset=--><?php //echo $qSet ?><!--"-->
<!--                          enctype="multipart/form-data">-->
<!--                        <h3>Update Question</h3>-->
<!--                        <fieldset>-->
<!--                            <!--###############################################################################################################################################-->-->
<!--                            <div class="row clearfix">-->
<!--                                <div class="card">-->
<!--                                    <div class="body">-->
<!--                                        <h3>Question --><?php //echo $setId; ?><!--</h3>-->
<!--                                        <div class="form-group form-float">-->
<!--                                            <div class="form-line">-->
<!--                                                <input type="text" class="form-control" name="question" required>-->
<!--                                                <label class="form-label">Question*</label>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group">-->
<!--                                            <input type="radio" name="action" id="break" value="Break" class="with-gap">-->
<!--                                            <label for="break">Break</label>-->
<!---->
<!--                                            <input type="radio" name="action" id="release" value="Release" class="with-gap">-->
<!--                                            <label for="release" class="m-l-20">Release Gas!</label>-->
<!---->
<!--                                            <input type="radio" name="action" id="nothing" value="Nothing" class="with-gap">-->
<!--                                            <label for="nothing" class="m-l-20">Nothing</label>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="form-group">-->
<!--                                            <p>-->
<!--                                                <b>Question Type</b>-->
<!--                                            </p>-->
<!--                                            <select name="type" class="form-control show-tick">-->
<!--                                                <option disabled>---Select Type---</option>-->
<!--                                                <option value="response">Response</option>-->
<!--                                                <option value="choices">Choices</option>-->
<!--                                                <option value="advantage">Advantage</option>-->
<!--                                                <option value="number">Number</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="form-group">-->
<!--                                            <div class="fileUpload btn btn-primary">-->
<!--                                                <span>Upload</span><br/>-->
<!--                                                <input type="file" name="image" id="imgInp" class="upload"/>-->
<!--                                            </div>-->
<!--                                            <div class="align-center">-->
<!--                                                <span>The New Image</span><br/>-->
<!--                                                <img id="blah" width="250" height="250" src="#" alt="#"/>-->
<!--                                                <br/>-->
<!--                                                <br/>-->
<!--                                                <br/>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <input type="submit" class="btn btn-block btn-lg btn-success waves-effect"-->
<!--                                               name="submit" value="Submit Changes"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </fieldset>-->
<!---->
<!--                    </form>-->

                    <?php


                }
                ?>


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
<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
</script>

</body>
</html>