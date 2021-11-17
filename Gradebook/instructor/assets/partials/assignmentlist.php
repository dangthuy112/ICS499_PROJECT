<?php
// sql command to get add the data from the assignment and course table
// base on the course id
$sql = "SELECT * FROM assignment ,courses
WHERE assignment.courseID_ass=courses.courseID
AND courses.courseID='$courseid' 
ORDER BY date";
$result = mysqli_query($db, $sql);
echo "<div class='padtable'> ";
//Present the information about the assignment of the course 
if ($result->num_rows > 0) {
  echo "<br><br>
        <table style='border= 1px solid black;margin-left: auto; margin-right: auto;'>
          <tr>
            <th style='border-bottom: 2px solid black'>Course Name</th>
            <th style='border-bottom: 2px solid black'>Assignment Name </th>
            <th style='border-bottom: 2px solid black'>Date</th>
            <th style='border-bottom: 2px solid black'>Content</th> 
            <form action='add-assignment.php?course=$course&iid=$iid&courseid=$courseid'
          method='POST'>
          <th style='border-bottom: 2px solid black'>
          <input type='submit' name='grade' style='background-color:green;' value='New Announcement'>
            </th>
            </form>
          </tr>";
  //presenting the rows 
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<form action='modify-assignment.php?course=$course&iid=$iid&courseid=$courseid&assignmentid=$row[assignmentID]&assignmentname=$row[assignmentname]
            &date=$row[date]
            &content=$row[content]'
             method='POST'>
             <tr>
            <td style='border-bottom: 2px: 2px solid black'>"

      . $row["subject"] . $row["coursenumber"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["assignmentname"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["date"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["content"] . "</td><td>
              <input type='submit' name='grade' style='background-color:yellow;' value='Modify The Announcement'>
              </td>
              </form>
              <form action='delete-assignment.php?course=$course&iid=$iid&courseid=$courseid&assignmentid=$row[assignmentID]&assignmentname=$row[assignmentname]
            &date=$row[date]
            &content=$row[content]'
            method='POST'><td>
            <td><input type='submit' name='delete' style='background-color:red;' value='Delete'>
            </td></form>
              </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo "<div>";
