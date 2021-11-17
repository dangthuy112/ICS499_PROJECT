<?php
// sql command to get add the data from the announcement and course table
// base on the course id
$sql = "SELECT * FROM announcement ,courses
WHERE announcement.courseID_ann=courses.courseID 
AND courses.courseID='$courseid'
ORDER BY date";
$result = mysqli_query($db, $sql);
echo "<div class='padtable'> ";
//Present the information about the announcement of the course 
if ($result->num_rows > 0) {
  echo "<br><br>
        <table style='border= 1px solid black;margin-left: auto; margin-right: auto;'>
          <tr>
            <th style='border-bottom: 2px solid black'>Announcmenr ID </th>
            <th style='border-bottom: 2px solid black'>Course ID</th>
            <th style='border-bottom: 2px solid black'>Course Name</th>
            <th style='border-bottom: 2px solid black'>Announcement</th>
            <th style='border-bottom: 2px solid black'>Date</th>  
            <form action='add-announcement.php?course=$course&iid=$iid&courseid=$courseid'
              method='POST'>
              <th style='border-bottom: 2px solid black'>
            <input type='submit' name='grade' style='background-color:green;' value='New Announcement'>
            </th>
            </form>
          </tr>";
  //presenting the rows 
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<form action='modify-announcement.php?course=$course&iid=$iid&courseid=$courseid&announcementid=$row[announcementID]&announcement=$row[announcement]
            &date=$row[date]'
             method='POST'>
             <tr>
            <td style='border-bottom: 2px: 2px solid black'>"
      . $row["announcementID"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["courseID_ann"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["subject"] . $row["coursenumber"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["announcement"] . "</td><td style='border-bottom: 2px: 2px solid black'>"

      . $row["date"] . "</td><td>
              <input type='submit' name='grade' style='background-color:yellow;' value='Modify The Announcement'>
              
              </form>
            <form action='delete-announcement.php?course=$course&iid=$iid&courseid=$courseid&announcementid=$row[announcementID]&announcement=$row[announcement]
            &date=$row[date]' method='POST'>
            <td><input type='submit' name='delete' style='background-color:red;' value='Delete'>
            </td></td>
            </form>
            </tr>
              
              ";
  }
  echo "</table>";
} else {
  echo "0 results";
}
echo "<div>";
