<?php 
    

    include_once('php/header.php');
    include_once ('connection/connection.php');

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


 

      <?php  if(isset($_POST['submit']))
      {
        $studID = $_GET['ID'];
          
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $date_added = $_POST['date_added'];
        $address = $_POST['address'];
        $birthdate = $_POST['birthdate'];
    
        $sql = "UPDATE`student_list`SET first_name='$fname', last_name='$lname', gender='$gender', date_added='$date_added', address='$address' , birthdate='$birthdate' WHERE studId = '$studID'";
        $students = $con->query($sql) or die ($con->error);
        echo header('location: index.php');
            

      }
   
       ?> 

       
<body> 
       






      
   
   
<div class="container fluid">
  <div class="row">
    <div class="col-md-4">
    <img src="img/<?php echo $row['studId'];?>.jpg" alt="..." class="img-thumbnail">
    </div>

    
    <div class="col-md-8 border"> 
      <h2 class="text-center mt-3">Student Information</h2> 
      <form method="POST" class="mb-5">
        
        <div class="form-row">
        <div class="form-group col-md-2 mt-2">
            <label for="inputEmail4">Student #</label>
            <fieldset disabled>
            <input type="text" class="form-control" id="disabledInput" placeholder="disabledInput" value="<?php echo $row['studId'];?>">
            </fieldset>
          </div>

          <div class="form-group col-md-10">
          <div class="form-group col-md-4 mt-2">
            <label for="inputEmail4">Date Enrolled</label>
            <fieldset disabled>
            <input type="text" class="form-control" id="disabledInput" placeholder="disabledInput" value="<?php echo $row['date_added'];?>">
            </fieldset>
          </div>
          </div>

          <div class="form-group col-md-6">
            <label for="inputEmail4">First Name</label>
            <input type="text" name="firstname" class="form-control" id="inputEmail4" value="<?php echo $row['first_name']?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="inputPassword4" value="<?php echo $row['last_name']?>">
          </div>
        </div>
        <div class="form-group col-md-12">
          <label for="inputAddress">Address</label>
          <input type="text" name="address" class="form-control" id="inputAddress" value="<?php echo $row['address']?>">
        </div>
        
        <div class="row">
            <div class="form-group col-md-6  ">
                <label for="inputState">Gender</label>
                <select name="gender" id="inputState" class="form-control">
                  <option selected><?php echo $row['gender']?></option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
            </div>  
          
            
              <div class="form-group col-md-6">
                <label for="inputCity">Birth Date</label>
                <input type="text" name="birthdate" class="form-control" id="inputCity" value="<?php echo $row['birthdate'];?>">
              </div>  
        </div>

        <div class="row">
            <div class="form-group col-md-6  ">
                <label for="inputState">Nationality</label>
                <select id="inputState" class="form-control">
                  <option selected>----</option>
                  <option>Filipino</option>
                  <option>American</option>
                  <option>Australian</option>
                </select>
            </div>  
          
            
            <div class="form-group col-md-6  ">
                <label for="inputState">Year Level</label>
                <select id="inputState" class="form-control">
                  <option selected>----</option>
                  <option>1st Year</option>
                  <option>2nd Year</option>
                  <option>3rd Year</option>
                  <option>4th Year</option>
                </select>
            </div> 
        </div>
             
       

        <div class="form-group">
        <input class="btn btn-success mr-3 text-center" type="submit" name="submit" value="Submit">
        <button class="btn btn-warning mr-3"><a style="text-decoration:none;color:#fff;" href="php/details.php?ID=<?php echo $row['studId'];?>">Cancel</a></button>
        <button class="btn btn-danger mr-3"><a style="text-decoration:none;color:#fff;" href="delete.php?ID=<?php echo $row['studId'];?>">Delete</a></button>
        <button class="btn btn-primary mr-3"> <a style="text-decoration:none;color:#fff;" href="index.php?ID=<?php echo $row['studId'];?>"> >>Back to Student List</a></button>
        
       
        </div>
       
        </form>
      </div>
  </div>
     
</div>




 <?php include_once('php/footer.php');?>