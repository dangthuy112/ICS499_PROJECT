<?php
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
include('assets/partials/config.php');
$sid = $_GET['sid'];
$courseid = $_GET['courseid'];
$instructorid = $_GET['instructorid'];
$stringcourseid = strval($courseid);
$stringsid = strval($sid);
include('assets/partials/gradelistbar.php');
$sql = "SELECT * FROM assignment 
WHERE assignment.courseID_ass=$stringsid 
AND assignment.instructorID_ass=$stringinstructorid";
$result = mysqli_query($db, $sql);
?>
<link rel="stylesheet" href="assets/css/assignment.css">
<label style="font-size: 50px;margin-left: 35%;">Assignment Page</label>
<div class="padtable">
<?php
 while ($row = mysqli_fetch_array($result)) 
 {
  echo "<div class='assignmenthead'>
        <h3> $row[assignmentname]<h3>
       </div> 
       <div class='assignmentpad'>
       <p> $row[content]</p>
      </div> ";   
 }
 echo "</div>";
  $db->close();
  include('assets/partials/studentfooter.php')
  ?>