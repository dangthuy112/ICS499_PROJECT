<?php
include('assets/partials/menu.php');

session_start();

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
$instructorID = $_GET['id'];

//sql to query id information
$sql = "SELECT instructors.instructorID, instructors.fullname,
                    instructors.gender, instructors.address,
                    users.username, users.password
                    FROM instructors
                    INNER JOIN users ON instructors.instructorID = users.userID_instructor
                    WHERE instructors.instructorID = $instructorID";

$result = $connection->query($sql);
$rows = mysqli_fetch_assoc($result);

//set data to variables
$fullname = $rows['fullname'];
$gender = $rows['gender'];
$address = $rows['address'];
$username = $rows['username'];
$password = $rows['password'];
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Deleting Instructor</h1>
        <br></br>

        <h4><u>Are you sure you want to delete this instructor?</u></h4>
        <!--form for updating instructor-->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr> 
                    <td>Full Name: <b><?php echo "$fullname"; ?></b></td>
                </tr>
                <tr> 
                    <td>Username: <b><?php echo "$username"; ?></b></td>
                </tr>
                <tr> 
                    <td>Password: <b><?php echo "$password"; ?></b></td>
                </tr>
                <tr> 
                    <td>Address: <b><?php echo "$address"; ?></b></td>
                </tr>
                <tr> 
                    <td>Gender: <b><?php echo "$gender"; ?></b></td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="yes" value="Yes" class="btn-primary">
                    <input type="submit" name="no" value="No" class="btn-primary">
                </td>

            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['yes'])) {
    //check to see if the instructor is currently enrolled in any classes
    $sql = "SELECT * FROM `instructor_enroll` WHERE instructorID_enroll = $instructorID";
    $result = $connection->query($sql);
    $num_result = mysqli_num_rows($result);

    if ($num_result > 0) {
        //if they are, send to warning page
        header('location: delete-instructor-warning.php?id=' . $instructorID);
    } else {
        //if not, delete them from instructors table which will cascade
        $sql_delete_instructor = "DELETE FROM instructors
                                WHERE instructorID = $instructorID";

        $result = $connection->query($sql_delete_instructor) or die($connection->error);

        //test to see if operation was successful
        if ($result == true) {
            //success message if sql was successfully added
            $_SESSION['delete'] = "Instructor Deleted Successfully!";

            //redirect to the same page to show success message
            header('location: AdminManageInstructor.php');
        } else {
            //failure message if sql was NOT added
            $_SESSION['delete'] = "Instructor NOT Deleted.";

            //redirect to the manage page to show failure message
            header('location: AdminManageInstructor.php');
        }
    }
} else if (isset($_POST['no'])) {
    //failure message since NOT deleted
    $_SESSION['delete'] = "Instructor NOT Deleted.";

    //redirect to the manage page to show failure message
    header('location: AdminManageInstructor.php');
}
?>

<?php include('assets/partials/footer.php'); ?>


