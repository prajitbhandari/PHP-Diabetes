<?php
  
  $msg='';

  //check for button click---form submit
  if(isset($_POST['add'])){
  $err = array();

  //check for Pregnancy Description
  if (isset($_POST['pregnancyDescription']) && !empty($_POST['pregnancyDescription']) ){
    $pregnancyDescription = $_POST['pregnancyDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$pregnancyDescription)) {
      $err['pregnancyDescription'] = "*Invalid Pregnancy Description";
    }
     }else {
    $err['pregnancyDescription'] = "*Enter Pregnancy Description";
  }


  //check for Pregnancy Value
  if (isset($_POST['pregnancyValue']) && !empty($_POST['pregnancyValue']) ){
    $pregnancyValue = $_POST['pregnancyValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$pregnancyValue)) {
      $err['pregnancyValue'] = "*Invalid Pregnancy Value";
    }
     }else {
    $err['pregnancyValue'] = "*Enter Pregnancy Value";
  }

    //check for Glucose Description
  if (isset($_POST['glucoseDescription']) && !empty($_POST['glucoseDescription']) ){
    $glucoseDescription = $_POST['pregnancyDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$glucoseDescription)) {
      $err['glucoseDescription'] = "*Invalid Glucose Description";
    }
     }else {
    $err['glucoseDescription'] = "*Enter Glucose Description";
  }


  //check for Glucose Value
  if (isset($_POST['glucoseValue']) && !empty($_POST['glucoseValue']) ){
    $glucoseValue = $_POST['glucoseValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$glucoseValue)) {
      $err['glucoseValue'] = "*Invalid Glucose Value";
    }
     }else {
    $err['glucoseValue'] = "*Enter Glucose Value";
  }

   //check for Blood Pressure Description
  if (isset($_POST['bloocPressureDescription']) && !empty($_POST['bloodPressureDescription']) ){
    $bloodPressureDescription = $_POST['bloocPressureDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$bloodPressureDescription)) {
      $err['bloodPressureDescription'] = "*Invalid Blood Pressure  Description";
    }
     }else {
    $err['bloodPressureDescription'] = "*Enter Blood Pressure Description";
  }


  //check for Blood Pressure  Value
  if (isset($_POST['bloodPressureValue']) && !empty($_POST['bloodPressureValue']) ){
    $bloodPressureValue = $_POST['bloodPressureValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$bloodPressureValue)) {
      $err['bloodPressureValue'] = "*Invalid Blood Pressure Value";
    }
     }else {
    $err['bloodPressureValue'] = "*Enter Blood Pressure  Value";
  }



    //check for Skin Thickness Description
  if (isset($_POST['skinThicknessDescription']) && !empty($_POST['skinThicknessDescription']) ){
      $skinThicknessDescription = $_POST['skinThicknessDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$skinThicknessDescription)) {
      $err['skinThicknessDescription'] = "*Invalid Skin Thickness Description";
    }
     }else {
    $err['skinThicknessDescription'] = "*Enter Skin Thickness Description";
  }


  //check for Skin Thickness  Value
  if (isset($_POST['skinThicknessValue']) && !empty($_POST['skinThicknessValue']) ){
    $skinThicknessValue = $_POST['skinThicknessValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$skinThicknessValue)) {
      $err['skinThicknessValue'] = "*Invalid Skin Thickness Value";
    }
     }else {
    $err['skinThicknessValue'] = "*Enter Skin Thickness  Value";
  }

    //check for Insulin  Description
  if (isset($_POST['insulinDescription']) && !empty($_POST['insulinDescription']) ){
    $insulinDescription = $_POST['insulinDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$insulinDescription)) {
      $err['insulinDescription'] = "*Invalid Insulin Description";
    }
     }else {
    $err['insulinDescription'] = "*Enter Insulin Description";
  }


  //check for Insulin Value
  if (isset($_POST['insulinValue']) && !empty($_POST['insulinValue']) ){
    $insulinValue = $_POST['insulinValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$insulinValue)) {
      $err['insulinValue'] = "*Invalid Insulin Value";
    }
     }else {
    $err['insulinValue'] = "*Enter Insulin Value";
  }

  //check for BMI Description
  if (isset($_POST['bmiDescription']) && !empty($_POST['bmiDescription']) ){
    $bmiDescription = $_POST['bmiDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$bmiDescription)) {
      $err['bmiDescription'] = "*Invalid BMI Description";
    }
     }else {
    $err['bmiDescription'] = "*Enter BMI Description";
  }


  //check for BMI Value
  if (isset($_POST['bmiValue']) && !empty($_POST['bmiValue']) ){
    $bmiValue = $_POST['bmiValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$bmiValue)) {
      $err['bmiValue'] = "*Invalid BMI Value";
    }
     }else {
    $err['bmiValue'] = "*Enter BMI Value";
  }

    //check for Pedegree  Description
  if (isset($_POST['pedegreeDescription']) && !empty($_POST['pedegreeDescription']) ){
    $pedegreeDescription = $_POST['pedegreeDescription'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$pedegreeDescription)) {
      $err['pedegreeDescription'] = "*Invalid Pedegree Description";
    }
     }else {
    $err['pedegreeDescription'] = "*Enter Pedegree Description";
  }


  //check for Pedegree  Value
  if (isset($_POST['pedegreeValue']) && !empty($_POST['pedegreeValue']) ){
    $pedegreeValue = $_POST['pedegreeValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$pedegreeValue)) {
      $err['pedegreeValue'] = "*Invalid Pedegree Value";
    }
     }else {
    $err['pedegreeValue'] = "*Enter Pedegree Value";
  }


    //check for Age Description
  if (isset($_POST['ageDescription']) && !empty($_POST['ageDescription']) ){
    $ageDescription = $_POST['ageDescription'];
      if (!preg_match("/^([a-zA-Z0-9]+)$/",$ageDescription)) {
      $err['ageDescription'] = "*Invalid Age Description";
    }
     }else {
    $err['ageDescription'] = "*Enter Age Description";
  }


  //check for Age Value
  if (isset($_POST['ageValue']) && !empty($_POST['ageValue']) ){
    $ageValue = $_POST['ageValue'];
        if (!preg_match("/^([a-zA-Z0-9]+)$/",$ageValue)) {
      $err['ageValue'] = "*Invalid Age Value";
    }
     }else {
    $err['ageValue'] = "*Enter Age Value";
  }


  // check for number of error
  if(count($err) == 0) {
    require "connect.php";
    $sql = "insert into tbl_help(description,value) values 
    ('$docName','$docEmail','$docPhone','docAddress','$docQualification')";
    $res=mysqli_query($conn, $sql);
    
    if ($res){
      $msg='<div class="alert alert-success"> Help Data Info Successfully</div>';
    }   
  }else{
      $msg='<div class="alert alert-danger">Failed to Add Help Info</div>';
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
              <li><a href="createDataSet.php">Create Data Set</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="addHelpInfo.php">Add HelpInfo</a></li>
              <li><a href="manageHelpInfo.php">Manage HelpInfo</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">Manage Users</a></li>
              <li><a href="viewEnquiry.php">View Enquiry</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
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
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Add Help Info</h4>
                                     
                    </div> 
                </div>
            </div>
            <br>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                 <form method="POST" action="addHelpInfo.php" name="helpForm">
                    <?php 
                        echo $msg;
                    ?>
                       
                       <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pregnancyDescription">Pregnancy Description</label>
                            <input type="text" class="form-control" name="pregnancyDescription" id="pregnancyDescription" >
                            <span class="errorDisplay">
                              <?php if (isset($err['pregnancyDescription'])){
                              echo $err['pregnancyDescription'];
                            } ?>
                            </span>
                            <br>

                          </div>
                          <div class="form-group col-md-6">
                            <label for="pregnancyValue">Pregnancy Value</label>
                            <input type="text" class="form-control" name="pregnancyValue" id="pregnancyValue">
                            <span class="errorDisplay">
                              <?php if (isset($err['pregnancyValue'])){
                              echo $err['pregnancyValue'];
                            } ?>
                            </span>
                            <br>
                          </div>
                       </div>
                 
                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="glucoseDescription">Glucose Description</label>
                          <input type="text" class="form-control" name="glucoseDescription" id="glucoseDescription">
                          <span class="errorDisplay">
                              <?php if (isset($err['glucoseDescription'])){
                              echo $err['glucoseDescription'];
                            } ?>
                            </span>
                            <br>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="glucoseValue">Glucose Value</label>
                          <input type="text" class="form-control" name="glucoseValue" id="glucoseValue">
                          <span class="errorDisplay">
                              <?php if (isset($err['glucoseValue'])){
                              echo $err['glucoseValue'];
                            } ?>
                            </span>
                            <br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="bloodPressureDescription">Blood Pressure Description</label>
                          <input type="text" class="form-control" name="bloodPressureDescription" id="bloodPressureDescription">
                          <span class="errorDisplay">
                              <?php if (isset($err['bloodPressureDescription'])){
                              echo $err['bloodPressureValue'];
                            } ?>
                            </span>
                            <br>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="bloodPressureValue">Blood Pressure Value</label>
                          <input type="text" class="form-control" name="bloodPressureValue" id="bloodPressureValue">
                          <span class="errorDisplay">
                              <?php if (isset($err['bloodPressureValue'])){
                              echo $err['bloodPressureValue'];
                            } ?>
                            </span>
                            <br>
                        </div>
                    </div>
                    
                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="skinThicknessDescription">Skin Thickness Description</label>
                            <input type="text" class="form-control" name="skinThicknessDescription" id="skinThicknessDescription">
                            <span class="errorDisplay">
                              <?php if (isset($err['skinThicknessDescription'])){
                              echo $err['skinThicknessDescription'];
                            } ?>
                            </span>
                            <br>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="skinThicknessValue">Skin Thickness Value</label>
                            <input type="text" class="form-control" name="skinThicknessValue" id="skinThicknessValue">
                            <span class="errorDisplay">
                              <?php if (isset($err['skinThicknessValue'])){
                              echo $err['skinThicknessDescription'];
                            } ?>
                            </span>
                            <br>
                          </div>
                       </div>
                    
                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="insulinDescription">Insulin Description</label>
                            <input type="text" class="form-control" name="insulinDescription" id="insulinDescription">
                            <span class="errorDisplay">
                              <?php if (isset($err['insulinDescription'])){
                              echo $err['insulinDescription'];
                            } ?>
                            </span>
                            <br>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="insulinValue">Insulin Value</label>
                            <input type="text" class="form-control" name="insulinValue" id="insulinValue">
                            <span class="errorDisplay">
                              <?php if (isset($err['insulinValue'])){
                              echo $err['insulinValue'];
                            } ?>
                            </span>
                            <br>
                          </div>
                       </div>

                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="bmiDescription">BMI Description</label>
                            <input type="text" class="form-control" name="bmiDescription" id="bmiDescription">
                            <span class="errorDisplay">
                              <?php if (isset($err['bmiDescription'])){
                              echo $err['bmiDescription'];
                            } ?>
                            </span>
                            <br>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="bmiValue">BMI Value</label>
                            <input type="text" class="form-control" name="bmiValue" id="bmiValue">
                            <span class="errorDisplay">
                              <?php if (isset($err['bmiValue'])){
                              echo $err['bmiValue'];
                            } ?>
                            </span>
                            <br>
                          </div>
                       </div>

                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pedegreeDescription">Pedegree Description</label>
                            <input type="text" class="form-control" name="pedegreeDescription" id="pedegreeDescription">
                            <span class="errorDisplay">
                              <?php if (isset($err['pedegreeDescription'])){
                              echo $err['pedegreeDescription'];
                            } ?>
                            </span>
                            <br>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="pedegreeValue">Pedegree Value</label>
                            <input type="text" class="form-control" name="pedegreeValue" id="pedegreeValue">
                            <span class="errorDisplay">
                              <?php if (isset($err['pedegreeValue'])){
                              echo $err['pedegreeValue'];
                            } ?>
                            </span>
                            <br>
                          </div>
                       </div>

                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="ageDescription">Age Description</label>
                            <input type="text" class="form-control" name="ageDescription" id="ageDescription">
                            <span class="errorDisplay">
                              <?php if (isset($err['ageDescription'])){
                              echo $err['ageDescription'];
                            } ?>
                            </span>
                            <br>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="ageValue">Age Value</label>
                            <input type="text" class="form-control" name="ageValue" id="ageValue">
                            <span class="errorDisplay">
                              <?php if (isset($err['ageValue'])){
                              echo $err['ageValue'];
                            } ?>
                            </span>
                            <br>
                          </div>
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