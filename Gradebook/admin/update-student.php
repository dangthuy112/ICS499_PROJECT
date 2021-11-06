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
$studentID = $_GET['id'];

//sql to query id information
$sql = "SELECT students.studentID, students.fullname,
                    students.gender, students.address,
                    users.username, users.password
                    FROM students
                    INNER JOIN users ON students.studentID = users.userID_student
                    WHERE students.studentID = $studentID";

$result = $connection->query($sql);
$rows = mysqli_fetch_assoc($result);

//set data to variables
$studentID = $rows['studentID'];
$fullname = $rows['fullname'];
$gender = $rows['gender'];
$address = $rows['address'];
$username = $rows['username'];
$password = $rows['password'];
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Update Student</h1>
        <br></br>

        <!--form for updating students-->
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
                    <input type="submit" name="submit" value="Update Student" class="btn-primary">
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

    //update students table
    $sql_update_student = "UPDATE students
                                SET fullname='$fullname',
                                    address='$address',
                                    gender='$gender'
                                WHERE studentID = $studentID";

    $result1 = $connection->query($sql_update_student) or die($connection->error);

    $sql_update_user = "UPDATE users 
                                SET username='$username',
                                    password='$password'
                                WHERE userID_student = $studentID";

    $result2 = $connection->query($sql_update_user) or die($connection->error);

    //test to see if operation was successful
    if ($result1 == true && $result2 == true) {
        //success message if sql was successfully added
        $_SESSION['update'] = "Student Updated Successfully!";

        //redirect to the same page to show success message
        header('location: AdminManageStudent.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['update'] = "Student NOT Updated.";

        //redirect to the same page to show failure message
        header('location: AdminManageStudent.php');
    }
}
?>

<?php include('assets/partials/footer.php'); ?>


