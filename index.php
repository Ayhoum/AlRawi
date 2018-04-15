<?php
session_start();
ob_start();
include 'scripts/db_connection.php';
if(isset($_SESSION['answers'])){
    $_SESSION['answers'] = null;
}
if(isset($_SESSION['answersOrder'])){
    $_SESSION['answersOrder'] = null;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Montserrat:400,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/swiper.css" type="text/css" />

	<!-- Medical Demo Specific Stylesheet -->
	<link rel="stylesheet" href="demos/medical/medical.css" type="text/css" />
	<!-- / -->
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="demos/medical/css/medical-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="css/remodal.css">
    <link rel="stylesheet" href="css/remodal-default-theme.css">

	<link rel="stylesheet" href="demos/medical/fonts.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="css/colors.php?color=DE6262" type="text/css" />


    <!--  Pricing Tables Style  -->
    <link rel="stylesheet" href="css/components/pricing-table.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />



    <!-- Document Title
    ============================================= -->
	<title>Al Rawi Theorie | Home</title>
    <link rel="icon" href="images/1.png" type="image/x-icon">

	<style>
		.form-control.error { border: 2px solid red; }


		.no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
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
	</style>




</head>

<!--<body class="stretched" data-loader-html="<div id='css3-spinner-svg-pulse-wrapper'><svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='http://www.w3.org/2000/svg' viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'><path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round' d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' /></svg></div>">-->
<body style="background: #fde7e7">
<div class="remodal-bg">
<div class="se-pre-con"><div class="pre-pre"></div></div>


	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar">

			<div class="container clearfix">

				<div class="col_half hidden-xs nobottommargin">

					<!-- Top Links
					============================================= -->
					<div class="top-links">
						<ul>
							<!--<li><a href="#"><i class="icon-time"></i> Timings</a></li>-->
							<li><a href="#">WhatsApp: +31-687460636</a></li>
							<li><a href="#" class="nott"><i class="icon-envelope2"></i> info@alrawitheorie.nl</a></li>
						</ul>
					</div><!-- .top-links end -->

				</div>

				<div class="col_half col_last fleft nobottommargin">

					<!-- Top Links
					============================================= -->
					<div class="top-links">
						<ul>
<!--							<li><a href="#">EN</a>-->
<!--								<ul>-->
<!--									<li><a href="#"><img src="images/icons/flags/french.png" alt="French"> FR</a></li>-->
<!--    								<li><a href="#"><img src="images/icons/flags/italian.png" alt="Italian"> IT</a></li>-->
<!--									<li><a href="#"><img src="images/icons/flags/german.png" alt="German"> DE</a></li>-->
<!--								</ul>-->
<!--							</li>-->
                            <?php if(!isset($_SESSION['role'])) { ?>
							<li><a href="#" class="button-red" style="color:#fff;">حسابي</a>
								<ul>
								<li><a href="login.php" dir="rtl">تسجيل الدخول <i class="icon-line2-login"></i></a></li>
									<li><a href="signup.php" dir="rtl">حساب جديد! <i class="icon-line2-pencil"></i></a></li>
								</ul>
							</li>
                            <?php } else { ?>
                                <li><a href="#" class="button-red" style="color:#fff;"><?php echo $_SESSION['username']; ?></a>
                                    <ul>
                                        <?php if($_SESSION['role'] == "MainAdmin"){?>
                                        <li><a href="dashboardAlrawi/index.php" dir="rtl">لوحة التحكم <i class="icon-wrench"></i></a></li>
                                        <?php } else { ?>
                                        <li><a href="profile.php" dir="rtl">الملف الشخصي <i class="icon-user"></i></a></li>
                                        <?php } ?>
                                        <li><a href="logout.php" dir="rtl">تسجيل الخروج <i class="icon-line2-logout"></i></a></li>
                                    </ul>
                                </li>
                            <?php } ?>

<!--<!--                            <li><a href="" data-scrollto="#booking-appointment-form" data-offset="100" data-easing="easeInOutExpo" data-speed="1200" class="bgcolor" style="color:#fff;">احجز امتحانك</a></li>-->
						</ul>
					</div>
					<!-- .top-links end -->

				</div>

			</div>

		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.php" class="standard-logo"><img src="images/1.png" alt="Canvas Logo"></a>
						<a href="index.php" class="retina-logo"><img src="images/2.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="style-3">

						<ul>
							<li class="current"><a href="index.php"><div>الصفحة الرئيسية</div></a></li>
                            <li><a href="#pricing"><div>أسعارنا</div></a></li>
                            <li><a href="#services"><div>خدماتنا</div></a></li>
                            <li><a target="_blank" href="blog.php"><div>المدونة</div></a></li>
                            <li><a target="_blank" href="https://www.theorie-leren.nl/shop/school/al-rawi-theorie.html"><div>فحوص الإنجليزي والهولندي</div></a></li>
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-parallax full-screen force-full-screen">

			<div class="slider-parallax-inner">

				<div class="full-screen force-full-screen nopadding nomargin noborder ohidden" style="background: #ffffff; background-size: cover; background-position: center center;">

					<div class="container center">
						<div class="vertical-middle">
							<div class="emphasis-title">
								<h1>
									<span class="text-rotater nocolor" data-separator="|" data-rotate="fadeIn" data-speed="6000">
										<span class="t-rotate t700 font-body opm-large-word">
                                            Al Rawi Theorie|
                                            طريقك إلى النجاح|أفضل الخدمات التعليمية
                                            |من البداية حتى التفوق</span>
									</span>
								</h1>
							</div>
							<!--<a href="#" class="button button-border button-light button-circle" data-scrollto="#section-services" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">View our domains</a>-->
						</div>
					</div>

					<div class="video-wrap">
						<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
					</div>

					<a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

				</div>
			</div>
		</section><!-- #slider end -->


        <div class="remodal" data-remodal-id="modal">
            <button data-remodal-action="close" class="remodal-close"></button>
            <h1>يرجى القراءة</h1>
            <p style="direction: rtl">
                عزيزي الزائر هذا الموقع يدفع رواتب شهرية لموظفيه وباستخدامك الغير قانوني للموقع سوف تتسبب لنا بأضرار مادية فإذا أردت لنا الإستمرار فساعدنا على عدم نشر محتوى هذا الموقع وتصوير محتوياته
                <br><br>ملاحظة: إدارة الموقع على استعداد تام لتقديم الباقات مجاناً للأشخاص الذين ليس لديهم قدرة شرائية. فقط راسلنا وسنقوم بكل سرور بمساعدتك
                <br><br>ملاحظة: إدارة الموقع لها كافة الصلاحيات بملاحقة النشر والتوزيع الغير قانوني وذلك من خلال وضع حماية على المحتويات والصور الموجودة في الموقع
                <br><br>
            </p>
            <br>
            <button data-remodal-action="cancel" class="remodal-cancel">إلغاء</button>
            <button data-remodal-action="confirm" class="remodal-confirm">حسناً</button>
        </div>



		<!-- Content
		============================================= -->
        <section id="content">


            <?php if(!isset($_SESSION['role'])) { ?>
            <div class="fancy-title title-dotted-border title-center topmargin-sm">
                <h2 class="pricing-section--title center" style="color: #0f0e0f"></h2>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <a href="login.php" class="button button-desc button-3d button-rounded button-green center">تسجيل الدخول<span></span></a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="signup.php" class="button button-desc button-3d button-rounded button-red center">حساب جديد<span></span></a>
                </div>
            </div>
            <?php }?>


            <div class="content-wrap" style="padding-top: 0 ; padding-bottom: 0;">


                <div id = "pricing" class="container">

<?php
if(isset($_SESSION['email'])){
$email = $_SESSION['email'];
$query = "SELECT * FROM Users WHERE EMAIL = '{$email}'";
$select_users = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_users)) {
    $userID = $row['ID'];
}
$link1 = "payment_1.php?user_id=$userID";
$link2 = "payment_2.php?user_id=$userID";
$link4 = "payment_4.php?user_id=$userID";
}else{
$link = "profile.php";
}
?>


                <div class="fancy-title title-dotted-border title-center topmargin-sm">
                    <h2 class="pricing-section--title center" style="color: #0f0e0f">أسعــارنـا</h2>
                </div>

                    <div class="center-block text-center bottommargin" style="font-size: 16px;color: red; font-weight: 700">
                        <span>كافة الباقات تحتوي الإمتحانات ذاتها أما الإختلاف فهو بمدة الإشتراك</span>
                    </div>

                    <div class="pricing bottommargin clearfix">

                        <div class="col-md-3">

                            <div class="pricing-box">
                                <div class="pricing-title">
                                    <h3 class="text-center">البــاقة  الابتدائيــة</h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">€</span>10<span style="font-size: 14px;">.35</span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li> صلاحية الدخول لجميع<strong> الامتحانات العربيـة</strong></li>
                                        <li>صالحة لمدة<strong> 20 يوماً </strong></li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="<?php if(isset($_SESSION['email'])) {echo $link1;}else{echo $link;}?>" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="pricing-box best-price">
                                <div class="pricing-title ">
                                    <h3 class="text-center">البـاقة الأسـاسيــة</h3>
                                    <span> الأكثــر مبيــعاً</span>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">€</span>15<span style="font-size: 14px;">.35</span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li> صلاحية الدخول لجميع<strong> الامتحانات العربيـة</strong></li>
                                        <li>صالحة لمدة<strong> 35 يوماً </strong></li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="<?php if(isset($_SESSION['email'])) {echo $link2;}else{echo $link;}?>" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="pricing-box">
                                <div class="pricing-title">
                                    <h3 class="text-center">البــاقة المتقدمــة</h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">€</span>25<span style="font-size: 14px;">.35</span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li> صلاحية الدخول لجميع<strong> الامتحانات العربيـة</strong></li>
                                        <li>صالحة لمدة<strong> 60 يوماً </strong></li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="<?php if(isset($_SESSION['email'])) {echo $link4;}else{echo $link;}?>" class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="pricing-box">
                                <div class="pricing-title">
                                    <h3 class="text-center">الباقـة الانكليزية والهولندية</h3>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-unit">بحسـب الباقـة</span>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <li> صلاحية الدخول لجميع الامتحانات<strong> الانكليـزية</strong></li>
                                        <li> صلاحية الدخول لجميع الامتحانات<strong> الهولنديـة</strong></li>
                                    </ul>
                                </div>
                                <div class="pricing-action">
                                    <a href="https://www.theorie-leren.nl/shop/school/al-rawi-theorie.html" target="_blank  " class="btn btn-danger btn-block btn-lg">اخـتر البـاقة</a>
                                </div>
                            </div>

                        </div>



                    </div>

                    <div class="fancy-title title-dotted-border title-center topmargin-sm">
                        <h2 class="pricing-section--title center" style="color: #0f0e0f">الإمـتـحانـات الـتـجـريـبـيـة</h2>
                    </div>
                    <div class="col-md-6">

                        <div class="text-center center-block">
                            <a href="free_exam_interface_trucks.php?exam_id=3" class="button button-desc button-amber button-border button-rounded"><div>إمتحان قيادة الشاحنات</div><span style="direction: rtl;text-align: center;">مجاني!</span></a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="text-center center-block">
                            <a href="free_exam_interface.php?exam_id=1" class="button button-desc button-purple button-border button-rounded"><div>إمتحان قيادة السيارات</div><span style="direction: rtl;text-align: center">مجاني!</span></a></div>
                    </div>


                </div>
            </div>
        </section>





        <div class="divider" id="services"><i class="icon-circle"></i></div>

