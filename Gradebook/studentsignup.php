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
                <h2 class="text-center"><strong>Create</strong>  Account.</h2>
                <div class="mb-3"><input class="form-control" type="text" name="fullname" placeholder="fullname"></div>
                <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="username"></div>
                <div class="mb-3"><input class="form-control" type="text" name="password" placeholder="password"></div>
                <div class="mb-3"><input class="form-control" type="text" name="address" placeholder="address"></div>
                <div class="mb-3">
                    <b>Gender </b>
                    <select name="gender" style="margin-top : 20px;">
                        <option value="Select"></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <b>Account for </b>
                    <select name="accounttype" style="margin-top : 20px;">
                        <option value="Select"></option>
                        <option value="instructor">Instructor</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="mb-3"><input class="btn btn-primary d-block w-100" type="submit" name="submit" value="Register" style="color: rgb(255, 255, 255);background: rgb(244, 71, 107);"></button></div><a class="already" href="login.php">You already have an account? Login here.</a>
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
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $accounttype=$_POST['accounttype'];
    echo $accounttype;
   
    include("config.php");
    if($accounttype=="student"){
    $connection = $db;
    $sql_insert_student = "INSERT into students SET
                                        fullname='$fullname',
                                        address='$address',
                                        gender='$gender'";
    $result1 = $connection->query($sql_insert_student) or die($connection->error);
    $sqlSeachstudent=" SELECT students.studentID FROM students WHERE students.fullname='$fullname';";
    $result2 = $connection->query($sqlSeachstudent) or die($connection->error);
    while ($row = mysqli_fetch_array($result2)) {
        $studentID= $row['studentID'];
    }
    $sql_insert_user = "INSERT into users SET username='$user',`password`='$pass',userID_student='$studentID',`role` = 3;";
    $result3 = $connection->query($sql_insert_user) or die($connection->error);
    }
    if($accounttype=="instructor"){
        $connection = $db;
        $sql_insert_student = "INSERT into instructors SET
                                            fullname='$fullname',
                                            address='$address',
                                            gender='$gender'";
        $result1 = $connection->query($sql_insert_student) or die($connection->error);
        $sqlSeachstudent=" SELECT instructors.instructorID FROM instructors WHERE instructors.fullname='$fullname';";
        $result2 = $connection->query($sqlSeachstudent) or die($connection->error);
        while ($row = mysqli_fetch_array($result2)) {
            $instructorID= $row['instructorID'];
        }
        $sql_insert_user = "INSERT into users SET username='$user',`password`='$pass',userID_student='$instructorID',`role` = 2;";
        $result3 = $connection->query($sql_insert_user) or die($connection->error);
        }
}
?>