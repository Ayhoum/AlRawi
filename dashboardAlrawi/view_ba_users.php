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
        The Users
    </div>
    <div class="panel-body  p-xl-3">
        <div class="table-responsive">
            <table id="responsive-datatables" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Current Status</th>
                    <th>Block/Activate</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Current Status</th>
                    <th>Block/Activate</th>
                </tr>
                </tfoot>




                <tbody>

                <?php
                $queryb = "SELECT * FROM BUSERS ORDER BY ID DESC";
                $select_Busers = mysqli_query($mysqli, $queryb);
                while($row = mysqli_fetch_assoc($select_Busers)) {
                    $u_id      = $row['USER_ID'];
                    $query = "SELECT * FROM Users WHERE ID = '{$u_id}' ORDER BY ID DESC";
                    $select_users = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_users)) {
                    $id      = $row['ID'];
                    $email      = $row['EMAIL'];
                    $name       = $row['NAME'];
                    $acc_status       = $row['ACCOUNT_STATUS'];



                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$email</td>";
                    echo "<td><a style='text-decoration: none;color: #555;' href='user_info.php?id=$id'>$name</a></td>";
                    if($acc_status == "ACTIVE") {
                        echo "<td class='alert alert-success'>$acc_status</td>";
                    }else{
                        echo "<td class='alert alert-danger'>$acc_status</td>";
                    }

                    echo "<td class='text-center'>";
                    if($acc_status == "ACTIVE"){
                        ?>
                        <a href="ba_users.php?block=<?php echo $u_id; ?>" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Edit"><i class="fa fa-close"></i></a>
                        <?php
                    }else{
                     ?>
                        <a href="ba_users.php?active=<?php echo $u_id; ?>" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Edit"><i class="fa fa-check"></i></a>
                <?php
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                }
                ?>

                </tbody>
            </table>
        </div>

    </div><!-- End .panel -->