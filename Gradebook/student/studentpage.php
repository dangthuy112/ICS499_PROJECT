<link rel="stylesheet" href="assets/css/studentheader.css">
<?php
session_start();
$sssid = $_SESSION['userID_student'];
$sid = strval($sssid);
include("assets/partials/config.php");
// include('assets/partials/studentheader.php');
$sql = "SELECT *
FROM students 
WHERE students.studentID='$sid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$studentname=$row['fullname'];
$_SESSION['instructorname'] = $studentname;
echo"<div class='header1'>
    <a style='font-size:50px; text-align:center; color:white;text-decoration: none' 
    href='./studentpage.php'> The Student Grade Book</a><br>
     <p class='bold'> Hello $studentname. Welcome to Student Grade Book<p>
  </div>";
include('assets/partials/studentmenu.php');

$sql = "SELECT students.fullname From students WHERE students.StudentID='$sid'";
$result = mysqli_query($db,$sql);
$subjectname = [];
$row = mysqli_fetch_assoc($result);
$studentname=$row['fullname'];
?>
<link rel="stylesheet" href="assets/css/studentpage.css">
<!-- admin manage section-->

<div class="padtable">
</div>
<?php
$db->close();

include('assets/partials/studentfooter.php') ?>
