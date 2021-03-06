<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
if (isset($_GET['exam_id'])) {
    $setId = $_GET['exam_id'];
} else {
    header('Location: profile.php');
}

$arrOrder = array(array());
?>

<html>
<head>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="El-SemiColon;"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="css/animate.css" type="text/css"/>
    <link rel="icon" href="images/1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/remodal.css">
    <link rel="stylesheet" href="css/remodal-default-theme.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />-->

    <style>
        .button.button-reveal.button-large{
            padding: 0 28px;
        }
        .se-pre-con {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/2.png) center no-repeat #fff2f2;
        }

        .pre-pre {
            position: fixed;
            left: 0;
            top: 150px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(images/preloader@2x.gif) center no-repeat;
        }

        .pre-pre-txt {
            position: fixed;
            left: 0;
            top: 150px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            text-align: center;
        }

        body {
            font-family: 'DroidArabicKufiRegular';
        }

        .navbar {
            background: cyan;
        }

        .navbar-brand-centered {
            position: absolute;
            left: 50%;
            display: block;
            width: 160px;
            text-align: center;
            background-color: transparent;
        }

        .navbar > .container .navbar-brand-centered,
        .navbar > .container-fluid .navbar-brand-centered {
            margin-left: -80px;
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

        .containerRadio {
            direction: rtl;
            display: block;
            position: relative;
            padding-right: 35px;
            padding-bottom: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 500;
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

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        fieldset {
            margin-top: 20px;
        }


        .col-xs-2 {
            padding-right: 0;
            padding-left: 0;
        }

        .topmargin-sm {
            margin-top: 30px !important;
        }

        .bottommargin-sm {
            margin-bottom: 30px !important;
        }

        .dropdown-menu {
            min-width: 337.5px;
        }

        @media (max-width: 767px) {
            .nxtButSt {
                margin-top: 15px;
                width: 100%;
            }

            .prevButSt {
                margin-top: 15px;
                width: 100%;
            }

            .dropdown-menu {
                min-width: 160px;
            }

            .navbar-brand {
                float: left;
                padding: 7px 15px;
                font-size: 18px;
                line-height: 20px;
                height: 50px;
            }

            #wihund {
                width: 100%;
            }
            .quesImg{
                margin-top: 10px;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #wihund {
                width: 100%;
            }

            /*.nxtButSt {*/
            /*position: fixed;*/
            /*bottom: 40px;*/
            /*right: 10px;*/
            /*}*/

            /*.prevButSt {*/
            /*position: fixed;*/
            /*bottom: 40px;*/
            /*right: 200px;*/
            /*}*/
            .quesImg{
                margin-top: 10px;
            }
        }

        @media (min-width: 991px) {
            /*.nxtButSt {*/
            /*position: fixed;*/
            /*bottom: 40px;*/
            /*right: 10px;*/
            /*}*/

            /*.prevButSt {*/
            /*position: fixed;*/
            /*bottom: 40px;*/
            /*right: 200px;*/
            /*}*/
            .quesImg {
                width: 730px;
                height: 484.7px;
            }
        }

        .slick-slide {
            height: auto;
        }
    </style>


</head>
<body>
<div class="se-pre-con" id="pre1">
    <h2 class="pre-pre-txt">يرجى الإنتظار ريثما يتم إعداد الإمتحان</h2>
    <div class="pre-pre" id="pre2"></div>
</div>


<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-centered" id="showTime"><span style="font-size: 25px;"
                                                                                id="count"></span>
                <button class="button button-mini button-circle button-red" id="pause"> إيقاف الوقت</button>
                <button class="button button-mini button-circle button-green" id="resume"> تشغيل الوقت</button>
            </div>
        </div>
        <!--        <i class="fa fa-pause"></i>-->
        <!--        <i class="fa fa-play"></i>-->
        <!-- Collect the nav links, for
        ms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav">
                <li class="text-center">
                    <a href="#" style="color:#fff;">
                        <button onclick="stopExam()"
                                class="button button-rounded button-reveal button-small button-red"><i
                                    class="fa fa-times"></i><span>إيقاف الإمتحان</span></button>
                    </a>
                </li>
<!--                <li>-->
<!--                    <span id="controlTimer"></span>-->
<!--                </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="text-center"><a onclick="flagQuestion();" class="flagBut" href="#"><i
                                class="fa fa-flag fa-2x" aria-hidden="true"></i></a></li>
                <li class="dropdown text-center navBut">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th fa-2x"
                                                                                  aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <div id="wihund" class="col-md-offset-1 col-xs-10 col-md-offset-1"
                             style="padding-left: 0;padding-right: 0;">
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="1"><button class="btn btn-info" id="but1" style="margin-top:10px;">1</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="2"><button class="btn btn-info" id="but2" style="margin-top:10px;">2</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="3"><button class="btn btn-info" id="but3" style="margin-top:10px;">3</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="4"><button class="btn btn-info" id="but4" style="margin-top:10px;">4</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="5"><button class="btn btn-info" id="but5" style="margin-top:10px;">5</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="6"><button class="btn btn-info" id="but6" style="margin-top:10px;">6</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="7"><button class="btn btn-info" id="but7" style="margin-top:10px;">7</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="8"><button class="btn btn-info" id="but8" style="margin-top:10px;">8</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="9"><button class="btn btn-info" id="but9" style="margin-top:10px;">9</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="10"><button class="btn btn-info" id="but10" style="margin-top:10px;">10</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="11"><button class="btn btn-info" id="but11" style="margin-top:10px;">11</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="12"><button class="btn btn-info" id="but12" style="margin-top:10px;">12</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="13"><button class="btn btn-info" id="but13" style="margin-top:10px;">13</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="14"><button class="btn btn-info" id="but14" style="margin-top:10px;">14</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="15"><button class="btn btn-info" id="but15" style="margin-top:10px;">15</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="16"><button class="btn btn-info" id="but16" style="margin-top:10px;">16</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="17"><button class="btn btn-info" id="but17" style="margin-top:10px;">17</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="18"><button class="btn btn-info" id="but18" style="margin-top:10px;">18</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="19"><button class="btn btn-info" id="but19" style="margin-top:10px;">19</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="20"><button class="btn btn-info" id="but20" style="margin-top:10px;">20</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="21"><button class="btn btn-info" id="but21" style="margin-top:10px;">21</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="22"><button class="btn btn-info" id="but22" style="margin-top:10px;">22</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="23"><button class="btn btn-info" id="but23" style="margin-top:10px;">23</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="24"><button class="btn btn-info" id="but24" style="margin-top:10px;">24</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="25"><button class="btn btn-info" id="but25" style="margin-top:10px;">25</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="26"><button class="btn btn-info" id="but26" style="margin-top:10px;">26</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="27"><button class="btn btn-info" id="but27" style="margin-top:10px;">27</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="28"><button class="btn btn-info" id="but28" style="margin-top:10px;">28</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="29"><button class="btn btn-info" id="but29" style="margin-top:10px;">29</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="30"><button class="btn btn-info" id="but30" style="margin-top:10px;">30</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="31"><button class="btn btn-info" id="but31" style="margin-top:10px;">31</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="32"><button class="btn btn-info" id="but32" style="margin-top:10px;">32</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="33"><button class="btn btn-info" id="but33" style="margin-top:10px;">33</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="34"><button class="btn btn-info" id="but34" style="margin-top:10px;">34</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="35"><button class="btn btn-info" id="but35" style="margin-top:10px;">35</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="36"><button class="btn btn-info" id="but36" style="margin-top:10px;">36</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="37"><button class="btn btn-info" id="but37" style="margin-top:10px;">37</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="38"><button class="btn btn-info" id="but38" style="margin-top:10px;">38</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="39"><button class="btn btn-info" id="but39" style="margin-top:10px;">39</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="40"><button class="btn btn-info" id="but40" style="margin-top:10px;">40</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="41"><button class="btn btn-info" id="but41" style="margin-top:10px;">41</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="42"><button class="btn btn-info" id="but42" style="margin-top:10px;">42</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-2"><a class="showSingle" target="43"><button class="btn btn-info" id="but43" style="margin-top:10px;">43</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="44"><button class="btn btn-info" id="but44" style="margin-top:10px;">44</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="45"><button class="btn btn-info" id="but45" style="margin-top:10px;">45</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="46"><button class="btn btn-info" id="but46" style="margin-top:10px;">46</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="47"><button class="btn btn-info" id="but47" style="margin-top:10px;">47</button></a></div>
                                <div class="col-xs-2"><a class="showSingle" target="48"><button class="btn btn-info" id="but48" style="margin-top:10px;">48</button></a></div>
                            </div>
                            <li class="divider"></li>
                            <div class="row text-center" style="margin-right: 0;margin-left: 0;">
                                <div class="col-xs-offset-3 col-xs-2"><a class="showSingle" target="49"><button class="btn btn-info" id="but49" style="margin-top:10px;">49</button></a></div>
                                <div class="col-xs-offset-3 col-xs-2"><a class="showSingle" target="50"><button class="btn btn-info" id="but50" style="margin-top:10px;">50</button></a></div></div>
                            <li class="divider"></li>
                        </div>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<section class="content" style="width: 100%">

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <!--                    <span class="pagingInfo"></span>-->
                <!--                    <span class="pagingInfo1"></span>-->


                <form method="post" action="free_check_answers_trucks.php?id=<?php echo $setId; ?>"
                      enctype="multipart/form-data">

                    <div id='sStart' class='slideStart'>
                        <h4 style='direction: rtl;line-height: 2em;' class='text-center topmargin-sm'>
                            المدة القصوى للإمتحان هي 75 دقيقة<br><br>
                            الإمتحان مؤلف من قسمين كلّ منهما مؤلف من 25 سؤال بمجموع 50 سؤال
                        </h4>
                        <h4 style='direction: rtl;line-height: 2em;' class='text-center topmargin-sm'>
                            تستطيع إيقاف الإمتحان بأي وقت تريد وتستطيع وضع علم على السؤال الغير مفهوم كي تعود إليه لاحقاً وتستطيع التوقف عند أي سؤال لتعرف إجابتك إن كانت صحيحة أم خاطئة وإظهار السبب لماذا كانت خاطئة ولماذا كانت صحيحة
                        </h4>
                        <h4 style='direction: rtl;line-height: 2em;' class='text-center topmargin-sm'>
                            في الزاوية اليمين العليا ستشاهد العلم وبجانبه مربعات صغيرة إذا ضغطت عليها ستشاهد ملخص عن إمتحانك<br>
                            حيث ستظهر الأسئلة التي قمت بالإجابة عليها بلون أخضر:
                            <button type="button" class="btn btn-success">1</button>
                            <br>
                            والأسئلة التي قمت بتأشيرها بلون أحمر:
                            <button type="button" class="btn btn-danger">2</button>
                            <br>
                            والأسئلة التي لم تجب عنها بلون أزرق:
                            <button type="button" class="btn btn-info">3</button>
                            <br>
                        </h4>
                        <h4 class='text-center'>بمجرد بدء الإمتحان سيبدأ التوقيت التنازلي</h4>
                        <button type="button" onclick="startExam();"
                                class="btn btn-success btn-lg center-block topmargin-sm bottommargin-sm"
                                style="font-family: 'DroidArabicKufiRegular';">إبدأ الإمتحان
                        </button>
                    </div>


                    <div id='sBetween' class='slideBetween'>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>انتهى القسم الأول من الأسئلة</h3>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>بعد الضغط على الزر بالأسفل سيتم
                            استكمال الإمتحان مباشرة</h4><br>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>عند إجابتك على أحد الأسئلة يمكنك
                            الضغط على زر (السؤال التالي) للانتقال للسؤال الذي يليه</h4>
                        <button type="button" onclick="continueExam();"
                                class="btn btn-warning btn-lg center-block topmargin-sm"
                                style="font-family: 'DroidArabicKufiRegular';">متابعة الإمتحان
                        </button>
                    </div>

                    <div id='sFinish' class='slideFinish'>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>منذ بداية 2018 أصبح ممكناً تقديم فحص الشاحنات مع مترجم <br><br> وهناك حاليا كورسات للتدريس بالعربي <br><br> لمزيد من المعلومات يرجى التواصل معنا على الرقم 0685338583</h4>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>انتهت جميع الأسئلة</h3>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>يمكنك العودة إلى بعض الأسئلة قبل
                            الضغط على زر إنهاء الإمتحان في الأسفل</h4>
                        <!--                    <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block" style="width: 40%;">متابعة الإمتحان</button>-->
                    </div>

                    <div id='forceFinish' class='forceFinish'>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>منذ بداية 2018 أصبح ممكناً تقديم فحص الشاحنات مع مترجم <br><br> وهناك حاليا كورسات للتدريس بالعربي <br><br> لمزيد من المعلومات يرجى التواصل معنا على الرقم 0685338583</h4>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>إنتهى الوقت مع الأسف</h3>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>إضغط على الزر أدناه لمعرفة نتيجة
                            الأسئلة التي أجبت عليها</h4>
                        <!--                    <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block" style="width: 40%;">متابعة الإمتحان</button>-->
                    </div>

                    <div id='stopSlide' class='stopSlide'>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>منذ بداية 2018 أصبح ممكناً تقديم فحص الشاحنات مع مترجم <br><br> وهناك حاليا كورسات للتدريس بالعربي <br><br> لمزيد من المعلومات يرجى التواصل معنا على الرقم 0685338583</h4>
                        <h3 style='direction: rtl;' class='text-center topmargin-sm'>لقد قمت بإيقاف الإمتحان</h3>
                        <h4 style='direction: rtl;' class='text-center topmargin-sm'>إضغط على الزر أدناه لمعرفة نتيجة
                            الأسئلة التي أجبت عليها</h4>
                        <!--                    <button type="button" onclick="continueExam();" class="btn btn-warning btn-lg center-block" style="width: 40%;">متابعة الإمتحان</button>-->
                    </div>

                    <div class="QuestionsSlideShow" id="heightAdj">

                        <?php
                        //                $setId = 1;
                        $query = "SELECT * FROM FREE_EXAM_QUESTION_TRUCK WHERE FREE_QUESTION_SET_TRUCK_ID = $setId ORDER BY NUMBER ASC";
                        $selectQuestions = mysqli_query($mysqli_en, $query);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($selectQuestions)) {
                            $numberNum = $row['NUMBER'];
                            $question = $row['QUESTION'];
                            $right = $row['RIGHT_ANSWER'];
                            $second = $row['ANSWER_2'];
                            $third = $row['ANSWER_3'];
                            $fourth = $row['ANSWER_4'];
                            $reason = $row['REASON'];
                            $picture = $row['PICTURE'];
                            $type = $row['TYPE'];


                            echo "<div>";
                            if ($type == "response") {
                                echo "<div id='s$i' class='slide col-md-12' style=''>";
                                echo "<div class='row'>";
                                echo "<div class='col-md-4'>";
                                echo "<h4 style='direction:rtl;font-weight: 700;font-size: 20px;color: #1265A8;border-color: #1265A8;border: 2px solid #1265A8;background-color: transparent;color: #1265A8;line-height: 36px;font-weight: 700;text-shadow: none;' class='text-center '>الإمتحان $setId - السؤال $i</h4>";
                                echo "<h4 style='direction:rtl;font-weight: 700;line-height: 1.5em;' class='text-center'>$question</h4>";
                                echo "
                            <fieldset id='group$i'>
                                <label class='containerRadio'>فرامل
                                  <input type='radio' class='selector$i' name='selector$i' value='فرامل'>
                                  <span class='checkmark text-center'>A</span>
                                </label>
                                <label class='containerRadio'>رفع قدم عن الوقود
                                  <input type='radio' class='selector$i' name='selector$i' value='رفع قدم عن الوقود'>
                                  <span class='checkmark text-center'>B</span>
                                </label>
                                <label class='containerRadio'>لا شئ
                                  <input type='radio' class='selector$i' name='selector$i' value='لا شئ'>
                                  <span class='checkmark text-center'>C</span>
                                </label>
                            </fieldset>";
                                echo "
                            <div class='row text-center' style='width: 100%; margin-top: 20px;'>
                            <div class='col-xs-6'>
                                <button type='button' id='prevBut'
                                        class='button button-rounded button-reveal tleft button-large button-teal prev prevButSt'>
                                    <i class='fa fa-arrow-left'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال السابق</span>
                                </button>
                            </div>
                            <div class='col-xs-6'>

                                <button type='button' id='nxtBut'
                                        class='button button-rounded tright button-reveal button-large button-yellow button-light nxt nxtButSt'>
                                    <i class='fa fa-arrow-right'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال التالي</span>
                                </button>
                            </div>
                        </div>
                            ";
                                echo "
                            <a class='showReason' target='$i'><button style='width: 100%;margin-top:10px;' type='button' class='btn btn-info btn-reason' id='showreas$i'>إظهار السبب</button></a>
";
                                echo "</div>";
                                echo "<div class='col-md-8'>";
                                if (file_exists('dashboardAlrawi/examImagesTrucks/free/' . $picture)) {
                                    echo "<img class='quesImg center-block img-responsive' src='dashboardAlrawi/examImagesTrucks/free/$picture'/>";
                                }
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='row reasonRow' id='reason$i'>";
                                echo "
                                <div class='remodal' data-remodal-id='modal$i'>
                                    <button data-remodal-action='close' class='remodal-close'></button>
                                    <h1>السبب</h1>
                                    <p style='direction: rtl'>
                                    $reason
                                    </p>
                                    <br>
                                    <button data-remodal-action='confirm' class='remodal-confirm'>حسناً</button>
                                </div>
                                ";
                                echo "</div>";
                                echo "</div>";
                                $i++;
                            } else if ($type == "yesNo") {
                                echo "<div id='s$i' class='slide col-md-12'>";
                                echo "<div class='row'>";
                                echo "<div class='col-md-4'>";
                                echo "<h4 style='direction:rtl;font-weight: 700;font-size: 20px;color: #1265A8;border-color: #1265A8;border: 2px solid #1265A8;background-color: transparent;color: #1265A8;line-height: 36px;font-weight: 700;text-shadow: none;' class='text-center '>الإمتحان $setId - السؤال $i</h4>";
                                echo "<h4 style='direction: rtl; font-weight: 700;line-height: 1.5em;' class='text-center'>$question</h4>";
                                echo "
                            <fieldset id='group$i'>
                            <label class='containerRadio'>نعم
                                  <input type='radio' class='selector$i' name='selector$i' value='نعم'>
                                  <span class='checkmark text-center'>A</span>
                                </label>
                                <label class='containerRadio'>لا
                                  <input type='radio' class='selector$i' name='selector$i' value='لا'>
                                  <span class='checkmark text-center'>B</span>
                                </label>
                            </fieldset>
                            <div class='row text-center' style='width: 100%; margin-top: 20px;'>
                            <div class='col-xs-6'>
                                <button type='button' id='prevBut'
                                        class='button button-rounded button-reveal tleft button-large button-teal prev prevButSt'>
                                    <i class='fa fa-arrow-left'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال السابق</span>
                                </button>
                            </div>
                            <div class='col-xs-6'>

                                <button type='button' id='nxtBut'
                                        class='button button-rounded tright button-reveal button-large button-yellow button-light nxt nxtButSt'>
                                    <i class='fa fa-arrow-right'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال التالي</span>
                                </button>
                            </div>
                        </div>";
                                echo "
                            <a class='showReason' target='$i'><button style='width: 100%;' type='button' class='btn btn-info btn-reason' id='showreas$i'>إظهار السبب</button></a>
";
                                echo "</div>";
                                echo "<div class='col-md-8'>";
                                if (file_exists('dashboardAlrawi/examImagesTrucks/free/' . $picture)) {
                                    echo "<img class='quesImg center-block img-responsive' src='dashboardAlrawi/examImagesTrucks/free/$picture'/>";
                                }
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='row reasonRow' id='reason$i'>";
                                echo "
                                <div class='remodal' data-remodal-id='modal$i'>
                                    <button data-remodal-action='close' class='remodal-close'></button>
                                    <h1>السبب</h1>
                                    <p style='direction: rtl'>
                                    $reason
                                    </p>
                                    <br>
                                    <button data-remodal-action='confirm' class='remodal-confirm'>حسناً</button>
                                </div>
                                ";
                                echo "</div>";
                                echo "</div>";
                                $i++;
                            } else if ($type == "numInp") {
                                echo "<div id='s$i' class='slide col-md-12'>";
                                echo "<div class='row'>";
                                echo "<div class='col-md-4'>";
                                echo "<h4 style='direction:rtl;font-weight: 700;font-size: 20px;color: #1265A8;border-color: #1265A8;border: 2px solid #1265A8;background-color: transparent;color: #1265A8;line-height: 36px;font-weight: 700;text-shadow: none;' class='text-center '>الإمتحان $setId - السؤال $i</h4>";
                                echo "<h4 style='direction: rtl; font-weight: 700;line-height: 1.5em;' class='text-center'>$question</h4>";
                                echo "
                        <fieldset id='group$i'>
                            <input type='text' class='selector$i' name='selector$i' placeholder='أدخل القيمة' autocomplete='off'><br>
                        </fieldset>
                        <div class='row text-center' style='width: 100%; margin-top: 20px;'>
                            <div class='col-xs-6'>
                                <button type='button' id='prevBut'
                                        class='button button-rounded button-reveal tleft button-large button-teal prev prevButSt'>
                                    <i class='fa fa-arrow-left'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال السابق</span>
                                </button>
                            </div>
                            <div class='col-xs-6'>

                                <button type='button' id='nxtBut'
                                        class='button button-rounded tright button-reveal button-large button-yellow button-light nxt nxtButSt'>
                                    <i class='fa fa-arrow-right'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال التالي</span>
                                </button>
                            </div>
                        </div>";
                                echo "
                    <a class='showReason' target='$i'><button style='width: 100%;' type='button' class='btn btn-info btn-reason' id='showreas$i'>إظهار السبب</button></a>
";
                                echo "</div>";
                                echo "<div class='col-md-8'>";
                                if (file_exists('dashboardAlrawi/examImagesTrucks/free/' . $picture)) {
                                    echo "<img class='quesImg center-block img-responsive' src='dashboardAlrawi/examImagesTrucks/free/$picture'/>";
                                }
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='row reasonRow' id='reason$i'>";
                                echo "
                                <div class='remodal' data-remodal-id='modal$i'>
                                    <button data-remodal-action='close' class='remodal-close'></button>
                                    <h1>السبب</h1>
                                    <p style='direction: rtl'>
                                    $reason
                                    </p>
                                    <br>
                                    <button data-remodal-action='confirm' class='remodal-confirm'>حسناً</button>
                                </div>
                                ";
                                echo "</div>";
                                echo "</div>";
                                $i++;
                            } else if ($type == "multiChoice2" || $type == "multiChoice3" || $type == "multiChoice4" || $type == "advantage3" || $type == "advantage4") {
                                echo "<div id='s$i' class='slide col-md-12'>";
                                echo "<div class='row'>";
                                echo "<div class='col-md-4'>";
                                echo "<h4 style='direction:rtl;font-weight: 700;font-size: 20px;color: #1265A8;border-color: #1265A8;border: 2px solid #1265A8;background-color: transparent;color: #1265A8;line-height: 36px;font-weight: 700;text-shadow: none;' class='text-center '>الإمتحان $setId - السؤال $i</h4>";
                                echo "<h4 style='direction: rtl; font-weight: 700;line-height: 1.5em;' class='text-center'>$question</h4>";
                                echo "
                        <fieldset id='group$i'>";
                                $answers = array($right, $second, $third, $fourth);
                                $k = 0;
                                $char = 'A';
                                while (true) {
                                        $num = rand(0, 3);
                                        if ($answers[$num] != "0") {
                                            $arrOrder[$i][$k] = $answers[$num];
                                            echo "

                                    <label class='containerRadio'>$answers[$num]
                                        <input type='radio' class='selector$i' name='selector$i' value='$answers[$num]'>
                                        <span class='checkmark text-center'>$char</span>
                                    </label>
                                    ";
                                            $answers[$num] = "0";
                                            $k++;
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
                                        if($k == 1){
                                            $char = 'B';
                                        }else if($k == 2){
                                            $char = 'C';
                                        }else if($k == 3){
                                            $char = 'D';
                                        }
                                    }
                                echo "</fieldset>
<div class='row text-center' style='width: 100%; margin-top: 20px;'>
                            <div class='col-xs-6'>
                                <button type='button' id='prevBut'
                                        class='button button-rounded button-reveal tleft button-large button-teal prev prevButSt'>
                                    <i class='fa fa-arrow-left'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال السابق</span>
                                </button>
                            </div>
                            <div class='col-xs-6'>

                                <button type='button' id='nxtBut'
                                        class='button button-rounded tright button-reveal button-large button-yellow button-light nxt nxtButSt'>
                                    <i class='fa fa-arrow-right'></i>
                                    <span style='font-family: DroidArabicKufiRegular;'>السؤال التالي</span>
                                </button>
                            </div>
                        </div>";
                                echo "
                    <a class='showReason' target='$i'><button style='width: 100%;' type='button' class='btn btn-info btn-reason' id='showreas$i'>إظهار السبب</button></a>
";
                                echo "</div>";
                                echo "<div class='col-md-8'>";
                                if (file_exists('dashboardAlrawi/examImagesTrucks/free/' . $picture)) {
                                    echo "<img class='quesImg center-block img-responsive' src='dashboardAlrawi/examImagesTrucks/free/$picture'/>";
                                }
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='row reasonRow' id='reason$i'>";
                                echo "
                                <div class='remodal' data-remodal-id='modal$i'>
                                    <button data-remodal-action='close' class='remodal-close'></button>
                                    <h1>السبب</h1>
                                    <p style='direction: rtl'>
                                    $reason
                                    </p>
                                    <br>
                                    <button data-remodal-action='confirm' class='remodal-confirm'>حسناً</button>
                                </div>
                                ";
                                echo "</div>";
                                echo "</div>";
                                $i++;
                            }

                            echo "</div>";
                        }

                        $_SESSION['answersOrder'] = $arrOrder;

                        ?>

                    </div>
                    <button name="submit" style="bottom: 40px;width:80%;font-family: 'DroidArabicKufiRegular';"
                            id="submitBut" class="btn-lg btn btn-success center center-block" value="Submit"
                            type="submit">إستعراض النتيجة
                    </button>

                    <div class="container" style="width: 100%">
                        <!--                        <div class="row" style="width: 100%">-->
                        <!--                            <div class="col-md-12">-->
                        <!---->
                        <!--                                <button type="button" id="nxtBut"-->
                        <!--                                        class="tright button button-rounded button-reveal button-large button-yellow button-light nxt nxtButSt">-->
                        <!--                                    <i class="fa fa-arrow-right"></i>-->
                        <!--                                    <span style="font-family: 'DroidArabicKufiRegular';">السؤال التالي</span>-->
                        <!--                                </button>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-md-12">-->
                        <!--                                <button type="button" id="prevBut"-->
                        <!--                                        class="button button-rounded button-reveal button-large button-teal prev prevButSt">-->
                        <!--                                    <i class="fa fa-arrow-left"></i>-->
                        <!--                                    <span style="font-family: 'DroidArabicKufiRegular';">السؤال السابق</span>-->
                        <!--                                </button>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--        <button class="nxt">Next</button>-->
    <!--        <button class="prev">Back</button>-->
    <!--        <button class="print">Print</button>-->
</section>
<footer class="hidden-sm hidden-xs">
    <p>© 2017 Alrawi Theorie | Developed by <a target="_blank" style="color:#000; text-decoration:none;"
                                               href="http://www.el-semicolon.nl">El-SemiColon;</a></p>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="js/remodal.js"></script>
<script>
    jQuery('.showReason').click(function () {
        var whereR = $(this).attr('target');
        jQuery('#reason' + whereR).fadeIn('slow');


        var inst = $('[data-remodal-id=modal' +whereR+ ']').remodal({
            closeOnOutsideClick:true
        });
        inst.open();
        $(document).on('confirmation', '.remodal', function () {
            console.log('Confirmation button is clicked');
        });
    });
</script>
<script type="text/javascript">

    jQuery(function () {
        document.title = "بداية الإمتحان";
        jQuery('.slide').hide();
        jQuery('.nxtButSt').hide();
        jQuery('.prevButSt').hide();
        jQuery('.navBut').hide();
        jQuery('.flagBut').hide();
        jQuery('.slideBetween').hide();
        jQuery('.slideFinish').hide();
        jQuery('.forceFinish').hide();
        jQuery('.reasonRow').hide();
        jQuery('.showReason').hide();
        jQuery('.slideStart').show();
        jQuery('#submitBut').hide();
        jQuery('#pause').hide();
        jQuery('#resume').hide();
        //jQuery('#showTime').hide();
        jQuery('#stopBut').hide();
        jQuery('.stopSlide').hide();
        // document.getElementById('heightAdj').style.height= '0px';
        $('.QuestionsSlideShow').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnHover: false,
            pauseOnFocus: false,
            centerMode: true,
            swipe: false,
            nextArrow: false,
            prevArrow: false,
            fade: true,
            autoplaySpeed: 250000
        });
    });
    var responsePause = 0;
    var finished = 0;
    var continued = 0;
    var continuedBar = 0;
    var flagQuestion;
    var i;
    var j;



    var $slickElement = $('.QuestionsSlideShow');
    $slickElement.on('init reInit beforeChange', function (event, slick, currentSlide, nextSlide) {
        i = (currentSlide ? currentSlide : 0) + 1;
        if (i == 25) {
            $('.QuestionsSlideShow').slick('slickPause');
            jQuery('.slide').hide();
            jQuery('.nxtButSt').hide();
            jQuery('.prevButSt').hide();
            jQuery('.slideBetween').show();
        }
        if (j == 50) {
            finished = 1;
            $('.QuestionsSlideShow').slick('slickPause');
            jQuery('.slide').hide();
            jQuery('.nxtButSt').hide();
            jQuery('.prevButSt').hide();
            jQuery('.slideFinish').show();
            jQuery('#submitBut').show();
        }
    });

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        j = (currentSlide ? currentSlide : 0) + 1;
        if (j > 26 && finished == 0) {
            jQuery('.prevButSt').show();
        } else if(j<26 && j>1) {
            jQuery('.prevButSt').show();
        }else{
            jQuery('.prevButSt').hide();
        }
        if (continued == 1) {
            continued = 0;
            jQuery('.selector26').change(function () {
                jQuery('#but26').attr('class', 'btn btn-success');
            });
        }
        flagQuestion = function () {

            if (jQuery('#but' + j).hasClass('btn-info')) {
                    jQuery('#but' + j).removeClass('btn-info').addClass('btn-danger');
                } else {
                    jQuery('#but' + j).removeClass('btn-success').addClass('btn-danger');
                }

        };
        jQuery('.selector' + j).change(function () {
            jQuery('#but' + j).attr('class', 'btn btn-success');
        });
    });


    jQuery('.showSingle').click(function () {
        // jQuery('.slide').hide();
        jQuery('.slideFinish').hide();
        //jQuery('#submitBut').hide();
        jQuery('.slide').show();
        var where = $(this).attr('target') - 1;
        $('.QuestionsSlideShow').slick('slickGoTo', where);
        $('.QuestionsSlideShow').slick('slickPause');
        jQuery('.selector' + $(this).attr('target')).change(function () {
            jQuery('#but' + $(this).attr('target')).attr('class', 'btn btn-success');
        });
    });

    jQuery('.showReason').click(function () {
        var whereR = $(this).attr('target');
        jQuery('#reason' + whereR).fadeIn('slow');
    });


    var $slick;

    $slick = $('.QuestionsSlideShow');




    var startExam = function () {
        jQuery('.slide').show();
        jQuery('.nxtButSt').show();
        jQuery('.navBut').show();
        jQuery('#stopBut').show();
        jQuery('.slideStart').hide();
        jQuery('.flagBut').show();
        jQuery('#showTime').removeClass('col-sm-10').addClass('col-sm-12').show();
        // $('.QuestionsSlideShow').slick('slickPause');
        $('.QuestionsSlideShow').slick('slickPause');


        //document.title = "الإمتحان <?php //echo $setId ?>//" + " | " + "السؤال " + tar;

        var CountDown = (function ($) {
            // Length ms
            var TimeOut = 10000;
            // Interval ms
            var TimeGap = 1000;

            var CurrentTime = (new Date()).getTime();
            var EndTime = (new Date()).getTime() + TimeOut;

            var GuiTimer = $('#count');
            var GuiPause = $('#pause').show();
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
                //$('#controlTimer').html(EndTime - CurrentTime);
                var Hours = Time.getHours();
                Hours--;
                var Minutes = Time.getMinutes();
                var Seconds = Time.getSeconds();
                //alert(EndTime + ' - ' + CurrentTime + ' - ' + (EndTime - CurrentTime));
                //alert(Hours + ' - ' + Minutes + ' - ' + Seconds);

                if (Minutes == 0 && Seconds == 0 && Hours == 0) {
                    jQuery('.slide').hide();
                    jQuery('.flagBut').hide();
                    jQuery('.nxtButSt').hide();
                    jQuery('.prevButSt').hide();
                    jQuery('.navBut').hide();
                    jQuery('.slideBetween').hide();
                    jQuery('.slideFinish').hide();
                    $(".slideBetween ").hide();
                    jQuery('.forceFinish').show();
                    jQuery('#submitBut').show();
                } else {
                    GuiTimer.html(
                        (Hours < 10 ? '0' : '') + Hours
                        + ':'
                        + (Minutes < 10 ? '0' : '') + Minutes
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

        jQuery('#pause').on('click', function () {
            CountDown.Pause();
            $('.QuestionsSlideShow').slick('slickPause');
            jQuery('.showReason').fadeIn('slow');
            responsePause = 1;
        });
        jQuery('#resume').on('click', function () {
            CountDown.Resume();
            $('.QuestionsSlideShow').slick('slickPause');
            jQuery('.showReason').fadeOut('slow');
            jQuery('.reasonRow').fadeOut('slow');
            responsePause = 0;
        });

        // ms
        CountDown.Start(4501000);

    };

    var continueExam = function () {
        continued = 1;
        continuedBar = 1;
        if(responsePause == 1){
            $('.QuestionsSlideShow').slick('slickPause');
            jQuery('#resume').show();
        }else{
            $('.QuestionsSlideShow').slick('slickPause');
            jQuery('#pause').show();
        }
        $(".slideBetween ").hide();
        jQuery('.flagBut').show();
        jQuery('.nxtButSt').show();
        jQuery('.prevButSt').show();
        $('.QuestionsSlideShow').slick('slickPause');

        $('.QuestionsSlideShow').slick('unslick');

        $('.QuestionsSlideShow').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnHover: false,
            pauseOnFocus: false,
            swipe: false,
            fade: true,
            initialSlide: 25,
            nextArrow: false,
            prevArrow: false,
            autoplaySpeed: 250000
        });
        $('.QuestionsSlideShow').slick('slickPause');

        jQuery('.slide').show();
        if(responsePause == 1){
            $('.QuestionsSlideShow').slick('slickPause');
        }else{
            $('.QuestionsSlideShow').slick('slickPause');
        }

    };
    // $('.QuestionsSlideShow').slick({
    //     infinite: false,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 2000,
    //     pauseOnHover: false,
    //     pauseOnFocus: false,
    //     swipe:false,
    // });


    $('.nxt').click(function () {
        //alert($('.QuestionsSlideShow').slick('slickCurrentSlide'));
        var currentSlide = $('.QuestionsSlideShow').slick('slickCurrentSlide');
        if(currentSlide == 49){
            jQuery('.slide').hide();
            jQuery('.flagBut').show();
            jQuery('.nxtButSt').hide();
            jQuery('.prevButSt').hide();
            jQuery('.navBut').show();
            jQuery('.slideFinish').show();
            jQuery('#submitBut').show();
        }
        $('.QuestionsSlideShow').slick('slickNext');

    });
    $('.prev').click(function () {
        $('.QuestionsSlideShow').slick('slickPrev');
    });

    function setCookie(c_name, value, expirehours) {

        var exdate = new Date();
        exdate.setHours(exdate.getHours() + expirehours);
        document.cookie = c_name + "=" + value + ";path=/" + ((expirehours ==null) ? "" : ";expires=" + exdate.toGMTString());
    }
    var stopExam = function () {
        if (confirm('هل أنت متأكد من إيقاف الإمتحان؟')) {
            clearTimeout(startExam);
            $('.QuestionsSlideShow').slick('slickPause');
            setCookie('question', $('.QuestionsSlideShow').slick('slickCurrentSlide'), 1);
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
            jQuery('.nxtButSt').hide();
            jQuery('.prevButSt').hide();
            jQuery('#stopBut').hide();
            jQuery('#pause').hide();
            jQuery('#resume').hide();
            jQuery('#showTime').hide();
        }
    };
</script>
<script>
    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function () {
// Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

    $(window).load(function () {
// Animate loader off screen
        $(".pre-pre").fadeOut("slow");
    });

</script>
<script>
    $(document).ready(function () {
        //Disable cut copy paste
        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        //Disable mouse right click
        $("body").on("contextmenu",function(e){
            return false;
        });
    });
</script>
</body>
</html>