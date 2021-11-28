<link rel="stylesheet" href="assets/css/studentmenu.css">

<?php
//sql find out the course information base on the student id
$sql = "SELECT *
        From students ,courses ,student_enroll 
        WHERE students.StudentID=student_enroll.studentID_enroll 
        AND courses.courseID=student_enroll.courseID_enroll 
        AND students.studentID='$sid'";
//geting needed information fo the student course
$result = mysqli_query($db, $sql);
//show the courses name with dropdown table
echo
"<div class='menu text-center'>
              <div class='dropdown'>  
                <a style='margin-right: 100px;'>Course</a>
                <div class='dropdown-content'>";
while ($row = mysqli_fetch_array($result)) {
    if ($row['semester'] == 'Current Semester') {
        echo "<a  href='./studentcourse.php?coursenumber=$row[coursenumber]&coursename=$row[coursename]&coursesubject=$row[subject]&courseid=$row[courseID]&sid=$sid'>$row[subject] $row[coursenumber] : $row[coursename]</a><br>";
    }
}
echo
" </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?sid=$sid'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";
?>