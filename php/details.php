

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
     <div class="container">
       <div class="row">
       <input type="text" value="<?php echo $row['first_name']?>">
   <input type="text" value="<?php echo $row['last_name']?>">

   <a href="../index.php"><button class="btn btn-success mt-5 mb-3"> Back to Index</button></a>
   <a href="../edit.php?ID=<?php echo $row['studId'];?>"><button class="btn btn-success mt-5 mb-3"> Edit</button></a>
   <a href="../delete.php?ID=<?php echo $row['studId'];?>"><button class="btn btn-success mt-5 mb-3"> Delete</button></a>
       </div>
     </div>
   
   
  
     
  
 
 
 
 
 
 
   <?php include_once('footer.php');?>