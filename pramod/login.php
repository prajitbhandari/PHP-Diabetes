<?php

  if(isset($_cookie['username'])){
      session_start();
      $_session['username'] = $_cookie['username'];
      header('location : index.php');
    }

  if(isset($_POST['submit'])){

    require 'db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="select * From reg where UserName = '$username' and Password = '$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
      if(isset($_POST['remember'])){
          setcookie('username', $username, time()+60*60*7*24);
          session_start();
          $_session['username'] = $username;
          
        }
        header('location: index.php');
    }else{
         echo "UserName and Password do not match";
        }
  }
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <section class="container-fluid">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
          <form class="form-container" method="POST" action="">
              <h1>Login</h1>
                <div class="form-group">
                  <label for="username">UserName</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="Check1" name="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
          </form>
        </section>
      </section>
    </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  </body>
</html>
