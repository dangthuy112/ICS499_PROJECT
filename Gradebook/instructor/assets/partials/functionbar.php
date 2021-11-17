
<style>
    .gradelistbar {
        border-bottom: 1px solid grey;
        background-color: lightgrey;
        display:inline-block;
        box-sizing: border-box;
        width: 100%;
        height: 5%;
        padding-top: 5px;
    }

    .gradelistbar a {
        text-decoration: none;
        margin-left: 3%;
        margin-right: 3%;
        margin-top: 7px;
        color: black;
    }
    .gradelistbar input {
        display:inline;
        text-decoration: none;
        margin-left: 3%;
        margin-right: 3%;
        margin-top: 7px;
        color: black;
    }

    .gradelistbar a:hover {
        color: red;
    }
</style>
<?php

?>
<div class="gradelistbar">
    <?php 
    echo "<a  href='./instructor-course.php?iid=$iid&course=$course&courseid=$courseid&option=1'>Student List</a>";
    echo "<a  href='./instructor-course.php?iid=$iid&course=$course&courseid=$courseid&option=2'>Assignment List</a>";
    echo "<a  href='./instructor-course.php?iid=$iid&course=$course&courseid=$courseid&option=3'>Announcement List</a>";
    ?>
</div>