<!--                                <div class="section nopadding common-height dark topmargin-sm" style="margin-bottom:0;">-->
<!--					<div class="col-md-5" data-height-lg="597" data-height-md="614" data-height-sm="400" data-height-xs="300" data-height-xxs="200" style="background: url('demos/medical/images/section-bg.jpg'); background-size: cover;">-->
<!--						<div>&nbsp;</div>-->
<!--					</div>-->
<!--					<div class="col-md-7 nopadding">-->
<!--						<div class="bgcolor col-padding" id="booking-appointment-form">-->
<!--							<h3>قم بحجز إمتحانك النظري مع مترجم هنا</h3>-->
<!--							<h5>لرخصة القيادة فئة (ب) في هولندا</h5>-->
<!--							<div id="medical-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>-->
<!--							<form class="nobottommargin" id="template-medical-form" name="template-medical-form" action="scripts/reserveExam.php" method="post">-->
<!--								<div class="col_half">-->
<!--									<label for="first-name">الاسم الأول:</label>-->
<!--									<input type="text" id="first-name" name="first-name" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_half col_last">-->
<!--									<label for="last-name">الاسم الأخير (الكنية):</label>-->
<!--									<input type="text" id="last-name" name="last-name" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_half">-->
<!--									<label for="bsn">رقم الخدمة الوطني (BSN):</label>-->
<!--									<input type="text" id="bsn" name="bsn" class="form-control not-dark required pull-right" value="" maxlength="9" minlength="9">-->
<!--								</div>-->
<!--								<div class="col_half col_last">-->
<!--									<label for="dob">تاريخ الميلاد:</label>-->
<!--									<input type="text" id="dob" name="dob" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_two_third">-->
<!--									<label for="str-name">اسم الشارع:</label>-->
<!--									<input type="text" id="str-name" name="str-name" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_one_third col_last">-->
<!--									<label for="house-num">رقم المنزل:</label>-->
<!--									<input type="text" id="house-num" name="house-num" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_one_third">-->
<!--									<label for="postcode">الرمز البريدي (Postcode):</label>-->
<!--									<input type="text" id="postcode" name="postcode" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_two_third col_last">-->
<!--									<label for="city-name">اسم المدينة:</label>-->
<!--									<input type="text" id="city-name" name="city-name" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="clear"></div>-->
<!--								<div class="col_two_third">-->
<!--									<label for="email">البريد الالكتروني:</label>-->
<!--									<input type="email" id="email" name="email" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_one_third col_last">-->
<!--									<label for="phone">رقم الهاتف:</label>-->
<!--									<input type="text" id="phone" name="phone" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_half">-->
<!--									<label for="place">مكان التقديم الذي ترغب به:</label>-->
<!--									<input type="text" id="place" name="place" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--								<div class="col_half col_last">-->
<!--									<label for="dateAndTime">تاريخ ووقت التقديم الذي ترغب به:</label>-->
<!--									<input type="text" id="dateAndTime" name="dateAndTime" class="form-control not-dark required pull-right" value="">-->
<!--								</div>-->
<!--                                <div class="col_full col_last">-->
<!--                                    <label for="dialect">اللهجة التي تتكلم بها*:</label>-->
<!--                                    <input type="text" style="direction: rtl;" id="dialect" name="dialect" class="form-control not-dark required pull-right" value="">-->
<!--                                </div>-->
<!--                                <div class="clear"></div>-->
<!--                                <div class="clear"></div>-->
<!--                                <div class="col_full col_last topmargin-sm">-->
<!--                                    <label for="note">ملاحظات إضافية:</label>-->
<!--                                    <textarea style="direction: rtl;" id="note" name="note" class="form-control not-dark pull-right" rows="4" cols="100"></textarea>-->
<!--                                </div>-->
<!--								<div class="clear"></div>-->
<!--								<div class="col_full topmargin-sm nobottommargin">-->
<!--									<button class="button button-rounded button-white button-light nomargin pull-right" type="submit" value="submit">تأكيد الحجز</button>-->
<!--								</div>-->
<!--                                <div class="col_full">-->
<!--                                    <label for="dialect" class="topmargin-sm">*سنقوم بالمحاولة لإيجاد مترجم يتناسب مع اللهجة الخاصة بك</label>-->
<!--                                </div>-->
<!--								<div class="clear"></div>-->
<!--							</form>-->
<!---->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->


                <div class="container clearfix nobottommargin topmargin-sm">

                    <div class="col_one_third" style="margin-bottom: 0;">
                        <div class="feature-box fbox-plain">
                            <div class="row">
                                <div class="col_full" style="margin-bottom: 10px;">
                                    <div class="fbox-icon center-block" data-animate="bounceIn" data-delay="0" style="position: inherit">
                                        <i class="icon-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col_full text-center" style="margin-bottom: 10px;">
                                <h3 class="text-center">الإجابات الصحيحة</h3>
                                <p>جميع المعلومات الواردة في الموقع مضمونة الصحة، وذلك أيضاً بما يتوافق مع القوانين.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third" style="margin-bottom: 0;">
                        <div class="feature-box fbox-plain">
                            <div class="row">
                                <div class="col_full" style="margin-bottom: 10px;">
                                    <div class="fbox-icon center-block" data-animate="bounceIn" data-delay="200" style="position: inherit">
                                        <i class="icon-line2-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col_full text-center" style="margin-bottom: 10px;">
                                <h3 class="text-center">إمتحانات تجريبية</h3>
                                <p>نقدم لكم عدداً من الإمتحانات وذلك ضمن توزيع مناسب ليتمكن الجميع من الإستفادة من هذه الإمتحانات</p>
                            </div>
                        </div>
                    </div>

                    <div class="col_one_third col_last" style="margin-bottom: 0;">
                        <div class="feature-box fbox-plain">
                            <div class="row">
                                <div class="col_full" style="margin-bottom: 10px;">
                                    <div class="fbox-icon center-block" data-animate="bounceIn" data-delay="400" style="position: inherit">
                                        <i class="icon-credit-cards"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col_full text-center" style="margin-bottom: 10px;">
                                <h3 class="text-center">سهولة وأمان</h3>
                                <p>يمكنك التعامل مع الموقع بكل سهولة وكذلك شراء الإمتحانات بكل أمان وذلك فقط من خلال التسجيل في موقعنا!</p>
                            </div>
                        </div>
                    </div>

                    <div class="clear"></div>

                </div>
                <div class="divider"><i class="icon-circle"></i></div>

                <!--<div class="container clearfix">-->

					<!--<div class="col_three_fifth">-->
						<!--<div class="accordion accordion-lg clearfix">-->

							<!--<div class="acctitle"><i class="acc-closed icon-medical-i-kidney color"></i><i class="acc-open icon-medical-kidney color"></i>Kidney Transplant</div>-->
							<!--<div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>-->

							<!--<div class="acctitle"><i class="acc-closed icon-medical-i-respiratory color"></i><i class="acc-open icon-medical-respiratory color"></i>Pulmonary Treament</div>-->
							<!--<div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</div>-->

							<!--<div class="acctitle"><i class="acc-closed icon-medical-i-ophthalmology color"></i><i class="acc-open icon-medical-ophthalmology color"></i>Eye Care &amp; Lasik Surgery</div>-->
							<!--<div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>-->

							<!--<div class="acctitle"><i class="acc-closed icon-medical-i-ear-nose-throat color"></i><i class="acc-open icon-medical-ear-nose-throat color"></i>Ear, Nose &amp; Throat</div>-->
							<!--<div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>-->

							<!--<div class="acctitle"><i class="acc-closed icon-medical-i-cardiology color"></i><i class="acc-open icon-medical-cardiology color"></i>Cardiology Department</div>-->
							<!--<div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>-->

						<!--</div>-->
					<!--</div>-->

					<!--<div class="col_two_fifth col_last">-->
						<!--<h4>Patient Testimonials<span>.</span></h4>-->
						<!--<ul class="testimonials-grid grid-1 clearfix">-->
							<!--<li class="noleftpadding notoppadding">-->
								<!--<div class="testimonial">-->
									<!--<div class="testi-image">-->
										<!--<a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>-->
									<!--</div>-->
									<!--<div class="testi-content">-->
										<!--<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum repellendus!</p>-->
										<!--<div class="testi-meta">-->
											<!--John Doe-->
											<!--<span>XYZ Inc.</span>-->
										<!--</div>-->
									<!--</div>-->
								<!--</div>-->
							<!--</li>-->
							<!--<li class="noleftpadding nobottompadding">-->
								<!--<div class="testimonial">-->
									<!--<div class="testi-image">-->
										<!--<a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>-->
									<!--</div>-->
									<!--<div class="testi-content">-->
										<!--<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>-->
										<!--<div class="testi-meta">-->
											<!--Collis Ta'eed-->
											<!--<span>Envato Inc.</span>-->
										<!--</div>-->
									<!--</div>-->
								<!--</div>-->
							<!--</li>-->
						<!--</ul>-->
						<!--<div class="clear"></div>-->
						<!--<a href="#" class="button button-mini button-rounded norightmargin fright">More Patient Feedbacks...</a>-->
						<!--<div class="clear"></div>-->
					<!--</div>-->

				<!--</div>-->

				<!--<div class="container clearfix">-->
					<!--<div class="heading-block center nobottomborder">-->
						<!--<h3>Meet our Team of Specialists<span>.</span></h3>-->
						<!--<span>We make sure that your Life are in Good Hands.</span>-->
					<!--</div>-->

					<!--<div id="oc-team" class="owl-carousel team-carousel carousel-widget" data-margin="30" data-nav="true" data-pagi="true" data-items-xxs="1" data-items-xs="2" data-items-md="3" data-items-lg="4">-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/1.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. John Doe</h4><span>Cardiologist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/2.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Bryan Mcguire</h4><span>Orthopedist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/3.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Mary Jane</h4><span>Neurologist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/4.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Silvia Bush</h4><span>Dentist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/6.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Hugh Baldwin</h4><span>Cardiologist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/7.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Erika Todd</h4><span>Neurologist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/8.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Randy Adams</h4><span>Dentist</span></div>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="team">-->
							<!--<div class="team-image">-->
								<!--<img src="demos/medical/images/doctors/9.jpg" alt="Dr. John Doe">-->
							<!--</div>-->
							<!--<div class="team-desc">-->
								<!--<div class="team-title"><h4>Dr. Alan Freeman</h4><span>Eye Specialist</span></div>-->
							<!--</div>-->
						<!--</div>-->

					<!--</div>-->

				<!--</div>-->


		</section><!-- #content end -->





        <!-- Footer
        ============================================= -->
		<footer id="footer" style="background-color: #F5F5F5;border-top: 2px solid rgba(0,0,0,0.06);">

			<div class="container" style="border-bottom: 1px solid rgba(0,0,0,0.06);">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_full">

						<div class="widget clearfix">



							<div class="row">
