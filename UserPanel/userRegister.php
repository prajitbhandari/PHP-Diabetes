<?php
//session
$msg='';
if(isset($_COOKIE['email'])){
		session_start();
		$_SESSION['email']=$_COOKIE['email'];
		header('location:userIndex.php');
	}

//check for button click---form submit
if(isset($_POST['register'])){
	$err = array();

	//check for firstname
	if (isset($_POST['fname']) && !empty($_POST['fname'])){
		$fname = trim($_POST['fname']);
		if ( !preg_match('/^[A-Za-z]+$/', $fname) ){
			$err['fname'] = "*Invalid First Name";	
		}
				
	}else{
		$err['fname'] = "*Enter the First Name";
	}

	//check for username
	if (isset($_POST['lname']) && !empty($_POST['lname'])){
		$lname = trim($_POST['lname']);
		if ( !preg_match('/^[A-Za-z]+$/', $lname) ){
			$err['lname'] = "*Invalid Last Name";	
		}	
	}else{
		$err['lname'] = "*Enter the Last Name";
	}

	//check for email
	if (isset($_POST['email']) && !empty($_POST['email']) ){
		$email = trim($_POST['email']);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$err['email'] = "*Invalid Email address";
			}
			require "connect.php";
			$sql="select * from tbl_user where email='$email'";
			$result=mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				$err['email'] = "*Email Already Created";
			}
		}
	   else {
		$err['email'] = "*Enter Email";
	}

	//check for phone
	if (isset($_POST['phone']) && !empty($_POST['phone'])){
		$phone = trim($_POST['phone']);
		if(!preg_match('/^[0-9]{10}$/', $phone)){
			$err['phone'] = "*Enter Valid Phone number";
		}
		require "connect.php";
		$sql="select * from tbl_user where phone='$phone'";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			$err['phone'] = "*Phone Number Already Created";
		}
	} else {
		$err['phone'] = "*Enter phone number";
	}

	//check for address
	if (isset($_POST['address']) && !empty($_POST['address'])){
		$address = trim($_POST['address']);
		if ( !preg_match('/^([A-Za-z][A-Za-z0-9]+)$/', $address) ){
			$err['address'] = "*Invalid Address";	
		}
		
	}else{
		$err['address'] = "*Enter the Address";
	}

	//check for password
	if (isset($_POST['password_1']) && !empty($_POST['password_1'])){
		$password_1 =trim($_POST['password_1']);
		$passlength=strlen($password_1);

		if($passlength<6){
			$err['password_1']="*Enter Password of minimum 6 characters";
		}else{
		  $password_1 = trim($_POST['password_1']);
			//check for confirm password
		}
		
	} else {
		$err['password_1'] = "*Enter Password";
	}

	//check for number of error
	if(count($err) == 0) {
		require "connect.php";
		$sql = "insert into tbl_user(fname,lname,email,phone,address,password) values 
		('$fname','$lname','$email','$phone','$address','$password_1')";	
		echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>'; 
		echo $sql;
		$result=mysqli_query($conn, $sql);
		
		if ($result){
			echo "User created successful";
			setcookie('email',$email,time()+7*24*60*60);
			session_start();
			$_SESSION['email']=$email;
			header('location:userIndex.php');

		}		
	}else{
			$msg= '<div class="alert alert-danger">Registration Failed</div>';
		}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
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
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp; User Registration Form</h4>
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
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
                      <span class="errorDisplay">
                              <?php if (isset($err['fname'])){
                              echo $err['fname'];
                            } ?>
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
                      <span class="errorDisplay">
                              <?php if (isset($err['lname'])){
                              echo $err['lname'];
                            } ?>
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" name="email" id="email"  placeholder="Enter E-mail Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['email'])){
                              echo $err['email'];
                            } ?>
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your Phone Number">
                      <span class="errorDisplay">
                          <?php if (isset($err['phone'])){
                              echo $err['phone'];
                            } ?>
                      </span>
                        
                    </div>
                    
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Enter your Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['address'])){
                              echo $err['address'];
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

                    <button type="submit" name="register" class="btn btn-block btn-success">Register</button><br>
                    <p class="text-center">Already a Member? <a href="userlogin.php">Sign In </a></p><br><br>
                  </form>
                  
              </div>
           </div>
       </div>

</body>
</html>
