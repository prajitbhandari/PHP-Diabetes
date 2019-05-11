<?php 

$msg='';

if (isset($_GET['b'])){
  $msg= '<div class="alert alert-danger">Please Login to Continue</div>';
}

if(isset($_COOKIE['adminName'])){
    session_start();
    $_SESSION['adminName']=$_COOKIE['adminName'];
    header('location:adminIndex.php');
  }


if(isset($_POST['login'])){
  //check for username
  $err=array();

  if(isset($_POST['adminName'])&& !empty($_POST['adminName']))
  {
    $adminName=trim($_POST['adminName']);
  }else{
    $err['adminName']= "*Enter Admin Name";
  }
  
  if(isset($_POST['password'])&& !empty($_POST['password']))
  {
    $password=trim($_POST['password']);
  }else{
    $err['password']= "*Enter Password";
  }

  if(count($err)==0){
    require 'connect.php';
    $sql="select * from tbl_admin where adminName='$adminName' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
      setcookie('adminName',$adminName,time()+7*24*60*60);
      session_start();
      $_SESSION['adminName']=$adminName;
      header('location:adminIndex.php');
      
    }else{
      $msg= '<div class="alert alert-danger">*Invalid Admin Name or Password </div>';
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
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Admin Login</h4>
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
                      <label for="adminName">Admin Name</label>
                      <input type="text" class="form-control" name="adminName" id="adminName" placeholder="Enter Admin Name">
                      <span class="errorDisplay">
                              <?php if (isset($err['adminName'])){
                              echo $err['adminName'];
                            } ?>
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control" name="password" id="password" placeholder="Enter Your Password">
                      <span class="errorDisplay">
                              <?php if (isset($err['password'])){
                              echo $err['password'];
                            } ?>
                      </span>
                    </div>

                    <button type="submit" name="login" class="btn btn-block btn-success">Login</button><br>
                    <br><br>
                  </form>
                  
              </div>
           </div>
       </div>

</body>
</html>
