<?php
//sql command to get all the data of the table student and course base on the courseID
$sql = "SELECT * 
FROM students, courses,student_enroll 
WHERE student_enroll.courseID_enroll=courses.courseID
AND student_enroll.studentID_enroll=students.studentID
AND courses.courseID='$courseid'";
echo "<div class='padtable'> ";
    $result = mysqli_query($db, $sql);
    //List all the student who attended that course
    if ($result->num_rows > 0) {
      echo "<br><br>
        <table style='border= 1px solid black;margin-left: auto; margin-right: auto;'>
          <tr>
            <th style='border-bottom: 2px solid black'>StudentID</th>
            <th style='border-bottom: 2px solid black'>Full Name</th>
            <th style='border-bottom: 2px solid black'>Gender</th>
            <th style='border-bottom: 2px solid black'>Address</th>
            <th style='border-bottom: 2px solid black'>Instructor name</th>
            <th style='border-bottom: 2px solid black'>Course name</th>
          </tr>";
     //print out all the row information
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<form action='instructor-course.php?sid=$row[studentID]&name=$row[fullname]&coursenumber=$coursenumber&iid=$iid&course=$course&courseid=$courseid&option=4'
             method='POST'><tr>
            <td style='border-bottom: 2px: 2px solid black'>"
              . $row["studentID"] . "</td><td style='border-bottom: 2px: 2px solid black'>"
    
              . $row["fullname"] . "</td><td style='border-bottom: 2px: 2px solid black'>"
    
              . $row["gender"] . "</td><td style='border-bottom: 2px: 2px solid black'>"
    
              . $row["address"] . "</td><td style='border-bottom: 2px: 2px solid black'>"
    
              . $instructorname . "</td><td style='border-bottom: 2px: 2px solid black'>"
    
              . $row["coursename"] . "</td><td>
              <input type='submit' name='grade' style='background-color:red;' value='See and modify grade'>
              </td></tr>
              </form>";
            
              
          }
          echo "</table>";
        } else 
        {
          echo "0 results";
        }
        echo"<div>";      
        
?>
