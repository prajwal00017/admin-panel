<?php require('header/header.php'); 



?>





<?php 
session_start();
require('../dist/conn.php');


if(isset($_POST['submit'])){
  $user = $_POST['name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $psw = $_POST['password'];
  $sql = "INSERT INTO tb_employees(name,last_name,email,age,password) VALUES('$user','$last_name','$email','$age','$psw')";
 
  if(mysqli_query($con,$sql)){
    header('Location: index.php');
  }
  else{
    echo "No connect";
  }
}

?>





<div class="d-flex justify-content-center align-middle align-items-center text-center mt-5">
  <div class="card">
    <div class="card-body">
      <form class="form-signin" method="POST" action="registr.php">
        <img class="mb-3" src="../pictures/login.jpg" alt="" width="72" height="72">

        
        <div class="text-center mb-3">
          <i class="icon-library2 icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
          <h5 class="mb-0">Sign Up</h5>
          <span class="d-block text-muted">
            <i class="fas fa-arrow-left me-1"></i>
            <a href="login.php">Sign In</a>
          </span>
        </div>
        <div class="form-group">
          <input type="text" class="form-control mb-2" placeholder="Name" name="name" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control mb-2" placeholder="Last Name" name="last_name" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control mb-2" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
          <input type="number" class="form-control mb-2" placeholder="Your age" name="age" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control mb-2" placeholder="Password" name="password" required>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>

      </form>
    </div>
  </div>
</div>


<?php require('footer/footer.php'); ?>