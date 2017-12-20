
<script>




    var nextQuestion = function () {
        tar++;
        if (tar == 65) {
            jQuery('.slide').hide();
            jQuery('.navBut').hide();
            jQuery('.flagBut').hide();
            jQuery('#nxtBut').hide();
            jQuery('.slideBetween').hide();
            jQuery('.slideFinish').show();
            jQuery('#submitBut').show();
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






    var progressTimer = function () {
        var g = 100;
        var counterBack = setInterval(function () {

            g = g - 12.5;
            if (g > 0) {
                if (g <= 50 && g > 35) {
                    jQuery('#progbg' + tar).removeClass('progress-bar-success').addClass('progress-bar-warning');
                } else if (g < 35) {
                    jQuery('#progbg' + tar).removeClass('progress-bar-warning').addClass('progress-bar-danger');
                } else if (g == 87.5) {
                    jQuery('#progbg' + tar).removeClass('progress-bar-danger').addClass('progress-bar-success');

                }
                jQuery('.progress-bar').css('width', g + '%');
            } else if (g == 0) {
                jQuery('.progress-bar').css('width', '0%');
                setTimeout(function () {
                    jQuery('.progress-bar').css('width', '100%');
                }, 400);
                progressTimer();
                clearInterval(counterBack);

            }
        }, 1000);
    };

    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }

</script>


</body>
</html>
