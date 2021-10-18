<?php include('assets/partials/menu.php'); ?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Manage Instructors</h1>
        <br />
        
        <!-- add instructor button -->
        <a href="add-instructor.php" class="btn-primary">Add Instructor</a>
        
        <br /><br /><br />
        <!-- display table -->
        <table class="tbl-full" >
            <tr> 
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>

            </tr>

            <?php
            $connection = mysqli_connect("localhost", "root", "", "ics499");
            if ($connection-> connect_error) {
                die("Connection Failed:". $connection-> connect_error);
            }
                   
            $sql = "SELECT
            `instructors`.`instructorID`
            , `instructors`.`fullname`
            , `users`.`username`
                , `users`.`role`
            FROM
                `instructors`
                INNER JOIN `users` 
                    ON (`instructors`.`instructorID` = `users`.`fromable_id`)
            WHERE (`users`.`role` =2);";

            $result = $connection->query($sql);
            $count =1;
            while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>" . $count . "</td><td>" . $row["fullname"] . "</td><td>" . $row["username"] . "</td> </tr>";
                $count++;
            }
            echo "</table>";

            $connection->close();
            ?>
            
        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>

