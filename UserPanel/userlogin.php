<?php 

$msg='';

if (isset($_GET['a'])){
  $msg= '<div class="alert alert-danger">Please Login to Continue</div>';
}

if(isset($_COOKIE['email'])){
    session_start();
    $_SESSION['email']=$_COOKIE['email'];
    header('location:userIndex.php');
  }


if(isset($_POST['login'])){
  //check for username
  $err=array();

  if(isset($_POST['email'])&& !empty($_POST['email']))
  {
    $email=trim($_POST['email']);
  }else{
    $err['email']= "*Enter E-mail";
  }
  
  if(isset($_POST['password_1'])&& !empty($_POST['password_1']))
  {
    $password_1=trim($_POST['password_1']);
  }else{
    $err['password_1']= "*Enter Password";
  }

  if(count($err)==0){
    require 'connect.php';
    $sql="select * from tbl_user where email='$email' AND password='$password_1'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      setcookie('email',$email,time()+7*24*60*60);
      session_start();
      $_SESSION['email']=$email;
      header('location:userIndex.php');
      
    }else{
      $msg= '<div class="alert alert-danger">*Invalid username or Password </div>';
    } 
  } 
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .errorDisplay{
      color: red;
    }
  </style>
</head>
<body>
  <br>
  <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="border-radius: 8px;">
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;User Login</h4>
                     </div> 
                </div>
            </div>
            <br>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                 <form method="POST" action="" name="doctorForm">
                    <?php 
                        echo $msg;
                    ?>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" name="email" id="email" placeholder="Enter E-mail Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['email'])){
                              echo $err['email'];
                            } ?>
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="password_1">Password</label>
                      <input type="text" class="form-control" name="password_1" id="password_1" placeholder="Enter Your Password">
                      <span class="errorDisplay">
                              <?php if (isset($err['password_1'])){
                              echo $err['password_1'];
                            } ?>
                      </span>
                    </div>

                    <button type="submit" name="login" class="btn btn-block btn-success">Login</button><br>
                    <p class="text-center">Not Yet a Member? <a href="userRegister.php">Sign up</a>
                    <br><br>
                  </form>
                  
              </div>
           </div>
       </div>

</body>
</html>
