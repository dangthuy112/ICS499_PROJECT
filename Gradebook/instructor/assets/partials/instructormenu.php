<link rel="stylesheet" href="assets/css/instructormenu.css">

<?php
session_start();
$iid = $_SESSION['userID_instructor']; //try student id constant
$stringiid = strval($iid);
$sql = "SELECT *
FROM instructor_enroll,instructors,courses
WHERE instructors.instructorID=instructor_enroll.instructorID_enroll
AND courses.courseID=instructor_enroll.courseID_enroll
AND instructors.instructorID=$stringiid";
$result = mysqli_query($db, $sql);
echo
"<div class='menu text-center'>
              <div class='dropdown'>  
                <a >Course Assigned</a>
                <div class='dropdown-content'>";
while ($row = mysqli_fetch_array($result)) {
    if ($row['semester'] == 'Current Semester') {
        $courseID=$row['courseID'];
        $stringcourseID=strval($courseID);

        echo "<a  href='./instructor-course.php?course=$row[subject]&courseid=$row[courseID]&iid=$stringiid&option=0'>$row[subject]$row[coursenumber]</a><br>";
    }
}
echo
" </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";
?>