<!--								<div class="clear-bottommargin-sm clearfix">-->
<!---->
<!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
<!--										<ul>-->
<!--											<li><a href="#">Home</a></li>-->
<!--											<li><a href="#">About</a></li>-->
<!--											<li><a href="#">FAQs</a></li>-->
<!--											<li><a href="#">Support</a></li>-->
<!--											<li><a href="#">Contact</a></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
<!--										<ul>-->
<!--											<li><a href="#">Shop</a></li>-->
<!--											<li><a href="#">Portfolio</a></li>-->
<!--											<li><a href="#">Blog</a></li>-->
<!--											<li><a href="#">Events</a></li>-->
<!--											<li><a href="#">Forums</a></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
<!--										<ul>-->
<!--											<li><a href="#">Corporate</a></li>-->
<!--											<li><a href="#">Agency</a></li>-->
<!--											<li><a href="#">eCommerce</a></li>-->
<!--											<li><a href="#">Personal</a></li>-->
<!--											<li><a href="#">One Page</a></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--									<div class="col-md-3 col-xs-6 bottommargin-sm widget_links">-->
<!--										<ul>-->
<!--											<li><a href="#">Restaurant</a></li>-->
<!--											<li><a href="#">Wedding</a></li>-->
<!--											<li><a href="#">App Showcase</a></li>-->
<!--											<li><a href="#">Magazine</a></li>-->
<!--											<li><a href="#">Landing Page</a></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--								</div>-->
							</div>

						</div>

					</div>

					<div class="col_full col_last">

						<div class="widget clear-bottommargin-sm clearfix">

							<div class="row">

								<div class="col-md-6 bottommargin-sm text-center">
									<div class="footer-big-contacts">
										<span>WhatsApp:</span>
										+31-687460636
                                        <span>سنسعى للرد خلال 24 ساعة</span>
									</div>
								</div>

								<div class="col-md-6 bottommargin-sm text-center">
									<div class="footer-big-contacts">
										<span>Send an Email:</span>
										info@alrawitheorie.nl
									</div>
								</div>

							</div>

						</div>


                        <div class="widget subscribe-widget clearfix">
                            <div class="row">

                                <div class="col-md-4 clearfix bottommargin-sm">
                                    <a target="_blank" href="https://ar-ar.facebook.com/Alrawi1rijbewijs/" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a target="_blank" href="https://ar-ar.facebook.com/Alrawi1rijbewijs/"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                                </div>

                                <div class="col-md-4 clearfix bottommargin-sm">
                                    <a target="_blank" href="https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw" class="social-icon si-dark si-colored si-youtube nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-youtube"></i>
                                        <i class="icon-youtube"></i>
                                    </a>
                                    <a target="_blank" href="https://www.youtube.com/channel/UCCofuIotSiIzzARX3nz4KSw"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>on YouTube</small></a>
                                </div>
                                <div class="col-md-4 clearfix bottommargin-sm">
                                    <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=bS2dmJ42SXiBo81RyJN9genp1MWdffCftw7i4uOYRX2mh7vBMQkfmrRq2jue"></script></span>
                                </div>
                            </div>
                        </div>

                    </div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

