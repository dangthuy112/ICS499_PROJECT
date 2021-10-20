<link rel="stylesheet" href="assets/css/styles.css">
<?php
//static $sid = 9;
// static $logoutlink="logout.php";
$sid=$_GET['sid'];
$connection_string = 'mysql:host=localhost:3307;dbname=gradebook1';
$user_name = 'student'; //testing
$password = 'trungbasau123';
$connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "gradebook1");
if ($connection->connect_error) {
  die("Connection Failed:" . $connection->connect_error);
}
include('studentheader.php');
include('studentmenu.php');
?>
<head></head>  
<title>Static Dropdown List</title>  
<div class ="padtable">
  <div class ="middlediv">
    <b>Seach For A Course </b>
<select>  
  <option value="Select">Subjects</option> 
  <option value="Vineet">Vineet Saini</option>  
  <option value="Sumit">Sumit Sharma</option>  
  <option value="Dorilal">Dorilal Agarwal</option>  
  <option value="Omveer">Omveer Singh</option>  
  <option value="Rohtash">Rohtash Kumar</option>  
  <option value="Maneesh">Maneesh Tewatia</option>  
  <option value="Priyanka">Priyanka Sachan</option>  
  <option value="Neha">Neha Saini</option>  
</select>   
<button>Search</button>
</div>
</div> 
 <?php
$connection->close();
include('studentfooter.php') ;
?>
       