
  <?php

    global $sid;//try student id constant
    $GLOBALS['sid']=9;
    static $subid=0;
    static $logoutlink="logout.php";
    static $courselink;"studentcourse.php";
    include('studentmenu.php'); 
    $connection_string= 'mysql:host=localhost:3307;dbname=gradebook1';
    $user_name='student'; //testing
    $password = 'trungbasau123'; 
    $db = new PDO($connection_string, $user_name, $password);
    echo "Connected to DB123</br>";
    
    ?>
     <link rel="stylesheet" href="assets/css/studentpage.css">

   
        <!-- admin manage section-->
        
        <div class="announcementtable">
         <b>ANNOUNCEMENT</b>
         <table style="width:100%">
            <tr>
              <th>Date</th>
              <th>Announcement</th>
            </tr>
            <tr>
              <td>today</td>
              <td>test1</td> 
            </tr>
            <tr>
                <td>tomorrow</td>
                <td>test2</td> 
              </tr>
          </table>
        </div>
        <?php
        include('studentfooter.php'); 
        ?>