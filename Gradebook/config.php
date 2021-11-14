<?php
$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "ics499";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
?>