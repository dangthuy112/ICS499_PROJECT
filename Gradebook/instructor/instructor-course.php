<link rel="stylesheet" href="assets/css/studentcourse.css">
<link rel="stylesheet" href="assets/css/header.css">
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
//geting all the data passed from previous page
session_start();
$option = $_GET['option'];
$iidtemp = $_GET['iid'];
$coursetemp = $_GET['course'];
$courseidtemp = $_GET['courseid'];
$coursenumbertemp= $_GET['coursenumber'];
$iid = strval($iidtemp);
$course = strval($coursetemp);
$courseid = strval($courseidtemp);
$coursenumber=strval($coursenumbertemp);
$instructorname=$_SESSION['instructorname'];
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
echo"<div class='header1'>
    <a style='font-size:50px; text-align:center; color:white;text-decoration: none' href='./instructorpage.php'> The Student Grade Book</a><br>
    <p class='bold'> Hello instructor $instructorname. Welcome to Course : $course $coursenumber<p>
  </div>";
include('assets/partials/instructormenu.php');
include('assets/partials/functionbar.php');
// depend on the option was send from previous page we will attach section for the page
if ($option == 0) {echo"<div class='padtable'></div>";
} else if ($option == 1) {
  include('assets/partials/studentlist.php');
} else if ($option == 2) {
  include('assets/partials/assignmentlist.php');
} else if ($option == 3) {
  include('assets/partials/announcementlist.php');
} else if ($option == 4) {
  include('assets/partials/studentlist.php');
  $sidtemp = $_GET['sid'];
  $nametemp = $_GET['name'];
  $sid = strval($sidtemp);
  $name = strval($nametemp);
  include('assets/partials/gradelist.php');
}
$db->close();
include('assets/partials/footer.php')
?>