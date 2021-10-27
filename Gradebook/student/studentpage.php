
<?php
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');

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
  </table>
</div>
<?php
$db->close();

include('assets/partials/studentfooter.php') ?>
