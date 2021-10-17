
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
        $sql ="SELECT subjects.subid, subjects.name from students ,subjects , ss WHERE students.sid=ss.studentid_ssid AND subjects.subid=ss.subjectid_ssid AND students.sid=$sid";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>";
            echo"<tr>";
            echo"<th >";
            echo "<a >ID</a>";
            echo "</th>";
            echo"<th>Name</th>";
            echo"</tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["subid"]."</td><td>".$row["name"]."</td></tr>";
              echo $subid;
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
          $connection->close();
        ?>
        <?php include('studentfooter.php') ?>
       