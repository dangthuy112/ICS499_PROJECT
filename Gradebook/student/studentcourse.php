<link rel="stylesheet" href="assets/css/styles.css">
        <?php
        $sid=$_GET['sid'];
        $course = $_GET['course'];
        $connection_string = 'mysql:host=localhost:3307;dbname=gradebook1';
        $user_name = 'student'; //testing
        $password = 'trungbasau123';
        $connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "gradebook1");
        if ($connection->connect_error) {
          die("Connection Failed:" . $connection->connect_error);
        }
        include('studentheader.php');
        include('studentmenu.php');
        echo "<div class='padtable'>
         <b>ANNOUNCEMENT</b>
         <table style='width:100%'>";
        $sql = "SELECT subjects.subid, subjects.name from subjects where subjects.name='$course'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
          echo "<table>";
          echo "<tr>";
          echo "<th >";
          echo "<a >CourseID</a>";
          echo "</th>";
          echo "<th>Name</th>";
          echo "</tr>";
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["subid"] . "</td><td>" . $row["name"] . "</td></tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }
        $connection->close();
        echo "</div>";
        ?>
         <?php include('studentfooter.php') ?>
        