<?php
include('assets/partials/menu.php');
include('config.php');

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

$connection = mysqli_connect("localhost", "admin", "password", "ics499");
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}
?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Manage Students</h1>
        <br>

        <h4>
            <?php
            //to display success update message or not
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>
        </h4>

        <br /><br />

        <!-- add student button -->
        <a href="add-student.php" class="btn-primary">Add Student</a>

        <br /><br /><br />
        <!-- display table -->
        <table class="tbl-full" >
            <tr> 
                <th>StudentID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
            </tr>

            <?php
            $sql = "SELECT students.studentID, students.fullname,
                    students.gender, students.address,
                    users.username, users.password
                    FROM students
                    INNER JOIN users ON students.studentID = users.userID_student
                    ORDER BY students.fullname ASC";

            $result = $connection->query($sql);

            if ($result == TRUE) {
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //grab data
                        $studentID = $rows['studentID'];
                        $fullname = $rows['fullname'];
                        $gender = $rows['gender'];
                        $address = $rows['address'];
                        $username = $rows['username'];
                        $password = $rows['password'];
                        ?>

                        <!--print data-->
                        <tr>
                            <td><?php echo $studentID; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $password; ?></td>
                            <td>
                                <a href="update-student.php?id=<?php echo$studentID; ?>" class="btn-secondary">Update</a>
                                <a href="delete-student.php?id=<?php echo$studentID; ?>" class="btn-danger">Delete</a>
                            </td>
                        </tr>

                        <?php
                    }
                }
            }

            $connection->close();
            ?>

        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>