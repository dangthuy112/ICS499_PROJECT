
<?php
include("config.php");
$sql="SELECT grades.instructorID_grade 
FROM grades 
WHERE grades.studentID_grade='$stringsid'
AND grades.courseID_grade='$stringcourseid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

if($result->num_rows > 0){

$instructorid=trim($row['instructorID_grade']);
$stringinstructorid=strval($instructorid);
}
else
{$stringinstructorid=0;}

?>
<div class="gradelistbar">
    <?php echo"<a   href='./gradelist.php?sid=$stringsid&courseid=$stringcourseid&instructorid=$stringinstructorid'>";?>
        Grade List
    </a> 
    <?php echo"<a   href='./assignment.php?sid=$stringsid&courseid=$stringcourseid&instructorid=$stringinstructorid'>";?>
        Assignment
    </a>
    <a>
        Quizz
    </a>
</div> -->