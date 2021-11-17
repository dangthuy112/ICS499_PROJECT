<link rel="stylesheet" href="css/gradelistbar.css">
<!-- stylelist sheet for the file -->
<style>
    .gradelistbar {
        border-bottom: 1px solid grey;
        background-color: lightgrey;
        display: inline-block;
        box-sizing: border-box;
        width: 100%;
        height: 10%;
        padding-top: 5px;
    }

    .gradelistbar a {
        text-decoration: none;
        margin-left: 3%;
        margin-right: 3%;
        margin-top: 7px;
        color: black;
    }

    .gradelistbar a:hover {
        color: red;
    }
</style>
<?php
//connect to data base
include("config.php");

//Sql statement which find out the instructor ID of the 
//Course with the coruseID given.
$sql = "SELECT instructor_enroll.instructorID_enroll
FROM instructor_enroll
WHERE instructor_enroll.courseID_enroll='$stringcourseid'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
if ($result->num_rows > 0) {
    $instructorid = trim($row['instructorID_enroll']);
    $stringinstructorid = strval($instructorid);
} else {
    $stringinstructorid = 0;
}

?>
<!-- Making 3 options for the gradelist bar which are Gradelist, Assignment , Quizz
Gradelist point to gradelist php file with all data need to show up 
the garde table of the student  -->
<div class="gradelistbar">

    <!-- Gradelist point to gradelist php file with all data need to show up 
the garde table of the student  -->

    <?php echo "<a   href='./gradelist.php?sid=$stringsid&courseid=$stringcourseid&instructorid=$stringinstructorid'>"; ?>
    Grade List
    </a>

    <!-- Assignment point to assignemnt php file with all data need to show up 
the garde table of the student  -->

    <?php echo "<a   href='./assignment.php?sid=$stringsid&courseid=$stringcourseid&instructorid=$stringinstructorid'>"; ?>
    Assignment
    </a>
    <a>
        Quizz
    </a>
    <?php
    include("notification.php");
    ?>
</div>