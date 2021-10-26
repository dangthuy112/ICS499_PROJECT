
<link rel="stylesheet" href="assets/css/studentcourse.css">
<?php
$sid = $_GET['sid'];
$course = $_GET['course'];
$courseid = $_GET['courseid'];
$stringcourseid = strval($courseid);
$connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "studentgradebook");
if ($connection->connect_error) {
  die("Connection Failed:" . $connection->connect_error);
}
$sql = "SELECT courses.subject, courses.coursenumber, courses.coursename 
FROM courses WHERE courses.courseID='$courseid'";
$result = $connection->query($sql);
$row = mysqli_fetch_assoc($result);
$coursename = $row['coursename'];
$coursenumber = $row['coursenumber'];
$subject = $row['subject'];
$coursenamestring=strval($coursename);
$subjectstring=strval($subject);
$coursenumberstring=strval($coursenumber);
include('studentheader.php');
include('studentmenu.php');
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
$connection->close();
echo "</div>";
include('studentfooter.php') ?>