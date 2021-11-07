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
        <h1>Deleting Instructor</h1>
        <br></br>

        <table class="tbl-full">
            <tr><b><u>This instructor is currently teaching these classes:</u></b></tr>
            <!--form for updating instructor-->
            <?php
            //grab ID from url
            $instructorID = $_GET['id'];

            //sql for all classes that instructor is enrolled in
            $sql = "SELECT CONCAT(courses.subject,' ', courses.coursenumber,' ', courses.coursename) AS course_information
                        FROM instructor_enroll
                        INNER JOIN courses ON courses.courseID = 
                                    instructor_enroll.courseID_enroll
                        WHERE instructor_enroll.instructorID_enroll = $instructorID";

            $result = $connection->query($sql);

            //display the classes
            if ($result == TRUE) {
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //set data to variables
                        $course = $rows['course_information'];
                        ?>

                        <!--print data-->
                        <tr>
                            <td><?php echo $course; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
        
        <h4><u><br>Deleting will remove their records from all the classes.
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
    //delete from instructors table which will cascade and delete from other tables
    $sql_delete_instructor = "DELETE FROM instructors
                                WHERE instructorID = $instructorID";

    $result = $connection->query($sql_delete_instructor) or die($connection->error);

    //test to see if operation was successful
    if ($result == true) {
        //success message if sql was successfully added
        $_SESSION['delete'] = "Instructor Deleted Successfully!";

        //redirect to the same page to show success message
        header('location: AdminManageInstructor.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['delete'] = "Instructor NOT Deleted.";

        //redirect to the manage page to show failure message
        header('location: AdminManageInstructor.php');
    }
} else if (isset($_POST['no'])) {
    //failure message since NOT deleted
    $_SESSION['delete'] = "Instructor NOT Deleted.";

    //redirect to the manage page to show failure message
    header('location: AdminManageInstructor.php');
}
?>

<?php include('assets/partials/footer.php'); ?>


