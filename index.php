<?php 

 $host = "localhost";
 $username = "root";
 $password = "Skyflakes_02";
 $database = "student_system";

 $con = new mysqli($host, $username, $password, $database);

 if($con->connect_error){
     echo $con->connect_error;
 }
 
 $sql = "SELECT * FROM student_list";
 $students = $con->query($sql) or die($con->error);
 $row = $students->fetch_assoc();

 
    // do{
    //     echo $row['first_name']."". $row['last_name']."<br>";
    // }while($row = $students->fetch_assoc());
 
 
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
  
<div class="container">
    <div class="row">
    <h2>Student Information</h2>
    <table class="table sm">
  <thead>
    
    <tr>
    <th scope="col">Stud ID</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Date_added</th>
      <th scope="col">Gender</th>
       
    </tr>
  </thead>
  <tbody>
      
    
    <?php do{ ?>
        <tr>
        <td><?php echo $row['studId']?></td>
      <td><?php echo $row['first_name']?></td>
      <td><?php echo $row['last_name']?></td>
      <td><?php echo $row['birthdate']?></td>
      <td><?php echo $row['date_added']?></td>
      <td><?php echo $row['gender']?></td>
      </tr>
      <?php }while($row = $students->fetch_assoc())?>
    
   
  </tbody>
</table>
    </div>
</div>
   
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  
  </body>
</html>