<!--			</div>-->

            <!-- Copyrights
                ============================================= -->
            <div id="copyrights" class="nobg">

                <div class="container clearfix">

                    <div class="text-center">
                        Copyrights &copy; 2018 All Rights Reserved by Al Rawi Theorie.<br>
                        <div class="copyright-links"><a href="terms_and_conditions.php">شروط الإستخدام</a> / <a href="terms_and_conditions.php">سياسات الخصوصية</a></div>
                    </div>

                    <div class="text-center topmargin-sm">
                        Developed & Designed by <a target="_blank" href="http://www.el-semicolon.nl"> El-SemiColon; <img src="images/logoES.png" style="width: 64px;height: 64px;"/></a>
                    </div>

                </div>

            </div><!-- #copyrights end -->



        </footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>




	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
    <script src="js/remodal.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

	<script type="text/javascript">

		$("#template-medical-form").validate({
			submitHandler: function(form) {
				var formButton = $(form).find('button'),
					formButtonText = formButton.html();

				formButton.prop('disabled', true).html('<i class="icon-line-loader icon-spin norightmargin"></i>');
				$(form).ajaxSubmit({
					target: '#medical-form-result',
					success: function() {
						formButton.prop('disabled', false).html(formButtonText);
						$(form).find('.form-control').val('');
						$('#medical-form-result').attr('data-notify-msg', $('#medical-form-result').html()).html('');
						SEMICOLON.widget.notifications($('#medical-form-result'));
					}
				});
			}
		});

	</script>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>

    var inst = $('[data-remodal-id=modal]').remodal({
        closeOnOutsideClick:false
    });
    inst.open();
    $(document).on('confirmation', '.remodal', function () {
        console.log('Confirmation button is clicked');
    });

    $(document).on('cancellation', '.remodal', function () {
        inst.open();
    });

    //paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function() {
// Animate loader off screen
$(".se-pre-con").fadeOut("slow");
});

$(window).load(function() {
// Animate loader off screen
    $(".pre-pre").fadeOut("slow");
});

</script>
<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 700, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
</div>


</body>
</html>