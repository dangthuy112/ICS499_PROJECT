<!-- stylelist sheet for the file -->
<style>
    .notification {
        background-color: yellow;
        color: white;
        text-decoration: none;
        padding: 15px 26px;
        position: relative;
        display: inline-block;
        border-radius: 2px;
    }

    .notification:hover {
        background: black;
    }

    .notification .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 5px 10px;
        border-radius: 50%;
        background-color: red;
        color: white;
    }

    .dropdown2 {
        position: relative;
        display: inline-block;
        background-color: lightblue;
        padding: 10px;
        height: 5%;
    }

    .dropdown-content2 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 600px;
        height: 110px;
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        padding: 30px 30px;
        /* //z-index: 1; */
        overflow: scroll;
    }

    .dropdown2:hover .dropdown-content2 {
        display: block;
    }
</style>

<?php
//Sql statement which find out all the data from the note table 
 //of the Note  with the course Id and coruseID given.
$notesql = "SELECT * FROM note WHERE note.studentID_note='$sid' AND note.courseID_note='$courseid'";
$notes = mysqli_query($db, $notesql);
$notes2 = mysqli_query($db, $notesql);
$notes3 = mysqli_query($db, $notesql);
$counter = 0;
while ($row = mysqli_fetch_array($notes)) {
    if ($row['badge'] == 'New') {
        $counter++;
    }
}

?>
<!-- showing the note details by dropdown squared when the mouse hoove the section -->
<div class='dropdown2'>
    <a href="#" class="notification">
        <span>Notice</span>
        <span class='badge'><?php echo "$counter"; ?></span>
    </a>
    <div class='dropdown-content2'>
        <?php
        while ($row = mysqli_fetch_array($notes2)) {
            if ($row['badge'] == 'New' && $row['note_type'] == 'assignment') {
                echo "<a  href='./assignment.php?sid=$sid&courseid=$row[courseID_note]'>New: $row[note]<br></a>";
            }
            if ($row['badge'] == 'New' && $row['note_type'] == 'gradelist') {
                echo "<a  href='./gradelist.php?sid=$sid&courseid=$row[courseID_note]'> New: $row[note]<br></a>";
            }
        }
        while ($row = mysqli_fetch_array($notes3)) {
            if ($row['badge'] == 'Old' && $row['note_type'] == 'assignment') {
                echo "<a  href='./assignment.php?sid=$sid&courseid=$row[courseID_note]'>Old: $row[note]<br></a>";
            }
            if ($row['badge'] == 'Old' && $row['note_type'] == 'gradelist') {
                echo "<a  href='./gradelist.php?sid=$sid&courseid=$row[courseID_note]'> Old: $row[note]<br></a>";
            }
        }
        ?>
    </div>
</div>