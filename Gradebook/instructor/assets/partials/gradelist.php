<?php
//Sql command select all the data from grade table base on studentIDand courseID
$sql = "SELECT* FROM grades 
WHERE grades.studentID_grade='$sid' 
AND grades.courseID_grade='$courseid' 
";
$result = mysqli_query($db, $sql);

?>
<link rel="stylesheet" href="assets/css/gradelist.css">

<!-- showing the grade table of the student selected  -->
<table style="width:auto; height:auto;text-align: center; border: 1px solid black;background-color: lightgrey;">
  <tr>
    <th style="width:10%;border:none;text-align: center;"> GRADE ITEM</th>
    <th style="width:10%;border:none;text-align: center;"> QUIZZ</th>
    <th style="width:10%;border:none;text-align: center;"> FEED BACK</th>
    <?php
    echo "<form action='add-grade.php?sid=$sid&coursenumber=$coursenumber&name=$name&iid=$iid&course=$course&courseid=$courseid'
        method='POST'>
      <th style='width:10%;border:none;text-align: center;'>
      <input type='submit' name='add' style='background-color:green;' value='Adding New Grade'></form>
      </th>";
    ?>
  </tr>
  <th style="width:50%;border:none;text-align: center;"> Assignment :</th>
  <?php
  $result = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result)) {
    if ($row['grade_item'] == 'assignment') {
      echo "<tr>
        <td style='text-align: center;'><label>$row[gradename]</label></td>
        <td style='text-align: center;'><label>$row[score]</label></td>
        <td style='text-align: center;'><label>$row[feedback]</label></td>
        <td style='text-align: center;'>";

      //  Adding the modifify funtion with action send to the diffrent page for update the recent grade was selected
      echo "<form action='modify-grade.php?
        &gradeid=$row[gradeID]&coursenumber=$coursenumber&gradeitem=$row[grade_item]&score=$row[score]&feedback=$row[feedback]&gradename=$row[gradename]
        &sid=$sid&name= $name&iid=$iid&course=$course&courseid=$courseid'
        method='POST'>
      <input type='submit' name='modify' style='background-color:yellow;' value='Modify'></form></td>


      <td style='text-align: center;'>";
      //  Adding the delete funtion with action send to the diffrent page for update the recent grade was selected 
      echo " <form action='delete-grade.php?
        &gradeid=$row[gradeID]&coursenumber=$coursenumber&gradeitem=$row[grade_item]&score=$row[score]&feedback=$row[feedback]&gradename=$row[gradename]
        &sid=$sid&name= $name&iid=$iid&course=$course&courseid=$courseid'
        method='POST'>
      <input type='submit' name='delete' style='background-color:red;' value='Delete'></form>
      </td>
        </tr>";
    }
  }
  ?>
  <tr>
    <th style="width:50%;border:none;text-align: center;"> Quizz:</th>
  </tr>
  <!-- the code below is similar to the code above with funtion modify and delete the grade selected but in Quizz and Class activities section -->
  <?php
  $result = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result)) {
    if ($row['grade_item'] == 'quizz') {
      echo "<tr>
        
        <td style='text-align: center;'><label>$row[gradename]</label></td>
        <td style='text-align: center;'><label>$row[score]</label></td>
        <td style='text-align: center;'><label>$row[feedback]</label></td>
        <td style='text-align: center;'>


        <form action='modify-grade.php?
        &gradeid=$row[gradeID]&coursenumber=$coursenumber&gradeitem=$row[grade_item]&score=$row[score]&feedback=$row[feedback]&gradename=$row[gradename]
        &sid=$sid&name= $name&iid=$iid&course=$course&courseid=$courseid'
        method='POST'>
      <input type='submit' name='modify' style='background-color:yellow;' value='Modify'></form></td>
      <td style='text-align: center;'>


      <form action='delete-grade.php?
      &gradeid=$row[gradeID]&coursenumber=$coursenumber&gradeitem=$row[grade_item]&score=$row[score]&feedback=$row[feedback]&gradename=$row[gradename]
      &sid=$sid&name= $name&iid=$iid&course=$course&courseid=$courseid'
      method='POST'>
      <input type='submit' name='delete' style='background-color:red;' value='Delete'></form>
      </td>
        </tr>";
    }
  }
  ?>
  <tr>
    <th style="width:50%;border:none;text-align: center;"> Class Activities:</th>
  </tr>
  <?php
  $result = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result)) {
    if ($row['grade_item'] == 'activity') {
      echo "<tr>
        <td style='text-align: center;'><label>$row[gradename]</label></td>
        <td style='text-align: center;'><label>$row[score]</label></td>
        <td style='text-align: center;'><label>$row[feedback]</label></td>
        <td style='text-align: center;'>


        <form action='modify-grade.php?
        &gradeid=$row[gradeID]&coursenumber=$coursenumber&gradeitem=$row[grade_item]&score=$row[score]&feedback=$row[feedback]&gradename=$row[gradename]
        &sid=$sid&name= $name&iid=$iid&course=$course&courseid=$courseid'
        method='POST'>
      <input type='submit' name='modify' style='background-color:yellow;' value='Modify'></form></td>


      <td style='text-align: center;'>
      <form action='delete-grade.php?
        &gradeid=$row[gradeID]&coursenumber=$coursenumber&gradeitem=$row[grade_item]&score=$row[score]&feedback=$row[feedback]&gradename=$row[gradename]
        &sid=$sid&name= $name&iid=$iid&course=$course&courseid=$courseid'
        method='POST'>
      <input type='submit' name='delete' style='background-color:red;' value='Delete'></form>
      </td>
        </tr>";
    }
  }
  ?>
</table>
<!-- </div> -->