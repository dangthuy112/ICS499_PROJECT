<link rel="stylesheet" href="assets/css/studentmenu.css">

<?php
session_start();
$sssid = $_SESSION['userID_student'];
$sid = strval($sssid);
//sql find out the course information base on the student id
$sql = "SELECT courses.courseID, courses.subject ,courses.coursenumber ,courses.semester
        From students ,courses ,student_enroll 
        WHERE students.StudentID=student_enroll.studentID_enroll 
        AND courses.courseID=student_enroll.courseID_enroll 
        AND students.studentID='$sid'";
        //geting needed information fo the student course
$result = mysqli_query($db, $sql);
$subjectname = [];
$courseid = [];
$coursenumber = [];
$semester = [];
//load the information of the courses then present them later
while ($row = mysqli_fetch_array($result)) {
    $subjectname[] = $row['subject'];
    $courseid[] = $row['courseID'];
    $coursenumber[] = $row['coursenumber'];
    $semester[] = $row['semester'];
}
//show the courses name with dropdown table
echo
"<div class='menu text-center'>
              <div class='dropdown'>  
                <a >Course</a>
                <div class='dropdown-content'>";
for ($x = 0; $x < count($subjectname); $x++) {
    if ($semester[$x] == 'Current Semester') {
        echo "<a  href='./studentcourse.php?course=$subjectname[$x]&courseid=$courseid[$x]&sid=9'>$subjectname[$x]$coursenumber[$x]</a><br>";
    }
}
echo
" </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?sid=9'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";
?>