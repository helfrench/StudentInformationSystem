<?php
 
 include_once ('connection/connection.php');
 $con = connection();
$studID = $_GET['ID'];
 
 

$sql = "DELETE FROM `student_list` WHERE `studId` = '$studID'" ;
$students = $con->query($sql) or die ($con->error);
echo header('location: index.php');

?>