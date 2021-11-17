<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets\css\coursedetail.css">
</head>
<?php
$sid = $_GET['sid'];
$courseid = $_GET['courseid'];
// attached connection file , header file, and manu file 
include("assets/partials/config.php");
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
$courseid = $_GET['courseid'];
//sql find out the  course information base on course id
$sql = "SELECT * FROM `courses` WHERE courseID='$courseid'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
//presenting the course details  information 
?>
<div class="coursenameContainer">
  <?php echo " <coursename class='coursename'>" . $row["coursename"] . "</coursename>"; ?>
</div>



<div class="container">
  <div class="floatdiv">
    <b>ID# <br></b>
    <?php echo "<p class='header'>" . $row["courseID"] . "</p>"; ?>
  </div>
  <div class="floatdiv">
    <b>Title <br></b>
    <?php echo "<p class='header'>" . $row['coursename'] . "</p>"; ?>
  </div>
  <div class="floatdiv">
    <b>Dates<br></b>
    <?php echo "<p class='header'>" . $row["days"] . "<br>
      </p>"; ?>
  </div>
  <div class="floatdiv">
    <b>Time<br></b>
    <?php echo "<p class='header'>" . $row["time"] . "<br>
      </p>"; ?>
  </div>
  <div class="floatdiv">
    <b>Status<br></b>
    <?php echo "<p class='header'>Available
      </p>"; ?>
  </div>
  <div class="floatdiv">
    <b>Instructor<br></b>
    <?php echo "  <p class='header'>" . $row["Instructor"] .
      "</p>"; ?>
  </div>
</div>
</div>





<div>
  <label class="label" for="grade"><b>Meeting Details</b></label>
  <input>
  <label class="label" for="assig"><b>Assignment</b></label>
  <input>
  <label for="actv"><b>Location Details</b></label>
  <input>
  <label class="label" for="grade"><b>Seat Availability</b></label>
  <input>
  <label class="label" for="assig"><b>Restrictions</b></label>
  <input>

</div>
<div class="container">
  <form action="" method="POST">
    <div class="divcenter">
      <input type="submit" name="signup" value="Sign up">
    </div>
  </form>
</div>
<?php
// Listener action whenever signup button clicked will process add the course to the student course list
if (isset($_POST['signup'])) {
  // sql to find the course if already signup by the student or not 
  $sql = "SELECT * from student_enroll WHERE student_enroll.studentID_enroll='$sid' and student_enroll.courseID_enroll='$courseid'";
  $result =   mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  // if the course already signed up do nothing and print out the note
  if ($result->num_rows > 0) {
    echo "You are already sign up for this course please find another course";
  }
  //if the course has not signed up by student yet it will excecute the sql add the student_enroll table.
  elseif ($result->num_rows == 0) {
    $insert = "INSERT INTO student_enroll(studentID_enroll, courseID_enroll) VALUES ('$sid', '$courseid');";
    $process =  mysqli_query($db, $insert);
    echo " The course is successfully add";
  }
}
?>


<?php
$db->close();
include('assets/partials/studentfooter.php') ?>





</body>

</html>