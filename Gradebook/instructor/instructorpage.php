<link rel="stylesheet" href="assets/css/header.css">
<?php
include("assets/partials/config.php");
session_start();
$iid = $_SESSION['userID_instructor'];
$stringiid = strval($iid);
$sql = "SELECT *
FROM instructors 
WHERE instructors.instructorID='$stringiid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$instructorname=$row['fullname'];
$_SESSION['instructorname'] = $instructorname;
echo"<div class='header1'>
    <a style='font-size:50px; text-align:center; color:white;text-decoration: none' 
    href='./instructorpage.php'> The Student Grade Book</a><br>
    <p class='bold'> Hello instructor $instructorname. Welcome to Student Grade Book<p>
    </div>";
include('assets/partials/instructormenu_2.php');
?>
<link rel="stylesheet" href="assets/css/instructorpage.css">
<div class="padtable">
</div>
<?php
$db->close();
include('assets/partials/footer.php') ?>
