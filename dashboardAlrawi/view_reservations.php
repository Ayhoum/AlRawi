<?php
/**
 * Created by PhpStorm.
 * User: Ayham
 * Date: 8-11-2017
 * Time: 17:22
 */
include '../scripts/db_connection.php';

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function HTMLToRGB($htmlCode)
{
    if($htmlCode[0] == '#')
        $htmlCode = substr($htmlCode, 1);

    if (strlen($htmlCode) == 3)
    {
        $htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
    }

    $r = hexdec($htmlCode[0] . $htmlCode[1]);
    $g = hexdec($htmlCode[2] . $htmlCode[3]);
    $b = hexdec($htmlCode[4] . $htmlCode[5]);

    return $b + ($g << 0x8) + ($r << 0x10);
}

function RGBToHSL($RGB) {
    $r = 0xFF & ($RGB >> 0x10);
    $g = 0xFF & ($RGB >> 0x8);
    $b = 0xFF & $RGB;

    $r = ((float)$r) / 255.0;
    $g = ((float)$g) / 255.0;
    $b = ((float)$b) / 255.0;

    $maxC = max($r, $g, $b);
    $minC = min($r, $g, $b);

    $l = ($maxC + $minC) / 2.0;

    if($maxC == $minC)
    {
        $s = 0;
        $h = 0;
    }
    else
    {
        if($l < .5)
        {
            $s = ($maxC - $minC) / ($maxC + $minC);
        }
        else
        {
            $s = ($maxC - $minC) / (2.0 - $maxC - $minC);
        }
        if($r == $maxC)
            $h = ($g - $b) / ($maxC - $minC);
        if($g == $maxC)
            $h = 2.0 + ($b - $r) / ($maxC - $minC);
        if($b == $maxC)
            $h = 4.0 + ($r - $g) / ($maxC - $minC);

        $h = $h / 6.0;
    }

    $h = (int)round(255.0 * $h);
    $s = (int)round(255.0 * $s);
    $l = (int)round(255.0 * $l);

    return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
}

?>






<div class="row">


<?php
$week = 0;
$week2 = 0;
$week4 = 0;
$query = "SELECT COUNT(*), res_date FROM EXAM_RES WHERE `Estatus` = 'GIVEN' GROUP BY MONTH (res_date), YEAR (res_date) ";

$select_payments = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_payments)) {

    $payDate = $row['res_date'];
    $payDate = strtotime($payDate);
    $year =  date('Y',$payDate);
    $month =  date('F',$payDate);
    $num = mysqli_num_rows($select_payments);
    $colorBack = random_color();

    $colour = '#'.$colorBack;
    $rgb = HTMLToRGB($colour);
    $hsl = RGBToHSL($rgb);
    if($hsl->lightness > 165) {
        $inverse = '000';
    }else{
        $inverse = 'fff';
    }
    ?>
    <div class="col-md-6 col-lg-4">
        <div class="card white-text clearfix" style="background-color: #<?php echo $colorBack; ?> !important;">

            <div class="card-content clearfix">
                <i class="fa fa-money background-icon" style="font-size: 32px;color: #<?php echo $inverse; ?>"></i>
                <p class="card-stats-title right card-title  wdt-lable" style="color: #<?php echo $inverse; ?>"><?php echo $month . ' / ' . $year ?></p>
                <h4 class="right panel-middle margin-b-0 wdt-lable" style="color: #<?php echo $inverse; ?>"><?php echo $row['COUNT(*)']; ?></h4>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
<?php

}
?>



</div>