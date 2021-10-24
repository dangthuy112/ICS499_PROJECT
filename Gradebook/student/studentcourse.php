
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
$sql = "SELECT courses.subject, courses.coursenumber, courses.coursename From courses WHERE courses.courseID='$courseid'";
$result = $connection->query($sql);
$row = mysqli_fetch_assoc($result);
$coursename = $row['coursename'];
$coursenumber = $row['coursenumber'];
$subject = $row['subject'];
$coursenamestring=strval($coursename);
$subjectstring=strval($subject);
$coursenumberstring=strval($coursenumber);
echo $coursename;
echo $coursenumber;
include('studentheader.php');
include('studentmenu.php');
?>
<div class="padtable">
  <b>ANNOUNCEMENT</b>
  <table>
   
    <tr>
      
       <?php echo "<td>Hello this is $coursenamestring and course subject number is $subjectstring $coursenumberstring </td>" ?>;
    </tr>
    <!-- <tr>
      <td>tomorrow</td>
      <td>test2</td>
    </tr> -->
  </table>
  <!-- echo "<div class='padtable'>
>>>>>>> Stashed changes
         <b>ANNOUNCEMENT</b>
         <table style='width:100%'>";
        $sql = "SELECT courses.courseID ,courses.coursename, courses.semester FROM courses,students where students.studentID='$sid' AND courses.subject='$course'and courses.coursenumber='$stringcourseid'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
          echo "<table>";
          echo "<tr>";
          echo "<th >";
          echo "<a >CourseID</a>";
          echo "</th>";
          echo "<th>Name</th>";
          echo "</tr>";
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["courseID"] . "</td><td>" . $row["coursename"] ."</td><td>" . $row["semester"] . "</td></tr>";
          }
    </table>";
        } else {
          echo "0 results";
        } -->
  </table>
</div>
<?php
$connection->close();
echo "</div>";
include('studentfooter.php') ?>