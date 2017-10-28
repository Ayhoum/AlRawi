<?php
session_start();
ob_start();
include '../scripts/db_connection.php';


if(isset($_POST['signIn'])) {

    $username = $_POST['username'];
    $username = mysqli_real_escape_string($mysqli, $username);
    $pass = $_POST['password'];
    $pass = mysqli_real_escape_string($mysqli, $pass);


    $query = "SELECT * From Admin WHERE USERNAME = '{$username}' ";
    $getHashAdmin = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($getHashAdmin) == 1) {
        while ($row = mysqli_fetch_assoc($getHashAdmin)) {
            $hash = $row['PASSWORD'];
            $name = $row['NAME'];
            $role = $row['ROLE'];
            if ((password_verify($pass, $hash))) {
                $_SESSION['username'] = $name;
                $_SESSION['role'] = $role;
                echo 'Welcome ADMIN';
                header("Location: dashboard.php");
            } else {
                echo "Enter a Valid Data !! ";
                header("Location: https://www.google.com");

            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

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
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <div class="row center">
                <a href="../index.php"><img src="../images/2.png" alt="Al Rawi Logo"></a>
            </div>
            <small>Admin Al Rawi Theorie</small>
        </div>
        <div class="card">
            <div class="body">
                <form name="sign_in" id="sign_in" method="post" action="sign-in.php" >
                    <div class="msg">Sign in to your Dashboard</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" name="signIn" id="signIn" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>