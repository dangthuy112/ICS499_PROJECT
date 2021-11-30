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

if (isset($_POST['search_value'])) {
    $search_value = $_POST['search_value'];

    //sql search query
    $sql_search = "SELECT students.studentID, students.fullname,
                    students.gender, students.address,
                    users.username, users.password
                    FROM students
                    INNER JOIN users ON students.studentID = users.userID_student
                    WHERE CONCAT(`studentID`,`fullname`,`gender`,
                                 `address`,`username`,`password`)
					LIKE '%" . $search_value . "%'";

    $search_result = table_search($connection, $sql_search);
} else {
    $sql_search = "SELECT students.studentID, students.fullname,
                    students.gender, students.address,
                    users.username, users.password
                    FROM students
                    INNER JOIN users ON students.studentID = users.userID_student
                    ORDER BY students.fullname ASC";

    $search_result = table_search($connection, $sql_search);
}

function table_search($connection, $sql_search) {
    $filtered_result = mysqli_query($connection, $sql_search);
    return $filtered_result;
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

        <!-- search form -->
        <form action ="AdminManageStudent.php" method="POST">
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

        <!-- display table -->
        <table class="tbl-full" >
            <tr> 
                <th style="background-color:#1e90ff;height:50px;width:115px">StudentID</th>
                <th style="background-color:#1e90ff;height:50px;width:150px">Full Name</th>
                <th style="background-color:#1e90ff;height:50px;width:50px">Gender</th>
                <th style="background-color:#1e90ff;height:50px;width:150px">Address</th>
                <th style="background-color:#1e90ff;height:50px;width:90px">Username</th>
                <th style="background-color:#1e90ff;height:50px;width:90px">Password</th>
                <th style="background-color:#1e90ff;height:50px;width:95px">UPDATE</th>
                <th style="background-color:#1e90ff;height:50px;width:95px">DELETE</th>
            </tr>

            <?php
            if (mysqli_num_rows($search_result) > 0) {
                foreach ($search_result as $student) {
                    ?>
                    <tr>
                        <td style="background-color:#ced6e0;height:50px;width:90px"><?php echo $student['studentID']; ?></td>
                        <td><?php echo $student['fullname']; ?></td>
                        <td><?php echo $student['gender']; ?></td>
                        <td><?php echo $student['address']; ?></td>
                        <td><?php echo $student['username']; ?></td>
                        <td><?php echo $student['password']; ?></td>
                        <td>
                            <a href="update-student.php?id=<?php echo $student['studentID']; ?>" class="btn-secondary">Update</a>
                        </td>
                        <td>
                            <a href="delete-student.php?id=<?php echo $student['studentID']; ?>" class="btn-danger">Delete</a>
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