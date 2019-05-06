<?php

  $msg='';

  //check for button click---form submit
  if(isset($_POST['predict'])){
    $err = array();

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
      if(!preg_match('/^[0-9]{2}$/', $age)){
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
        $msg='<div class="alert alert-success"> Prediction Successful</div>';
      }
      else  {
      $msg='<div class="alert alert-danger">Prediction Failure</div>';
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
        background-color: /*#0091ea;*/
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
                <li><a href="index.php">Home</a></li>
                <li><a href="Predict.php">Predict Disease</a></li>
                <li><a href="viewDoctor.php">View Doctors</a></li>
                <li><a href="doctorResponse.php">Doctors Response</a></li>
                <li><a href="Help.php">Help</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav>
  <!-----------END NAV SECTION-------->

    <!--HOME SECTION-->
    <section>
        <div class="container">
            <div class="row ">
                   <div class="col-md-6 col-sm-6 ">
                        <h4>Please Fill up the form to Predict Diabetes</h4>
                        <form  method="POST" action="Predict.php" name="predictForm">
                           <div class="row form-group">
                              <div class="col-md-12 col-sm-12">
                                  <?php echo $msg; ?>    
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
                         <p>If You have any difficulties
                         then visit the help section</p>
                          
                    </div>            
            </div>
        </div>
    </section><br>
    <!-- END Home SECTION -->

     <!--FOOTER SECTION -->
    <div id="footer">
        2019 www.yourdomain.com|All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

</body>
</html>