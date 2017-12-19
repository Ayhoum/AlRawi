<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="d" id="d1">1</div>
<div class="d" id="d2">2</div>
<div class="d" id="d3">3</div>
<div class="d" id="d4">4</div>


<button class="b1" id="b1">Next</button>
<button class="b1" id="b1">Previous</button>


<script>
    setTimeout(function () {
        $(".d").hide();
        $("#d1").show();
    }, 5000);
    setTimeout(function () {
        $(".d").hide();
        $("#d2").show();
    }, 10000);
    setTimeout(function () {
        $(".d").hide();
        $("#d3").show();
    }, 15000);
    setTimeout(function () {
        $(".d").hide();
        $("#d4").show();
    }, 20000);
    $(".d").hide();
</script>

</html>

