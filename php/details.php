

<?php 
  include_once('header.php');
 include_once ('../connection/connection.php');

 
 if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Administrator"){
    echo "Welcome";
     
    }else{
        
        echo header('location:../index.php');
         
    } 

 $con = connection();
$studID = $_GET['ID'];
  
 $sql = "SELECT * FROM student_list WHERE studId = '$studID'";
 $students = $con->query($sql) or die ($con->error);
 $row = $students->fetch_assoc();

 ?>
 
   <body>
 
   <a href="../index.php"><button class="btn btn-success mt-5 mb-3"> Back to Index</button></a>
   <input type="text" value="<?php echo $row['first_name']?>">
   <input type="text" value="<?php echo $row['last_name']?>">
  
     
  
 
 
 
 
 
 
   <?php include_once('footer.php');?>