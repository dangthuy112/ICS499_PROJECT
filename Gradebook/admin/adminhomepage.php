<?php include('assets/partials/menu.php') ?>


<!-- admin manage section-->
<div class="admin-manage" style="min-height: 100vh;">
    <div class="wrapper">
        <h1>Admin Dashboard</h1>

        <div class="column-3">
            <h2>Courses</h2>
            <br>
            <li><a href="AdminManageCourse.php">View All Courses</a></li>
            <li><a href="#">Add Courses</a></li>
            <li><a href="#">Assign Instructors</a></li>
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
            <li><a href="#">Add Students</a></li>
        </div>

        <div class="column-3">
            <h2>Announcements</h2>
            <br>
            <li><a href="AdminManageStudent.php">View All Announcements</a></li>
            <li><a href="#">Add Announcement</a></li>
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- admin manage section ends-->

<?php include('assets/partials/footer.php') ?>