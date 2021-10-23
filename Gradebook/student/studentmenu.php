<link rel="stylesheet" href="assets/css/studentpage.css">
<style>
.dropdown {
  position: relative;
  display: inline-block;
  background-color: lightblue;
  padding: 20px;
  height: 10%;
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
    echo "<div class='menu text-center'>
              <div class='dropdown'>  
                <a >Course</a>
                <div class='dropdown-content'>";
                $counter=0;
                foreach ($subjectname as $value) {
                    echo "<a  href='./studentcourse.php?course=$value&sid=9'>$value</a>";
                    }
                
                echo " </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?sid=9'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";    
  ?>

 