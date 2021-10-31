<?php

$database = require 'bootstrap.php';

if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
    // This session already exists, should already contain data
    # echo "User ID Username: ", $_SESSION['username'], "<br />";
    # echo "User ID Password: ", $_SESSION['password'], "<br />";
    # echo "User ID: ", $_SESSION['userID'], "<br />";
} else {
    // No Session Detected. Redirect to login page.

    header("Location: ../login.php");
}

$courses = $database->selectAll("courses");

if(isset($_POST['submit'])){
    
    $database->insert('announcement', [
        'courseID' => $_POST['courseID'],
        'instructorID' => 1,
        'announcement' => $_POST['announcement'],
    ]);

}

require 'add-announcement.view.php';   