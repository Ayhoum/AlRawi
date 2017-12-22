<html>
<head>
    <title>My Now Amazing Webpage</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
</head>
<body>
<div class="container">
<div class="your-class" style="height: 200px">
    <div>your content1</div>
    <div>your content2</div>
    <div>your content3</div>
    <div>your content4</div>
    <div>your content5</div>
    <div>your content5</div>
    <div>your content5</div>
    <div>your content47777</div>

</div>

<button class="nxt">Next</button>
<button class="prev">Back</button>
<button class="print">Print</button>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script type="text/javascript">


    $('.your-class').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        pauseOnFocus: false,
        swipe:false,
    });

    window.setInterval(function(){
        var currentSlide = $('.your-class').slick('slickCurrentSlide');
        if(currentSlide==4){
            $('.your-class').slick('slickPause');
            $('.your-class').slick('slickGoTo',"7");


        }
        }, 500);


    $('.nxt').click(function () {
        $('.your-class').slick('slickNext');
    });
    $('.prev').click(function () {
        $('.your-class').slick('slickPrev');
    });

</script>

</body>
</html>