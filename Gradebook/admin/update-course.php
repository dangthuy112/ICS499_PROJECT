<?php
include('assets/partials/menu.php');

session_start();
ob_start();

if ((isset($_SESSION['username'])) && (isset($_SESSION['password']))) {
    // This session already exists, should already contain data
    # echo "User ID Username: ", $_SESSION['username'], "<br />";
    # echo "User ID Password: ", $_SESSION['password'], "<br />";
    # echo "User ID: ", $_SESSION['userID'], "<br />";
} else {
    // No Session Detected. Redirect to login page.

    header("Location: ../login.php");
}

//start mysql connection
$connection = mysqli_connect("localhost", "root", "", "ics499");
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}

//grab ID from url
$courseID = $_GET['id'];

//sql to query id information
$sql = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
                        c.semester, c.days, c.time, c.location,
                        c.`delivery method`, i.instructorID ,i.fullname
                        FROM courses c
                        LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i 
                                   ON ie.instructorID_enroll=i.instructorID) 
                        ON c.courseID=ie.courseID_enroll
                        WHERE c.courseID=$courseID";

$result = $connection->query($sql);
$rows = mysqli_fetch_assoc($result);

//set data to variables
$subject = $rows['subject'];
$coursename = $rows['coursename'];
$coursenumber = $rows['coursenumber'];
$semester = $rows['semester'];
$days = $rows['days'];
$location = $rows['location'];
$deliverymethod = $rows['delivery method'];
$fullname = $rows['fullname'];
$instructorID = $rows['instructorID'];

//split time string
$time_arr = explode("-", $rows['time']);
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Update Course</h1>
        <br></br>
        <input type="button" onclick="location.href = 'assign-instructor.php?id=<?php echo$courseID; ?>'" 
               value="Assign Instructor" class="btn-primary">
        <!--form for updating instructor-->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>
                        Subject: 
                    </td>
                    <td> 
                        Currently: <?php echo "<b>$subject</b>" ?><br>
                        <select name="subject" required> 
                            <option value="" disabled selected>Choose Option</option>
                            <option value="BIOL">Biology (BIOL)</option>
                            <option value="CHEM">Chemistry (CHEM)</option>
                            <option value="CYBR">Cybersecurity (CYBR)</option>
                            <option value="ECON">Economics (ECON)</option>
                            <option value="ESOL">English for Speakers of other Languages (ESOL)</option>
                            <option value="ICS">Information and Computer Sciences (ICS)</option>
                            <option value="HIST">History (HIST)</option>
                            <option value="LIT">Literature (LIT)</option>
                            <option value="MATH">Math (MATH)</option>
                            <option value="NURS">Nursing (NURS)</option>
                            <option value="PHYS">Physics (PHYS)</option>
                            <option value="PSYC">Psychology (PSYC)</option>
                            <option value="SSED">Social Studies Education (SSED)</option>
                            <option value="STAT">Statistics (STAT)</option>

                    </td>
                </tr>
                <tr> 
                    <td>Course Number: </td>
                    <td><input type="text" name="coursenumber" required value="<?php echo "$coursenumber"; ?>"></td>
                </tr>
                <tr> 
                    <td>Course Name: </td>
                    <td><input type="text" name="coursename" required value="<?php echo "$coursename"; ?>"></td>
                </tr>
                <tr>
                    <td>Instructor: </td>

                    <td> 
                        <?php
                        if ($instructorID == "") {
                            echo $instructorID = "<b>NONE</b>";
                        } else {
                            echo "<b>$instructorID" . " - " . "$fullname" . "</b>";
                        }
                        ?>
                        <br>                      
                    </td>
                </tr>
                <tr> 
                    <td>Semester: </td>
                    <td><input type="text" name="semester" required value="<?php echo "$semester"; ?>"></td>
                </tr>
                <tr> 
                    <td>Location: </td>
                    <td><input type="text" name="location" required value="<?php echo "$location"; ?>"></td>
                </tr>
                <tr>
                    <td>Days:
                    </td>
                    <td>
                        Currently: <?php echo "<b>$days</b>" ?><br>
                        <div class="weekDays-selector">
                            <input type="checkbox" name="day[]" value="M" id="M" class="weekday" />
                            <label for="M">M</label>
                            <input type="checkbox" name="day[]" value="T" id="T" class="weekday" />
                            <label for="T">T</label>
                            <input type="checkbox" name="day[]" value="W" id="W" class="weekday" />
                            <label for="W">W</label>
                            <input type="checkbox" name="day[]" value="TH" id="TH" class="weekday" />
                            <label for="TH">TH</label>
                            <input type="checkbox" name="day[]" value="F" id="F" class="weekday" />
                            <label for="F">F</label>
                            <input type="checkbox" name="day[]" value="S" id="S" class="weekday" />
                            <label for="S">S</label>
                            <input type="checkbox" name="day[]" value="SU" id="SU" class="weekday" />
                            <label for="SU">SU</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for =begintime>Select the Begin Time:</label> </td>
                    <td>
                        Currently: <?php echo "<b>$time_arr[0]</b>" ?><br>
                        <input type="time" id="begintime" name="begintime" 
                               min="06:00" max="22:00" required>
                    </td>
                </tr>
                <tr>
                    <td><label for =endtime>Select the End Time:</label> </td>
                    <td>
                        Currently: <?php echo "<b>$time_arr[1]</b>" ?><br>
                        <input type="time" id="endtime" name="endtime" 
                               min="06:00" max="22:00" required>
                    </td>
                </tr>
                <tr>
                    <td>Delivery Method: </td>
                    <td>Currently: <?php echo "<b>$deliverymethod</b>" ?> <br>
                        <select name="deliverymethod" required>
                            <option value=""disabled selected>Choose Option</option>
                            <option value="In Person">In Person</option>
                            <option value="Online">Online</option>
                            <option value="Hybrid">Hybrid</option>
                    </td>
                </tr>
            </table>
            <td colspan="2">
                <input type="submit" name="submit" value="Update Course" class="btn-primary">
            </td>
        </form>
    </div>
</div>

<?php include('config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    //grab values from post form
    $subject = $_POST['subject'];
    $coursenumber = $_POST['coursenumber'];
    $coursename = $_POST['coursename'];
    $semester = $_POST['semester'];
    $location = $_POST['location'];
    $deliverymethod = $_POST['deliverymethod'];

    //grab options from weekdays checkboxes
    $day_array = $_POST['day'];
    $days = "";

    //grab from array and add to $days
    foreach ($day_array as $day) {
        $days .= $day . " ";
    }

    //grab time and concatenate them
    $time = date("g:iA", strtotime($_POST['begintime'])) . " - " .
            date("g:iA", strtotime($_POST['endtime']));

    $sql_update_course = "UPDATE courses 
                                    SET subject='$subject',
                                        coursenumber='$coursenumber',
                                        coursename='$coursename',
                                        semester='$semester',
                                        location='$location',
                                        days='$days',
                                        time='$time',
                                        `delivery method`='$deliverymethod'
                                    WHERE courseID = $courseID";

    $result = $connection->query($sql_update_course) or die($connection->error);

    //test to see if operation was successful
    if ($result == true) {
        //success message if sql was successfully added
        $_SESSION['update'] = "Course Updated Successfully!";

        //redirect to the same page to show success message
        header('location: AdminManageCourse.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['update'] = "Course NOT Updated.";

        //redirect to the same page to show failure message
        header('location: AdminManageCourse.php');
    }
}
?>

<?php include('assets/partials/footer.php'); ?>


