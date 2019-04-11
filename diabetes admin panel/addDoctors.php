<?php
//check for button click---form submit
$result='';
if(isset($_POST['add'])){
  $err = array();
  
   // if(!isset($_COOKIE['adminName'])){
    //    header('location:adminLogin.php?xy=1');
    // }
  //check for Doctor Name
  if (isset($_POST['docname']) && !empty($_POST['docname']) ){
    $docname = $_POST['docname'];
    if(!preg_match('/^[A-Za-z]+$/', $docname)){
      $err['docname'] = "*Invalid Name";
    }
     }else {
    $err['docname'] = "*Enter Doctor Name";
  }

  //check for Doctor Email
  if (isset($_POST['docemail']) && !empty($_POST['docemail']) ){
    $docemail = $_POST['docemail'];
    if(!filter_var($docemail,FILTER_VALIDATE_EMAIL)){
      $err['docemail'] = "*Invalid Email Address";
    }
     }else {
    $err['docemail'] = "*Enter Doctor Email Address";
  }

  
  //check for Doctor Phone
  if (isset($_POST['docphone']) && !empty($_POST['docphone'])){
    $docphone = $_POST['docphone'];
    if(!preg_match('/^[0-9]{10}+$/', $docphone)){
      $err['docphone'] = "*Invalid Phone Number";
    }
  }else {
    $err['docphone'] = "*Enter Doctor Phone Number";
  }

  //check for Doctor Address
  if (isset($_POST['docaddress']) && !empty($_POST['docaddress'])){
    $docaddress = $_POST['docaddress'];
    if(!preg_match('/^[A-Za-z]+$/', $docaddress)){
      $err['docaddress'] = "*Invalid Address";
    }
  }else {
    $err['docaddress'] = "*Enter Doctor Address";
    }
  

  //check for Qualification
  if (isset($_POST['docqualification']) && !empty($_POST['docqualification']) ){
    $docqualification = $_POST['docqualification'];
    if(!preg_match('/^[A-Za-z]+$/', $docqualification)){
      $err['docqualification'] = "*Invalid Doctor Qualification";
    }
     }else {
    $err['docqualification'] = "*Enter Doctor Qualification";
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
      $result='<div class="alert alert-success"> Doctor Added Successfully</div>';
    }
    else  {
    $result='<div class="alert alert-danger">Failed to Add Doctor</div>';
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
                        <li><a href="createDataSet.php">Create Data Set</a></li>
                        <li><a href="addDoctors.php">Add Doctors</a></li>
                        <li><a href="manageDoctors.php">Manage Doctors</a></li>
                        <li><a href="manageUsers.php">Manage Users</a></li>
                        <li><a href="Logout.php"><?php 
                          // if(!isset($_COOKIE['username']))
                          //   echo "Login";
                          // else
                          //   echo "Logout";
                        ?></a></li>
                </ul>
            </div>  
        </div>
    </div>
     <!--END NAV SECTION -->
    
  

      <!-- PORTFOLIO SECTION-->
   <section id="port-sec">
       <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="width: 559px;
                     margin-left: 306px; border-radius: 8px;">
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Add Doctors</h4>
                                     
                    </div> 
                </div>
                  </div>
           <div class="row g-pad-bottom" >
                <div class="col-md-6 col-md-offset-3">
                   <form method="POST" action="addDoctors.php" name="doctorForm">
                      <?php 
                          echo $result;
                      ?>
                      <div class="form-group">
                        <label for="docName">DocName</label>
                        <input type="text" class="form-control" name="docname" id="docName" placeholder="Enter Doctor Name">
                        <span class="errorDisplay">
                                <?php if (isset($err['docname'])){
                                echo $err['docname'];
                              } ?>
                        </span>
                            <br>
                      </div>

                      <div class="form-group">
                        <label for="docEmail">E-mail</label>
                        <input type="text" class="form-control" name="docemail" id="docEmail" aria-describedby="emailHelp" placeholder="Enter E-mail Address">
                        <span class="errorDisplay">
                                <?php if (isset($err['docemail'])){
                                echo $err['docemail'];
                              } ?>
                        </span>
                          <br>
                      </div>

                      <div class="form-group">
                        <label for="docPhone">Phone</label>
                        <input type="text" class="form-control" name="docphone" id="docPhone" placeholder="Enter your Phone Number">
                        <span class="errorDisplay">
                            <?php if (isset($err['docphone'])){
                                echo $err['docphone'];
                              } ?>
                        </span>
                          <br>
                      </div>
                      
                      <div class="form-group">
                        <label for="docAddress">Address</label>
                        <input type="text" class="form-control" name="docaddress" id="docAddress" placeholder="Enter your Address">
                        <span class="errorDisplay">
                                <?php if (isset($err['docaddress'])){
                                echo $err['docaddress'];
                              } ?>
                        </span>
                            <br>
                      </div>
                      
                      <div class="form-group">
                        <label for="docQualification">Qualification</label>
                        <input type="text" class="form-control" name="docqualification" id="docQualification" placeholder="Enter Your Qualification">
                        <span class="errorDisplay">
                                <?php if (isset($err['docqualification'])){
                                echo $err['docqualification'];
                              } ?>
                        </span>
                            <br>
                      </div>

                      <button type="submit" name="add" class="btn btn-block btn-primary">Add</button>
                    </form>
                </div>
           </div>
       </div>
   </section>
     <!-- END PORTFOLIO SECTION-->
   

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
