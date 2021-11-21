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

//boolean to see whether instructor is assigned already
$instructor_assigned = false;
$instructor_name;
$instructorID;

//sql to query id information
$sql_instructor_assigned = "SELECT c.courseID, c.subject, c.coursenumber, c.coursename,
                        c.semester, c.days, c.time, c.location,
                        c.`delivery method`, i.instructorID, i.fullname
                        FROM courses c
                        LEFT JOIN (`instructor_enroll` ie INNER JOIN instructors i 
                                   ON ie.instructorID_enroll=i.instructorID) 
                        ON c.courseID=ie.courseID_enroll
                        WHERE c.courseID=$courseID";

$assigned = $connection->query($sql_instructor_assigned);
$rows = mysqli_fetch_assoc($assigned);


if ($rows['instructorID'] != "") {
    $instructor_assigned = true;
    $instructor_name = $rows['fullname'];
    $instructorID = $rows['instructorID'];
}

    $sql_all_instructors = "SELECT fullname, instructorID
                            FROM instructors";

$instructor_result = $connection->query($sql_all_instructors);
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Assign Instructor</h1>
        <br></br>

        <!--form for updating instructor-->
        <form action="" method="POST">
            <table class="tbl-30">
                <?php
                if ($instructor_assigned) {
                    echo "<tr><b>This Course is Currently Assigned to: "
                    . $instructorID . " - " . $instructor_name . "</b></tr>";
                } else {
                    echo "<tr><b><u>This Course has not been Assigned yet</u></b></tr>";
                }
                ?>
                <tr>
                    <td>
                        Subject: 
                    </td>
                    <td> 
                        <select name="categories">
                            <?php
                            while ($row = mysql_fetch_array($instructor_result)) {
                                echo "<option value='" . $row['instructorID'] . "'>'"
                                . $row['instructorID'] . " - " . $row['fullname'] . "'</option>";
                            }
                            ?>        
                        </select>
                    </td>
                </tr>
    

            </table>
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


