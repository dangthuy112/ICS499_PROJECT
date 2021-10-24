<?php
include('assets/partials/menu.php');

session_start();

if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
    // This session already exists, should already contain data
    # echo "User ID Username: ", $_SESSION['username'], "<br />";
    # echo "User ID Password: ", $_SESSION['password'], "<br />";
    # echo "User ID: ", $_SESSION['userID'], "<br />";
} else {
    // No Session Detected. Redirect to login page.

    header("Location: ../login.php");
}

?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Manage Courses</h1>

        <table class="tbl-full" >
            <tr> 
                <th>Subject</th>
                <th>Course Number</th>
                <th>Course Name</th>
                <th>InstructorID</th>
            </tr>

            <?php
            $connection = mysqli_connect("localhost", "root", "", "ics499");
            if ($connection->connect_error) {
                die("Connection Failed:" . $connection->connect_error);
            }

            $sql = "SELECT subject, coursenumber, name, instructorID from courses";
            $result = $connection->query($sql) or die($connection->error);

            if ($result == TRUE) {
                $rows_num = mysqli_num_rows($result);

                if ($rows_num > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //grab data
                        $course;
                    }
                } else {
                    
                }
            }

            /*
              while ($row = $result-> fetch_assoc()) {
              echo "<tr><td>" . $row["subject"] . "</td>"
              . "<td>" . $row["coursenumber"] . "</td>"
              . "<td>" . $row["name"] . "</td>"
              . "<td>" . $row["instructorID"] . "</td>"
              . "</tr>";

              }
              echo "</table>";
             */

            $connection->close();
            ?>

            <tr>
                <td></td>
            </tr>
        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>

