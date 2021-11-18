<link rel="stylesheet" href="assets/css/header.css">
<?php
include("config.php");
session_start();
$iid = $_SESSION['userID_instructor'];
$stringiid = strval($iid);
include("assets/partials/config.php");
$sql = "SELECT *
FROM instructors 
WHERE instructors.instructorID='$iid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$instructorname=$row['fullname'];
echo"<div class='header1'>
    <a style='font-size:50px; text-align:center; color:white;text-decoration: none' 
    href='./instructorpage.php'> The Student Grade Book</a><br>
     <p class='bold'> Hello instrcutor $instructorname. Welcome to Student Grade Book<p>
  </div>";
include('assets/partials/instructormenu.php');
?>
<link rel="stylesheet" href="assets/css/instructorpage.css">
<div class="padtable">
</div>
<?php
$db->close();
include('assets/partials/footer.php') ?>
