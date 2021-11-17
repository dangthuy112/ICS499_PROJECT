<link rel="stylesheet" href="assets/css/studentcourse.css">
<style>
  .padtable {
    height: 70%;
    width: 100%;
    border: 1px solid black;
    display: inline-block;
    background-color: lightpink;
  }

  .middlediv {
    text-align: center;

  }

  .announcementpad {
    height: 15%;
    width: 100%;
    background-color: lightgrey;
    border: 1px solid black;
    display: inline-block;


  }

  .announcementhead {
    height: 7%;
    width: 100%;
    background-color: grey;
    border: 1px solid black;
    display: inline-block;
  }
</style>
<?php
// attached connection file , header file, and manu file
include("assets/partials/config.php");
//geting needed information fo the student course
$sid = $_GET['sid'];
$course = $_GET['course'];
$courseid = $_GET['courseid'];
$stringcourseid = strval($courseid);
$stringsid = strval($sid);
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
include('assets/partials/gradelistbar.php');
//Sql find out all announcement information base on student id
$sql = "SELECT * FROM announcement 
WHERE announcement.courseID_ann=$stringsid 
";
$result = mysqli_query($db, $sql);
?>
<div class="padtable">
  <?php
 while ($row = mysqli_fetch_array($result)) 
 {
  echo "<div class='announcementhead'>
          <h3> Announcement on $row[date]<h3>
       </div> 
       <div class='announcementpad'>
       <p> $row[announcement]</p>
      </div> ";   
 }
 echo "</div>";
  $db->close();
  include('assets/partials/studentfooter.php')
  ?>