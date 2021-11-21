<link rel="stylesheet" href="assets/css/studentcourse.css">
<link rel="stylesheet" href="assets/css/studentheader.css">
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
session_start();
$sidget = $_GET['sid'];
$coursesubject = $_GET['coursesubject'];
$coursename = $_GET['coursename'];
$coursenumber = $_GET['coursenumber'];
$courseidget = $_GET['courseid'];
$courseid = strval($courseidget);
$sid = strval($sidget);
$studentname=$_SESSION['instructorname'];


$sql = "SELECT *
FROM students 
WHERE students.studentID='$sid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$studentname=$row['fullname'];
echo"<div class='header1'>
    <a style='font-size:50px; text-align:center; color:white;text-decoration: none' 
    href='./studentpage.php'> The Student Grade Book</a><br>
     <p class='bold'> Hello $studentname. Welcome to $coursesubject $coursenumber : $coursename <p>
  </div>";
include('assets/partials/studentmenu.php');
include('assets/partials/gradelistbar.php');
//Sql find out all announcement information base on student id
$sql = "SELECT * FROM announcement 
WHERE announcement.courseID_ann='$courseid' 
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