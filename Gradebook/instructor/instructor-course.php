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
$option = $_GET['option'];
$iidtemp = $_GET['iid'];
$coursetemp = $_GET['course'];
$courseidtemp = $_GET['courseid'];
$iid = strval($iidtemp);
$course = strval($coursetemp);
$courseid = strval($courseidtemp);

include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
include('assets/partials/functionbar.php');

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