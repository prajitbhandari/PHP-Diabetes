<?php

  $msg='';

  //check for button click---form submit
  if(isset($_POST['predict'])){
    $err = array();

    //check for Pregnancy number
    if (isset($_POST['pregnancy']) && !empty($_POST['pregnancy']) ){
      $pregnancy = trim($_POST['pregnancy']);
      if(!preg_match('/^[0-9]+$/', $pregnancy)){
        $err['pregnancy'] = "*Invalid Pregnancy Value";
      }else if($pregnancy>20){
         $err['pregnancy'] = "*Enter Pregnancy value  less than 20";
      }
       
       }else {
      $err['pregnancy'] = "*Enter Pregnancy Value";
    }

    //check for glucose value
    if (isset($_POST['glucose']) && !empty($_POST['glucose']) ){
      $glucose = trim($_POST['glucose']);
      if(!preg_match('/^[0-9]+$/', $glucose)){
        $err['glucose'] = "*Invalid Glucose Value";
      } else if($glucose>500){
          $err['glucose'] = "*Enter Glucose Value less than 500";
      }
       }else {
      $err['glucose'] = "*Enter Glucose Value";
    }

    
    //check for Blood Pressure
    if (isset($_POST['BP']) && !empty($_POST['BP'])){
      $BP = trim($_POST['BP']);
      if(!preg_match('/^[0-9]+$/', $BP)){
        $err['BP'] = "*Invalid Blood Pressure Value";
      }else if($BP>500){
        $err['BP'] = "*Enter Blood Pressure Value less than 500";
      }
    }else {
      $err['BP'] = "*Enter Blood Pressure Value";
    }

    //check for SKin Thickness
    if (isset($_POST['skin']) && !empty($_POST['skin'])){
      $skin = trim($_POST['skin']);
      if(!preg_match('/^[0-9]+$/', $skin)){
        $err['skin'] = "*Invalid Skin Thickness Value";
      }else if($skin>22){
        $err['skin'] = "*Enter Skin Thickness Value less than 22";
      }
    }else {
      $err['skin'] = "*Enter Skin Thickness Value";
      }
    

    //check for Insulin
    if (isset($_POST['insulin']) && !empty($_POST['insulin']) ){
      $insulin = trim($_POST['insulin']);
      if(!preg_match('/^[0-9]+$/', $insulin)){
        $err['insulin'] = "*Invalid Insulin Value";
      }else if($insulin>500){
          $err['skin'] = "*Enter Insulin Value less than 500";
       }
     }else {
      $err['insulin'] = "*Enter Insulin Value";
    }

    //check for BMI
    if (isset($_POST['BMI']) && !empty($_POST['BMI']) ){
      $BMI = trim($_POST['BMI']);
      if(!preg_match('/^[0-9]+$/', $BMI)){
        $err['BMI'] = "*Invalid BMI Value";
      }else if($BMI>25){
        $err['BMI'] = "*Enter BMI Value less than 25";
      }
       }else {
        $err['BMI'] = "*Enter BMI Value";
      }

    //check for Pedegree Function
    if (isset($_POST['pedegree']) && !empty($_POST['pedegree']) ){
      $pedegree = trim($_POST['pedegree']);
      if(!preg_match('/^[0-9]+$/', $pedegree)){
        $err['pedegree'] = "*Invalid Pedegree Value";
      }else if($pedegree>25){
        $err['pedegree'] = "*Enter Pedegree Value less than 25";
      }
       }else {
      $err['pedegree'] = "*Enter Pedegree Value";
    }

    //check for age
    if (isset($_POST['age']) && !empty($_POST['age'])){
      $age = trim($_POST['age']);
      if(!preg_match('/^[0-9]+$/', $age)){
        $err['age'] = "*Invalid age";
      } else if($age<21 || $age>100){
          $err['age'] = "*Enter age between 21 and 100";
      }
    }else{
      $err['age'] = "*Enter your age";
    }


    //check for number of error
     if (count($err)==0) {

      
        function mean($arr) {
          $num_of_elements = count($arr);
          $sum=array_sum($arr);
          $mean=$sum/$num_of_elements;
          return $mean;
      }


        function variance($arr) 
          { 
              
              $num_of_elements = count($arr); 
                $variance = 0.0; 
                // calculating mean using array_sum() method 
              $average = array_sum($arr)/$num_of_elements; 
                
              foreach($arr as $i) 
              { 
                  // sum of squares of differences between  
                              // all numbers and means. 
                  $variance += pow(($i - $average), 2); 
              } 
                
              return (float) $variance/($num_of_elements-1);
              // Input array 
        
        } 

      /*-----------------------------likelihood Probability---------------*/
      function likelihoodProb($x,$arr){
        $partial= 1/sqrt(2*3.14*variance($arr));
        $powr=(-(pow($x-mean($arr), 2))/(2*variance($arr)));
        $exponential=exp($powr);
        $prob=$partial*$exponential;
        return $prob;
      }

      function maleresult(){

           $maleresult= likelihoodProb(6,array(6,5.92,5.58,5.92))*likelihoodProb(130,array(180,190,170,165))*likelihoodProb(8,array(12,11,12,10))*0.5;
           return $maleresult;
      }

      function femaleresult(){

          $femaleresult= likelihoodProb(6,array(5,5.5,5.42,5.75))*likelihoodProb(130,array(100,150,130,150))*likelihoodProb(8,array(6,8,7,9))*0.5; 
          return $femaleresult;
      }


      function result(){
         if(maleresult()>femaleresult()){
          echo "Given is male";
         }else{
          echo "Given is female";
         }
      }


      echo "Male  Mean Height is ".mean(array(6,5.92,5.58,5.92));echo "<br>";
      echo "Female Mean Height is ".mean(array(5,5.5,5.42,5.75)); echo "<br>";  

      echo "<br>";

      echo "Male Variance Height is ".variance(array(6,5.92,5.58,5.92));echo "<br>";    
      echo "Female Variance Height is ".variance(array(5,5.5,5.42,5.75));echo "<br>";
      echo "<br>";

      echo "Male  Mean Weight is ".mean(array(180,190,170,165));echo "<br>";
      echo "Female Mean Weight is ".mean(array(100,150,130,150)); echo "<br>"; 

      echo "Male Variance Weight is ".variance(array(180,190,170,165));echo "<br>";    
      echo "Female Variance Weight is ".variance(array(100,150,130,150));echo "<br>";
      echo "<br>";

      echo "Male  Mean Foot is ".mean(array(12,11,12,10));echo "<br>";
      echo "Female Mean Foot is ".mean(array(6,8,7,9));echo "<br>";
      echo "<br>";  

      echo "Male Variance Foot is ".variance(array(12,11,12,10)); echo "<br>";   
      echo "Female Variance Foot is ".variance(array(6,8,7,9));echo "<br>";
      echo "<br>";

      echo "Male result is".maleresult(); echo "<br>";
      echo "Female result is".femaleresult(); echo "<br>";
      echo "<br>";

      echo result();

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
            position: fixed;
            width: 100%;
            bottom: 0;
            height: 60px;
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
              <li><a href="createDataSet.php">Create Data Set</a></li>
              <li><a href="Predict.php">Predict Diabetes</a></li>
              <li><a href="Help.php">Help</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">Manage Users</a></li>
              <li><a href="viewEnquiry.php">View Enquiry</a></li>
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
            <div class="row ">
                   <div class="col-md-12 col-sm-12 ">
                        <h4 class="text-center">Please Fill up the form to Predict Diabetes</h4>
                        <form  method="POST" action="Predict.php" name="predictForm">
                              <div class="col-md-12 col-sm-12">
                                  <?php echo $msg; ?>    
                              </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                            <label for="inputPregnancy">Pregnancies</label>
                            <input type="text" class="form-control"  name ="pregnancy" id="inputPregnancy" placeholder="Enter Pregnancy Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['pregnancy'])){
                                echo $err['pregnancy'];
                              } ?>
                            </span>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputGlucose">Glucose</label>
                            <input type="text" class="form-control" name="glucose" id="inputGlucose" placeholder="Enter Glucose Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['glucose'])){
                                echo $err['glucose'];
                              } ?>
                            </span>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputBP">Blood Pressure</label>
                            <input type="text" class="form-control"  name="BP" id="inputBP" placeholder="Enter Blood Pressure Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['BP'])){
                                echo $err['BP'];
                              } ?>
                            </span>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputSkin">Skin Thickness</label>
                            <input type="text" class="form-control" name="skin" id="inputSkin" placeholder="Enter Skin Thickness Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['skin'])){
                                echo $err['skin'];
                              } ?>
                            </span>
                          </div>

                        </div>

                        <div class="col-md-6 col-sm-6">
                          
                            <div class="form-group">
                            <label for="inputInsulin">Insulin</label>
                            <input type="text" class="form-control" name="insulin" id="inputInsulin" placeholder="Enter Insulin Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['insulin'])){
                                echo $err['insulin'];
                              } ?>
                            </span>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputBMI">BMI</label>
                            <input type="text" class="form-control" name="BMI" id="inputBMI" placeholder="Enter BMI Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['BMI'])){
                                echo $err['BMI'];
                              } ?>
                            </span>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputPedegree">Diabetes Pedegree Function</label>
                            <input type="text" class="form-control" name="pedegree" id="inputPedegree" placeholder="Enter Diabetes Pedegree Function Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['pedegree'])){
                                echo $err['pedegree'];
                              } ?>
                            </span>
                          </div>

                          <div class="form-group">
                            <label for="inputAge">Age</label>
                            <input type="text" class="form-control" name="age" id="inputAge" placeholder="Enter Age">
                            <span class="errorDisplay">
                                <?php if (isset($err['age'])){
                                echo $err['age'];
                              } ?>
                            </span>
                          </div>

                        </div> 

                          <div class="form-group">
                             <button type="submit" name="predict" class="btn btn-block btn-primary">Predict</button>
                          </div>

                        </form><br/><br/>
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