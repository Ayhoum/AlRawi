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
        The Exams
    </div>
    <div class="panel-body  p-xl-3">
        <div class="table-responsive">
            <table id="basic-datatables" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Exam Name</th>
                    <th>Times Payed</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Exam Name</th>
                    <th>Times Payed</th>
                </tr>
                </tfoot>




                <tbody>

                <?php
                $query = "SELECT * FROM Users WHERE SITUATION = 'TRAINING' LIMIT 50";
                $select_exams_info = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_exams_info)) {
                    $id      = $row['ID'];
                    $name      = $row['NAME'];


                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td><a style='text-decoration: none;' href='user_info.php?id=$id'>$name</>";
                    $counter = 0;
                    $query = "SELECT * FROM PAID_EXAM WHERE Users_ID = $id";
                    $select_exams = mysqli_query($mysqli, $query);
                    while($row = mysqli_fetch_assoc($select_exams)) {
                        $counter++;
                    }
                    echo "<td>$counter</td>";
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>

    </div><!-- End .panel -->