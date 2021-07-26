
<?php 
  include_once('header.php');
 include_once ('../connection/connection.php');

 
 if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Administrator"){
 
  
  
     
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
      
   
   
<div class="container fluid disabled">
   
  <div class="row">
    <div class="col-md-4">
    <img src="../img/<?php echo $row['studId'];?>.jpg" alt="..." class="img-thumbnail">
    </div>
    <div class="col-md-8 border"> 
      <h2 class="text-center mt-3">Student Information</h2> 
      <form>
        
        <div class="form-row">
        <div class="form-group col-md-2 mt-2">
            <label for="inputEmail4">Student #</label>
            <fieldset disabled>
            <input type="text" name="studId" class="form-control" id="disabledInput" placeholder="disabledInput" value="<?php echo $row['studId'];?>">
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
            <fieldset disabled>
            <input type="text" class="form-control" id="inputEmail4" value="<?php echo $row['first_name']?>">
            </fieldset>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Last Name</label>
            <fieldset disabled>
            <input type="text" class="form-control" id="inputPassword4" value="<?php echo $row['last_name']?>">
            </fieldset>
          </div>
        </div>
        <div class="form-group col-md-12">
          <label for="inputAddress">Address</label>
          <fieldset disabled>
          <input type="text" class="form-control" id="inputAddress" value="<?php echo $row['address']?>">
          </fieldset>
        </div>
        
        <div class="row">
            <div class="form-group col-md-6  ">
                <label for="inputState">Gender</label>
                <fieldset disabled>
                <select id="inputState" class="form-control">
                  <option selected> ---- </option>
                  <option value="Male"<?php echo ($row['gender']=="Male")?'selected':'';?> > Male </option>
                  <option value="Female"<?php echo ($row['gender']=="Female")?'selected':'';?>>Female</option>                
                </select>
                </fieldset>
            </div>  
          
            
              <div class="form-group col-md-6">
                <label for="inputCity">Birth Date</label>
                <fieldset disabled>
                <input type="text" class="form-control" id="inputCity" value="<?php echo $row['birthdate']?>">
                </fieldset>
              </div>  
        </div>

        <div class="row">
            <div class="form-group col-md-6  ">
                <label for="inputState">Nationality</label>
                <fieldset disabled>
                <select id="inputState" class="form-control">
                  <option selected>----</option>
                  <option>Filipino</option>
                  <option>American</option>
                  <option>Australian</option>
                </select>
                </fieldset>
            </div>  
          
            
            <div class="form-group col-md-6  ">
                <label for="inputState">Year Level</label>
                <fieldset disabled>
                <select id="inputState" class="form-control">
                  <option selected>----</option>
                  <option>1st Year</option>
                  <option>2nd Year</option>
                  <option>3rd Year</option>
                  <option>4th Year</option>
                </select>
                </fieldset>
            </div> 
        </div>
        
         
        

        <div class="form-group">
        <input class="btn btn-success mr-3 text-center" type="submit" name="submit" value="Submit">
        <button class="btn btn-warning mr-3"><a style="text-decoration:none;color:#fff;" href="../edit.php?ID=<?php echo $row['studId'];?>">Edit</a></button>
        <button class="btn btn-primary mr-3"> <a style="text-decoration:none;color:#fff;" href="../index.php?ID=<?php echo $row['studId'];?>"> >>Back to Student List</a></button>
        
       
        </div>
        
        </form>
      </div>
  </div>
     
</div>
     
  
 
 
 
 
 
 
   <?php include_once('footer.php');?>