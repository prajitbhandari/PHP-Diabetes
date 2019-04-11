<?php
$result='';
if(isset($_POST['submit'])){
    $err = array();
    //check for username
    if (isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        if (!preg_match("/^([a-zA-Z' ]+)$/","name")){
            $err['name'] = "Invalid Name";  
        }
        
    }else{
        $err['name'] = "*Enter the name";
    }

    //check for email
    if (isset($_POST['email']) && !empty($_POST['email']) ){
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $err['email'] = "Invalid Email address";
            }
        }
       else {
        $err['email'] = "*Enter Email";
    }
    //check for phone
    if (isset($_POST['phone']) && !empty($_POST['phone'])){
        $phone = $_POST['phone'];
       if(!preg_match('/^[0-9]{10}+$/', $phone)){
            $err['phone'] = "*Invalid Phone";
        } 
        
    }else{
        $err['phone'] = "*Enter Phone number";
    }

    //check for message
    if (isset($_POST['message']) && !empty($_POST['message']) ){
        $message= $_POST['message'];
        }
       else {
        $err['message'] = "*Write Some Message";
    }

     //check for number of error
          // if(count($err) == 0) {
          //   require "connect.php";
          //   $sql = "insert into tbl_contact(Name,Email,Message) values 
          //   ('$name','$email','$message')";

          //   $result=mysqli_query($conn, $sql);
          //   if ($result){
          //     echo "Successfully Booked";  
          //   }else{
          //     echo "Booking failed";
          //   }   
          // }
    if (count($err)==0) {
      $result='<div class="alert alert-success"> Contact Submitted</div>';
    }
    else  {
    $result='<div class="alert alert-danger">Contact Failure</div>';
  }
   
 }
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
     <title>Multipager Template- Travelic </title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--ANIMATED FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
     <!--PRETTYPHOTO MAIN STYLE -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
       <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .errorDisplay{
            color:red;
        }
    </style>

</head>
<body>
     <!-- NAV SECTION -->
         <div class="navbar navbar-inverse navbar-fixed-top">
       
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">YOUR LOGO</a>
            </div>
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right" id="nav-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Predict.php">Predict Disease</a></li>
                        <li><a href="viewDoctor.php">View Doctors</a></li>
                        <li><a href="doctorResponse.php">Doctors Response</a></li>
                        <li><a href="Help.php">Help</a></li>
                        <li><a href="Contact.php">Contact Us</a></li>
                        <li><a href="Logout.php"><?php 
                          if(!isset($_COOKIE['username']))
                            echo "Login";
                          else
                            echo "Logout";
                        ?></a></li>
                </ul>
            </div>
           
        </div>
    </div>
     <!--END NAV SECTION -->
    
  

    <!--CONTACT SECTION-->    
    <section  >
        <div class="container">
            <div class="row">
                <div class="row g-pad-bottom">
                    <div class="col-md-6  ">
                        <h2>Contact Us</h2>
                     
                        <p>
                             <strong> Address: </strong> &nbsp;Maitidevi,Kathmandu
                            <br />
                            <strong> Phone: </strong> &nbsp;+977-9842687243
                            <br />
                            <strong> Email: </strong> &nbsp;diabetesprediction@gmail.com
                            <br />
                            Please fill out the form below and we will get back to you as soon as possible. Need quicker answers? Call us at given numbers.          
                        </p>
                        <form action="Contact.php" method="POST" name="contactForm">
                            <div class="row form-group ">
                              <div class="col-md-12 col-sm-12 ">
                                  <?php echo $result; ?>    
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6  ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name ="name"  placeholder="Name">
                                        <div class="errorDisplay">
                                            <?php if (isset($err['name'])){
                                                echo $err['name'];
                                            } ?>
                                        </div>
                                    <br>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email"  placeholder="Email address">
                                        <div class="errorDisplay">
                                            <?php if (isset($err['email'])){
                                            echo $err['email'];
                                            } ?>
                                        </div>
                                    <br>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
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
                                        <textarea name="message" id="message" name="message" class="form-control" rows="3" 
                                        placeholder="Message"></textarea>
                                        <div class="errorDisplay">
                                            <?php if (isset($err['message'])){
                                            echo $err['message'];
                                            } ?>
                                        </div>
                                    <br>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name ="submit" class="btn btn-block btn-success">Submit Request</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6  ">
                        <h2>About Us</h2>
                        <p>Diabetes Prediction System is a web based application 
                        that aims in providing quality health services to the people.
                        The main purpose to develop this application is to collect
                        the data related to symptoms or behaviour of user and calculate
                        the probability of whether the user may have suffered from a particular
                        disease or not and to notify the user about the risk he/she has.For the 
                        existing user who are suffered earlier from a particular disease,this
                        application checks for probability of the next disease or wheter they 
                        have been cured previous disease</p>
                    </div>
            </div>     
        </div>
    </section>
    <!--END CONTACT SECTION-->

   

   

    <!--FOOTER SECTION -->
    <div id="footer">
        2014 www.yourdomain.com | All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="assets/plugins/bootstrap.min.js"></script>  
     <!-- ISOTOPE SCRIPT   -->
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <!-- PRETTY PHOTO SCRIPT   -->
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>    
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
