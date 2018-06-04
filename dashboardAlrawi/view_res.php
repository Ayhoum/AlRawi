<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 8-11-2017
 * Time: 17:22
 */
include '../scripts/db_connection.php';
?>












<div class="panel panel-card recent-activites">
    <!-- Start .panel -->
    <div class="panel-heading">
        The Reservations
    </div>
    <div class="panel-body  p-xl-3">
        <div class="table-responsive">
            <table id="responsive-datatables" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>BSN</th>
                    <th>Date Of Birth</th>
                    <th>Place</th>
                    <th>Exam Date</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>BSN</th>
                    <th>Date Of Birth</th>
                    <th>Place</th>
                    <th>Exam Date</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
                </tfoot>




                <tbody>

                <?php
                $query = "SELECT * FROM `EXAM_RES` WHERE `Estatus` = 'GIVEN' ORDER BY `id` DESC";
                $select_users = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_users)) {
                    $id             = $row['id'];
                    $name           = $row['first_name'] .' '. $row['last_name'];
                    $bsn            = $row['bsn'];
                    $dob            = $row['dob'];
                    $place          = $row['place'];
                    $dateAndTime    = $row['dateAndTime'];
                    $phone          = $row['phone'];
                    $resStatus          = $row['reserve_status'];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td><a style='text-decoration: none;' href='res_info.php?id=$id'>$name</a></td>";
                    echo "<td>$bsn</td>";
                    echo "<td>$dob</td>";
                    echo "<td>$place</td>";
                    echo "<td>$dateAndTime</td>";
                    echo "<td>$phone</td>";
                    if($resStatus == 'Reserved'){
                        ?>
                        <td style="background: #3fffa8;"><?php echo $resStatus; ?></td>
                        <?php
                    }else{
                    ?>
                        <td style="background: #ff5d64;color: #fff"><?php echo $resStatus; ?></td>

                        <?php
                    }
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>

</div><!-- End .panel -->