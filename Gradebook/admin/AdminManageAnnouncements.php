<?php

$database = require 'bootstrap.php';


$announcements = $database->selectAll("announcement");

if( isset( $_POST['delete'] ) ) {
    $database->delete('announcement', $_POST['id']);
}

require 'annaouncement.view.php';   