<?php
$connection_string= 'mysql:host=localhost:3307;dbname=ics499';
$user_name='admin'; //testing
$password = 'password'; 

try{
    $db = new PDO($connection_string, $user_name, $password);
    echo "Connected to DB123</br>";
} catch (PDOException $ex) {
    echo 'Connection Error: ' . $ex->getMessage();
}

?>
