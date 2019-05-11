<?php 

$msg='';

if (isset($_GET['c'])){
  $msg= '<div class="alert alert-danger">Please Login to Continue</div>';
}

if(isset($_COOKIE['docEmail'])){
    session_start();
    $_SESSION['docEmail']=$_COOKIE['docEmail'];
    header('location:doctorIndex.php');
  }


if(isset($_POST['login'])){
  //check for doctor Email
  $err=array();

  if(isset($_POST['docEmail'])&& !empty($_POST['docEmail']))
  {
    $docEmail=trim($_POST['docEmail']);
  }else{
    $err['docEmail']= "*Enter Doctor E-mail";
  }
  
  if(isset($_POST['docPassword'])&& !empty($_POST['docPassword']))
  {
    $docPassword=trim($_POST['docPassword']);
  }else{
    $err['docPassword']= "*Enter Password";
  }

  if(count($err)==0){
    require 'connect.php';
    $sql="select * from tbl_doctor where docEmail='$docEmail' AND docPassword='$docPassword'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
      setcookie('docEmail',$docEmail,time()+7*24*60*60);
      session_start();
      $_SESSION['docEmail']=$docEmail;
      header('location:doctorIndex.php');
      
    }else{
      $msg= '<div class="alert alert-danger">*Invalid Doctor Name or Password </div>';
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
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Doctor Login</h4>
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
                      <label for="docEmail">E-mail</label>
                      <input type="text" class="form-control" name="docEmail" id="docEmail" placeholder="Enter Doctor E-mail Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['docEmail'])){
                              echo $err['docEmail'];
                            } ?>
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="docPassword">Password</label>
                      <input type="text" class="form-control" name="docPassword" id="docPassword" placeholder="Enter Your Password">
                      <span class="errorDisplay">
                              <?php if (isset($err['docPassword'])){
                              echo $err['docPassword'];
                            } ?>
                      </span>
                    </div>

                    <button type="submit" name="login" class="btn btn-block btn-success">Login</button><br>
                    <p class="text-center">Not Yet a Member? <a href="doctorRegister.php">Sign up</a>
                    <br><br>
                  </form>
                  
              </div>
           </div>
       </div>

</body>
</html>
