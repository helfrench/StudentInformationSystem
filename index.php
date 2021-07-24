

<?php 
include_once ('connection/connection.php');
$con = connection();

$sql = "SELECT * FROM `student_list`ORDER BY studId DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();
include_once('php/header.php');?>


  <body>

  
  <div class="container">
<a href="add.php"><button class="btn btn-success mt-5 mb-3"> Add Student</button></a>
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
 






  <?php include_once('php/footer.php');?>