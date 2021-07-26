<?php
 
 include_once ('connection/connection.php');
 $con = connection();
$studID = $_GET['ID'];

if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Administrator"){
 
  
  
     
}else{
    
    echo header('location:index.php');
     
} 

  
    $sql = "DELETE FROM `student_list` WHERE `studId` = '$studID'" ;
    $students = $con->query($sql) or die ($con->error);
    echo header('location: index.php');
    
         
        


?>
