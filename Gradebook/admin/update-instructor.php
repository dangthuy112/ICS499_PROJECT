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
$instructorID = $rows['instructorID'];
$fullname = $rows['fullname'];
$gender = $rows['gender'];
$address = $rows['address'];
$username = $rows['username'];
$password = $rows['password'];
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Update Instructor</h1>
        <br></br>

        <!--form for updating instructor-->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr> 
                    <td>Full Name: </td>
                    <td><input type="text" name="fullname" value="<?php echo "$fullname"; ?>"></td>
                </tr>
                <tr> 
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo "$username"; ?>"></td>
                </tr>
                <tr> 
                    <td>Password: </td>
                    <td><input type="text" name="password" value="<?php echo "$password"; ?>"></td>
                </tr>
                <tr> 
                    <td>Address: </td>
                    <td><input type="text" name="address" value="<?php echo "$address"; ?>"></td>
                </tr>
                <tr> 
                    <td>Gender: </td>
                    <td><select name="gender">
                            <option value ="" disabled selected>Choose Option</option>
                            <option value ="male">Male</option>
                            <option value ="female">Female</option>
                    </td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Update Instructor" class="btn-primary">
                </td>

            </table>
        </form>
    </div>
</div>

<?php include('config.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    //update instructors table
    $sql_update_instructor = "UPDATE instructors
                                SET fullname='$fullname',
                                    address='$address',
                                    gender='$gender'
                                WHERE instructorID = $instructorID";

    $result1 = $connection->query($sql_update_instructor) or die($connection->error);

    $sql_update_user = "UPDATE users 
                                SET username='$username',
                                    password='$password'
                                WHERE userID_instructor = $instructorID";

    $result2 = $connection->query($sql_update_user) or die($connection->error);

    //test to see if operation was successful
    if ($result1 == true && $result2 == true) {
        //success message if sql was successfully added
        $_SESSION['update'] = "Instructor Updated Successfully!";

        //redirect to the same page to show success message
        header('location: AdminManageInstructor.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['update'] = "Instructor NOT Updated.";

        //redirect to the same page to show failure message
        header('location: AdminManageInstructor.php');
    }
}
?>

<?php include('assets/partials/footer.php'); ?>


