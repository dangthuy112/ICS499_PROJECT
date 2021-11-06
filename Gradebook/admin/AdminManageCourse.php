<?php
include('assets/partials/menu.php');
include('config.php');

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

$connection = mysqli_connect($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}
?>

<div class="admin-manage" style="">
    <div class="wrapper">
        <h1>Manage Courses</h1>
        <br>

        <h4>
            <?php
            //to display success update message or not
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>
        </h4>

        <br /><br />

        <!-- add courses button -->
        <a href="add-course.php" class="btn-primary">Add Courses</a>

        <br /><br /><br />
        <!-- display table -->
        <table class="tbl-full">
            <tr>
                <th>Subject</th>
                <th>Course Number</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Days</th>
                <th>Time</th>
                <th>Location</th>
                <th>Instructor</th>
                <th>Delivery Method</th>
            </tr>

            <?php
            $sql = "SELECT courses.subject, courses.coursenumber, courses.coursename,
                        courses.semester, courses.days, courses.time, courses.location,
                        instructors.fullname
                        FROM instructor_enroll
                        INNER JOIN instructors ON instructors.instructorID = instructor_enroll.instructorID_enroll
                        INNER JOIN courses ON courses.courseID = instructor_enroll.courseID_enroll
                        ORDER BY courses.subject ASC";

            $result = $connection->query($sql);

            if ($result == TRUE) {
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //grab data
                        $subject = $rows['subject'];
                        $coursenumber = $rows['coursenumber'];
                        $coursename = $rows['coursename'];
                        $semester = $rows['semester'];
                        $days = $rows['days'];
                        $time = $rows['time'];
                        $location = $rows['location'];
                        $instructor_fullname = $rows['fullname'];
                        ?>

                        <!--print data-->
                        <tr>
                            <td><?php echo $subject; ?></td>
                            <td><?php echo $coursenumber; ?></td>
                            <td><?php echo $coursename; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td><?php echo $days; ?></td>
                            <td><?php echo $time; ?></td>
                            <td><?php echo $location; ?></td>
                            <td><?php echo $instructor_fullname; ?></td>
                            <td>
                                <a href="update-instructor.php?id=<?php echo$instructorID; ?>" class="btn-secondary">Update</a>
                                <a href="delete-instructor.php?id=<?php echo$instructorID; ?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>

                        <?php
                    }
                }
            }

            $connection->close();
            ?>

        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>