<?php
$msg='';
if(isset($_POST['submit'])){
    $err = array();
    //check for firstname
    if (isset($_POST['fname']) && !empty($_POST['fname'])){
        $fname = trim($_POST['fname']);
        if(!preg_match("/^([a-zA-Z]+)$/",$fname)){
            $err['fname'] = "Invalid First Name";  
        }
        
    }else{
        $err['fname'] = "*Enter the First Name";
    }

     //check for lastname
    if (isset($_POST['lname']) && !empty($_POST['lname'])){
        $lname = trim($_POST['lname']);
        if(!preg_match("/^([a-zA-Z]+)$/",$lname)){
            $err['lname'] = "Invalid Last Name";  
        }
        
    }else{
        $err['lname'] = "*Enter the Last Name";
    }

    //check for email
    if (isset($_POST['email']) && !empty($_POST['email'])){
        $email= trim($_POST['email']);
        if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){
            $err['email'] = "Invalid Email Address";  
        }
        
    }else{
        $err['email'] = "*Enter the Email Address";
    }
    

    //check for phone
    if (isset($_POST['phone']) && !empty($_POST['phone'])){
        $phone = trim($_POST['phone']);
        if (!preg_match("/^[0-9]{10}$/",$phone)){
            $err['phone'] = "Invalid Phone";  
        }
        
    }else{
        $err['phone'] = "*Enter the phone";
    }

    //check for message
    if (isset($_POST['message']) && !empty($_POST['message']) ){
        $message= $_POST['message'];
        }
       else {
        $err['message'] = "*Write Some Message";
    }

     //check for number of error
          if(count($err) == 0) {
            require "connect.php";
            $sql = "insert into tbl_contact(fname,lname,email,phone,message) values 
            ('$fname','$lname','$email','$phone','$message')";

            $result=mysqli_query($conn, $sql);
            if ($result){
              $msg='<div class="alert alert-success"> Contact added Successful</div>';
            }   
          }else{
              $msg='<div class="alert alert-danger"> Contact Failed</div>';
            }
   
 }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Diabetes Prediction System</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">

    	body{
    		background-color: #0091ea;
    	}
	    #home-sec { 
			background: url(../img/1.jpg) no-repeat 50% 50%;
			background-attachment: fixed;
			background-size: cover;
			width: 100%;
			display: block;
			height: auto;
			padding-top:190px;
			min-height:650px;
			color:#fff;
		}

		.head-main {
		    font-size:50px ;
		    font-weight:900;
		    border:5px outset  #fff;
		    padding:15px;
		    text-transform:uppercase;
		    color:#ff7043;
    
		}

		#home-block{
            position:absolute;
            top:50%;
            left:2%;
		}

		section {
		    padding-top:2px;
		    margin-top:2px;
		}

        #footer {
            /*position: fixed;
            width: 100%;
            bottom: 0;
            height: 60px;*/
            background-color:#ff5252;
            color: #000;
            padding: 20px 50px 20px 50px;
            text-align: right;
            border-top: 1px solid #d6d6d6;
        }

        .errorDisplay{
          color: red;
         }
    </style>
</head>
<body>
	<!-----------NAV SECTION-------->
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="Predict.php">Predict Disease</a></li>
                <li><a href="viewDoctor.php">View Doctors</a></li>
                <li><a href="doctorResponse.php">Doctors Response</a></li>
                <li><a href="Help.php">Help</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to User Panel</p>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav>
	<!-----------END NAV SECTION-------->

    <section  >
        <div class="container">
             <div class="row g-pad-bottom">
                <div class="col-md-6 col-sm-6">
                    <h2>Contact Us</h2>
                    <p>
                        <strong> Address: </strong> &nbsp;Maitidevi,Kathmandu
                        <br />
                        <strong> Phone: </strong> &nbsp;9842687243
                        <br />
                        <strong> Email: </strong> &nbsp;diabetespredictionsystem@gmail.com
                        <br />
                        Please fill out the form below and we will get back to you as soon as possible. Need quicker answers? Call us at given numbers.          
                    </p>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <?php echo $msg;?>
                                    <br>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
                                      <div class="errorDisplay">
                                        <?php if (isset($err['fname'])){
                                         echo $err['fname'];
                                        } ?>
                                      </div>
                                     <br>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
                                      <div class="errorDisplay">
                                        <?php if (isset($err['lname'])){
                                         echo $err['lname'];
                                        } ?>
                                      </div>
                                     <br>
                                </div>
                            </div>
                        </div>


                        <div class="row">   
                           <div class="col-md-12 ">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter E-mail Address" name="email">
                                    <div class="errorDisplay">
                                        <?php if (isset($err['email'])){
                                        echo $err['email'];
                                        } ?>
                                    </div>
                                    <br>
                                </div>
                            </div>             
                        </div>          

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone"  class="form-control" rows="3" placeholder="Enter Phone Number">
                                    <div class="errorDisplay">
                                        <?php if (isset($err['phone'])){
                                        echo $err['phone'];
                                        } ?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <textarea name="message" id="message"  class="form-control" rows="3" placeholder="Enter Some Message"></textarea>
                                    <div class="errorDisplay">
                                        <?php if (isset($err['message'])){
                                        echo $err['message'];
                                        } ?>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success " name="submit">Submit Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.3794981426213!2d85.3322217150153!3d27.705566782792655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199ffe9d7c6b%3A0x91b3a969f305a0bc!2sMaitidevi%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1549095261378" width="570" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </section>

     <!--FOOTER SECTION -->
    <div id="footer">
        2019 www.yourdomain.com|All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

</body>
</html>