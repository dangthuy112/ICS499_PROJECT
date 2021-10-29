<?php
$sid = $_GET['sid'];
include('assets/partials/config.php');

$sql = "SELECT * FROM (SELECT student_enroll.courseID_enroll 
FROM student_enroll WHERE student_enroll.studentID_enroll=$sid) 
AS temptable ,courses WHERE courses.semester='Next Semester' 
AND courses.courseID=temptable.courseID_enroll";
$result = mysqli_query($db,$sql);
// $subject = [];
// while ($row = mysqli_fetch_assoc($result)) {
//   $subject[] = $row['subject'];
// }

$result = mysqli_query($db,$sql);
    if ($result->num_rows > 0) {
        echo "<h2 style='text-align: center;color:red;'>THE COURSE SINGED UP FOR NEXT SEMESTER <h2>";
      echo "
        <table style='border= 1px solid black;margin-left: auto; margin-right: auto;'>
          <tr>
            <th style='border: 2px solid black'>CouseID</th>
            <th style='border: 2px solid black'>Subject</th>
            <th style='border: 2px solid black'>Couse Number</th>
            <th style='border: 2px solid black'>Semester</th>
            <th style='border: 2px solid black'>Days</th>
            <th style='border: 2px solid black'>Location</th>
            <th style='border: 2px solid black'>Delivery Method</th>
            <th style='border: 2px solid black'>Time</th>
            <th style='border: 2px solid black'>Intructor</th>
            <th style='border: 2px solid black'>Course Name</th>
          </tr>";
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['courseID'];
        $courseid = strval($id);
        echo "<tr>
        <td style='border: 2px solid black'>"
          . $row["courseID"] . "</td><td style='border: 2px solid black'>"

          . $row["subject"] . "</td><td style='border: 2px solid black'>"

          . $row["coursenumber"] . "</td><td style='border: 2px solid black'>"

          . $row["semester"] . "</td><td style='border: 2px solid black'>"

          . $row["days"] . "</td><td style='border: 2px solid black'>"

          . $row["location"] . "</td><td style='border: 2px solid black'>"

          . $row["delivery method"] . "</td><td style='border:2px solid black'>"

          . $row["time"] . "</td><td style='border: 2px solid black'>"

          . $row["Instructor"] . "</td><td style='border: 2px solid black'><a  href='./coursessignedupdetail.php?sid=$sid&courseid=$courseid'>"

          .$row["coursename"] . "</a></td></tr>";
      }
      echo "</table><br>";
    } else {
      echo "0 results";
    }
  
?>