<?php
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
//geting all the data passed from previous page
$iid = $_GET['iid'];
$courseid = $_GET['courseid'];
$course = $_GET['course'];
$coursenumber=$_GET['coursenumber'];
?>
<!-- Generate the table with filling space for neccessary to make a new assignment  -->
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Adding Assignment To Class</h1>
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
                    <input type="text" name="assignmentname"><br>
                </td>
                <td>
                    <label for="fname">Assignment Content:</label>
                </td>
                <td>
                    <textarea cols="30" rows="10" name="content"></textarea><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fname">Date:</label>
                </td>
                <td>
                    <input type="date" name="date"><br>
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
create a sql command insert all the new data to the assignmenr table and then also create a sql command 
insert to note table which will send the signal to every student in that class . Datbase was close at the end
An-->
<?php
if (isset($_POST['submit'])) {
    $assignmentname = $_POST['assignmentname'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $sql = "INSERT INTO `assignment` 
     (`assignmentID`, `assignmentname`, `courseID_ass`, `date`, `content`) 
     VALUES (NULL, '$assignmentname', '$courseid', '$date', '$content');";
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
        VALUES (NULL, '$row[studentID]','$courseid','New','assignment','A assignment posted')";
        $result1 = mysqli_query($db, $sql1);
    }


    echo " The data successfully insert enter new announcement if you want to manke a new one or press back for previous page";
}
$db->close();
include('assets/partials/footer.php')
?>