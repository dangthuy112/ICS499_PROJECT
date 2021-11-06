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

$connection = mysqli_connect($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection Failed:" . $connection->connect_error);
}
?>

<div class="admin-manage" style="">
    <div class="wrapper">
        <h1>Manage Instructors</h1>
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

        <!-- add instructor button -->
        <a href="add-instructor.php" class="btn-primary">Add Instructor</a>

        <br /><br /><br />
        <!-- display table -->
        <table class="tbl-full">
            <tr>
                <th>InstructorID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
            </tr>

            <?php
            $sql = "SELECT instructors.instructorID, instructors.fullname,
                    instructors.gender, instructors.address,
                    users.username, users.password
                    FROM instructors
                    INNER JOIN users ON instructors.instructorID = users.userID_instructor
                    ORDER BY instructors.fullname ASC";

            $result = $connection->query($sql);

            if ($result == TRUE) {
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //grab data
                        $instructorID = $rows['instructorID'];
                        $fullname = $rows['fullname'];
                        $gender = $rows['gender'];
                        $address = $rows['address'];
                        $username = $rows['username'];
                        $password = $rows['password'];
                        ?>

                        <!--print data-->
                        <tr>
                            <td><?php echo $instructorID; ?></td>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $password; ?></td>
                            <td>
                                <a href="update-instructor.php?id=<?php echo$instructorID; ?>" class="btn-secondary">Update</a>
                                <a href="delete-instructor.php?id=<?php echo$instructorID; ?>" class="btn-danger">Delete</a>
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