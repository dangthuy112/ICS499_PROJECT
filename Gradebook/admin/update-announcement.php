<?php

$database = require 'bootstrap.php';

$announcementId = $_GET['id'];

$record = $database->selectOne('announcement', $announcementId);
$courses = $database->selectAll("courses");

if(isset($_POST['submit'])){
    
    $database->update('announcement', [
        'courseID' => $_POST['courseID'],
        'instructorID' => 1,
        'announcement' => $_POST['announcement'],
    ], $announcementId);
    
}

require 'update-announcement.view.php';   