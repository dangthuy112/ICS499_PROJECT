<link rel="stylesheet" href="css/gradelistbar.css">
<!-- stylelist sheet for the file -->
<style>
    .gradelistbar {
        border-bottom: 1px solid grey;
        background-color: lightgrey;
        display: inline-block;
        box-sizing: border-box;
        width: 100%;
        height: 10%;
        padding-top: 5px;
    }

    .gradelistbar a {
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
<!-- Making 3 options for the gradelist bar which are Gradelist, Assignment , Quizz
Gradelist point to gradelist php file with all data need to show up 
the garde table of the student  -->
<div class="gradelistbar">

    <!-- Gradelist point to gradelist php file with all data need to show up 
the garde table of the student  -->

    <?php echo "<a   href='./gradelist.php?sid=$sid&courseid=$courseid'>"; ?>
    Grade List
    </a>

    <!-- Assignment point to assignemnt php file with all data need to show up 
the garde table of the student  -->

    <?php echo "<a   href='./assignment.php?sid=$sid&courseid=$courseid'>"; ?>
    Assignment
    </a>
    <a>
        Quizz
    </a>
    <?php
    include("notification.php");
    ?>
</div>