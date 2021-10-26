<link rel="stylesheet" href="assets/css/studentmenu.css">

<?php
include("config.php");
session_start();
$sid = $_SESSION['userID_student']; //try student id constant
$sidstring = strval($sid);
$sql = "SELECT courses.courseID, courses.subject ,courses.coursenumber 
        From students ,courses ,student_enroll 
        WHERE students.StudentID=student_enroll.studentID_enroll 
        AND courses.courseID=student_enroll.courseID_enroll 
        AND students.studentID=$sid";
$result = mysqli_query($db, $sql);
$subjectname = [];
$courseid = [];
$coursenumber = [];
while ($row = mysqli_fetch_array($result)) {
    $subjectname[] = $row['subject'];
    $courseid[] = $row['courseID'];
    $coursenumber[] = $row['coursenumber'];
}
echo
"<div class='menu text-center'>
              <div class='dropdown'>  
                <a >Course</a>
                <div class='dropdown-content'>";
for ($x = 0; $x < count($subjectname); $x++) {

    echo "<a  href='./studentcourse.php?course=$subjectname[$x]&courseid=$courseid[$x]&sid=9'>$subjectname[$x]$coursenumber[$x]</a><br>";
}
echo
" </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?sid=9'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";
?>