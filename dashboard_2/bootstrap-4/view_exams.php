<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 8-11-2017
 * Time: 17:22
 */
include '../../scripts/db_connection.php';
?>

<div class="panel panel-card recent-activites">
    <!-- Start .panel -->
    <div class="panel-heading">
        The Users
    </div>
    <div class="panel-body  p-xl-3">
        <div class="table-responsive">
            <table id="basic-datatables" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Exam Name</th>
                    <th>Times Bought</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Exam Name</th>
                    <th>Times Bought</th>
                </tr>
                </tfoot>




                <tbody>

                <?php
                $query = "SELECT * FROM QUESTION_SET";
                $select_exams_info = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_assoc($select_exams_info)) {
                    $id      = $row['ID'];
                    $name      = $row['EXAM_NAME'];


                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$name</td>";
                    $counter = 0;
                    $query = "SELECT * FROM PAID_EXAM WHERE QUESTION_SET_ID = $id";
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