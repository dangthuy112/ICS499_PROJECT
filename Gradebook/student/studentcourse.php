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
include("assets/partials/config.php");
$sid = $_GET['sid'];
$course = $_GET['course'];
$courseid = $_GET['courseid'];
$stringcourseid = strval($courseid);
$stringsid = strval($sid);
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
include('assets/partials/gradelistbar.php');
$sql = "SELECT * FROM announcement 
WHERE announcement.courseID_ann=$stringsid AND announcement.instructorID_ann='$stringinstructorid'";
$result = mysqli_query($db, $sql);

$row = mysqli_fetch_assoc($result);
$coursename = $row['coursename'];
$coursenumber = $row['coursenumber'];
$subject = $row['subject'];
$coursenamestring = strval($coursename);
$subjectstring = strval($subject);
$coursenumberstring = strval($coursenumber);
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
      </div>
      </div>";
 }
  $db->close();
  include('assets/partials/studentfooter.php')
  ?>