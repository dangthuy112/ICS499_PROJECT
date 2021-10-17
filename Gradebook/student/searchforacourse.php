<?php
         static $sid= 9;
        // static $logoutlink="logout.php";
        $connection_string= 'mysql:host=localhost:3307;dbname=gradebook1';
        $user_name='student'; //testing
        $password = 'trungbasau123'; 
        $connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "gradebook1");
        if ($connection-> connect_error) {
            die("Connection Failed:". $connection-> connect_error);
        }
        include('studentmenu.php'); 
        echo "<h2> Let Find A Course</h2>";
          $connection->close();
        ?>
        <?php include('studentfooter.php') ?>
       