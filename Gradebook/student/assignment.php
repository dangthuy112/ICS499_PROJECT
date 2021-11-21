<?php
//geting needed information fo the student course
$sid = $_GET['sid'];
$courseid = $_GET['courseid'];
$instructorid = $_GET['instructorid'];
// attached connection file , header file, and manu file 
include('assets/partials/config.php');
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');

//sql find out the  note lable is new and change it to old since the student 
//already see all the new  assignment at this page.
$notesql = "SELECT * FROM note WHERE note.studentID_note='$sid' AND note.courseID_note='$courseid'";
$notes = mysqli_query($db, $notesql);
while ($row = mysqli_fetch_array($notes)) {
      if ($row['badge'] == 'New' && $row['note_type'] == 'assignment') {
            $update = "UPDATE note SET badge ='Old' WHERE note.noteID = $row[noteID]";
            $result = mysqli_query($db, $update);
      }
}
//Sql command to find all the information of the assignment table base on student id 
$sql = "SELECT * FROM assignment 
WHERE assignment.courseID_ass=$sid";
$result = mysqli_query($db, $sql);
?>
<link rel="stylesheet" href="assets/css/assignment.css">
<label style="font-size: 50px;margin-left: 35%;">Assignment Page</label>
<div class="padtable">
      <?php
      //present all the information about the assignments of the course.
      while ($row = mysqli_fetch_array($result)) {
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