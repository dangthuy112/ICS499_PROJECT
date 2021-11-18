<?php
//include the section of conning to the database, header and divide of the instructormenu
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
include('assets/partials/config.php');
//geting all the data passed from previous page
$sid = $_GET['sid'];
$courseid = $_GET['courseid'];
$instructorid = $_GET['instructorid'];
$stringcourseid = strval($courseid);
$stringsid = strval($sid);
include('assets/partials/gradelistbar.php');
//sql get all the data from the assignment table base on student id and instructor Id
$sql = "SELECT * FROM assignment 
WHERE assignment.courseID_ass=$stringsid 
AND assignment.instructorID_ass=$stringinstructorid";
$result = mysqli_query($db, $sql);
?>
<link rel="stylesheet" href="assets/css/assignment.css">
<label style="font-size: 50px;margin-left: 35%;">Assignment Page</label>
<div class="padtable">
<!-- list all the assignment of the course and close the database -->
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