<link rel="stylesheet" href="assets/css/studentmenu.css">



<?php   
        include("config.php");
        if( (isset($_SESSION['username'])) && (isset($_SESSION['password'])) )
        {
          // This session already exists, should already contain data
           # echo "User ID Username from users table: ", $_SESSION['username'], "<br />";
           # echo "User ID Password from users table: ", $_SESSION['password'], "<br />";
          #  echo "User ID from users table: ", $_SESSION['userID'], "<br />";
          #  echo "userID_student from users table ", $_SESSION['userID_student'], "<br />";
        } else {
            // No Session Detected. Redirect to login page.
          
            header("Location: ../login.php");
        
        }
            
        
        $sql = "SELECT courses.courseID, courses.subject ,courses.coursenumber From students ,courses ,student_enroll WHERE students.StudentID=student_enroll.studentID_enroll AND courses.courseID=student_enroll.courseID_enroll AND students.studentID=$sid";
        $result = mysqli_query($db,$sql);
        $subjectname = [];
        $courseid = [];
        $coursenumber=[];
        while ($row = mysqli_fetch_array($result)) 
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

 