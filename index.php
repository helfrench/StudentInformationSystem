

<?php 
 
 include_once('php/header.php');
include_once ('connection/connection.php');



$con = connection();

$sql = "SELECT * FROM `student_list`ORDER BY studId DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

?>

  <body>

  
  <div class="container">
<a href="add.php"><button class="btn btn-success mt-5 mb-3"> Add Student</button></a>


<?php if(isset($_SESSION['UserLogin'])){ ?>
    <a href="php/logout.php"><button class="btn btn-warning mt-5 mb-3"> Logout</button></a>
<?php } else { ?>
    <a href="php/login.php"><button class="btn btn-primary mt-5 mb-3"> Login</button></a>
<?php } ?>


    <div class="row">
    <h2>Student Information</h2>
        <table class="table sm">
        <thead>
        
            <tr>
            <th scope="col"></th>
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
                <td><a href="php/details.php?ID=<?php echo $row['studId'];?>">View</a></td>
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