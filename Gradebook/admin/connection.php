<?php
$connection_string= 'mysql:host=localhost;dbname=ics499';

$user_name='admin'; //testing
$password = 'password'; 

try{
    $db = new PDO($connection_string, $user_name, $password);
    echo "Connected to DB</br>";
} catch (PDOException $ex) {
    echo 'Connection Error: ' . $ex->getMessage();
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //code here
        ?>
    </body>
</html>