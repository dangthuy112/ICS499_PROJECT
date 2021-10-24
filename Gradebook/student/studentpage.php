
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
$sid = 9; //try student id constant
include('studentheader.php');
include('studentmenu.php');
// $connection_string = 'mysql:host=localhost:3307;dbname=gradebook1';
// $user_name = 'student'; //testing
// $password = 'trungbasau123';
// $db = new PDO($connection_string, $user_name, $password);
$connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "studentgradebook");
if ($connection-> connect_error) {
    die("Connection Failed:". $connection-> connect_error);
}

$sql = "SELECT students.fullname From students WHERE students.StudentID='$sid'";
$result = $connection->query($sql);
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