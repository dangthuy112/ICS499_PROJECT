<link rel="stylesheet" href="assets/css/studentmenu.css">



<?php   

        $user_name='student'; //testing
        $password = 'trungbasau123'; 
        $connection = mysqli_connect("localhost:3307", "student", "trungbasau123", "studentgradebook");
        if ($connection-> connect_error) {
            die("Connection Failed:". $connection-> connect_error);
        }
        
        $sql = "SELECT courses.courseID, courses.subject ,courses.coursenumber From students ,courses ,student_enroll WHERE students.StudentID=student_enroll.studentID_enroll AND courses.courseID=student_enroll.courseID_enroll AND students.studentID=$sid";
        $result = $connection->query($sql);
        $subjectname = [];
        $courseid = [];
        $coursenumber=[];
        while($row = mysqli_fetch_assoc($result)) 
    {
        $subjectname[] = $row['subject'];
        $courseid[]= $row['courseID'];
        $coursenumber[]=$row['coursenumber'];
        
    }
    echo "<div class='menu text-center'>
              <div class='dropdown'>  
                <a >Course</a>
                <div class='dropdown-content'>";
                for ($x = 0; $x < count($subjectname); $x++) {
                
                    echo "<a  href='./studentcourse.php?course=$subjectname[$x]&courseid=$courseid[$x]&sid=9'>$subjectname[$x]$coursenumber[$x]</a><br>";
                  
                }
                echo " </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?sid=9'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";    
  ?>

 