<?php
  
  $result='';

  //check for button click---form submit
  if(isset($_POST['add'])){
  $err = array();

   // if(!isset($_COOKIE['adminName'])){
    //    header('location:adminLogin.php?xy=1');
    // }
  //check for Doctor Name
  if (isset($_POST['docName']) && !empty($_POST['docName']) ){
    $docName = $_POST['docName'];
        if (!preg_match("/^[a-zA-Z' ]*$/",$docName)) {
      $err['docName'] = "*Invalid Name";
    }
     }else {
    $err['docName'] = "*Enter Doctor Name";
  }

  //check for Doctor Email
  if (isset($_POST['docEmail']) && !empty($_POST['docEmail']) ){
    $docEmail = $_POST['docEmail'];
    if(!filter_var($docEmail,FILTER_VALIDATE_EMAIL)){
      $err['docEmail'] = "*Invalid Email Address";
    }
     }else {
    $err['docEmail'] = "*Enter Doctor Email Address";
  }


  //check for Doctor Phone
  if (isset($_POST['docPhone']) && !empty($_POST['docPhone']) ){
    $docPhone = $_POST['docPhone'];
    if (!preg_match("/^[0-9]{10}+$/",$docPhone)) {
      $err['docPhone'] = "*Invalid Doctor Phone Number";
    }
     }else {
    $err['docPhone'] = "*Enter Doctor Phone Number";
  }

  //check for Doctor Address
  if (isset($_POST['docAddress']) && !empty($_POST['docAddress'])){
    $docAddress = $_POST['docAddress'];
    if (!preg_match("/^[a-zA-Z0-9 ]+$/",$docAddress)) {
      $err['docAddress'] = "*Invalid Address";
    }
  }else {
    $err['docAddress'] = "*Enter Doctor Address";
    }


  //check for Qualification
  if (isset($_POST['docQualification']) && !empty($_POST['docQualification']) ){
    $docQualification = $_POST['docQualification'];
    if (!preg_match("/^[a-zA-Z ]+$/",$docQualification)) {
      $err['docQualification'] = "*Invalid Doctor Qualification";
    }
     }else {
    $err['docQualification'] = "*Enter Doctor Qualification";
  }


  // check for number of error
  if(count($err) == 0) {
    require "connect.php";
    $sql = "insert into tbl_doctor(docName,docEmail,docPhone,docAddress,docQualification) values 
    ('$docName','$docEmail','$docPhone','docAddress','$docQualification')";
    $res=mysqli_query($conn, $sql);
    
    if ($res){
      $result='<div class="alert alert-success"> Doctor Added Successfully</div>';
    }   
  }else{
      $result='<div class="alert alert-danger">Failed to Add Doctor</div>';
    }

  }
?>



<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Diabetes Prediction System </title>
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
            
        </div>

        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav navbar-right" id="nav-list">
              <li><a href="index.php">Home</a></li>
              <li><a href="createDataSet.php">Create Data Set</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="addHelpInfo.php">Add HelpInfo</a></li>
              <li><a href="manageHelpInfo.php">Manage HelpInfo</a></li>
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
                      <input type="text" class="form-control" name="docName" id="docName" placeholder="Enter Doctor Name">
                      <span class="errorDisplay">
                              <?php if (isset($err['docName'])){
                              echo $err['docName'];
                            } ?>
                      </span>
                          <br>
                    </div>

                    <div class="form-group">
                      <label for="docEmail">E-mail</label>
                      <input type="text" class="form-control" name="docEmail" id="docEmail" aria-describedby="emailHelp" placeholder="Enter E-mail Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['docEmail'])){
                              echo $err['docEmail'];
                            } ?>
                      </span>
                        <br>
                    </div>

                    <div class="form-group">
                      <label for="docPhone">Phone</label>
                      <input type="text" class="form-control" name="docPhone" id="docPhone" placeholder="Enter your Phone Number">
                      <span class="errorDisplay">
                          <?php if (isset($err['docPhone'])){
                              echo $err['docPhone'];
                            } ?>
                      </span>
                        <br>
                    </div>
                    
                    <div class="form-group">
                      <label for="docAddress">Address</label>
                      <input type="text" class="form-control" name="docAddress" id="docAddress" placeholder="Enter your Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['docAddress'])){
                              echo $err['docAddress'];
                            } ?>
                      </span>
                          <br>
                    </div>
                    
                    <div class="form-group">
                      <label for="docQualification">Qualification</label>
                      <input type="text" class="form-control" name="docQualification" id="docQualification" placeholder="Enter Your Qualification">
                      <span class="errorDisplay">
                              <?php if (isset($err['docQualification'])){
                              echo $err['docQualification'];
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
        2019 www.yourdomain.com | All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

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
