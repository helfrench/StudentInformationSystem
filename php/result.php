

<?php 
 
 include_once('header.php');
include_once ('../connection/connection.php');



$con = connection();

$search = $_GET['search'];
$sql = "SELECT * FROM `student_list` WHERE first_name LIKE '%$search%'OR last_name LIKE '%$search%'";
$students = $con->query($sql) or die ($con->error);
if($students){
    $row = $students->fetch_assoc();
}else{
    echo header('location:../index.php');
}


?>

  <body>

  
  <div class="container" >
<a href="add.php"><button class="btn btn-success mt-5 mb-3"> Add Student</button></a>
<a href="deleteAll.php"><button class="btn btn-success mt-5 mb-3"> Delete All student</button></a>

<?php if(isset($_SESSION['UserLogin'])){ ?>
    <a href="php/logout.php"><button class="btn btn-warning mt-5 mb-3"> Logout</button></a>
<?php } else { ?>
    <a href="php/login.php"><button class="btn btn-primary mt-5 mb-3"> Login</button></a>
    
<?php } ?>
<form action="result.php" method="get">
    <input type="text" name="search" id="search">
    <button class="btn btn-success" type="submit" name="query">Search</button>
</form>


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
                <th scope="col">Address</th>  
                <th scope="col">Action</th>      
            </tr>
        </thead>
        <tbody>
                
        <?php do{ ?>

            <tr>
                <td><a href="details.php?ID=<?php echo $row['studId'];?>">View</a></td>
                <td><?php echo $row['studId'];?></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['birthdate'];?></td>
                <td><?php echo $row['date_added'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><button class="btn btn-danger"><a style="text-decoration:none;color:#fff;" href="../delete.php?ID=<?php echo $row['studId'];?>">Delete</a></button></td>
                <td><button class="btn btn-warning"><a style="text-decoration:none;color:#fff;" href="../edit.php?ID=<?php echo $row['studId'];?>">Edit</a></button></td>
            </tr>

        <?php }while($row = $students->fetch_assoc())?>   
            </tbody>
        </table>
    </div>
</div>
 






  <?php include_once('footer.php');?>