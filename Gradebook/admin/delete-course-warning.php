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
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Deleting Course Warning!</h1>
        <br></br>

        <table class="tbl-full">
            <tr><b><u>This Course is currently enrolled by these students:</u></b></tr>
            <!--form for updating instructor-->
            <?php
            //grab ID from url
            $courseID = $_GET['id'];

            //sql for all students that is in the course
            $sql = "SELECT CONCAT(students.studentID,' - ', students.fullname)
                        AS student_information
                        FROM student_enroll
                        INNER JOIN students 
                        ON students.studentID = 
                                    student_enroll.studentID_enroll
                        WHERE student_enroll.courseID_enroll = $courseID";

            $result = $connection->query($sql);

            //display the students
            if ($result == TRUE) {
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //set data to variables
                        $student = $rows['student_information'];
                        ?>

                        <!--print data-->
                        <tr>
                            <td><?php echo $student; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>

        <h4><u><br>Deleting will remove all the course's information related to these students.
                <br>Are you sure you want to continue?</br></br></u></h4>
        <form action="" method="POST">
            <table class="tbl-30"> 
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
    //delete from course table which will cascade
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
} else if (isset($_POST['no'])) {
    //failure message since NOT deleted
    $_SESSION['delete'] = "Course NOT Deleted.";

    //redirect to the manage page to show failure message
    header('location: AdminManageCourse.php');
}

include('assets/partials/footer.php');
?>


