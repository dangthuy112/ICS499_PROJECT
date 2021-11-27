<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets\css\coursedetail.css">
</head>
<?php
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
$courseid = $_GET['courseid'];
//sql get all the data from the course table base on course ID
//$sql = "SELECT * FROM `courses` WHERE courseID='$courseid'";
$sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
c.semester, c.days, c.time, c.location,
c.`delivery method`, i.fullname
FROM courses c
LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i
ON ie.instructorID_enroll=i.instructorID)
ON c.courseID=ie.courseID_enroll WHERE c.courseID=$courseid
";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!-- List and print all the Course Detail to the base in a formal form -->
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
    <?php echo "  <p class='header'>" . $row["fullname"] .
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
      <input type="submit" name="Withdraw" value="Withdraw">
    </div>
  </form>
</div>
<!-- Actionlistener whenever the withdraw was clicked we will remove the courseid to the instructor_enroll
with the recent instructorID -->
<?php
if (isset($_POST['Withdraw'])) {
  $sql = "SELECT * from instructor_enroll 
  WHERE instructor_enroll.instructorID_enroll='$iid' 
  AND instructor_enroll.courseID_enroll='$courseid'";
  $result =   mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  echo $result->num_rows;
  if ($result->num_rows > 0) {
    $delete = "DELETE FROM instructor_enroll WHERE instructor_enroll.instructorID_enroll='$iid' 
    AND instructor_enroll.courseID_enroll='$courseid'";
    $process =  mysqli_query($db, $delete);
    echo "The course is successfully withdraw";
  }
}
?>


<?php
$db->close();
include('assets/partials/footer.php') ?>
</body>

</html>