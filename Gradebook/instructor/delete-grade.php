<?php
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
//sql get all the data from the course table base on course ID
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
$coursenumber=$_GET['coursenumber'];
$sql = "DELETE FROM grades WHERE grades.gradeID = $gradeid";
?>
<!-- Print out the information for confirming one more time before delete -->
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Deleting Grade From $studentname </h1>
        <br></br>

        <h4><u>Are you sure you want to delete this grade?</u></h4>
        <?php echo " <form action=''
             method='POST'>"
        ?>
        <table>
            <tr>
                <td>Grade Item: <b><?php echo "$gradeitem"; ?></b></td>
            </tr>
            <tr>
                <td>Score: <b><?php echo "$score"; ?></b></td>
            </tr>
            <tr>
                <td>Feedback: <b><?php echo "$feedback"; ?></b></td>
            </tr>
            <tr>
                <td>Grade name: <b><?php echo "$gradename"; ?></b></td>
            </tr>
            <tr>
                <td colspan="2">
                    <form action="" method='POST'>
                        <input type="submit" name="yes" value="Delete" class="btn-primary" style="background-color:red;">
                    </form>
                </td>
                <?php
                echo " <form action='instructor-course.php?coursenumber=$coursenumber&sid=$sid&name= $studentname&iid=$iid&course=$course&courseid=$courseid&option=4' method='POST'>
                <td>
                    <input type='submit' name='back' value='Back' class='btn-primary' style='background-color:green;'>
                    </td>
            </form>";
                ?>
            </tr>
        </table>
    </div>
</div>
<!-- Actionlistener whenever the yes was clicked we will delete the row in the grade was selected.
<?php
if (isset($_POST['yes'])) {
    include("assets/partials/config.php");
    $result = mysqli_query($db, $sql);
    echo " The data successfully deleted please press back for comback";
} else if (isset($_POST['no'])) {
    echo " The data not delete please press back for come back";
}
$db->close();
include('assets/partials/footer.php')
?>