<?php
$result='';
if(isset($_POST['submit'])){
    $err = array();
    //check for username
    if (isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z' ]*$/",$name)){
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
        if (!preg_match("/^[0-9 ]{10}+$/",$phone)){
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
            $sql = "insert into tbl_contact(name,email,phone,message) values 
            ('$name','$email','$phone','$message')";

            $result=mysqli_query($conn, $sql);
            if ($result){
              $result='<div class="alert alert-success"> Contact added Successful</div>';
            }   
          }else{
              $result='<div class="alert alert-danger"> Contact Failed</div>';
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
     <title>Contact </title>
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
        <div class="navbar navbar-inverse navbar-fixed-top" id="nav">
       
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                  <span class="logo">DPS</span>
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
                        <strong> Email: </strong> &nbsp;everesttravel&tours@gmail.com
                        <br />
                        Please fill out the form below and we will get back to you as soon as possible. Need quicker answers? Call us at given numbers.          
                    </p>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <?php echo $result;?>
                                    <br>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
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
                                    <input type="text" class="form-control" placeholder="Email address" name="email">
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
                                    <input type="text" name="phone" id="phone"  class="form-control" rows="3" placeholder="Phone">
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
                                    <textarea name="message" id="message"  class="form-control" rows="3" placeholder="Message"></textarea>
                                    <div class="errorDisplay">
                                        <?php if (isset($err['message'])){
                                        echo $err['message'];
                                        } ?>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" name="submit">Submit Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
               <!--  <div class="col-md-6">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.3794981426213!2d85.3322217150153!3d27.705566782792655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199ffe9d7c6b%3A0x91b3a969f305a0bc!2sMaitidevi%2C+Kathmandu+44600!5e0!3m2!1sen!2snp!4v1549095261378" width="570" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div> -->
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
