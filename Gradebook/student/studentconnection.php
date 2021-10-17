<?php
$connection_string= 'mysql:host=localhost:3307;dbname=gradebook1';
$user_name='student'; //testing
$password = 'trungbasau123'; 

try{
    $db = new PDO($connection_string, $user_name, $password);
    echo "Connected to DB123</br>";
} catch (PDOException $ex) {
    echo 'Connection Error: ' . $ex->getMessage();
}

?>
