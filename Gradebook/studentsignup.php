
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>register</title>
    <link rel="stylesheet" href="assets/css/strap.min.css">
    <link rel="stylesheet" href="assets/css/studentsignupfooter.css">
    <link rel="stylesheet" href="assets/css/studentsignupnavbar.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="register-photo" style="border-color: rgb(33, 37, 41);background: rgb(241, 247, 252);">
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="color: rgb(186,158,158);background: rgb(241,247,252);">
            <div class="container"><a class="navbar-brand" href="index.html" style="color: rgb(244,71,107);">Infinite Campus @&nbsp;Metropolitan State University&nbsp;<br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                       
    
                    </ul>
                </div>
            </div>
        </nav>
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="" method="POST">
                <h2 class="text-center"><strong>Create</strong> a student account.</h2>
                <div class="mb-3"><input class="form-control" type="text" name="fullname" placeholder="fullname"></div>
                <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="username"></div>
                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="password"></div>
                <div class="mb-3"><input class="form-control" type="text" name="address" placeholder="address"></div>
                <div class="mb-3">

                
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Gender </button>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">Male</a><a class="dropdown-item" href="#">Female</a></div>
                    
                   
                    </div>
                </div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style="color: rgb(255, 255, 255);background: rgb(244, 71, 107);">Register</button></div><a class="already" href="login.php">You already have an account? Login here.</a>
            </form>
        </div>
        <footer class="footer-basic" style="background: rgb(241,247,252);">
            <p class="copyright">2021 All rights reserved, Some School, Developed by Squad 3<br></p>
        </footer>
    </section>
    <script src="assets/js/script.min.js"></script>
</body>

</html>



<?php



if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    include("config.php");

$connection = $db;

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



?>