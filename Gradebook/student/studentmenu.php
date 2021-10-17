<link rel="stylesheet" href="assets/css/studentpage.css">;
<style>
.dropdown {
  position: relative;
  display: inline-block;
  border-bottom: 1px solid grey;
  background-color: blue;
  padding: 20px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown a{
    text-decoration: none;
    font-weight: bold;
    color:red;
    margin-right: 100px;
    
}
.dropdown a:hover{
    color: red;
}
.a{
    text-decoration: none;
    font-weight: bold;
    color:red;
    margin-right: 100px;
    
}
.a:hover{
    color: red;
}
</style>
<?php   
        // static $sid= 9;//try student id constant
        // static $subid=0;  
        $user_name='student'; //testing
        $password = 'trungbasau123'; 
        $connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "gradebook1");
        if ($connection-> connect_error) {
            die("Connection Failed:". $connection-> connect_error);
        }
        $sql = "SELECT subjects.subid, subjects.name From students ,subjects , ss WHERE students.sid=ss.studentid_ssid AND subjects.subid=ss.subjectid_ssid AND students.sid=$sid";
        $result = $connection->query($sql);
        $subjectname = [];
        $subjectid = [];
        while($row = mysqli_fetch_assoc($result)) 
    {
        $subjectname[] = $row['name'];
        
    }
    echo '<div class="menu text-center">
              <div class="dropdown">  
                <a  href="studentcourse.php">Course</a>
                <div class="dropdown-content">';
                $counter=0;
                foreach ($subjectname as $value) {

                $sql = "SELECT * From subjects  WHERE subjects.name='$value'";
                 $result1 = $connection->query($sql);
                 while($row = mysqli_fetch_assoc($result1)) 
                 {
                     $subjectid[] = $row['subid'];
                 }
                  $subid=$subjectid[0];
                
                    echo "<a  href='studentcourse.php'>$value</a>";
                     
                    }
                
                echo ' </div>
                 </div>
                 <a class="a" href="searchforacourse.php">Search For A Course</a>
                 <a class ="a" href="logout.php">Logout</a>
        </div>';

?>

 