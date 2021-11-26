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

<!-- admin manage section-->
<div class="admin-manage" style="">
    <div class="wrapper">
        <h1>Admin Dashboard</h1>

        <div class="column-3">
            <h2>Courses</h2>
            <br>
            <li><a href="AdminManageCourse.php">View All Courses</a></li>
            <li><a href="add-course.php">Add Courses</a></li>
        </div>

        <div class="column-3">
            <h2>Instructors</h2>
            <br>
            <li><a href="AdminManageInstructor.php">View All Instructors</a></li>
            <li><a href="add-instructor.php">Add Instructors</a></li>
        </div>

        <div class="column-3">
            <h2>Students</h2>
            <br>
            <li><a href="AdminManageStudent.php">View All Students</a></li>
            <li><a href="add-student.php">Add Students</a></li>
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- admin manage section ends-->

<?php include('assets/partials/footer.php') ?>