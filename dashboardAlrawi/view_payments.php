<?php
/**
 * Created by PhpStorm.
 * User: Ayham
 * Date: 8-11-2017
 * Time: 17:22
 */
include '../scripts/db_connection.php';
?>








<?php
$week = 0;
$week2 = 0;
$week4 = 0;
$query = "SELECT * FROM PAID_EXAM";
$select_payments = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_assoc($select_payments)) {

    $payDate = $row['PAYMENT_DATE'];
    $endDate = $row['END_DATE'];
    $dif =  date('d',strtotime($endDate) - strtotime($payDate));
    if($dif >=6 && $dif <=8 ){
        $week += 10.29;
    }else if($dif >=13 && $dif <=15){
        $week2 += 15.29;
    }else if($dif >=27 && $dif <=29){
        $week4 += 25.29;
    }
}
?>
<div class="row">

    <div class="col-md-6 col-lg-4">
        <div class="card white-text clearfix" style="background-color: #E91E63 !important;">

            <div class="card-content clearfix">
                <i class="fa fa-money background-icon" style="font-size: 32px;"></i>
                <p class="card-stats-title right card-title  wdt-lable">1 Week</p>
                <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $week; ?></h4>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card white-text clearfix" style="background-color: #FF9800 !important;">

            <div class="card-content clearfix">
                <i class="fa fa-money background-icon" style="font-size: 46px;"></i>
                <p class="card-stats-title right card-title  wdt-lable">2 Weeks</p>
                <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $week2 ?></h4>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card white-text clearfix" style="background-color: #8BC34A !important;">

            <div class="card-content clearfix">
                <i class="fa fa-money background-icon" style="font-size: 60px;"></i>
                <p class="card-stats-title right card-title  wdt-lable">4 Weeks</p>
                <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $week4 ?></h4>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>

    <div class="col-md-6 col-lg-12">
        <div class="card white-text clearfix" style="background-color: #00BCD4 !important;">

            <div class="card-content clearfix">
                <i class="fa fa-money background-icon"></i>
                <p class="card-stats-title right card-title  wdt-lable">Total</p>
                <h4 class="right panel-middle margin-b-0 wdt-lable"><?php echo $week + $week2 + $week4 ?></h4>

                <div class="clearfix"></div>
            </div>

        </div>
    </div>

</div>


<div class="panel panel-card recent-activites">
    <!-- Start .panel -->
    <div class="panel-heading">
        The Payments
    </div>
    <div class="panel-body  p-xl-3">

        <div class="table-responsive">
            <table id="basic-datatables" class="table table-bordered">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>Payment Date</th>
                    <th>End Date</th>
                    <th>Current Status</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>User Name</th>
                    <th>Payment Date</th>
                    <th>End Date</th>
                    <th>Current Status</th>
                    <th>Amount</th>
                </tr>
                </tfoot>




                <tbody>
                <?php


                $query = "SELECT * FROM PAID_EXAM ORDER BY STATUS";
                $select_payments = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_payments)) {
                    $usId = $row['Users_ID'];
                    $payDate = $row['PAYMENT_DATE'];
                    $endDate = $row['END_DATE'];
                    $status = $row['STATUS'];
                    $dif =  date('d',strtotime($endDate) - strtotime($payDate));

                $query = "SELECT * FROM Users WHERE ID = '{$usId}'";
                $select_users = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_users)) {
                    $name       = $row['NAME'];
                   }

                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$payDate</td>";
                    echo "<td>$endDate</td>";
                    if($status == "ACTIVE"){
                        echo "<td class='alert alert-success'>$status</td>";
                    }else{
                        echo "<td>$status</td>";
                    }
                    if($dif >=6 && $dif <=8 ){
                        echo "<td>10.29 €</td>";
                    }else if($dif >=13 && $dif <=15){
                        echo "<td>15.29 €</td>";
                    }else if($dif >=27 && $dif <=29){
                        echo "<td>25.29 €</td>";
                    }
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>

    </div><!-- End .panel -->