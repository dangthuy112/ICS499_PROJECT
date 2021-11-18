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
<!-- Generate the table with filling space for neccessary to make a new announcement  -->
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
                    <label for="fname">Announcement:</label>
                </td>
                <td>
                    <textarea cols="30" rows="10" name="announcement"></textarea><br>
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
<!-- Actionlistener whenever the submit was clicked we will collect the user input data above then 
create a sql command insert all the new data to the announcement table then close the database -->
<?php
if (isset($_POST['submit'])) {
    $announcement = $_POST['announcement'];
    $date = $_POST['date'];
    $sql = "INSERT INTO announcement 
     (announcementID, courseID_ann, announcement, `date`)
    VALUES (NULL, '$courseid', '$announcement', '$date')";
    $result = mysqli_query($db, $sql);
    echo " The data successfully insert enter new announcement if you want to manke a new one or press back for previous page";
}
$db->close();
include('assets/partials/footer.php')
?>