

 <?php
include_once('header.php');
 include_once ('../connection/connection.php');
$con = connection();


 
if(isset($_POST['submit'])){
   $userName = $_POST['username'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM `user` WHERE username = '$userName' AND password = '$password'";
  // $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$userName', '$password' )";
   $users = $con->query($sql) or die ($con->error);
   $row = $users->fetch_assoc();
   $total = $users->num_rows;

   if($total > 0){

       $_SESSION['UserLogin'] = $row['username'];
       $_SESSION['Access'] = $row['access'];
        echo $_SESSION['UserLogin'];
       echo header('location:../index.php');
       
   }else{
       echo " User not found";
   }
 
 
 
   
}

?>

<div class="container">
    <div class="wrappers mt-5" style="width:400px; margin:0 auto; ">
        <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control"  name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <a  href="#" class="dontHaveAccount">Dont have an account yet?</a>
        </div>
         
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary btn-edits ">Log in</button>
        </div>
        </form>
    </div>




    <?php include_once('footer.php');?>