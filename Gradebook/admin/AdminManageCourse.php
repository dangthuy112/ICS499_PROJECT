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

if (isset($_POST['search'])) {
    $search_value = $_POST['search_value'];

    //sql search query
    $sql_search = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
                        c.semester, c.days,  c.time, c.location,
                        c.`delivery method`, i.instructorID,i.fullname
                        FROM courses c
                        LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i 
                                   ON ie.instructorID_enroll=i.instructorID) 
                        ON c.courseID=ie.courseID_enroll
                        WHERE CONCAT(`courseID`,`subject`,`coursenumber`,
                                     `semester`,`days`,`location`,
                                     `delivery method`,`time`,`coursename`)
						LIKE '%" . $search_value . "%'";

    $search_result = table_search($connection, $sql_search);
} else {
    $sql_search = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
                        c.semester, c.days, c.time, c.location,
                        c.`delivery method`, i.fullname
                        FROM courses c
                        LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i 
                                   ON ie.instructorID_enroll=i.instructorID) 
                        ON c.courseID=ie.courseID_enroll
                        ORDER BY c.subject ASC";

    $search_result = table_search($connection, $sql_search);
}

function table_search($connection, $sql_search) {
    $filtered_result = mysqli_query($connection, $sql_search);
    return $filtered_result;
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
        <!-- search form -->
        <form action ="AdminManageCourse.php" method="POST">
            <tr>
                <th><input type="text" name="search_value" placeholder ="Value To Search"></th>
                <th><input type ="submit" name="search" value="Search"></th>
            <br><br>
            </tr>
        </form>

        <?php
        if (isset($_POST['search_value'])) {
            echo "<tr><b>Search Result for \"" . $search_value . "\":</b></tr>";
        }
        ?>

        <br />
        <!-- display table -->
        <table class="tbl-full">
            <tr>
                <th style="background-color:#1e90ff;height:50px;width:90px">courseID</th>
                <th style="background-color:#1e90ff;height:50px;width:90px">Subject</th>
                <th style="background-color:#1e90ff;height:50px;width:90px">Course Number</th>
                <th style="background-color:#1e90ff;height:50px">Course Name</th>
                <th style="background-color:#1e90ff;height:50px;width:100px">Semester</th>
                <th style="background-color:#1e90ff;height:50px;width:80px">Days</th>
                <th style="background-color:#1e90ff;height:50px;width:170px">Time</th>
                <th style="background-color:#1e90ff;height:50px;width:100px">Location</th>
                <th style="background-color:#1e90ff;height:50px">Instructor</th>
                <th style="background-color:#1e90ff;height:50px;width:100px">Delivery Method</th>
                <th style="background-color:#1e90ff;height:50px;width:95px">UPDATE</th>
                <th style="background-color:#1e90ff;height:50px;width:95px">DELETE</th>
                <th style="background-color:#1e90ff;height:50px;width:95px">ASSIGN</th>
            </tr>

            <?php
            if (mysqli_num_rows($search_result) > 0) {
                foreach ($search_result as $course) {
                    ?>
                    <tr>
                        <td style="background-color:#ced6e0;height:50px;width:90px"><?php echo $course['courseID']; ?></td>
                        <td><?php echo $course['subject']; ?></td>
                        <td><?php echo $course['coursenumber']; ?></td>
                        <td><?php echo $course['coursename']; ?></td>
                        <td><?php echo $course['semester']; ?></td>
                        <td><?php echo $course['days']; ?></td>
                        <td><?php echo $course['time']; ?></td>
                        <td><?php echo $course['location']; ?></td>
                        <td>
                            <?php
                            //display NONE instead of NULL
                            if ($course['fullname'] == "") {
                                ?> 
                                NONE
                                <br>

                                <?php
                            } else {
                                echo $course['fullname'];
                            }
                            ?>
                        </td>
                        <td><?php echo $course['delivery method']; ?></td>
                        <td>
                            <a href="update-course.php?id=<?php echo $course['courseID']; ?>" class="btn-secondary">Update</a></td>
                        <td>
                            <a href="delete-course.php?id=<?php echo $course['courseID']; ?>" class="btn-danger">Delete</a></td>   
                        <td> 
                            <a href="assign-instructor.php?id=<?php echo $course['courseID']; ?>" class="btn-secondary">Assign Instructor</a>
                        </td>

                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
                <?php
            }

            $connection->close();
            ?>

        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>