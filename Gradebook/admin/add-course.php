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

//connect to database
$connection = mysqli_connect("localhost", "root", "", "ics499");
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Add Course</h1>
        <br></br>
        <?php
        if (isset($_SESSION['add'])) {
            echo "<b>" . $_SESSION['add'] . "</b>";
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Subject: </td>
                    <td><select name="subject" required>
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
                    <td><input type="text" name="coursenumber" placeholder="Enter Course Number" required></td>
                </tr>
                <tr>
                    <td>Course Name: </td>
                    <td><input type="text" name="coursename" placeholder="Enter Course Name" required> </td>
                </tr>
                <tr>
                    <td>Semester: </td>
                    <td><input type="text" name="semester" placeholder="Enter Semester" required></td>
                </tr>
                <tr>
                    <td>Location: </td>
                    <td><input type="text" name="location" placeholder="Enter Location" required></td>
                </tr>
                <tr>
                    <td>
                        Days: <br>
                    </td>
                    <td>
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
                    <td><input type="time" id="begintime" name="begintime" 
                               min="06:00" max="22:00" required></td>
                </tr>
                <tr>
                    <td><label for =endtime>Select the End Time:</label> </td>
                    <td><input type="time" id="endtime" name="endtime" 
                               min="06:00" max="22:00" required></td>
                </tr>
                <tr>
                    <td>Delivery Method: </td>
                    <td><select name="deliverymethod" required>
                            <option value="" disabled selected>Choose Option</option>
                            <option value="In Person">In Person</option>
                            <option value="Online">Online</option>
                            <option value="Hybrid">Hybrid</option>
                    </td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Course" class="btn-primary">
                </td>
            </table>
        </form>
    </div>
</div>

<?php
include('assets/partials/footer.php');

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

    $sql_insert_course = "INSERT into courses SET
                                        subject='$subject',
                                        coursenumber='$coursenumber',
                                        coursename='$coursename',
                                        semester='$semester',
                                        location='$location',
                                        days='$days',
                                        time='$time',
                                        `delivery method`='$deliverymethod'";

    //collect result after querying into database
    $result = $connection->query($sql_insert_course) or die($connection->error);

    //Get last insert id 
    if ($result == true) {
        //echo "New record created successfully";
        //success message if sql was successfully added
        $_SESSION['add'] = "Course Added Successfully!";

        //redirect to the same page to show success message
        header('location: add-course.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['add'] = "Course NOT Added.";

        //redirect to the same page to show failure message
        header('location: add-course.php');
    }
}