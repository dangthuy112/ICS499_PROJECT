<?php
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
$iid = $_GET['iid'];
$course = $_GET['course'];
$courseid = $_GET['courseid'];
$studentname = $_GET['name'];
$sid = $_GET['sid'];
$gradeitem = $_GET['gradeitem'];
$score = $_GET['score'];
$feedback = $_GET['feedback'];
$gradename = $_GET['gradename'];
$gradeid = $_GET['gradeid'];
?>
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Updating Grade Table</h1>
        <br></br>

        <h4><u>Please enter the following information</u></h4>
        <!--form for updating instructor-->
        <?php echo " <form action=''
             method='POST'>"
        ?>
        <!-- <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"> -->
        <table>
            <tr>
                <td>
                    <label for="fname">Grade Items:</label>
                </td>
                <td>
                     <select name="gradeitem">
                        <option value="" disabled selected>Select</option>
                        <option value="assignment">Assignment</option>
                        <option value="quizz">Quizz</option>
                        <option value="activity">Class Activities</option>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname">Score:</label>
                </td>
                <td>
                    <input type="text" name="score" value="<?php echo "$score"; ?>"><br>
            </tr>
            <tr>
                <td>
                    <label for="fname">Feedback:</label>
                </td>
                <td>
                    <input type="text" name="feedback" value="<?php echo "$feedback"; ?>"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname">Grade name:</label>
                </td>
                <td>
                    <input type="text" name="gradename" value="<?php echo "$gradename"; ?>"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="" method='POST'>
                        <input type="submit" name="submit" value="Submit" class="btn-primary" style="background-color:red;<?php echo isset($_POST["yes"]) ? "disabled" : ""; ?>>Roll Branch">
                    </form>


                    <?php
                    echo " <form action='instructor-course.php?sid=$sid&name= $studentname&iid=$iid&course=$course&courseid=$courseid&option=4' method='POST'>
                    <td>
                    <input type='submit' name='back' value='Back' class='btn-primary' style='background-color:green;'>
                    </td>
                     </form>";
                    ?>
                <td>
            </tr>
        </table>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $gradeitem = $_POST['gradeitem'];
    $score = $_POST['score'];
    $feedback = $_POST['feedback'];
    $gradename = $_POST['gradename'];
    $sql1 = "UPDATE grades 
    SET grade_item ='$gradeitem', 
    gradename='$gradename', score='$score',feedback='$feedback' 
    WHERE gradeID = '$gradeid'";
    $result = mysqli_query($db,$sql1);

    $sql1 = "INSERT INTO note
     (noteID,studentID_note,courseID_note,badge,note_type,note)
    VALUES (NULL, '$sid','$courseid','New','gradelist','The is a modification of grade posted')";
     $result1 = mysqli_query($db, $sql1);

    echo " The data successfully update press back for previous page";
}
$db->close();
include('assets/partials/footer.php')
?>