<link rel="stylesheet" href="assets/css/studentmenu.css">
<?php
include("assets/partials/config.php");
$sql="SELECT grades.instructorID_grade FROM grades WHERE grades.studentID_grade=$sid and grades.courseID_grade=$courseid;";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$instructorid=trim($row['instructorID_grade']);
?>
<div class="menu">
    <a style=""
</div>