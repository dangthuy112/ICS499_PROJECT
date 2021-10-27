<?php
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
include('assets/partials/config.php');
$sql="SELECT* FROM grades WHERE grades.studentID_grade='$sid' and grades.courseID_grade='$courseid'and grades.instructorID_grade='$instructorid'";
$result = mysqli_query($db, $sql);
$subjectname = [];
$courseid = [];
$coursenumber = [];
while ($row = mysqli_fetch_array($result)) {
    $subjectname[] = $row['subject'];
    $courseid[] = $row['courseID'];
    $coursenumber[] = $row['coursenumber'];
}

?>
<link rel="stylesheet" href="assets/css/gradelist.css">
<div class="padtable">
  <div class="titlebar">
    <b style="margin-right: 50%;margin-left:5%;">Grade Section</b>
    <b style="margin-right: 10%;">Grade</b>
    <b>Feedback</b>
  </div>
  <div class="gradetable">
    <b style="margin-right: 50%;margin-left:5%;">Assignment :</b>
      <br>
      <br>
      <br>
      <br>
    <b style="margin-right: 50%;margin-left:5%;">Quizz :<b>
        <br>
        <br>
        <br>
        <br>
    <b style="margin-right: 50%;margin-left:5%;">Class Activities : </b>
      <br>
      <br>
      <br>
      <br>
  </div>
</div>
<?php
$db->close();

include('assets/partials/studentfooter.php') ?>
