<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets\css\coursedetail.css">
</head>
<?php
$sid = $_GET['sid'];
$courseid= $_GET['courseid'];
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
$courseid = $_GET['courseid'];
include("assets/partials/config.php");
$sql = "SELECT * FROM `courses` WHERE courseID='$courseid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
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
  <!-- <button href="studentpage.html">Sign up</button> -->
  <div class="divcenter">
    
      <input type="submit" name="Withdraw" value="Withdraw" >
      <!-- <input onClick="href='studentpage.php?sid=$sid'" type="submit" Value="Go"> -->
    </div>
  </form>
</div>
<?php
 if (isset($_POST['Withdraw'])) 
 {
  
$sql="SELECT * from student_enroll 
WHERE student_enroll.studentID_enroll='$sid' 
AND student_enroll.courseID_enroll='$courseid'";
 $result =   mysqli_query($db,$sql);
 $row = mysqli_fetch_assoc($result);
 if($result->num_rows >0){
    $insert="DELETE FROM student_enroll WHERE student_enroll.studentID_enroll=$sid AND student_enroll.courseID_enroll=$courseid";
    $process=  mysqli_query($db,$insert);
    echo "The course is successfully withdraw";
   
 }
}
?>


<?php
$db->close();
include('assets/partials/studentfooter.php') ?>





</body>

</html>