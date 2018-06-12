<?php
session_start();
ob_start();
include '../scripts/db_connection.php';

$txt = "Wrong_".$_SERVER['REMOTE_ADDR'];

date_default_timezone_set('Europe/Amsterdam');
$dateStamp = date('Y-m-d H:i:s');
$query = "INSERT INTO `ips`(`IP`,`timestamp`) VALUES ('{$txt}','{$dateStamp}')" ;
$run = mysqli_query($mysqli,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Al-Rawi Admin</title>

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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="account">
<div class="container">
    <div class="row">

        <div class="account-col text-center">
            <h1>Al-Rawi Theroie Admin Page</h1>
            <h3>Log into your account</h3>
            <p>We have registered your IP for our concerns that you are not an Admin.<br>We are going to take all legal actions if your IP is registered again by us!</p>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/tether.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
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
</body>
</html>
