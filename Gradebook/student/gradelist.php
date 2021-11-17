<?php
// attached connection file , header file, and manu file 
include('assets/partials/config.php');
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
//geting needed information fo the student course
$sssid = $_GET['sid'];
$sscourseid = $_GET['courseid'];
$ssinstructorid = $_GET['instructorid'];
$sid = strval($sssid);
$courseid = strval($sscourseid);
$instructorid = strval($ssinstructorid);
//sql find out the  note lable is new and change it to old since the student 
//already see all the new  assignment at this page.
$notesql = "SELECT * FROM note WHERE note.studentID_note='$sid' AND note.courseID_note='$courseid'";
$notes = mysqli_query($db, $notesql);

while ($row = mysqli_fetch_array($notes)) {
  if ($row['badge'] == 'New' && $row['note_type'] == 'gradelist') {
    $update = "UPDATE note SET badge ='Old' WHERE note.noteID = $row[noteID]";
    $result = mysqli_query($db, $update);
  }
}
//Sql command to find all the information of the gradelist table base on student id 
$sql = "SELECT* FROM grades 
WHERE grades.studentID_grade='$sid' 
AND grades.courseID_grade='$courseid' 
";
$result = mysqli_query($db, $sql);

//present all the information about the gradelist of the course
?>
<link rel="stylesheet" href="assets/css/gradelist.css">
<div class="padtable">
  <div class="titlebar">
    <b style="margin-right: 43%;">Grade Section</b>
    <b style="margin-right: 18%;">Grade</b>
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

  </div>
  <?php
  $db->close();
  include('assets/partials/studentfooter.php') ?>