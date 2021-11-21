<head><link rel="stylesheet" href="assets/css/seachforacourse.css">
</head>
<?php
// attached connection file , header file, and manu file
$sid = $_GET['sid'];
include('assets/partials/config.php');
$sql = "SELECT courses.subject  FROM courses GROUP BY courses.subject HAVING COUNT(*)>1";
$result = mysqli_query($db, $sql);
$subject = [];
while ($row = mysqli_fetch_assoc($result)) {
  $subject[] = $row['subject'];
}
include('assets/partials/studentheader.php');
include('assets/partials/studentmenu.php');
//present the all the course already signed up by the student in Next Semester
?>
<div class="padtable">
  <?php include('assets/partials/coursesignedup.php'); ?>
<!-- Present the Seaching Table with options. -->
  <div class="middlediv">
    <form action="" method="POST">
      <table>
        <tr>
          <th>
            <div class="divcenter">
              <b>Seach For A Course </b>
            </div>
          </th>
        </tr>
        <tr>
          <td><b>Subject</b></td>
          <td><select name="subject">
              <option value="Select"></option>
              <?php
              for ($x = 0; $x < count($subject); $x++) {
                echo "<option >$subject[$x]</option>";
              }
              ?>
              <option value="Any">Any</option>
            </select>
          </td>
        </tr>

        <tr>
          <td><b>Semester</b></td>
          <td>
            <select name="semester">
              <option value="Select"></option>
              <option value="Current Semester">Current Semester</option>
              <option value="Next Semester">Next Semester</option>
              <option value="Any">Any</option>
            </select>
          </td>
          <br>
        </tr>
        <tr>
          <th>
          <td>
            <div class="divcenter"><input type="submit" name="submit" value="Search"></div>
          </td>
          </th>
        </tr>
      </table>
    </form>
  </div>

  <?php
  //Action listenter when ever submit is clicked it will take the user input about the course
  //they want to search and use that for sql command to list all the course matching up
  if (isset($_POST['submit'])) {
    $sem = $_POST['semester'];
    $sbj = $_POST['subject'];
    $sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
            c.semester, c.days, c.time, c.location,
            c.`delivery method`, i.fullname
            FROM courses c
            LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i
            ON ie.instructorID_enroll=i.instructorID)
            ON c.courseID=ie.courseID_enroll WHERE c.subject='$sbj' and c.semester='$sem'";
    if ($sem == "Any" && $sbj != "Any") {
      $sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
              c.semester, c.days, c.time, c.location,
              c.`delivery method`, i.fullname
              FROM courses c
              LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i
              ON ie.instructorID_enroll=i.instructorID)
               ON c.courseID=ie.courseID_enroll WHERE c.subject='$sbj'";
    } elseif ($sem != "Any" && $sbj == "Any") {
      $sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
              c.semester, c.days, c.time, c.location,
              c.`delivery method`, i.fullname
              FROM courses c
              LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i
              ON ie.instructorID_enroll=i.instructorID)
              ON c.courseID=ie.courseID_enroll WHERE c.semester='$sem'";
    } elseif ($sem == "Any" && $sbj == "Any") {
      $sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
              c.semester, c.days, c.time, c.location,
              c.`delivery method`, i.fullname
              FROM courses c
              LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i
              ON ie.instructorID_enroll=i.instructorID)
              ON c.courseID=ie.courseID_enroll";
    }

    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
      echo "<br><br>
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

          . $row["fullname"] . "</td><td style='border: 2px solid black'><a  href='./coursedetail.php?sid=$sid&courseid=$courseid'>"


          . $row["coursename"] . "</a></td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  }
  ?>
</div>
</div>
<?php
$db->close();
include('assets/partials/studentfooter.php');

?>