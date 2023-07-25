<?php
//alert is for successfull created account
 $showAlert = false;
 //error is user entered mismatch password
 $showError = false;
//if methos formmethos is post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
  //for establishing connection to databse server
  include 'partials/_dbconnect.php';
  //by default alert is false
 
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $exists = false;
  //query to check existing from database
  $existSql = "SELECT * FROM `users` where `username` = '$username'";
  //this below function of mysqli extension takes two parameters, connection variable and another
  $result = mysqli_query($conn,$existSql);
  //This numExistRows store number of username count in all rows returned by above sql qrery
  $numExistRows = mysqli_num_rows($result);

  //check if user exists more than one times
        if($numExistRows>0){
          // $exists=true; //user exists more than once
          $showError = "UserName Is Already Exists, Please Choose Another";
        }
       else{
          //  $exists=false;
          //check wether user already loginn or not, also check password and currrent password
          if(($password==$cpassword)){
            //sql query to insert data into database
            $sql = "INSERT INTO `users` (`username`, `password`, `Date`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn,$sql);
                if($result){
                  $showAlert = true;
                  header("location: login.php");
                }
          }
          else{
            //if user password is not match
            $showError = "Please Enter Same Password To Create Account";
          }
}
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Sign Up!!</title>
  </head>
  <body>

  <?php require 'partials/_nav.php'?>
  
  <!-- if user created accountat that time showing this alert -->
  <?php
    if($showAlert){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account is now created Please Login.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }

    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>Error!</strong> '.$showError.'
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       </div>';
     }
   ?>


  <div class="container">
    <h1 class="text-center">Sign Up To Use!!</h1>

            <form action="/login-system/signup.php" method="post">
        <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="cpassword">Conform Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password">
            <small id="emailHelp" class="form-text text-muted">Ensure that you entered same password</small>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>

  </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>