<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 8-11-2017
 * Time: 17:22
 */
include '../../scripts/db_connection.php';
?>
<div class="body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>City</th>
                <th>Situation</th>
                <th>Spent</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>City</th>
                <th>Situation</th>
                <th>Spent</th>
            </tr>
            </tfoot>
            <tbody>

            <?php
            $query = "SELECT * FROM Users";
            $select_users = mysqli_query($mysqli, $query);
            while($row = mysqli_fetch_assoc($select_users)) {
                $id      = $row['ID'];
                $email      = $row['EMAIL'];
                $name       = $row['NAME'];
                $city       = $row['CITY'];
                $bd         = $row['BD'];
                $situation  = $row['SITUATION'];
                $spent      = $row['SPENT'];
                $reg        = $row['REG_DATE'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                if($reg == date("Y-m-d")){
                    echo "<td class='alert alert-info'><a style='text-decoration: none;color: #fff;' href=''>$name</a></td>";
                }else{
                    echo "<td><a style='text-decoration: none;color: #555;' href=''>$name</a></td>";
                }
                echo "<td>$city</td>";
                if($situation == "SUCCEEDED"){
                    echo "<td class='alert alert-success'>$situation</td>";
                }else{
                    echo "<td>$situation</td>";
                }
                echo "<td>$spent €</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
