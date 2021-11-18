<?php
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
//geting all the data passed from previous page
$iid = $_GET['iid'];
$course = $_GET['course'];
$courseid = $_GET['courseid'];
$studentname = $_GET['name'];
$sid = $_GET['sid'];
$coursenumber=$_GET['coursenumber'];
?>
<!-- Generate the table with filling space for neccessary to make a new grade  -->
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Adding Grade Table Table</h1>
        <br></br>
        <h4><u>Please enter the following information</u></h4>
        <?php echo " <form action=''
             method='POST'>"
        ?>
        <table>
            <tr>
                <td>
                    <label for="fname">Grade Items:</label>
                </td>
                <td>
                     <select name="gradeitem">
                        <option value="" disabled selected>Choose Option</option>
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
                    <input type="text" name="score"><br>
            </tr>
            <tr>
                <td>
                    <label for="fname">Feedback:</label>
                </td>
                <td>
                    <input type="text" name="feedback"><br>
                </td>
                </tr>
                <tr>
                <td>
                    <label for="fname">Grade name:</label>
                </td>
                <td>
                    <input type="text" name="gradename"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="" method='POST'>
                        <input type="submit" name="submit" value="Submit" class="btn-primary" style="background-color:red;<?php echo isset($_POST["yes"]) ? "disabled" : ""; ?>>Roll Branch">
                    </form>


                    <?php
                    echo " <form action='instructor-course.php?coursenumber=$coursenumber&sid=$sid&name= $studentname&iid=$iid&course=$course&courseid=$courseid&option=4' method='POST'>
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
<!-- Actionlistener whenever the submit was clicked we will collect the user input data above then 
create a sql command insert all the new data to the grade table and then also create a sql command 
insert to note table which will send the signal to  the specific student in that class .
 Datbase was close at the end
-->
<?php
if (isset($_POST['submit'])) {
    $gradeitem = $_POST['gradeitem'];
    $score = $_POST['score'];
    $feedback = $_POST['feedback'];
    $gradename = $_POST['gradename'];
    $sql = "INSERT INTO grades (gradeID, studentID_grade ,courseID_grade, grade_item, score, feedback, gradename)
     VALUES (NULL, '$sid', '$courseid', '$gradeitem', '$score',' $feedback', '$gradename');";
     $result = mysqli_query($db, $sql);


     $sql1 = "INSERT INTO note
     (noteID,studentID_note,courseID_note,badge,note_type,note)
    VALUES (NULL, '$sid','$courseid','New','gradelist','A grade posted')";
     $result1 = mysqli_query($db, $sql1);


    echo " The data successfully insert enter new grade if you want to insert or press back for previous page";
}
$db->close();
include('assets/partials/footer.php')
?>