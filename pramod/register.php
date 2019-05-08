<?php

  include('db.php');


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/registercss.css">
  </head>
  <body>
    <section class="container-fluid">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
          <form action="login.php" method="POST" class="form-container" onSubmit="return validation()" name="regform">
              <h1>Register</h1>
              <div class="form-group">
                <label for="InputUserName">UserName</label>
                <input type="text" class="form-control" id="username" name = "username" placeholder="Set UserName">
                <span id ="usernames" class="text-danger font-weight-bold"></span>
              </div>

              <div class="form-group">
                <label for="InputAddress">Address</label>
                <input type="text" class="form-control" id="address" name = "address" placeholder="Set Address">
                <span id ="addresss" class="text-danger font-weight-bold"></span>
              </div>

              <div class="form-group">
                <label for="InputContact">Contact_No</label>
                <input type="phone" class="form-control" id="ph_no" name = "ph_no" placeholder="Set Contact_No">
                <span id ="contactno" class="text-danger font-weight-bold"></span>
              </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                  <span id ="emailaddress" class="text-danger font-weight-bold"></span>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <span id ="passwords" class="text-danger font-weight-bold"></span>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="submit" value="Submit">
          </form>
        </section>
      </section>
    </section>
    <script type="text/javascript">

    function validation(){

      var username = document.getElementById('username').value;
      var address = document.getElementById('address').value;
      var ph_no = document.getElementById('ph_no').value;
      var phoneRGEX = /^[0-9]{10}$/;
      var emailRGEX = /^[A-Za-z0-9]+@[A-Za-z]+\.[A-Za-z]{2,3}$/;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var result=true;

      document.getElementById('usernames').innerHTML="";
      document.getElementById('addresss').innerHTML="";
      document.getElementById('emailaddress').innerHTML="";
      document.getElementById('contactno').innerHTML="";
      document.getElementById('passwords').innerHTML="";

        //username validation
      if (username == "") {
        document.getElementById('usernames').innerHTML = "Enter username";
        result = false;
      }else if((username.length < 2) || (username.length > 20)){

          document.getElementById('usernames').innerHTML = "Username must be between 2 and 20 characters";
          result = false;
        }

       else if(!isNaN('username')){
            document.getElementById('usernames').innerHTML = "Username must be of characters only";
            result = false;
          }
          



//address validation
      if(address == ""){
        document.getElementById('addresss').innerHTML="Please input the address";
        result = false;
      }else{
        document.getElementById('addresss').innerHTML="";
      }

//phone validation

      if(ph_no==""){
        document.getElementById('contactno').innerHTML="Please input the phone number";
        result = false;
      }else if(!phoneRGEX.test(ph_no)){
              document.getElementById('contactno').innerHTML = "Invalid phone number";
              result = false;
      }

      //email validation

      if(email==""){
        document.getElementById('emailaddress').innerHTML="Please input the email address";
        result = false;
      }else if(!emailRGEX.test(email)){
           document.getElementById('emailaddress').innerHTML="Invalid email address";
           result = false;
        }

      //password validation

      if(password==""){
        document.getElementById('passwords').innerHTML="Please set your password";
        result = false;
      }
      return result;

    }
    </script>

     <?php
        if(isset($_POST['submit'])){

          $UserName = $_POST['username'];
          $Address = $_POST['address'];
          $Contact_No = $_POST['ph_no'];
          $Email_address = $_POST['email'];
          $Password = $_POST['password'];

          $sql = "insert into reg (UserName, Address, Contact_No, Email_address, Password)
          values('$UserName', '$Address', '$Contact_No', '$Email_address', '$Password')";

          $result = mysqli_query($conn, $sql);
        }
     ?>
  </body>
</html>
