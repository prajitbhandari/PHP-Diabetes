<?php
   $dbPregnancy=array();
   $dbGlucose=array();
   $dbBP=array();
   $dbSkin=array();
   $dbInsulin=array();
   $dbBMI=array();
   $dbPedegree=array();
   $dbAge=array();
   
   $diabetesResult=null;
   $noDiabetesResult=null;
   $probDiabetes=null;
   $probNoDiabetes=null;
   $probDiabetesPercentage=null;
   $probNoDiabetesPercentage=null; 

   $email=null;
   $pregnancy=null;
   $glucose=null;
   $BP=null;
   $skin=null;
   $insulin=null;
   $BMI=null;
   $pedegree=null;
   $age=null;
   $outcome=null;
   $value=null;

   $msg='';
$err = array();
function mean($arr) {
      $num_of_elements = count($arr);
      $mean=0.0;
      $sum=array_sum($arr);
      $mean=$sum/$num_of_elements;
      return  (float) $mean;
    }


    function variance($arr) 
      { 
          
          $num_of_elements = count($arr); 
            $variance = 0.0; 
            // calculating mean using array_sum() method 
          $average = mean($arr);

          foreach($arr as $i) 
          { 
              // sum of squares of differences between  
                          // all numbers and means. 
              $variance += pow(($i - $average), 2); 
          } 
            
          return (float) $variance/($num_of_elements-1);
          // Input array 
    
     } 
    
    function likelihoodProb($x,$arr){
      $partial= 1/sqrt(2*3.14*variance($arr));
      $powr=(-(pow($x-mean($arr), 2))/(2*variance($arr)));
      $exponential=exp($powr);
      $prob=$partial*$exponential;
      return $prob;
  }

  

  //check for button click---form submit
  if(isset($_POST['predict'])){
    
    

    //check for Patient First Name
      if (isset($_POST['email']) && !empty($_POST['email']) ){
        $email = trim($_POST['email']);
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $err['email'] = "*Invalid Patient Email Address";
        } 
      }else {
        $err['email'] = "*Enter Patient Email Address";
      }

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
      }else if($skin>50){
        $err['skin'] = "*Enter Skin Thickness Value less than 50";
      }
    }else {
      $err['skin'] = "*Enter Skin Thickness Value";
      }
    

    //check for Insulin
    if (isset($_POST['insulin'])){
      if($_POST['insulin']!=""){
      $insulin = trim($_POST['insulin']);
      if(!preg_match('/^[0-9]+$/', $insulin)){
        $err['insulin'] = "*Invalid Insulin Value";
      }else if($insulin>500){
          $err['skin'] = "*Enter Insulin Value less than 500";
       }
     }
     else{
      $err['insulin'] = "*Enter Insulin Value";
     }
     }else {
      $err['insulin'] = "*Enter Insulin Value";
    }


    //check for BMI
    if (isset($_POST['BMI']) && !empty($_POST['BMI']) ){
      $BMI = trim($_POST['BMI']);
      if(!preg_match('/^([0-9]+\.?[0-9]+)$/', $BMI)){
        $err['BMI'] = "*Invalid BMI Value";
      }else if($BMI>50){
        $err['BMI'] = "*Enter BMI Value less than 50";
      }
       }else {
        $err['BMI'] = "*Enter BMI Value";
      }


    //check for Pedegree Function
    if (isset($_POST['pedegree']) && !empty($_POST['pedegree']) ){
      $pedegree = trim($_POST['pedegree']);
      if(!preg_match('/^([0-9]+\.?[0-9]+)$/', $pedegree)){
        $err['pedegree'] = "*Invalid Pedegree Value";
      }else if($pedegree>50){
        $err['pedegree'] = "*Enter Pedegree Value less than 50";
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

}
    
      
    
    //check for number of error
    if (count($err)==0) {
      require "connect.php";
      //query to select data
      $sql="select * from tbl_dataSet where Outcome=1 ";
      //execute query and return result object
      $result=mysqli_query($conn,$sql);
      //default array
      $data=array();
      if(mysqli_num_rows($result)>0){
        while($d=mysqli_fetch_assoc($result)){
          array_push($data,$d);
        }

        $i=0;
        foreach ($data as $info){
          
           $dbPregnancy[$i]=$info['Pregnancies'];
           $dbGlucose[$i]=$info['Glucose'];
           $dbBP[$i]=$info['BloodPressure'];
           $dbSkin[$i]=$info['SkinThickness'];
           $dbInsulin[$i]=$info['Insulin'];
           $dbBMI[$i]=$info['BMI'];
           $dbPedegree[$i]=$info['DiabetesPedigreeFunction'];
           $dbAge[$i]=$info['Age'];
           $i=$i+1;
        }
        
      }else{
        echo "data not found";
    }

    $diabetesResult= likelihoodProb($pregnancy,$dbPregnancy)*likelihoodProb($glucose,$dbGlucose)*likelihoodProb($BP,$dbBP)*likelihoodProb($skin,$dbSkin)*likelihoodProb($insulin,$dbInsulin)*likelihoodProb($BMI,$dbBMI)*likelihoodProb($pedegree,$dbPedegree)*likelihoodProb($age,$dbAge)*0.5;

      require "connect.php";
       //query to select data
       $sql="select * from tbl_dataSet where Outcome=0";
       //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $data=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($data,$d);
          }
      $i=0;
      foreach ($data as $info){
        
         $dbPregnancy[$i]=$info['Pregnancies'];
         $dbGlucose[$i]=$info['Glucose'];
         $dbBP[$i]=$info['BloodPressure'];
         $dbSkin[$i]=$info['SkinThickness'];
         $dbInsulin[$i]=$info['Insulin'];
         $dbBMI[$i]=$info['BMI'];
         $dbPedegree[$i]=$info['DiabetesPedigreeFunction'];
         $dbAge[$i]=$info['Age'];
         $i=$i+1;
      }
      
    }else{
      echo "data not found";
    }

   $noDiabetesResult= likelihoodProb($pregnancy,$dbPregnancy)*likelihoodProb($glucose,$dbGlucose)*likelihoodProb($BP,$dbBP)*likelihoodProb($skin,$dbSkin)*likelihoodProb($insulin,$dbInsulin)*likelihoodProb($BMI,$dbBMI)*likelihoodProb($pedegree,$dbPedegree)*likelihoodProb($age,$dbAge)*0.5;

    $probDiabetes = $diabetesResult/($diabetesResult+$noDiabetesResult);
    $probNoDiabetes = $noDiabetesResult/($diabetesResult+$noDiabetesResult);

    $probDiabetesPercentage = round($probDiabetes,3)*100;
    $probNoDiabetesPercentage =round($probNoDiabetes,3)*100;

    echo "<br><br><br>";
    echo $probDiabetes; echo '<br>';
    echo $probDiabetesPercentage;echo '<br>';
    
    echo $probNoDiabetes; echo '<br>';
    echo $probNoDiabetesPercentage;echo '<br>';
    
    
   

  if($diabetesResult>$noDiabetesResult){
    $msg='<div class="alert alert-danger"> Patient has Diabetes chance of '.($probDiabetesPercentage).'%</div>';
      $outcome='tested_positive';
      $value=$diabetesResult;
      

   }else{
    $msg='<div class="alert alert-success"> Patient has no Diabetes chance of '.($probNoDiabetesPercentage).'%</div>';
    $outcome='tested_negative';
    $value=$noDiabetesResult;
     // require "connect.php";
     //  $addsql = "insert into tbl_result (email,pregnancies,glucose,bp,skin,insulin,bmi,pedegree,age,outcome,value) values 
     //  ('$email','$pregnancy','$glucose','$BP','$skin','$insulin','$BMI','$pedegree','$age','tested_negative','$probNoDiabetesPercentage')";
     //  $result=mysqli_query($conn, $addsql);
   }
   require "connect.php";
      $addsql = "insert into tbl_result (email,pregnancies,glucose,bp,skin,insulin,bmi,pedegree,age,outcome,value) values 
      ('$email','$pregnancy','$glucose','$BP','$skin','$insulin','$BMI','$pedegree','$age','$outcome','$value')";
      $result=mysqli_query($conn, $addsql);
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
                              <label for="inputEmail">Patient Email</label>
                              <input type="text" class="form-control"  name ="email" id="inputEmail" placeholder="Enter Patient Email">
                              <span class="errorDisplay">
                                  <?php if (isset($err['email'])){
                                  echo $err['email'];
                                } ?>
                              </span>
                          </div> 
                          <br>

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