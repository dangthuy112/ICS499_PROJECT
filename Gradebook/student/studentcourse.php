
<link rel="stylesheet" href="assets/css/studentcourse.css">
<?php
include("assets/partials/config.php");
$sid = $_GET['sid'];
$course = $_GET['course'];
$courseid = $_GET['courseid'];
$stringcourseid = strval($courseid);

$sql = "SELECT courses.subject, courses.coursenumber, courses.coursename 
FROM courses WHERE courses.courseID='$courseid'";
$result = mysqli_query($db,$sql);

$row = mysqli_fetch_assoc($result);
$coursename = $row['coursename'];
$coursenumber = $row['coursenumber'];
$subject = $row['subject'];
$coursenamestring=strval($coursename);
$subjectstring=strval($subject);
$coursenumberstring=strval($coursenumber);
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
?>
<div class="padtable">
  <b>ANNOUNCEMENT</b>
  <table>
    <tr>
       <?php echo "<td>Hello this is $coursenamestring and course subject number is $subjectstring $coursenumberstring </td>" ?>;
    </tr>
    
  </table>
  </table>
</div>
<?php
$db->close();
include('assets/partials/studentfooter.php') ?>