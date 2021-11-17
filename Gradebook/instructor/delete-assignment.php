<?php
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
$iid = $_GET['iid'];
$courseid = $_GET['courseid'];
$course = $_GET['course'];
$assignmentid=$_GET['assignmentid'];
$date=$_GET['date'];
$assignmentname=$_GET['assignmentname'];
$content=$_GET['content'];
?>
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Remove this assignment from the list</h1>
        <br></br>

        <h4><u>Are you sure you want to remove this assignment</u></h4>
        <?php echo " <form action=''method='POST'>"
        ?>
        <table>
        <tr>
                <td>Assignmentname: <b><?php echo "$assignmentname"; ?></b></td>
            </tr>
            <tr>
                <td>Date: <b><?php echo "$date"; ?></b></td>
            </tr>
            <tr>
                <td>Content: <b><?php echo "content"; ?></b></td>
            </tr>            
        
            <tr>
                <td>
                    <form action="" method='POST'>
                        <input type="submit" name="Delete" value="DELETE" class="btn-primary" style="background-color:red;<?php echo isset($_POST["yes"]) ? "disabled" : ""; ?>>Roll Branch">
                    </form>
                    <?php
                    echo " <form action='instructor-course.php?iid=$iid&courseid=$courseid&course=$course&option=2' method='POST'>
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
if (isset($_POST['Delete'])) {
    $sql = "DELETE FROM assignment WHERE assignment.assignmentID = '$assignmentid'";
     $result = mysqli_query($db, $sql);
     echo " The data successfully delete, please press back for previous page";
}
$db->close();
include('assets/partials/footer.php')
?>