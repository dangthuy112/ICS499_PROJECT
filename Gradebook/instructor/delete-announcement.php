<?php
//include the section of conning to the database, header and divide of the instructormenu
include("assets/partials/config.php");
include('assets/partials/header.php');
include('assets/partials/instructormenu.php');
//sql get all the data from the course table base on course ID
$iid = $_GET['iid'];
$courseid = $_GET['courseid'];
$course = $_GET['course'];
$announcement=$_GET['announcement'];
$date=$_GET['date'];
$announcementid=$_GET['announcementid'];
$coursenumber=$_GET['coursenumber'];
?>
<!-- Print out the information for confirming one more time before delete -->
<div style=" margin: 1% 0;
    background-color: lightgrey">
    <div style="padding: 1%;
    width: 80%;
    margin: 0 auto;">
        <h1>Remove this announcement from the list</h1>
        <br></br>

        <h4><u>Are you sure you want to remove this announcement</u></h4>
        <?php echo " <form action=''
             method='POST'>"
        ?>
        <table>
       
        <tr>
                <td>Announcement: <b><?php echo "$announcement"; ?></b></td>
            </tr>
            <tr>
                <td>Date: <b><?php echo "$date"; ?></b></td>
            </tr>
                
        
            <tr>
                <td>
                    <form action="" method='POST'>
                        <input type="submit" name="yes" value="Yes" class="btn-primary" style="background-color:red;<?php echo isset($_POST["yes"]) ? "disabled" : ""; ?>>Roll Branch">
                    </form>
                    <?php
                    echo " <form action='instructor-course.php?coursenumber=$coursenumber&iid=$iid&courseid=$courseid&course=$course&option=3' method='POST'>
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
<!-- Actionlistener whenever the yes was clicked we will delete the row in the announcement was selected.
<?php
if (isset($_POST['yes'])) {
    $sql = "DELETE FROM announcement WHERE announcement.announcementID = $announcementid";
     $result = mysqli_query($db, $sql);
     echo " The data successfully insert enter new announcement if you want to manke a new one or press back for previous page";
}
$db->close();
include('assets/partials/footer.php')
?>