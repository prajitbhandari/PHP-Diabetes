<?php
//check for button click---form submit
$result='';
if(isset($_POST['predict'])){
  $err = array();
  
   // if(!isset($_COOKIE['adminName'])){
    //    header('location:adminLogin.php?xy=1');
    // }
  //check for Pregnancy number
  if (isset($_POST['pregnancy']) && !empty($_POST['pregnancy']) ){
    $pregnancy = $_POST['pregnancy'];
    if(!preg_match('/^[0-9]+$/', $pregnancy)){
      $err['pregnancy'] = "*Invalid Pregnancy Value";
    }
     }else {
    $err['pregnancy'] = "*Enter Pregnancy Value";
  }

  //check for glucose value
  if (isset($_POST['glucose']) && !empty($_POST['glucose']) ){
    $glucose = $_POST['glucose'];
    if(!preg_match('/^[0-9]+$/', $glucose)){
      $err['glucose'] = "*Invalid Glucose Value";
    }
     }else {
    $err['glucose'] = "*Enter Glucose Value";
  }

  
  //check for Blood Pressure
  if (isset($_POST['BP']) && !empty($_POST['BP'])){
    $BP = $_POST['BP'];
    if(!preg_match('/^[0-9]+$/', $BP)){
      $err['BP'] = "*Invalid Blood Pressure Value";
    }
  }else {
    $err['BP'] = "*Enter Blood Pressure Value";
  }

  //check for SKin Thickness
  if (isset($_POST['skin']) && !empty($_POST['skin'])){
    $skin = $_POST['skin'];
    if(!preg_match('/^[0-9]+$/', $skin)){
      $err['skin'] = "*Invalid Skin Thickness Value";
    }
  }else {
    $err['skin'] = "*Enter Skin Thickness Value";
    }
  

  //check for Insulin
  if (isset($_POST['insulin']) && !empty($_POST['insulin']) ){
    $insulin = $_POST['insulin'];
    if(!preg_match('/^[0-9]+$/', $insulin)){
      $err['insulin'] = "*Invalid Insulin Value";
    }
     }else {
    $err['insulin'] = "*Enter Insulin Value";
  }

  //check for BMI
  if (isset($_POST['BMI']) && !empty($_POST['BMI']) ){
    $BMI = $_POST['BMI'];
    if(!preg_match('/^[0-9]+$/', $BMI)){
      $err['BMI'] = "*Invalid BMI Value";
    }
     }else {
    $err['BMI'] = "*Enter BMI Value";
  }
  //check for Pedegree Function
  if (isset($_POST['pedegree']) && !empty($_POST['pedegree']) ){
    $pedegree = $_POST['pedegree'];
    if(!preg_match('/^[0-9]+$/', $pregnancy)){
      $err['pedegree'] = "*Invalid Pedegree Value";
    }
     }else {
    $err['pedegree'] = "*Enter Pedegree Value";
  }

  //check for age
  if (isset($_POST['age']) && !empty($_POST['age'])){
    $age = $_POST['age'];
    if(!preg_match('/^[0-9]{2}+$/', $age)){
      $err['age'] = "*Invalid age";
    } 
  }else{
    $err['age'] = "*Enter your age";
  }
  //check for number of error
  // if(count($err) == 0) {
  //   require "connect.php";
  //   $sql = "insert into tbl_package(Destination,Duration,PriceWithPlane,PriceWithBus,Inclusion,Exclusion,TripHighlight,Contact) values 
  //   ('$destination','$duration','$priceWithPlane','$priceWithBus','$inclusion','$exclusion','$tripHighlight','$contact')";
  //   $result=mysqli_query($conn, $sql);
    
  //   if ($result){
  //     echo "User created successful";
  //   }else{
  //     echo "User creation failed";
  //   }   
  // }

   if (count($err)==0) {
      $result='<div class="alert alert-success"> Prediction Successful</div>';
    }
    else  {
    $result='<div class="alert alert-danger">Prediction Failure</div>';
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
          color: red;
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
    
  

    <!--Package SECTION-->    
    <section  id="services-sec">
        <div class="container">
            <div class="row ">
                   <div class="col-md-6 col-sm-6 ">
                        <h4>Please Fill up the form to Predict Diabetes</h4>
                        <form  method="POST" action="Predict.php" name="predictForm">
                           <div class="row form-group">
                              <div class="col-md-12 col-sm-12">
                                  <?php echo $result; ?>    
                              </div>
                            </div>
                          
                          <div class="form-group">
                            <label for="inputPregnancy">Pregnancies</label>
                            <input type="text" class="form-control"  name ="pregnancy" id="inputPregnancy" placeholder="Enter Pregnancy Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['pregnancy'])){
                                echo $err['pregnancy'];
                              } ?>
                            </span>
                            <br>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputGlucose">Glucose</label>
                            <input type="text" class="form-control" name="glucose" id="inputGlucose" placeholder="Enter Glucose Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['glucose'])){
                                echo $err['glucose'];
                              } ?>
                            </span>
                            <br>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputBP">Blood Pressure</label>
                            <input type="text" class="form-control"  name="BP" id="inputBP" placeholder="Enter Blood Pressure Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['BP'])){
                                echo $err['BP'];
                              } ?>
                            </span>
                            <br>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputSkin">Skin Thickness</label>
                            <input type="text" class="form-control" name="skin" id="inputSkin" placeholder="Enter Skin Thickness Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['skin'])){
                                echo $err['skin'];
                              } ?>
                            </span>
                            <br>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputInsulin">Insulin</label>
                            <input type="text" class="form-control" name="insulin" id="inputInsulin" placeholder="Enter Insulin Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['insulin'])){
                                echo $err['insulin'];
                              } ?>
                            </span>
                            <br>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputBMI">BMI</label>
                            <input type="text" class="form-control" name="BMI" id="inputBMI" placeholder="Enter BMI Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['BMI'])){
                                echo $err['BMI'];
                              } ?>
                            </span>
                            <br>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputPedegree">Diabetes Pedegree Function</label>
                            <input type="text" class="form-control" name="pedegree" id="inputPedegree" placeholder="Enter Diabetes Pedegree Function Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['pedegree'])){
                                echo $err['pedegree'];
                              } ?>
                            </span>
                            <br>
                          </div>

                          <div class="form-group">
                            <label for="inputAge">Age</label>
                            <input type="text" class="form-control" name="age" id="inputAge" placeholder="Enter Age">
                            <span class="errorDisplay">
                                <?php if (isset($err['age'])){
                                echo $err['age'];
                              } ?>
                            </span>
                            <br>
                          </div>

                          <div class="form-group">
                             <button type="submit"  name="predict" class="btn btn-block btn-primary">Predict</button>
                          </div>

                        </form><br/><br/>
                    </div> 

                    <div class="col-md-6 col-sm-6">
                         <h3>About Form</h3>
                         You have any difficulties,visit the help section
                         asdlnasldasldlaladna
                         asndasldasdn
                         asdasndasn
                         aslndaslkdnals
                         alsndlasndlasn
                         asldnalsndas
                         asdlksad 
                    </div>            
            </div>
        </div>
    </section>
    <!--END Package SECTION-->
  
    

   

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
