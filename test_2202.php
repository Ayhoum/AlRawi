<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 5-12-2017
 * Time: 19:48
 */
$query3  = "SELECT * FROM QUESTION_SET WHERE STATUS = 'VISIBLE'";
$result3 = mysqli_query($mysqli,$query3);
if (mysqli_num_rows($result3) > 0 ){
    while ($row = mysqli_fetch_assoc($result3)){
        $id = $row['ID'];
        $name = $row['EXAM_NAME'];
        $begin = $row['BEGIN_ID'];
        $beginValue = (($begin - 1));
        ?>
        <div class="col-md-3 col-sm-6 bottommargin">
            <div class="team">
                <div class="team-image">
                    <img src="images/1.png" alt="Exam">
                </div>
                <div class="team-desc team-desc-bg">
                    <div class="team-title"><h4><?php echo $name; ?></h4><span> PAID </span></div>
                    <a href="exam_interface.php?exam_id=<?php echo $id ?>" class="button button-xlarge button-dark button-rounded tright">ابدء الأمتحان <i class="icon-circle-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <?php
    }





} else {
    echo "buy_new_exam";
}
?>