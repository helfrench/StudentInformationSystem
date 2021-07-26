<?php 
    

    include_once('php/header.php');
    include_once ('connection/connection.php');

    $con = connection();
    if(isset($_POST['submit'])){
    

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
    
        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender` ) VALUES ('$fname', '$lname','$gender' )";
        $students = $con->query($sql) or die ($con->error);
        echo header('location: index.php');

        
    }else{
        
    }
?>

<body>

<div class="container">
        <h2 class="mt-3">Input Information</h2>
    
        <form action="#" method="post">
        <div class="row mt-5 col-6 text-center display-">
            <label for="inputEmail4">First Name</label>
            <input type="text" class="form-control" name="firstname"  id="firstname">
        </div>

        <div class="row mt-5 col-6">
            <label for="inputEmail4">lastname</label>
            <input type="text" class="form-control" name="lastname"  id="lastname">
        </div>

        <div class="row mt-5  col-6">
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Genderqueer">Genderqueer</option>
                <option value="Agender">Agender</option>
            </select>
                
        </div>
         

        
        <div class="row mt-5 col-6">
        <input class="btn btn-success mr-3" type="submit" name="submit" value="Submit">
         
        <button class="btn btn-danger"><a style="text-decoration:none;color:#fff;" href="index.php">Cancel</a></button>
        </div>
        </form> 
         
</div>



 <?php include_once('php/footer.php');?>