<?php include('assets/partials/menu.php'); ?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Add Instructor</h1>
        <br></br>

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

                <td colspan="2">
                    <input type="submit" name="submit" value="Add Instructor" class="btn-primary">
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

        $connection = mysqli_connect("localhost", "root", "", "ics499");
        if ($connection->connect_error) {
            die("Connection Failed:" . $connection->connect_error);
        }

        $sql_insert_instructor = "INSERT into instructors SET
                                fullname='$fullname'
                                  ";

        $result = $connection->query($sql_insert_instructor) or die($connection->error);
        // Get last insert id 
        $lastid = mysqli_insert_id($connection); 
        $sql_insert_user = "INSERT into users SET
                                    username='$username',
                                    password='$password',
                                    role=2,
                                    fromable_id =$lastid
                                  ";

        $result = $connection->query($sql_insert_user) or die($connection->error);
    }
    ?>

<?php include('assets/partials/footer.php'); ?>


