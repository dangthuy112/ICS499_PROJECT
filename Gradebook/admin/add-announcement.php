<?php

$database = require 'bootstrap.php';


$courses = $database->selectAll("courses");

if(isset($_POST['submit'])){
    
    $database->insert('announcement', [
        'courseID' => $_POST['courseID'],
        'instructorID' => 1,
        'announcement' => $_POST['announcement'],
    ]);

}

require 'add-announcement.view.php';   