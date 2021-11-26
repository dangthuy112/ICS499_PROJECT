<?php
include('assets/partials/menu.php');

session_start();
ob_start();

if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
    // This session already exists, should already contain data
    # echo "User ID Username: ", $_SESSION['username'], "<br />";
    # echo "User ID Password: ", $_SESSION['password'], "<br />";
    # echo "User ID: ", $_SESSION['userID'], "<br />";
} else {
    // No Session Detected. Redirect to login page.
    header("Location: ../login.php");
}

//start mysql connection
$connection = mysqli_connect("localhost", "root", "", "ics499");
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}

//grab ID from url
$courseID = $_GET['id'];

//boolean to see whether instructor is assigned already
$instructor_assigned = false;
$instructor_name;
$instructorID;

//sql to check for assigned instructor
$sql_instructor_assigned = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
                        c.semester, c.days, c.time, c.location,
                        c.`delivery method`, i.instructorID, i.fullname
                        FROM courses c
                        LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i 
                                   ON ie.instructorID_enroll=i.instructorID) 
                        ON c.courseID=ie.courseID_enroll
                        WHERE c.courseID=$courseID";

$assigned = $connection->query($sql_instructor_assigned);
$rows = mysqli_fetch_assoc($assigned);

//set instructor assigned boolean
if ($rows['instructorID'] != "") {
    $instructor_assigned = true;
    $instructor_name = $rows['fullname'];
    $instructorID = $rows['instructorID'];
}
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Assign Instructor</h1>
        <br></br>

        <!--form for assigning instructor-->
        <form action="" method="POST">
            <table class="tbl-30">

                <?php
                if ($instructor_assigned) {
                    echo "<tr><b>This Course is Currently Assigned to: "
                    . $instructorID . " - " . $instructor_name . "</b></tr>";
                } else {
                    echo "<tr><b><u>This Course has not been Assigned yet</u></b></tr>";
                }
                ?>
                <tr>
                    <td>Instructors: </td>
                    <td> 
                        <select name="instructor">
                            <option value="">NONE</option>
                            <?php
                            //sql to grab all instructors
                            $sql_all_instructors = "SELECT fullname, instructorID
                                                            FROM instructors";

                            $instructor_result = $connection->query($sql_all_instructors);

                            if ($instructor_result == TRUE) {
                                $rows2 = mysqli_num_rows($instructor_result);

                                if ($rows2 > 0) {
                                    while ($rows2 = mysqli_fetch_assoc($instructor_result)) {
                                        //grab data
                                        echo "<option value=" . $rows2['instructorID'] . ">"
                                        . $rows2['instructorID'] . " - " . $rows2['fullname'] . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Assign Instructor" class="btn-primary">
                </td>
            </table>
        </form>
    </div>
</div>


<?php
if (isset($_POST['submit'])) {
    //grab values from post form
    $instructorID = $_POST['instructor'];

    //if instructor has been assigned, update table to new instructor
    //otherwise instructor not assign so add new entry to table
    //check if course is being assigned to no one for now
    if ($instructorID == "") {
        $sql_assign_instructor = "DELETE FROM instructor_enroll
                                WHERE courseID_enroll = $courseID";

        $result = $connection->query($sql_assign_instructor) or die($connection->error);
    } else if ($instructor_assigned) {
        $sql_assign_instructor = "UPDATE instructor_enroll 
                                    SET instructorID_enroll='$instructorID'
                                    WHERE courseID_enroll = $courseID";

        $result = $connection->query($sql_assign_instructor) or die($connection->error);
    } else {
        $sql_assign_instructor = "INSERT into instructor_enroll SET
                                        instructorID_enroll='$instructorID',
                                        courseID_enroll='$courseID'";

        $result = $connection->query($sql_assign_instructor) or die($connection->error);
    }

    //test to see if operation was successful
    if ($result == true) {
        //success message if sql was successfully added
        $_SESSION['update'] = "Instructor Assigned Successfully!";

        //redirect to the same page to show success message
        header('location: AdminManageCourse.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['update'] = "Instructor NOT Assigned.";

        //redirect to the same page to show failure message
        header('location: AdminManageCourse.php');
    }
}
?>

<?php include('assets/partials/footer.php'); ?>


