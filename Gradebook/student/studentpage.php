<link rel="stylesheet" href="assets/css/styles.css">
<?php
$sid = 9; //try student id constant
include('studentheader.php');
include('studentmenu.php');
$connection_string = 'mysql:host=localhost:3307;dbname=gradebook1';
$user_name = 'student'; //testing
$password = 'trungbasau123';
$db = new PDO($connection_string, $user_name, $password);
?>
<link rel="stylesheet" href="assets/css/studentpage.css">


<!-- admin manage section-->

<div class="padtable">
  <b>ANNOUNCEMENT</b>
  <table style="width:100%">
    <tr>
      <th>Date</th>
      <th>Announcement</th>
    </tr>
    <tr>
      <td>today</td>
      <td>test1</td>
    </tr>
    <tr>
      <td>tomorrow</td>
      <td>test2</td>
    </tr>
  </table>
</div>
<?php
include('studentfooter.php');
?>