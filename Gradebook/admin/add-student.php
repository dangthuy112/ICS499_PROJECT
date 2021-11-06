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

//connect to database
$connection = mysqli_connect("localhost", "root", "", "ics499");
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Add Student</h1>
        <br></br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr> 
                    <td>Full Name: </td>
                    <td><input type="text" name="fullname" placeholder="Enter Name"></td>
                </tr>

                <tr> 
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>

                <tr> 
                    <td>Password: </td>
                    <td><input type="text" name="password" placeholder="Enter Password"></td>
                </tr>

                <tr> 
                    <td>Address: </td>
                    <td><input type="text" name="address" placeholder="Enter Address"></td>
                </tr>

                <tr> 
                    <td>Gender: </td>
                    <td><select name="gender">
                            <option value ="" disabled selected>Choose Option</option>
                            <option value ="Male">Male</option>
                            <option value ="Female">Female</option>
                    </td>
                </tr>

                <td colspan="2">
                    <input type="submit" name="submit" value="Add Student" class="btn-primary">
                </td>
            </table>
        </form>
    </div>
</div>

<?php include('assets/partials/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql_insert_student = "INSERT into students SET
                                        fullname='$fullname',
                                        address='$address',
                                        gender='$gender'";

    $result1 = $connection->query($sql_insert_student) or die($connection->error);

    //Get last insert id 
    if ($result1 == true) {
        $last_id = mysqli_insert_id($connection);
        //debugging
        //echo "New record created successfully. Last inserted ID is: $last_id";
    } else {
        //failure message if sql was NOT added
        $_SESSION['add'] = "Student NOT Added.";

        //redirect to the same page to show failure message
        header('location: add-student.php');
    }

    $sql_insert_user = "INSERT into users SET
                                        username='$username',
                                        password='$password',
                                        userID_student='$last_id',
                                        role = 3
                                      ";

    $result2 = $connection->query($sql_insert_user) or die($connection->error);

    //test to see if operation was successful
    if ($result1 == true && $result2 == true) {
        //success message if sql was successfully added
        $_SESSION['add'] = "Student Added Successfully!";

        //redirect to the same page to show success message
        header('location: add-student.php');
    } else {
        //failure message if sql was NOT added
        $_SESSION['add'] = "Student NOT Added.";

        //redirect to the same page to show failure message
        header('location: add-student.php');
    }
}



