<?php
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
include('assets/partials/config.php');
$sid = $_GET['sid'];
$courseid = $_GET['courseid'];
$instructorid = $_GET['instructorid'];
$sql = "SELECT* FROM grades 
WHERE grades.studentID_grade='$sid' 
AND grades.courseID_grade='$courseid' 
AND grades.instructorID_grade='$instructorid'";
$result = mysqli_query($db, $sql);


?>
<link rel="stylesheet" href="assets/css/gradelist.css">
<div class="padtable">
  <div class="titlebar">
    <b style="margin-right: 41%;">Grade Section</b>
    <b style="margin-right: 12%;">Grade</b>
    <b>Feedback</b>
  </div>
  <div class="gradetable">
    <table style="width: 100%; height: 73%;">
      <tr>
        <th style="width:10%;border:none;text-align: left;"> Assignment:</th>
      </tr>
      <?php
      $result = mysqli_query($db, $sql);
      while ($row = mysqli_fetch_array($result)) {
        if ($row['grade_item'] == 'assignment') {
          echo "<tr>
      
        <td><label>$row[gradename]</label></td>
        <td><label>$row[score]</label></td>
        <td><label>$row[feedback]</label></td>
        </tr>";
        }
      }
      ?>
      <tr>
        <th style="width:50%;border:none;text-align: left;"> Quizz:</th>
      </tr>
      <?php
      $result = mysqli_query($db, $sql);
      while ($row = mysqli_fetch_array($result)) {
        if ($row['grade_item'] == 'quizz') {
          echo "<tr>
        
        <td><label>$row[gradename]</label></td>
        <td><label>$row[score]</label></td>
        <td><label>$row[feedback]</label></td>
        </tr>";
        }
      }
      ?>
      <tr>
        <th style="width:50%;border:none;text-align: left;"> Class Activities:</th>
      </tr>
      <?php
      $result = mysqli_query($db, $sql);
      while ($row = mysqli_fetch_array($result)) {
        if ($row['grade_item'] == 'activity') {
          echo "<tr>
      
        <td><label>$row[gradename]</label></td>
        <td><label>$row[score]</label></td>
        <td><label>$row[feedback]</label></td>
        </tr>";
        }
      }
      ?>
    </table>
    <?php


    // <!-- echo "<b style='margin-right: 50%;margin-left:5%;'>Assignment :</b><br>";
    // $result = mysqli_query($db, $sql);
    // while ($row = mysqli_fetch_array($result)) {
    //   if ($row['grade_item'] == 'assignment') {
    //     echo "<label style='margin-right: 50%;margin-left:8%;'>$row[gradename]</label>
    //     <label style='margin-right: 10%;'>$row[score]</label>
    //     <label>$row[feedback]</label>";
    //   } -->
    // //   echo  "<br>";
    // }
    // echo "<b style='margin-right: 50%;margin-left:5%;'>Quizz :</b><br>";
    // $result = mysqli_query($db, $sql);
    // while ($row = mysqli_fetch_array($result)) {
    //   if ($row['grade_item'] == 'quizz') {
    //     echo
    //     "<label style='margin-right: 53%;margin-left:8%;'>$row[gradename]</label>
    //     <label style='margin-right: 10%;'>$row[score]</label>
    //     <label>$row[feedback]</label>";
    //   }
    //   echo  "<br>";
    // }
    // echo "<b style='margin-right: 50%;margin-left:5%;'>Class Activities :</b><br><br><br>";
    // $result = mysqli_query($db, $sql);
    // while ($row = mysqli_fetch_array($result)) {
    //   if ($row['grade_item'] == 'activity') {
    //     echo
    //     "<label style='margin-right: 49%;margin-left:8%;'>$row[gradename]</label>
    //     <label style='margin-right: 10%;'>$row[score]</label>
    //     <label>$row[feedback]</label>";
    //   }
    //   echo  "<br>";
    // }
    ?>
  </div>
  <?php
  $db->close();
  include('assets/partials/studentfooter.php') ?>