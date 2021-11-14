

<?php
   include("config.php");
   
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        $userID = trim($row['userID']); // get the userID column's value
        $userID_student = trim($row['userID_student']); // get the useID_student column's value

         $_SESSION['username'] = $myusername;
         $_SESSION['password'] = $mypassword;
         $_SESSION['userID'] = $userID;
         $_SESSION['userID_student'] = $userID_student;
         
         
          $role = trim($row['role']); // get the redirect column's value


         if ($role == '1') {
            header("location: /ICS499_PROJECT/Gradebook/admin/adminhomepage.php");
        } elseif ($role == '2')  {
            header("location: /ICS499_PROJECT/Gradebook/student/GradeList.html");
        } elseif ($role == '3')  {
         
            header("location: /ICS499_PROJECT/Gradebook/student/studentpage.php");

        } else {
        echo '<script type="text/javascript">alert("Username and password incorrect!");     window.location="login.php";</script>';
        }
      }
   }
?>

<!DOCTYPE html>
<html lang="en" style="color: rgb(41,33,33);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/strap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/login-form.css">
	<link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="login-clean" style="color: rgb(33, 37, 41);">
        <h1 style="text-align: center;color: rgb(244,71,107);">Welcome To The Team 3 Gradebook</h1>
        <form method="post">
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate" style="color: rgb(244, 71, 107);"></i></div>
            <div class="mb-3"><input class="form-control" type="username" name="username" placeholder="Username"></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Log In</button></div><a class="forgot" href="studentsignup.php">Don't have an account? Sign up here!</a><a class="forgot" href="https://starid.minnstate.edu">Forgot your email or password?</a>
            
        </form>
        <div class="social-icons" style="color: rgb(33,37,41);border-color: rgb(33,37,41);background: rgba(255,255,255,0);"><a href="https://twitter.com/MetroStateU"><i class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com/MetropolitanStateUniversity/"><i class="icon ion-social-facebook"></i></a><a href="https://www.youtube.com/channel/UCWqIRPMMnBeUe0tgJB9n1hg"><i class="icon ion-social-youtube"></i></a></div>
    </section>
    
</body>

</html>