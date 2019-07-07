<?php
  
  $msg='';

  //check for button click---form submit
  if(isset($_POST['add'])){
  $err = array();

 

  //check for Doctor First Name
  if (isset($_POST['fname']) && !empty($_POST['fname']) ){
    $fname = trim($_POST['fname']);
      if(!preg_match("/^([a-zA-Z]+)$/",$fname)){
      $err['fname'] = "*Invalid First Name";
    } 
  }else {
    $err['fname'] = "*Enter Doctor First Name";
  }

  //check for Doctor Last Name
  if (isset($_POST['lname']) && !empty($_POST['lname']) ){
    $lname = trim($_POST['lname']);
      if(!preg_match("/^([a-zA-Z]+)$/",$lname)){
      $err['lname'] = "*Invalid last Name";
    }
     }else {
    $err['lname'] = "*Enter Doctor Last  Name";
  }

    //check for Gender
    if (isset($_POST['inputGender']) && !empty($_POST['inputGender'])){
        $inputGender = trim($_POST['inputGender']);
      }else{
        $err['gender'] = "*Select Gender";         
    }
  

  //check for Doctor Email
  if (isset($_POST['docEmail']) && !empty($_POST['docEmail']) ){
    $docEmail = trim($_POST['docEmail']);
    if(!filter_var($docEmail,FILTER_VALIDATE_EMAIL)){
      $err['docEmail'] = "*Invalid Email Address";
    }
    require "connect.php";
    $sql="select * from tbl_doctor where docEmail='$docEmail'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      $err['docEmail'] = "*Email Already Created";
    }
     }else {
    $err['docEmail'] = "*Enter Doctor Email Address";
  }


  //check for Doctor Phone
  if (isset($_POST['docPhone']) && !empty($_POST['docPhone']) ){
    $docPhone = trim($_POST['docPhone']);
    if (!preg_match("/^[0-9]{10}$/",$docPhone)) {
      $err['docPhone'] = "*Invalid Doctor Phone Number";
    }
    require "connect.php";
    $sql="select * from tbl_doctor where docPhone='$docPhone'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      $err['docPhone'] = "*Phone Number Already Created";
    }
     }else {
    $err['docPhone'] = "*Enter Doctor Phone Number";
  }

  //check for Doctor Address
  if (isset($_POST['docAddress']) && !empty($_POST['docAddress'])){
    $docAddress = trim($_POST['docAddress']);
    if (!preg_match("/^([a-zA-Z0-9]+)$/",$docAddress)) {
      $err['docAddress'] = "*Invalid Address";
    }
  }else {
    $err['docAddress'] = "*Enter Doctor Address";
    }


  //check for Qualification
  if (isset($_POST['docQualification']) && !empty($_POST['docQualification']) ){
    $docQualification = trim($_POST['docQualification']);
    if (!preg_match("/^[a-zA-Z]+$/",$docQualification)) {
      $err['docQualification'] = "*Invalid Doctor Qualification";
    }
     }else {
    $err['docQualification'] = "*Enter Doctor Qualification";
  }

  if(isset($_POST['docPassword'])&& !empty($_POST['docPassword']))
  {
    $docPassword=trim($_POST['docPassword']);
  }else{
    $err['docPassword']= "*Enter Doctor Password";
  }


  // check for number of error
  if(count($err) == 0) {
      require "connect.php";
      $addsql = "insert into tbl_doctor(fname,lname,gender,docEmail,docPhone,docAddress,docQualification,docPassword) values 
      ('$fname','$lname','$inputGender','$docEmail','$docPhone','$docAddress','$docQualification','$docPassword')";
      $result=mysqli_query($conn, $addsql);
      if ($result){
        $msg='<div class="alert alert-success"> Doctor Added Successful</div>';
        }   
    }
    else{
        $msg='<div class="alert alert-danger"> Doctor Failed to Add</div>';
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">

      body{
        background-color:/* #0091ea;*/
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
            top:40%;
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
              <li><a href="adminIndex.php">Home</a></li>
              <li><a href="importgaussiandata.php">Load Data Set</a></li>
              <li><a href="Predict.php">Predict Diabetes</a></li>
              <li><a href="Help.php">Help</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">View Users</a></li>
              <li><a href="adminlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to Admin Panel</p>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav>
  <!-----------END NAV SECTION-------->

    <!--HOME SECTION-->
      <section>
       <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="width: 559px;
                     margin-left: 306px; border-radius: 8px;">
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Add Doctors</h4>
                     </div> 
                </div>
            </div>
            <br>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                 <form method="POST" action="addDoctors.php" name="doctorForm">
                    <?php 
                        echo $msg;
                    ?>
                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Doctor First Name">
                      <span class="errorDisplay">
                              <?php if (isset($err['fname'])){
                              echo $err['fname'];
                            } ?>
                      </span>
                          <br>
                    </div>

                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Doctor LastName">
                      <span class="errorDisplay">
                              <?php if (isset($err['lname'])){
                              echo $err['lname'];
                            } ?>
                      </span>
                          <br>
                    </div>

                    <div class="form-group">
                      <label for="inputGender">Gender:</label>&nbsp;
                        Male <input type="radio"   name="inputGender" value="Male" id="radioMale" >
                        Female <input type="radio" name="inputGender" value="Female" id="radioFemale" >
                      <span class="errorDisplay">
                              <?php if (isset($err['gender'])){
                              echo $err['gender'];
                            } ?>
                      </span>
                          <br>
                    </div>

                    <div class="form-group">
                      <label for="docEmail">E-mail</label>
                      <input type="text" class="form-control" name="docEmail" id="docEmail" placeholder="Enter Doctor E-mail Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['docEmail'])){
                              echo $err['docEmail'];
                            } ?>
                      </span>
                        <br>
                    </div>

                    <div class="form-group">
                      <label for="docPhone">Phone</label>
                      <input type="text" class="form-control" name="docPhone" id="docPhone" placeholder="Enter Doctor  Phone Number">
                      <span class="errorDisplay">
                          <?php if (isset($err['docPhone'])){
                              echo $err['docPhone'];
                            } ?>
                      </span>
                        <br>
                    </div>
                    
                    <div class="form-group">
                      <label for="docAddress">Address</label>
                      <input type="text" class="form-control" name="docAddress" id="docAddress" placeholder="Enter DOctor Address">
                      <span class="errorDisplay">
                              <?php if (isset($err['docAddress'])){
                              echo $err['docAddress'];
                            } ?>
                      </span>
                          <br>
                    </div>
                    
                    <div class="form-group">
                      <label for="docQualification">Qualification</label>
                      <input type="text" class="form-control" name="docQualification" id="docQualification" placeholder="Enter Doctor Qualification">
                      <span class="errorDisplay">
                              <?php if (isset($err['docQualification'])){
                              echo $err['docQualification'];
                            } ?>
                      </span>
                          <br>
                    </div>

                    <div class="form-group">
                      <label for="docPassword">Password</label>
                      <input type="text" class="form-control" name="docPassword" id="docPassword" placeholder="Enter Doctor Password">
                      <span class="errorDisplay">
                              <?php if (isset($err['docPassword'])){
                              echo $err['docPassword'];
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
   <br>
    <!-- END Home SECTION -->

     <!--FOOTER SECTION -->
    <div id="footer">
        2019 www.yourdomain.com|All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

</body>
</html>