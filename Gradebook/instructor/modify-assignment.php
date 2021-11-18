<?php
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
//sql get all the data from the course table base on course ID
$iid = $_GET['iid'];
$courseid = $_GET['courseid'];
$course = $_GET['course'];
$content = $_GET['content'];
$assignmentname = $_GET['assignmentname'];
$assignmentid = $_GET['assignmentid'];
$date = $_GET['date'];
$coursenumber=$_GET['coursenumber'];
?>
<!-- Print out the information which could be replace by a new information  -->
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Update Assignment To Class</h1>
        <br></br>

        <h4><u>Please enter the following information</u></h4>
        <?php echo " <form action=''
             method='POST'>"
        ?>
        <table>
            <tr>
                <td>
                    <label for="fname">Assignment Name</label>
                </td>
                <td>
                    <input type="text" name="assignmentname" value="<?php echo "$assignmentname"; ?>"><br>
                </td>
                <td>
                    <label for="fname">Assignment Content:</label>
                </td>
                <td>
                    <textarea cols="30" rows="10" name="content"><?php echo "$content"; ?></textarea><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname">Date:YYYY-MM-DD</label>
                </td>
                <td>
                    <input type="text" name="date" value="<?php echo "$date"; ?>"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="" method='POST'>
                        <input type="submit" name="submit" value="Submit" class="btn-primary" style="background-color:red;<?php echo isset($_POST["yes"]) ? "disabled" : ""; ?>>Roll Branch">
                    </form>


                    <?php
                    echo " <form action='instructor-course.php?coursenumber=$coursenumber&iid=$iid&courseid=$courseid&course=$course&option=2' method='POST'>
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
create a sql command update all the new data to the announcement table' row selected and also make an 
sql to insert the the note table that the asignment was modify which send the signal to all the student 
in the class  -->
<?php
if (isset($_POST['submit'])) {
    $assignmentname = $_POST['assignmentname'];
    $date = $_POST['date'];
    $content = $_POST['content'];$gradeitem = $_POST['gradeitem'];
    $sql = "UPDATE assignment 
     SET assignmentname ='$assignmentname', 
     date='$date', content='$content' 
     WHERE assignmentid = '$assignmentid'";
    $result = mysqli_query($db, $sql);

    $studentlist_sql = "SELECT * 
    FROM students, courses,student_enroll 
    WHERE student_enroll.courseID_enroll=courses.courseID
    AND student_enroll.studentID_enroll=students.studentID
    AND courses.courseID='$courseid'";
   $studentlist = mysqli_query($db, $studentlist_sql);
   while ($row = mysqli_fetch_assoc($studentlist)) {
       $sql1 = "INSERT INTO note
       (noteID,studentID_note,courseID_note,badge,note_type,note)
       VALUES (NULL, '$row[studentID]','$courseid','New','assignment','There is an modification of assignment posted')";
       $result1 = mysqli_query($db, $sql1);
   }

    echo " The data successfully updated. Please click back to go back main page.";
}
$db->close();
include('assets/partials/footer.php');
?>