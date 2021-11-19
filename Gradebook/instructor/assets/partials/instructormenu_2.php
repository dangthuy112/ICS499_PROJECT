<link rel="stylesheet" href="assets/css/instructormenu.css">

<?php
//SQl command to get all the data from instructors and course table base on the instructorID
$sql = "SELECT *
FROM instructor_enroll,instructors,courses
WHERE instructors.instructorID=instructor_enroll.instructorID_enroll
AND courses.courseID=instructor_enroll.courseID_enroll
AND instructors.instructorID=$iid";
$result = mysqli_query($db, $sql);
//make option for instructor which are course assigned by that instructor , search for a new course , and log out
echo
"<div class='menu text-center'>
              <div class='dropdown'>  
                <a >Course Assigned</a>
                <div class='dropdown-content'>";
// dropdown content showing all the course belong to the instructor
while ($row = mysqli_fetch_array($result)) {
    if ($row['semester'] == 'Current Semester') {
        $courseID = $row['courseID'];
        $stringcourseID = strval($courseID);
        echo "<a  href='./instructor-course.php?coursenumber=$row[coursenumber]&course=$row[subject]&courseid=$row[courseID]&iid=$iid&option=0'>$row[subject]$row[coursenumber]</a><br>";
    }
}
echo
" </div>
                 </div>
                 <a class = 'a' href='searchforacourse.php?'>Search For A Course</a>
                 <a   class = 'a' href='logout.php'>Logout</a>
        </div>";
?>