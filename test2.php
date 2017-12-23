<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<style>
    .slider-wrapper {
        width: 600px;
    }
    .slider {
        width: 600px;
        height: 400px;
        border: 1px solid #000;
    }

    .slide {
        width: 100%;
        height: 398px;
        background: #ccc;
    }
    #slick-1 .slick-dots li {
        width: 40px;
        height: 5px;
        background: #ccc;
    }
    #slick-1 .slick-dots li button {
        width: 40px;
        height: 5px;
    }
    #slick-1 .slick-dots li.slick-active,
    #slick-1 .slick-dots li:hover {
        background: #777;
    }
    #slick-1 .slick-dots li button,
    #slick-1 .slick-dots li button:before {
        color: transparent;
        opacity: 0;
    }

    /* progress bar */
    .slider-progress {
        width: 100%;
        height: 10px;
        background: #eee;
    }
    .slider-progress .progress {
        width: 0%;
        height: 10px;
        /*background: #000;*/
    }
    .bg-green{
        background: #28a745 ;
    }
    .bg-yellow{
        background: #ffc107;
    }
    .bg-red{
        background: #dc3545;
    }
</style>

<div class="slider-wrapper" id="slick-1">
    <div class="slider">
        <div class="slide">your content</div>
        <div class="slide">your content2</div>
        <div class="slide">your content3</div>
    </div>
<!--    <div class='progress1 bg-success' style="width: 100%">-->
<!--        <div id='progbg' class='progress-bar progress-bar-success' role='progressbar' aria-valuemin='0' aria-valuemax='100'>-->
<!--        </div>-->
<!--    </div>-->

    <div class="slider-progress">
        <div class="progress"></div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var time = 10;
        var $bar,
            $slick,
            tick,
            percentTime;

        $slick = $('.slider');
        $slick.slick({
            autoplaySpeed: 8000,
            // draggable: true,
            adaptiveHeight: false,
            // dots: false,
            fade:true,
            mobileFirst: true,
        });

        $bar = $('.progress');

        // $('.slider-wrapper').on({
        //     mouseenter: function() {
        //         isPause = true;
        //     },
        //     mouseleave: function() {
        //         isPause = false;
        //     }
        // })









        function startProgressbar() {
            resetProgressbar();
            percentTime = 0;
            tick = setInterval(interval, 10);
        }

        function interval() {
                percentTime += 1 / (time+0.01);
                $bar.css({
                    width: percentTime+"%"
                });

                if(percentTime >= 100){
                    $slick.slick('slickNext');
                    startProgressbar();
                }else if(percentTime > 80 && percentTime < 100){
                    $('.progress').addClass('bg-red');
                    $('.progress').removeClass('bg-yellow');
                }else if(percentTime <= 80 && percentTime > 60){
                    $('.progress').addClass('bg-yellow');
                    $('.progress').removeClass('bg-green');
                }
        }

        function resetProgressbar() {
            $('.progress').addClass('bg-green');
            $('.progress').removeClass('bg-red');
            $bar.css({
                width: 0+'%'
            });
            clearTimeout(tick);
        }

        startProgressbar();

    });
</script>