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

//start mysql connection
$connection = mysqli_connect("localhost", "root", "", "ics499");
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}

//grab ID from url
$courseID = $_GET['id'];

//sql to query id information
$sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename, i.fullname
                        FROM courses c
                        LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i 
                                   ON ie.instructorID_enroll=i.instructorID) 
                        ON c.courseID=ie.courseID_enroll
                        WHERE c.courseID = $courseID";

$result = $connection->query($sql);
$rows = mysqli_fetch_assoc($result);

//set data to variables
$courseID = $rows['courseID'];
$subject = $rows['subject'];
$coursenumber = $rows['coursenumber'];
$coursename = $rows['coursename'];
$instructorname = $rows['fullname'];

if ($instructorname == "") {
    $instructorname = "NONE";
}
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Deleting Course</h1>
        <br></br>

        <h4><u>Are you sure you want to delete this course?</u></h4>
        <!--form for updating course-->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr> 
                    <td>Course ID: <b><?php echo "$courseID"; ?></b></td>
                </tr>
                <tr> 
                    <td>Subject: <b><?php echo "$subject"; ?></b></td>
                </tr>
                <tr> 
                    <td>Course Number: <b><?php echo "$coursenumber"; ?></b></td>
                </tr>
                <tr> 
                    <td>Course Name: <b><?php echo "$coursename"; ?></b></td>
                </tr>
                <tr> 
                    <td>Current Instructor: <b><?php echo "$instructorname"; ?></b></td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="yes" value="Yes" class="btn-primary">
                    <input type="submit" name="no" value="No" class="btn-primary">
                </td>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['yes'])) {
    //check to see if the course currently has students enrolled
    $sql = "SELECT * FROM `student_enroll` WHERE `courseID_enroll` = $courseID";
    $result = $connection->query($sql);
    $num_result = mysqli_num_rows($result);

    if ($num_result > 0) {
        //if they are, send to warning page
        header('location: delete-course-warning.php?id=' . $courseID);
    } else {
        //if not, delete from course table which will cascade
        $sql_delete_course = "DELETE FROM courses
                                WHERE courseID = $courseID";

        $result = $connection->query($sql_delete_course) or die($connection->error);

        //test to see if operation was successful
        if ($result == true) {
            //success message if sql was successfully added
            $_SESSION['delete'] = "Course Deleted Successfully!";

            //redirect to the same page to show success message
            header('location: AdminManageCourse.php');
        } else {
            //failure message if sql was NOT added
            $_SESSION['delete'] = "Course NOT Deleted.";

            //redirect to the manage page to show failure message
            header('location: AdminManageCourse.php');
        }
    }
} else if (isset($_POST['no'])) {
    //failure message since NOT deleted
    $_SESSION['delete'] = "Course NOT Deleted.";

    //redirect to the manage page to show failure message
    header('location: AdminManageCourse.php');
}

include('assets/partials/footer.php');
?>


