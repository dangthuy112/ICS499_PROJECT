
<!-- <style>
.padtable{
  height: 70%;
  width: 100%;
  border: 1px solid black;
  display: inline-block;
  background-color: lightpink;

}
.middlediv{
  margin-left: 40%;
  height: fit-content;
  width: fit-content;
  border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px #888888;

}
</style> -->
<?php
include("config.php");
session_start();
    
if( (isset($_SESSION['username'])) && (isset($_SESSION['password'])) )
{
  // This session already exists, should already contain data
    #echo "User ID Username from users table: ", $_SESSION['username'], "<br />";
   # echo "User ID Password from users table: ", $_SESSION['password'], "<br />";
   # echo "User ID from users table: ", $_SESSION['userID'], "<br />";
   # echo "userID_student from users table ", $_SESSION['userID_student'], "<br />";
} else {
    // No Session Detected. Redirect to login page.
  
    header("Location: ../login.php");

}
    



$sid =$_SESSION['userID_student']; //try student id constant
include('studentheader.php');
include('studentmenu.php');


$sql = "SELECT students.fullname From students WHERE students.StudentID='$sid'";
$result = mysqli_query($db,$sql);
$subjectname = [];
$row = mysqli_fetch_assoc($result);
$studentname=$row['fullname'];
?>
<link rel="stylesheet" href="assets/css/studentpage.css">
<!-- admin manage section-->

<div class="padtable">
  <b>ANNOUNCEMENT</b>
  <table >
    <tr>
      <th>Date</th>
      <th>Announcement</th>
    </tr>
    <tr>
      <td>today</td>
      <?php echo "<td>Hello I am the student name $studentname and my student id is $sid</td>"?>;
    </tr>
    <!-- <tr>
      <td>tomorrow</td>
      <td>test2</td>
    </tr> -->
  </table>
</div>
<?php
include('studentfooter.php');
?>