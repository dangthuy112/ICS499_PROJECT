<?php include('assets/partials/menu.php') ?>

<!-- admin manage section-->
<div class="admin-manage">
    <div class="wrapper">
        <h1>Admin Dashboard</h1>

        <div class="column-3">
            <h2>Courses</h2>
            <br>
            <li><a href="#">View All Courses</a></li>
            <li><a href="#">Search For a Course</a></li>
            <li><a href="#">Add Courses</a></li>
            <li><a href="#">Remove Courses</a></li>
            <li><a href="#">Assign Instructors</a></li>
        </div>

        <div class="column-3">
            <h2>Instructors</h2>
            <br>
            <li><a href="AdminManageInstructor.php">View All Instructors</a></li>
            <li><a href="#">Search For an Instructor</a></li>
            <li><a href="#">Add Instructors</a></li>
            <li><a href="#">Remove Instructors</a></li>
        </div>

        <div class="column-3">
            <h2>Students</h2>
            <br>
            <li><a href="#">View All Students</a></li>
            <li><a href="#">Search For a Student</a></li>
            <li><a href="#">Add Students</a></li>
            <li><a href="#">Remove Students</a></li>
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- admin manage section ends-->

<?php include('assets/partials/footer.php') ?>