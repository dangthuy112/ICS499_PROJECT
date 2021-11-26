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

if (isset($_POST['search_value'])) {
    $search_value = $_POST['search_value'];


    //sql search query
    $sql_search = "SELECT instructors.instructorID, instructors.fullname,
                    instructors.gender, instructors.address,
                    users.username, users.password
                    FROM instructors
                    INNER JOIN users ON instructors.instructorID = users.userID_instructor
                    WHERE CONCAT(`password`,`username`,`instructorID`,`fullname`,`gender`,`address`)
                    LIKE '%" . $search_value . "%'";

    $search_result = table_search($connection, $sql_search);
} else {
    $sql_search = "SELECT instructors.instructorID, instructors.fullname,
                    instructors.gender, instructors.address,
                    users.username, users.password
                    FROM instructors
                    INNER JOIN users ON instructors.instructorID = users.userID_instructor
                    ORDER BY instructors.fullname ASC";

    $search_result = table_search($connection, $sql_search);
}

function table_search($connection, $sql_search) {
    $filtered_result = mysqli_query($connection, $sql_search);
    return $filtered_result;
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
        <!-- search form -->
        <form action ="AdminManageInstructor.php" method="POST">
            <tr>
                <th><input type="text" name="search_value" placeholder ="Value To Search"></th>
                <th><input type ="submit" name="search" value="Search"></th>
            <br><br>
            </tr>
        </form>

        <?php
        if (isset($_POST['search_value'])) {
            echo "<tr><b>Search Result for \"" . $search_value . "\":</b></tr>";
        }
        ?>

        <table class="tbl-full">
            <tr>
                <th>InstructorID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>

            <?php
            if (mysqli_num_rows($search_result) > 0) {
                foreach ($search_result as $instructor) {
                    ?>
                    <tr>
                        <td><?php echo $instructor['instructorID']; ?></td>
                        <td><?php echo $instructor['fullname']; ?></td>
                        <td><?php echo $instructor['gender']; ?></td>
                        <td><?php echo $instructor['address']; ?></td>
                        <td><?php echo $instructor['username']; ?></td>
                        <td><?php echo $instructor['password']; ?></td>
                        <td>
                            <a href="update-instructor.php?id=<?php echo $instructor['instructorID']; ?>" class="btn-secondary">Update</a>
                        </td>
                        <td>
                            <a href="delete-instructor.php?id=<?php echo $instructor['instructorID']; ?>" class="btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
                <?php
            }

            $connection->close();
            ?>
        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>