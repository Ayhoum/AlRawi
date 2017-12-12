<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
if (isset($_GET['exam_id'])) {
    $setId = $_GET['exam_id'];



    ?>
    <!DOCTYPE html>
    <html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="author" content="SemiColonWeb"/>

        <!-- Stylesheets
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
              rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="css/swiper.css" type="text/css"/>
        <link rel="stylesheet" href="css/dark.css" type="text/css"/>
        <link rel="stylesheet" href="css/font-icons.css" type="text/css"/>
        <link rel="stylesheet" href="css/animate.css" type="text/css"/>
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/responsive.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Document Title
        ============================================= -->
        <title></title>

        <style>
            body, html {
                height: 100%;
                background: #fff;
                font-family: 'Lato', sans-serif;
            }

            .slide {
                background: #fff;
                width: 100%;
                z-index: 1;
                color: #000;
            }

            .quesImg {
                width: 650px;
                height: 431.6px;
            }

            footer {
                background-color: #1ABC9C;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 35px;
                text-align: center;
                color: #444;
            }

            footer p {
                padding: 10.5px;
                margin: 0;
                line-height: 100%;
            }

            /* The container */
            .containerRadio {
                direction:rtl;
                display: block;
                position: relative;
                padding-right: 35px;
                padding-bottom: 10px;
                margin-bottom: 10px;
                cursor: pointer;
                font-size: 22px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                border-bottom: 1px solid #ccc;
                width: 100%;
            }

            /* Hide the browser's default radio button */

            .containerRadio input {
                position: absolute;
                opacity: 0;
            }

            /* Create a custom radio button */
            .checkmark {
                position: absolute;
                top: 0;
                right: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }

            /* On mouse-over, add a grey background color */

            .containerRadio:hover input ~ .checkmark {
                background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .containerRadio input:checked ~ .checkmark {
                background-color: #13c934;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */


            /* Show the indicator (dot/circle) when checked */
            .containerRadio input:checked ~ .checkmark:after {
                display: block;
            }
            input[type=text]{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            fieldset{
                margin-top: 20px;
            }
        </style>
    </head>

    <body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="full-header" style="height: 100px;">

            <div id="header-wrap" style="background: cyan;height: 100px;">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>


                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" style="width: 100%;background: cyan;height: 100px;">

                        <ul style="border:0;width: 100%;">
                            <li class="mega-menu">
                                <a class="navBut" href="#">
                                    <div><i style="font-size: 25px;" class="fa fa-th fa-3x" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div class="mega-menu-content clearfix">
                                    <div class="container topmargin-sm bottommargin-sm" style="width: 100%">
                                        <div class="col-lg-3 text-center"></div>
                                        <div class="col-lg-6 text-center">
                                            <div class="row center-block ">
                                                <a class="showSingle" target="26">
                                                    <button class="btn btn-info" id="but26" style="margin-top:10px;">26
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="27">
                                                    <button class="btn btn-info" id="but27" style="margin-top:10px;">27
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="28">
                                                    <button class="btn btn-info" id="but28" style="margin-top:10px;">28
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="29">
                                                    <button class="btn btn-info" id="but29" style="margin-top:10px;">29
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="30">
                                                    <button class="btn btn-info" id="but30" style="margin-top:10px;">30
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="31">
                                                    <button class="btn btn-info" id="but31" style="margin-top:10px;">31
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="32">
                                                    <button class="btn btn-info" id="but32" style="margin-top:10px;">32
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="33">
                                                    <button class="btn btn-info" id="but33" style="margin-top:10px;">33
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="34">
                                                    <button class="btn btn-info" id="but34" style="margin-top:10px;">34
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="35">
                                                    <button class="btn btn-info" id="but35" style="margin-top:10px;">35
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="36">
                                                    <button class="btn btn-info" id="but36" style="margin-top:10px;">36
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="37">
                                                    <button class="btn btn-info" id="but37" style="margin-top:10px;">37
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="38">
                                                    <button class="btn btn-info" id="but38" style="margin-top:10px;">38
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="39">
                                                    <button class="btn btn-info" id="but39" style="margin-top:10px;">39
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="40">
                                                    <button class="btn btn-info" id="but40" style="margin-top:10px;">40
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="41">
                                                    <button class="btn btn-info" id="but41" style="margin-top:10px;">41
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="42">
                                                    <button class="btn btn-info" id="but42" style="margin-top:10px;">42
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="43">
                                                    <button class="btn btn-info" id="but43" style="margin-top:10px;">43
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="44">
                                                    <button class="btn btn-info" id="but44" style="margin-top:10px;">44
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="45">
                                                    <button class="btn btn-info" id="but45" style="margin-top:10px;">45
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="46">
                                                    <button class="btn btn-info" id="but46" style="margin-top:10px;">46
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="47">
                                                    <button class="btn btn-info" id="but47" style="margin-top:10px;">47
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="48">
                                                    <button class="btn btn-info" id="but48" style="margin-top:10px;">48
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="49">
                                                    <button class="btn btn-info" id="but49" style="margin-top:10px;">49
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="50">
                                                    <button class="btn btn-info" id="but50" style="margin-top:10px;">50
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="51">
                                                    <button class="btn btn-info" id="but51" style="margin-top:10px;">51
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="52">
                                                    <button class="btn btn-info" id="but52" style="margin-top:10px;">52
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="53">
                                                    <button class="btn btn-info" id="but53" style="margin-top:10px;">53
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="54">
                                                    <button class="btn btn-info" id="but54" style="margin-top:10px;">54
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="55">
                                                    <button class="btn btn-info" id="but55" style="margin-top:10px;">55
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="56">
                                                    <button class="btn btn-info" id="but56" style="margin-top:10px;">56
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="57">
                                                    <button class="btn btn-info" id="but57" style="margin-top:10px;">57
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="58">
                                                    <button class="btn btn-info" id="but58" style="margin-top:10px;">58
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="59">
                                                    <button class="btn btn-info" id="but59" style="margin-top:10px;">59
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="60">
                                                    <button class="btn btn-info" id="but60" style="margin-top:10px;">60
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="61">
                                                    <button class="btn btn-info" id="but61" style="margin-top:10px;">61
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="62">
                                                    <button class="btn btn-info" id="but62" style="margin-top:10px;">62
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="63">
                                                    <button class="btn btn-info" id="but63" style="margin-top:10px;">63
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="64">
                                                    <button class="btn btn-info" id="but64" style="margin-top:10px;">64
                                                    </button>
                                                </a>
                                                <a class="showSingle" target="65">
                                                    <button class="btn btn-info" id="but65" style="margin-top:10px;">65
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 text-center"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="mega-menu">
                                <a onclick="flagQuestion();" class="flagBut" href="#">
                                    <div><i style="font-size: 25px;" class="fa fa-flag fa-3x" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="pull-left"><a href="#">
                                    <div>
                                        <button onclick="stopExam()" id="stopBut" class="btn btn-danger" >إيقاف الإمتحان</button>
                                    </div>
                                </a></li>
                        </ul>

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->

        <!-- Content
        ============================================= -->
        <section class="content" style="width: 100%">

            <div class="quiz-container">
                <div id="quiz"></div>
            </div>


            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <!--                            <button type="button" class="center-text btn btn-danger topmargin-sm" id="pause"><i class="fa fa-pause" aria-hidden="true"></i></button>-->
                            <!--                            <button type="button" class="center-text btn btn-success topmargin-sm " id="resume"><i class="fa fa-play" aria-hidden="true"></i></button>-->


                            <div class="btn-group topmargin-sm" id="timerDiv"
                                 style="width: 100%;font-size: 20px;direction: rtl;font-family: 'DroidArabicKufiRegular';">

                                <button id="showTime" type="button"
                                        class="col-md-10 center-text btn btn-default bottommargin-sm">المتبقي من الوقت:
                                    <div style="direction: ltr;font-size: 25px;" id="count"></div>
                                </button>

                                <button style="padding-top: 24px;padding-bottom: 24px;" type="button" id="resume"
                                        class="col-md-2 center-text btn btn-success bottommargin-sm">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </button>
                                <button style="padding-top: 24px;padding-bottom: 24px;" type="button" id="pause"
                                        class="col-md-2 center-text btn btn-danger bottommargin-sm">
                                    <i class="fa fa-pause" aria-hidden="true"></i>
                                </button>
                            </div>


                            <!--                            <button type="button" id="timerDiv"-->
                            <!--                                    style="width: 100%;font-size: 20px;direction: rtl;font-family: 'DroidArabicKufiRegular';"-->
                            <!--                                    class="center-text btn btn-default bottommargin-sm">المتبقي من الوقت:-->
                            <!--                                <p style="direction: ltr;font-size: 25px;" id="count"></p>-->
                            <!--                            </button>-->
                        </div>
                    </div>
                </div>
                <form method="post" action="check_answers.php?id=<?php echo $setId; ?>" enctype="multipart/form-data">

                    <div id='sStart' class='slideStart'>
                        <h3 style='direction: rtl;line-height: 2em;' class='text-center topmargin-sm'>
                            الإمتحان سيستمر لمدة 30 دقيقة كحد أقصى، وهو مكون من:<br>
                            25 سؤال إستجابة كل واحد منها مدته 8 ثواني<br>
                            و 40 سؤال ولديك 26 دقيقة و 40 ثانية لأجلها
                        </h3>
                        <h3 style='direction: rtl;line-height: 2em;' class='text-center topmargin-sm'>
                            يمكنك التنقل بين الأسئلة من خلال القائمة في الزاوية اليمنى في الأعلى، والتي ستظهر بالشكل التالي:
                            <br>
                            الأسئلة التي تم الإجابة عليها:
                            <button type="button" class="btn btn-success">1</button><br>
                            أما الأسئلة التي لم تجب عنها:
                            <button type="button" class="btn btn-info">2</button><br>
                            والأسئلة التي قمت بتعليمها:
                            <button type="button" class="btn btn-danger">3</button><br>
                        </h3>
                        <h4 class='text-center'>بمجرد بدء الإمتحان سيبدأ التوقيت التنازلي</h4>
                        <button type="button" onclick="startExam();" class="btn btn-success btn-lg center-block"
                                style="width: 40%;font-family: 'DroidArabicKufiRegular';">إبدأ الإمتحان
                        </button>
                    </div>


                    <div id='sBetween' class='slideBetween'>
                        <h2 style='direction: rtl;' class='text-center topmargin-sm'>انتهت أسئلة الإستجابة</h2>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>بعد الضغط على الزر بالأسفل سيتم
                            استكمال الإمتحان مباشرة</h3>
                        <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block"
                                style="width: 40%;">متابعة الإمتحان
                        </button>
                    </div>

                    <div id='sFinish' class='slideFinish'>
                        <h2 style='direction: rtl;' class='text-center topmargin-sm'>انتهت جميع الأسئلة</h2>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>يمكنك العودة إلى بعض الأسئلة قبل
                            الضغط على زر إنهاء الإمتحان في الأسفل</h3>
                        <!--                    <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block" style="width: 40%;">متابعة الإمتحان</button>-->
                    </div>

                    <div id='forceFinish' class='forceFinish'>
                        <h2 style='direction: rtl;' class='text-center topmargin-sm'>إنتهى الوقت مع الأسف</h2>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>إضغط على الزر أدناه لمعرفة نتيجة
                            الأسئلة التي أجبت عليها</h3>
                        <!--                    <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block" style="width: 40%;">متابعة الإمتحان</button>-->
                    </div>

                    <div id='stopSlide' class='stopSlide'>
                        <h2 style='direction: rtl;' class='text-center topmargin-sm'>لقد قمت بإيقاف الإمتحان</h2>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>إضغط على الزر أدناه لمعرفة نتيجة
                            الأسئلة التي أجبت عليها</h3>
                        <!--                    <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block" style="width: 40%;">متابعة الإمتحان</button>-->
                    </div>


                    <?php
                    //                $setId = 1;
                    $query = "SELECT * FROM EXAM_QUESTION WHERE QUESTION_SET_ID = $setId";
                    $selectQuestions = mysqli_query($mysqli, $query);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($selectQuestions)) {
                        $question = $row['QUESTION'];
                        $right = $row['RIGHT_ANSWER'];
                        $second = $row['ANSWER_2'];
                        $third = $row['ANSWER_3'];
                        $fourth = $row['ANSWER_4'];
                        $reason = $row['REASON'];
                        $picture = $row['PICTURE'];
                        $type = $row['TYPE'];

                        if ($type == "response") {
                            echo "<div id='s$i' class='slide'>";
//                        echo "<h2 style='direction: rtl;' class='text-center topmargin-sm'>السؤال رقم $i:</h2>";
                            echo "<h2 style='direction:rtl;' class='text-center'>$question</h2>";
                            echo "<img class='quesImg center-block' src='dashboardAlrawi/examsImages/free/$picture'/>";
                            echo "
                            <fieldset id='group$i'>
                                <label class='containerRadio'>فرامل
                                  <input type='radio' class='selector$i' name='selector$i' value='فرامل'>
                                  <span class='checkmark'></span>
                                </label>
                                <label class='containerRadio'>رفع قدم عن الوقود
                                  <input type='radio' class='selector$i' name='selector$i' value='رفع قدم عن الوقود'>
                                  <span class='checkmark'></span>
                                </label>
                                <label class='containerRadio'>لا شئ
                                  <input type='radio' class='selector$i' name='selector$i' value='لا شئ'>
                                  <span class='checkmark'></span>
                                </label>
                            </fieldset>";
                            echo"</div>";
                            $i++;
                        } else if ($type == "yesNo") {
                            echo "<div id='s$i' class='slide'>";
//                        echo "<h2 style='direction: rtl;' class='text-center topmargin-sm'>السؤال رقم $i:</h2>";
                            echo "<h2 style='direction: rtl;' class='text-center'>$question</h2>";
                            echo "<img class='quesImg center-block' src='dashboardAlrawi/examsImages/free/$picture'/>";
                            echo "
                            <fieldset id='group$i'>
                            <label class='containerRadio'>نعم
                                  <input type='radio' class='selector$i' name='selector$i' value='نعم'>
                                  <span class='checkmark'></span>
                                </label>
                                <label class='containerRadio'>لا
                                  <input type='radio' class='selector$i' name='selector$i' value='لا'>
                                  <span class='checkmark'></span>
                                </label>
                            </fieldset>";
                            echo "</div>";
                            $i++;
                        } else if ($type == "numInp") {
                            echo "<div id='s$i' class='slide'>";
//                        echo "<h2 style='direction: rtl;' class='text-center topmargin-sm'>السؤال رقم $i:</h2>";
                            echo "<h2 style='direction: rtl;' class='text-center'>$question</h2>";
                            echo "<img class='quesImg center-block' src='dashboardAlrawi/examsImages/free/$picture'/>";
                            echo "
                        <fieldset id='group$i'>
                            <input type='text' class='selector$i' name='selector$i' placeholder='أدخل القيمة'><br>
                        </fieldset>";
                            echo "</div>";
                            $i++;
                        } else if ($type == "multiChoice") {
                            echo "<div id='s$i' class='slide'>";
//                        echo "<h2 style='direction: rtl;' class='text-center topmargin-sm'>السؤال رقم $i:</h2>";
                            echo "<h2 style='direction: rtl;' class='text-center'>$question</h2>";
                            echo "<img class='quesImg center-block' src='dashboardAlrawi/examsImages/free/$picture'/>";
                            echo "
                        <fieldset id='group$i'>";
                            $answers = array($right, $second, $third, $fourth);
                            while (true) {
                                $num = rand(0, 3);
                                if ($answers[$num] != "0") {

                                    echo"
                                    <label class='containerRadio'>$answers[$num]
                                        <input type='radio' class='selector$i' name='selector$i' value='$answers[$num]'>
                                        <span class='checkmark'></span>
                                    </label>
                                    ";
                                    $answers[$num] = "0";
                                }
                                $toggle = 0;
                                for ($j = 0; $j < 4; $j++) {
                                    if ($answers[$j] == "0") {
                                        $toggle++;
                                    }
                                }
                                if ($toggle == 4) {
                                    break;
                                }
                            }
                            echo "</fieldset>";
                            echo "</div>";
                            $i++;
                        }
                    }


                    ?>
                    <button name="submit" style="bottom: 40px;width:80%;font-family: 'DroidArabicKufiRegular';"
                            id="submitBut" class="btn-lg btn btn-success center center-block" value="Submit" type="submit">إرسال الإجابات والتحقق منها
                    </button>

                    <button type="button" id="nxtBut" onclick="nextQuestion()" class="button button-rounded button-reveal button-large button-yellow button-light tright" style="position: fixed;bottom: 40px;right:0;">
                        <i class="icon-arrow-right2"></i>
                        <span style="font-family: 'DroidArabicKufiRegular';">السؤال التالي</span>
                    </button>


                </form>
            </div>
        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        <footer>
            <p>© 2017 Alrawi Theorie | Developed by <a target="_blank" style="color:#000; text-decoration:none;"
                                                       href="http://www.el-semicolon.nl">El-SemiColon;</a></p>
        </footer>

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>-->
    <script type="text/javascript" src="js/plugins.js"></script>

    <script>
        var counter = 0;
        var tar;
        var cancelled = 0;
        jQuery(function () {
            document.title = "بداية الإمتحان";
            jQuery('.slide').hide();
            jQuery('.navBut').hide();
            jQuery('.flagBut').hide();
            jQuery('.slideBetween').hide();
            jQuery('.slideFinish').hide();
            jQuery('.forceFinish').hide();
            jQuery('.slideStart').show();
            jQuery('#submitBut').hide();
            jQuery('#nxtBut').hide();
            jQuery('#pause').hide();
            jQuery('#resume').hide();
            jQuery('#showTime').hide();
            jQuery('#stopBut').hide();
            jQuery('.stopSlide').hide();


        });

        jQuery('.showSingle').click(function () {
            jQuery('.slide').hide();
            jQuery('#s' + $(this).attr('target')).show();
            tar = $(this).attr('target');
            jQuery('.selector' + $(this).attr('target')).change(function () {
                jQuery('#but' + tar).attr('class', 'btn btn-success');
            });
        });

        var flagQuestion = function () {
            if(jQuery('#but' + tar).hasClass('btn-info')){
                jQuery('#but' + tar).removeClass('btn-info').addClass('btn-danger');
            }else{
                jQuery('#but' + tar).removeClass('btn-success').addClass('btn-danger');
            }
        };

        var nextQuestion = function () {
            tar++;
            if (tar == 65) {
                jQuery('.slide').hide();
                jQuery('.navBut').hide();
                jQuery('.flagBut').hide();
                jQuery('#nxtBut').hide();
                jQuery('.slideBetween').hide();
                jQuery('.slideFinish').show();
                jQuery('.forceFinish').hide();
            } else {
                jQuery('#s' + tar).show();
                tarPre = tar - 1;
                jQuery('#s' + tarPre).hide();
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }
            document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
        };

        var startExam = function () {
            jQuery('#stopBut').show();
            jQuery('.slideStart').hide();
            jQuery('#showTime').removeClass('col-md-10').addClass('col-md-12').show();

            tar = 1;
            document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;

            var CountDown = (function ($) {
                // Length ms
                var TimeOut = 10000;
                // Interval ms
                var TimeGap = 1000;

                var CurrentTime = (new Date()).getTime();
                var EndTime = (new Date()).getTime() + TimeOut;

                var GuiTimer = $('#count');
                var GuiPause = $('#pause').hide();
                var GuiResume = $('#resume').hide();

                var Running = true;

                var UpdateTimer = function () {
                    // Run till timeout
                    if (CurrentTime + TimeGap < EndTime) {
                        setTimeout(UpdateTimer, TimeGap);
                    }
                    // Countdown if running
                    if (Running) {
                        CurrentTime += TimeGap;
                        if (CurrentTime >= EndTime) {
                            GuiTimer.css('color', 'red');
                        }
                    }
                    // Update Gui
                    var Time = new Date();
                    Time.setTime(EndTime - CurrentTime);
                    var Minutes = Time.getMinutes();
                    var Seconds = Time.getSeconds();
                    if (Minutes == 0 && Seconds == 0) {
                        jQuery('.slide').hide();
                        jQuery('.navBut').hide();
                        jQuery('.flagBut').hide();
                        jQuery('#nxtBut').hide();
                        jQuery('.slideBetween').hide();
                        jQuery('.slideFinish').hide();
                        jQuery('.forceFinish').show();
                        jQuery('#submitBut').show();
                    } else {
                        GuiTimer.html(
                            (Minutes < 10 ? '0' : '') + Minutes
                            + ':'
                            + (Seconds < 10 ? '0' : '') + Seconds);
                    }

                };

                var Pause = function () {
                    Running = false;
                    GuiPause.hide();
                    GuiResume.show();
                };

                var Resume = function () {
                    Running = true;
                    GuiPause.show();
                    GuiResume.hide();
                };

                var Start = function (Timeout) {
                    TimeOut = Timeout;
                    CurrentTime = (new Date()).getTime();
                    EndTime = (new Date()).getTime() + TimeOut;
                    UpdateTimer();
                };

                return {
                    Pause: Pause,
                    Resume: Resume,
                    Start: Start
                };
            })(jQuery);

            jQuery('#pause').on('click', CountDown.Pause);
            jQuery('#resume').on('click', CountDown.Resume);

            // ms
            CountDown.Start(1801000);


            $("#s1").show();
            jQuery('.selector' + tar).change(function () {
                jQuery('#but1').attr('class', 'btn btn-success');
                counter++;
            });
            setTimeout(function () {
                if(cancelled == 0){
                    $("#s1 ").hide();
                    $("#s2 ").show();
                    tar = 2;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 8000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s2 ").hide();
                    $("#s3 ").show();
                    tar = 3;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 16000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s3 ").hide();
                    $("#s4 ").show();
                    tar = 4;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 24000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s4 ").hide();
                    $("#s5 ").show();
                    tar = 5;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 32000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s5 ").hide();
                    $("#s6 ").show();
                    tar = 6;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 40000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s6 ").hide();
                    $("#s7 ").show();
                    tar = 7;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 48000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s7 ").hide();
                    $("#s8 ").show();
                    tar = 8;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 56000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s8 ").hide();
                    $("#s9 ").show();
                    tar = 9;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 64000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s9 ").hide();
                    $("#s10").show();
                    tar = 10;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 72000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s10").hide();
                    $("#s11").show();
                    tar = 11;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 80000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s11").hide();
                    $("#s12").show();
                    tar = 12;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 88000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s12").hide();
                    $("#s13").show();
                    tar = 13;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 96000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s13").hide();
                    $("#s14").show();
                    tar = 14;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 104000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s14").hide();
                    $("#s15").show();
                    tar = 15;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 112000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s15").hide();
                    $("#s16").show();
                    tar = 16;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 120000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s16").hide();
                    $("#s17").show();
                    tar = 17;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 128000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s17").hide();
                    $("#s18").show();
                    tar = 18;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 136000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s18").hide();
                    $("#s19").show();
                    tar = 19;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 144000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s19").hide();
                    $("#s20").show();
                    tar = 20;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 152000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s20").hide();
                    $("#s21").show();
                    tar = 21;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 160000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s21").hide();
                    $("#s22").show();
                    tar = 22;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 168000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s22").hide();
                    $("#s23").show();
                    tar = 23;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 176000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s23").hide();
                    $("#s24").show();
                    tar = 24;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 184000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s24").hide();
                    $("#s25").show();
                    tar = 25;
                    document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
                }
                jQuery('.selector' + tar).change(function () {
                    jQuery('#but' + tar).attr('class', 'btn btn-success');
                    counter++;
                });
            }, 192000);
            setTimeout(function () {
                if(cancelled == 0) {
                    $("#s25").hide();
                    $(".slideBetween").show();
                    document.title = "نهاية أسئلة الإستجابة";
                }
            }, 200000);
        };


        var continueExam = function () {

            $(".slideBetween ").hide();
            jQuery('.navBut').show();
            jQuery('.flagBut').show();
            jQuery('#nxtBut').show();
            jQuery('#pause').show();
            jQuery('#showTime').addClass('col-md-10').removeClass('col-md-12');
            $("#s26").show();
            tar=26;
            document.title = "الإمتحان <?php echo $setId ?>" + " | " + "السؤال " + tar;
            jQuery('.selector' + tar).change(function () {
                jQuery('#but26').attr('class', 'btn btn-success');
                counter++;
            });

        };
        var stopExam = function () {
            if (confirm('هل أنت متأكد من إيقاف الإمتحان؟')) {
                clearTimeout(startExam);
                cancelled = 1;
                document.title = "إيقاف الإمتحان";
                jQuery('.slide').hide();
                jQuery('.navBut').hide();
                jQuery('.flagBut').hide();
                jQuery('.slideBetween').hide();
                jQuery('.slideFinish').hide();
                jQuery('.forceFinish').hide();
                jQuery('.slideStart').hide();
                jQuery('.stopSlide').show();
                jQuery('#submitBut').show();
                jQuery('#nxtBut').hide();
                jQuery('#stopBut').hide();
                jQuery('#pause').hide();
                jQuery('#resume').hide();
                jQuery('#showTime').hide();

            }
        };
    </script>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="js/functions.js"></script>

    </body>
    </html>

    <?php
} else {
    header('Location: profile.php');
}

?>