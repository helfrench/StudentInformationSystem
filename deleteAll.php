<?php
 
 include_once ('connection/connection.php');
 $con = connection();
$studID = $_GET['ID'];

  
    $sql = "TRUNCATE TABLE `student_list`" ;
    $students = $con->query($sql) or die ($con->error);
    echo header('location: index.php');
    
         
        


?>
