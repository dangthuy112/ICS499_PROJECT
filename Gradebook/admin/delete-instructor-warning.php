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

        <h4><u>This instructor is currently teaching these classes:</u></h4>
        <!--form for updating instructor-->
        <?php
        //grab ID from url
        $instructorID = $_GET['id'];

        $sql = "SELECT CONCAT(courses.subject,' ', courses.coursenumber,' ', courses.coursename) AS course_information
                        FROM instructor_enroll
                        INNER JOIN courses ON courses.courseID = 
                                    instructor_enroll.courseID_enroll
                        WHERE instructor_enroll.instructorID_enroll = $instructorID";

        $result = $connection->query($sql);

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
                </div>
            </div>
            <?php
        }
    }
}
?>

<h4><u>Deleting will remove their records from all the classes,
        Are you sure you want to continue?</u></h4>
<form action="" method="POST">
    <table class="tbl-30">
        <td colspan="2">
            <input type="submit" name="yes" value="Yes" class="btn-primary">
            <input type="submit" name="no" value="No" class="btn-primary">
        </td>

    </table>
</form>

<?php
if (isset($_POST['yes'])) {
//delete from users table FIRST
    $sql_delete_user = "DELETE FROM users 
                                WHERE userID_instructor = $instructorID";

    $result1 = $connection->query($sql_delete_user);

//delete from instructors table
    $sql_delete_instructor = "DELETE FROM instructors
                                WHERE instructorID = $instructorID";

    $result2 = $connection->query($sql_delete_instructor) or die($connection->error);
}
?>

<?php include('assets/partials/footer.php'); ?>


