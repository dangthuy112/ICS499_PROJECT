<?php include('assets/partials/menu.php'); ?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Manage Instructors</h1>

      <?php
    session_start();
    
    if( (isset($_SESSION['username'])) && (isset($_SESSION['password'])) )
 {
      // This session already exists, should already contain data
        echo "User ID Username: ", $_SESSION['username'], "<br />";
        echo "User ID Password: ", $_SESSION['password'], "<br />";
        echo "User ID: ", $_SESSION['userID'], "<br />";
    } else {
        // No Session Detected. Redirect to login page.
      
        header("Location: ../login.php");

    }
?>


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

        include("config.php");

                   
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


            $result = mysqli_query($db,$sql);
            
            if ($result->num_rows > 0) {

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $count . "</td><td>" . $row["fullname"] . "</td><td>" . $row["username"] . "</td> </tr>";
                $count++;
            }
        }










            echo "</table>";

            $db->close();
            ?>
            
        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>

