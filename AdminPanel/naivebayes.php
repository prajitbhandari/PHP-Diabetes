<?php
   
   
   $diabetesResult=null;
   $noDiabetesResult=null;
   $probDiabetes=null;
   $probNoDiabetes=null;
   $probDiabetesPercentage=null;
   $probNoDiabetesPercentage=null; 

   $DBtotalData=null;

   $DByesDiabetes=null;
   $DByesResultPregnancy=null;
   $DByesResultGlucose=null;
   $DByesResultBP=null;
   $DByesResultSkin=null;
   $DByesResultInsulin=null;
   $DByesResultBMI=null;
   $DByesResultDPF=null;
   $DByesResultAge=null;


   $DBnoDiabetes=null;
   $DBnoResultPregnancy=null;
   $DBnoResultGlucose=null;
   $DBnoResultBP=null;
   $DBnoResultSkin=null;
   $DBnoResultInsulin=null;
   $DBnoResultBMI=null;
   $DBnoResultDPF=null;
   $DBnoResultAge=null;

   $yesPriorProbabilty=null;
   $noPriorProbability=null;


    $yesLikelihoodPregnancy= null;
    $yesLikelihoodGlucose= null;
    $yesLikelihoodBP= null;
    $yesLikelihoodSkin= null;
    $yesLikelihoodInsulin=null;
    $yesLikelihoodBMI= null;
    $yesLikelihoodDPF= null;
    $yesLikelihoodAge= null;


    $noLikelihoodPregnancy= null;
    $noLikelihoodGlucose= null;
    $noLikelihoodBP= null;
    $noLikelihoodSkin= null;
    $noLikelihoodInsulin=null;
    $noLikelihoodBMI= null;
    $noLikelihoodDPF= null;
    $noLikelihoodAge= null;



   
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
   $inputGender='';
   $err=array();
   
   $yesdata0=array();
   $yesdata1=array();
   $yesdata2=array();
   $yesdata3=array();
   $yesdata4=array();
   $yesdata5=array();
   $yesdata6=array();
   $yesdata7=array();
   $yesdata8=array();
   $yesdata9=array();


   $nodata0=array();
   $nodata1=array();
   $nodata2=array();
   $nodata3=array();
   $nodata4=array();
   $nodata5=array();
   $nodata6=array();
   $nodata7=array();
   $nodata8=array();
   $nodata9=array();


   function getPregnancy($pregnancyValue){
      if($pregnancyValue==0){
        return "low";
      }else if ($pregnancyValue>=1 && $pregnancyValue<=6) {
        return "medium";
      }else{
        return "high";
      }

  }

  function getGlucose($glucoseValue){
      if($glucoseValue>=0 && $glucoseValue<=139){
        return "low";
      }else if ($glucoseValue>=140 && $glucoseValue<=199) {
        return "medium";
      }else if($glucoseValue>=7){
        return "high";
      }
  }

  function getBP($bpValue){
      if($bpValue>=0 && $bpValue<=79){
        return "low";
      }else if ($bpValue>=80 && $bpValue<=89) {
        return "medium";
      }else{
        return "high";
      } 
  }

  function getSkinThickness($skinThicknessValue){
      if($skinThicknessValue>=0 && $skinThicknessValue<=17){
        return "low";
      }else if ($skinThicknessValue>=18 && $skinThicknessValue<=24) {
        return "medium";
      }else{
        return "high";
      } 
  }

  function getInsulin($insulinValue){
      if($insulinValue>=0 && $insulinValue<=15){
        return "low";
      }else if ($insulinValue>=16 && $insulinValue<=166) {
        return "medium";
      }else{
        return "high";
      }    
  }

  function getBMI($bmiValue){
    if($bmiValue>=0 && $bmiValue<=17){
      return "low";
    }else if ($bmiValue>=18 && $bmiValue<=24) {
      return "medium";
    }else if($bmiValue>=7){
      return "high";
    }
    
  }

  function getDPF($dpfValue){
    if($dpfValue>=0 && $dpfValue<=0.5){
      return "low";
    }else if ($dpfValue>=0.6 && $dpfValue<=0.9) {
      return "medium";
    }else{
      return "high";
    }
    
  }

  function getAge($ageValue){
      if($ageValue>=21 && $ageValue<=29){
        return "young";
      }else if ($ageValue>=30 && $ageValue<=39) {
        return "middleaged";
      }else if($ageValue>=40 && $ageValue<=100){
        return "adult";
      }
    
  }

  //check for button click---form submit
  if(isset($_POST['predict'])){
        
        // check Patient email
        if (isset($_POST['email']) && !empty($_POST['email'])){
        $email = trim($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $err['email'] = "*Invalid Patient Email Address";
        }
        require "connect.php";
        $sql="select email from tbl_user where email='$email'";
        $result=mysqli_query($conn, $sql);
        if(!mysqli_num_rows($result)){
          $err['email'] = "*Email Not Available";
        }
         }else {
        $err['email'] = "*Enter Patient Email Address";
      }

    //check for Gender
    if (isset($_POST['inputGender']) && !empty($_POST['inputGender'])){
        $inputGender = trim($_POST['inputGender']);
      }else{
        $err['gender'] = "*Select Gender";         
    }

    //check for Pregnancy number
   if($inputGender=="Male"){
              $pregnancy=0;
    }
    else if($inputGender=="Female" && isset($_POST['pregnancy']) && !empty($_POST['pregnancy'])){
              $pregnancy = trim($_POST['pregnancy']);
                if(!preg_match('/^[0-9]+$/', $pregnancy)){
                  $err['pregnancy'] = "*Invalid Pregnancy Value";
               }else if($pregnancy>20){
                 $err['pregnancy'] = "*Enter Pregnancy value  less than 20";
               }
            }
    else {
        $err['pregnancy'] = "*Enter Pregnancy Value";
    }

    //check for glucose value
    if (isset($_POST['glucose']) && !empty($_POST['glucose'])){
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
            $err['insulin'] = "*Enter Insulin Value less than 500";
         }
       }
       else{
        $err['insulin'] = "*Enter Insulin Value";
       }
     }else {
      $err['insulin'] = "*Enter Insulin Value";
    }

    //check for BMI
    if (isset($_POST['BMI']) && !empty($_POST['BMI'])){
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
    if (isset($_POST['pedegree']) && !empty($_POST['pedegree'])){
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

  
  } //end of if(isset($_POST['predict'])){
       
    //check for number of error
    if (count($err)==0 && isset($_POST['predict'])) {

       require "connect.php";

       //query to select total number of data 
      $sql="select count(Id) as totalData from tbl_naivedataSet";
      $totalData=mysqli_query($conn,$sql);
        if(mysqli_num_rows($totalData)>0){
          while($d=mysqli_fetch_assoc($totalData)){
            array_push($yesdata0,$d);
          }
          foreach ($yesdata0 as $info){
             $DBtotalData=$info['totalData'];
          }
          
        }else{
          echo "data not found";
        }

      //query to select total number of data for Outcome 1  
      $sql="select count(Id) as yesDiabetes from tbl_naivedataSet where Outcome=1";
      $yesDiabetes=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesDiabetes)>0){
          while($d=mysqli_fetch_assoc($yesDiabetes)){
            array_push($yesdata1,$d);
          }
          foreach ($yesdata1 as $info){
             $DByesDiabetes=$info['yesDiabetes'];
          }
          
        }else{
          echo "data not found";
        }

      //query to for Outcome 1 and Pregnancy
        require 'connect.php';
      $sql="select count(Id) as yesPregnancy from tbl_naivedataSet where Outcome=1 AND Pregnancies='".getPregnancy($pregnancy)."'";
      echo $sql;
      $yesResultPregnancy=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultPregnancy)>0){
          while($d=mysqli_fetch_assoc($yesResultPregnancy)){
            array_push($yesdata2,$d);
          }
          foreach ($yesdata2 as $info){
             $DByesResultPregnancy=$info['yesPregnancy'];
          }
         
        }else{
          echo "data not found";
        }
        
      //query to for Outcome 1 and Glucose
      $sql="select count(Id) as yesGlucose from tbl_naivedataSet where Outcome=1 AND Glucose='".getGlucose($glucose)."'";
      $yesResultGlucose=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultGlucose)>0){
          while($d=mysqli_fetch_assoc($yesResultGlucose)){
            array_push($yesdata3,$d);
          }
          foreach ($yesdata3 as $info){
             $DByesResultGlucose=$info['yesGlucose'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 1 and BloodPressure
      $sql="select count(Id) as yesBP from tbl_naivedataSet where Outcome=1 AND BloodPressure='".getBP($BP)."'";
      $yesResultBP=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultBP)>0){
          while($d=mysqli_fetch_assoc($yesResultBP)){
            array_push($yesdata4,$d);
          }
          foreach ($yesdata4 as $info){
             $DByesResultBP=$info['yesBP'];
          }
          
        }else{
          echo "data not found";
        }

      //query to for Outcome 1 and SkinThickness
      $sql="select count(Id) as yesSkin from tbl_naivedataSet where Outcome=1 AND SkinThickness='".getSkinThickness($skin)."'";
      $yesResultSkin=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultSkin)>0){
            while($d=mysqli_fetch_assoc($yesResultSkin)){
            array_push($yesdata5,$d);
          }
          foreach ($yesdata5 as $info){
             $DByesResultSkin=$info['yesSkin'];
          }
        }else{
          echo "data not found";
        }
            
      //query to for Outcome 1 and Insulin
      $sql="select count(Id) as yesInsulin from tbl_naivedataSet where Outcome=1 AND Insulin='".getInsulin($insulin)."'";
      $yesResultInsulin=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultInsulin)>0){
          while($d=mysqli_fetch_assoc($yesResultInsulin)){
            array_push($yesdata6,$d);
          }
          foreach ($yesdata6 as $info){
             $DByesResultInsulin=$info['yesInsulin'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 1 and BMI
      $sql="select count(Id) as yesBMI from tbl_naivedataSet where Outcome=1 AND BMI='".getBMI($BMI)."'";
      $yesResultBMI=mysqli_query($conn,$sql);
          if(mysqli_num_rows($yesResultBMI)>0){
              while($d=mysqli_fetch_assoc($yesResultBMI)){
            array_push($yesdata7,$d);
          }
          foreach ($yesdata7 as $info){
             $DByesResultBMI=$info['yesBMI'];
          }
        }else{
          echo "data not found";
        }

      //query to for Outcome 1 and Diabetes Pedigree Function
      $sql="select count(Id) as yesDPF from tbl_naivedataSet where Outcome=1 AND DiabetesPedigreeFunction='".getDPF($pedegree)."'";
      $yesResultDPF=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultDPF)>0){
          while($d=mysqli_fetch_assoc($yesResultDPF)){
            array_push($yesdata8,$d);
          }
          foreach ($yesdata8 as $info){
             $DByesResultDPF=$info['yesDPF'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 1 and Age 
      $sql="select count(Id) as yesAge from tbl_naivedataSet where Outcome=1 AND Age='".getAge($age)."'";
      $yesResultAge=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultAge)>0){
          while($d=mysqli_fetch_assoc($yesResultAge)){
            array_push($yesdata9,$d);
          }
          foreach ($yesdata9 as $info){
             $DByesResultAge=$info['yesAge'];
          }
        }else{
          echo "data not found";
        }

        //query to for Outcome 1 and Age 
      $sql="select count(Id) as yesAge from tbl_naivedataSet where Outcome=1 AND Age='".getAge($age)."'";
      $yesResultAge=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesResultAge)>0){
          while($d=mysqli_fetch_assoc($yesResultAge)){
            array_push($yesdata9,$d);
          }
          foreach ($yesdata9 as $info){
             $DByesResultAge=$info['yesAge'];
          }
        }else{
          echo "data not found";
        }
      

      $yesLikelihoodPregnancy= $DByesResultPregnancy/$DByesDiabetes;
      $yesLikelihoodGlucose= $DByesResultGlucose/$DByesDiabetes;
      $yesLikelihoodBP= $DByesResultBP/$DByesDiabetes;
      $yesLikelihoodSkin= $DByesResultSkin/$DByesDiabetes;
      $yesLikelihoodInsulin= $DByesResultInsulin/$DByesDiabetes;
      $yesLikelihoodBMI= $DByesResultBMI/$DByesDiabetes;
      $yesLikelihoodDPF= $DByesResultDPF/$DByesDiabetes;
      $yesLikelihoodAge= $DByesResultAge/$DByesDiabetes;

      $yesPriorProbabilty=$DByesDiabetes/$DBtotalData;

      $diabetesResult=($yesLikelihoodPregnancy*$yesLikelihoodGlucose*$yesLikelihoodBP*$yesLikelihoodSkin*$yesLikelihoodInsulin*
                                 $yesLikelihoodBMI*$yesLikelihoodDPF*$yesLikelihoodAge)*$yesPriorProbabilty;
      
      
      require "connect.php";

       //query to select total number of data  
      $sql="select count(Id) as totalData from tbl_naivedataSet";
      $totalData=mysqli_query($conn,$sql);
        if(mysqli_num_rows($totalData)>0){
            while($d=mysqli_fetch_assoc($totalData)){
            array_push($nodata0,$d);
          }
          foreach ($nodata0 as $value){
             $DBtotalData=$value['totalData'];
          }
        }else{
          echo "data not found";
        }

      //query to select total number of data for Outcome 0  
      $sql="select count(Id) as noDiabetes from tbl_naivedataSet where Outcome=0";
      $noDiabetes=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noDiabetes)>0){
            while($d=mysqli_fetch_assoc($noDiabetes)){
            array_push($nodata1,$d);
          }
          foreach ($nodata1 as $value){
             $DBnoDiabetes=$value['noDiabetes'];
          }
        }else{
          echo "data not found";
        }

      //query to for Outcome 0 and Pregnancy
      $sql="select count(Id) as noPregnancy from tbl_naivedataSet where Outcome=0 AND Pregnancies='".getPregnancy($pregnancy)."'";
      $noResultPregnancy=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultPregnancy)>0){
          while($d=mysqli_fetch_assoc($noResultPregnancy)){
            array_push($nodata2,$d);
          }
          foreach ($nodata2 as $value){
             $DBnoResultPregnancy=$value['noPregnancy'];
          }
        }else{
          echo "data not found";
        }
        
      //query to for Outcome 0 and Glucose
      $sql="select count(Id) as noGlucose from tbl_naivedataSet where Outcome=0 AND Glucose='".getGlucose($glucose)."'";
      $noResultGlucose=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultGlucose)>0){
          while($d=mysqli_fetch_assoc($noResultGlucose)){
            array_push($nodata3,$d);
          }
          foreach ($nodata3 as $value){
             $DBnoResultGlucose=$value['noGlucose'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 0 and BloodPressure
      $sql="select count(Id) as noBP from tbl_naivedataSet where Outcome=0 AND BloodPressure='".getBP($BP)."'";
      $noResultBP=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultBP)>0){
          while($d=mysqli_fetch_assoc($noResultBP)){
            array_push($nodata4,$d);
          }
          foreach ($nodata4 as $value){
             $DBnoResultBP=$value['noBP'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 0 and SkinThickness
      $sql="select count(Id) as noSkin from tbl_naivedataSet where Outcome=0 AND SkinThickness='".getSkinThickness($skin)."'";
      $noResultSkin=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultSkin)>0){
          while($d=mysqli_fetch_assoc($noResultSkin)){
            array_push($nodata5,$d);
          }
          foreach ($nodata5 as $value){
             $DBnoResultSkin=$value['noSkin'];
          }
          
        }else{
          echo "data not found";
        }
            
      //query to for Outcome 0 and Insulin
      $sql="select count(Id) as noInsulin from tbl_naivedataSet where Outcome=0 AND Insulin='".getInsulin($insulin)."'";
      $noResultInsulin=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultInsulin)>0){
          while($d=mysqli_fetch_assoc($noResultInsulin)){
            array_push($nodata6,$d);
          }
          foreach ($nodata6 as $value){
             $DBnoResultInsulin=$value['noInsulin'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 0 and BMI
      $sql="select count(Id) as noBMI from tbl_naivedataSet where Outcome=0 AND BMI='".getBMI($BMI)."'";
      $noResultBMI=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultBMI)>0){
          while($d=mysqli_fetch_assoc($noResultBMI)){
            array_push($nodata7,$d);
          }
          foreach ($nodata7 as $value){
             $DBnoResultBMI=$value['noBMI'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 0 and Diabetes Pedigree Function
      $sql="select count(Id) as noDPF from tbl_naivedataSet where Outcome=0 AND DiabetesPedigreeFunction='".getDPF($pedegree)."'";
      $noResultDPF=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultDPF)>0){
          while($d=mysqli_fetch_assoc($noResultDPF)){
            array_push($nodata8,$d);
          }
          foreach ($nodata8 as $value){
             $DBnoResultDPF=$value['noDPF'];
          }
        }else{
          echo "data not found";
        }
      
      //query to for Outcome 0 and Age 
      $sql="select count(Id) as noAge from tbl_naivedataSet where Outcome=0 AND Age='".getAge($age)."'";
      $noResultAge=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noResultAge)>0){
          while($d=mysqli_fetch_assoc($noResultAge)){
            array_push($nodata9,$d);
          }
          foreach ($nodata9 as $value){
             $DBnoResultAge=$value['noAge'];
          }
        }else{
          echo "data not found";
        }

      $noLikelihoodPregnancy= $DBnoResultPregnancy/$DBnoDiabetes;
      $noLikelihoodGlucose= $DBnoResultGlucose/$DBnoDiabetes;
      $noLikelihoodBP= $DBnoResultBP/$DBnoDiabetes;
      $noLikelihoodSkin= $DBnoResultSkin/$DBnoDiabetes;
      $noLikelihoodInsulin= $DBnoResultInsulin/$DBnoDiabetes;
      $noLikelihoodBMI= $DBnoResultBMI/$DBnoDiabetes;
      $noLikelihoodDPF= $DBnoResultDPF/$DBnoDiabetes;
      $noLikelihoodAge= $DBnoResultAge/$DBnoDiabetes;

      $noPriorProbability=$DBnoDiabetes/$DBtotalData;
      
      $noDiabetesResult=($noLikelihoodPregnancy*$noLikelihoodGlucose*$noLikelihoodBP*$noLikelihoodSkin*$noLikelihoodInsulin*
                                 $noLikelihoodBMI*$noLikelihoodDPF*$noLikelihoodAge)*$noPriorProbability;


      $probDiabetes = $diabetesResult/($diabetesResult+$noDiabetesResult);
      $probNoDiabetes = $noDiabetesResult/($diabetesResult+$noDiabetesResult);

      $probDiabetesPercentage = round($probDiabetes,3)*100;
      $probNoDiabetesPercentage =round($probNoDiabetes,3)*100;

      echo "<br><br><br>";
      echo $probDiabetes; echo '<br>';
      echo $probDiabetesPercentage;echo '<br>';
      
      echo $probNoDiabetes; echo '<br>';
      echo $probNoDiabetesPercentage;echo '<br>';
    
    
   
  if($diabetesResult>=$noDiabetesResult){
    $msg='<div class="alert alert-danger"> Patient has Diabetes Chance of '.($probDiabetesPercentage).'%</div>';
      $outcome='tested_positive';
      $value=$probDiabetesPercentage;
      
   }else{
    $msg='<div class="alert alert-success"> Patient has no Diabetes Chance of '.($probNoDiabetesPercentage).'%</div>';
    $outcome='tested_negative';
    $value=$probNoDiabetesPercentage;
     
   }
   // require "connect.php";
   //    $currentDate = date('Y-m-d H:i:s');
   //    $addsql = "insert into tbl_naiveBayesResult (email,gender,date,pregnancies,glucose,bp,skin,insulin,bmi,pedegree,age,outcome,value) values 
   //    ('$email','$inputGender','$currentDate','$pregnancy','$glucose','$BP','$skin','$insulin','$BMI','$pedegree','$age','$outcome','$value')";
   //    echo "<br>";echo "<br>";
   //    echo $addsql;
   //    $result=mysqli_query($conn, $addsql);
    
   
}//end of count error
  
      
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
            /*position: fixed;*/
            width: 100%;
            /*bottom: 0;*/
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
            <!-- <ul class="nav navbar-nav navbar-right">
              <li><a href="adminIndex.php">Home</a></li>
              <li><a href="loadDataSet.php">Load Data Set</a></li>
              <li><a href="Predict.php">Predict Diabetes</a></li>
              <li><a href="Help.php">Help</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">View Users</a></li>
              <li><a href="adminlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul> -->
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to Admin Panel</p>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav>
  <!-----------END NAV SECTION-------->

    <!--HOME SECTION-->

<section>
        <div class="container">
            <div class="row ">
                  <div id="navbar">
                    <ul class="nav navbar-nav navbar-right" style="list-style: none;display: inline-block;position:absolute;top:10%;left:70%; ">
                      <li style="margin-right:10px;"><a href="" class="btn btn-danger">Gaussian Naive Bayes</a></li>
                      <li><a href="" class="btn btn-danger">Naive Bayes</a></li>  
                    </ul>
                  </div>
                  <br><br><br>
                   <div class="col-md-12 col-sm-12 ">
                        <h4 class="text-center" style="font-weight: bold;">Please Fill up the form to Predict Diabetes Using Naive Bayes Algorithm</h4>
                        <form  method="POST" action="naivebayes.php" name="predictForm">
                              <div class="col-md-12 col-sm-12">
                                 
                                  <?php
                                  if(isset($_POST['predict'])){
                                     echo $msg; 
                                  }
                                  
                                   ?>    
                              </div>
                        <div class="col-md-6 col-sm-6">
                          
                          <div class="form-group">  
                             <label>Patient Email
                                <input list="email" class="form-control" placeholder="Choose Patient Email Address" style="width:540px; position:relative;top: 6px;" name="email"/></label>
                                  <datalist id="email">
                                    <?php 
                                       require "connect.php";
                                       //query to select data
                                       $sql="select * from tbl_user";
                                       //execute query and return result object
                                       $result=mysqli_query($conn,$sql);
                                       //default array
                                       $data=array();
                                        if(mysqli_num_rows($result)>0){
                                          while($d=mysqli_fetch_assoc($result)){
                                            array_push($data,$d);
                                          }
                                          
                                        }else{
                                          echo "data not found";
                                        }
                                      
                                    ?>

                                    <?php foreach ($data as $info) { ?>
                                       <option value="<?php echo $info['email']; ?>"> 
                                    <?php }?>   
                                  </datalist>
                                  <span class="errorDisplay">
                                  <?php if (isset($err['email'])){
                                  echo $err['email'];
                                } ?>
                              </span>
                          </div>

                            <br>
                           <div class="form-group">  

                             <?php if(isset($_POST['predict'])){?>
                                <label for="maleCheck">Male</label> 
  
                                   <?php if($inputGender == 'Male'){?>
                                        <input type="radio" onclick="javascript:genderCheck();" name="inputGender" id="maleCheck" value="Male" checked> 
                                        <label for="femaleCheck">Female</label>
                                        <input type="radio" onclick="javascript:genderCheck();" name="inputGender" id="femaleCheck" value="Female"><br>
                                  <?php }?>

                                  <?php if($inputGender == 'Female'){?> 
                                      <input type="radio" onclick="javascript:genderCheck();" name="inputGender" id="maleCheck" value="Male" > 
                                      <label for="femaleCheck">Female</label>
                                      <input type="radio" onclick="javascript:genderCheck();" name="inputGender" id="femaleCheck" value="Female" checked><br>
                                  <?php }?>
                             <?php }?>     
                            
                            <?php if(!isset($_POST['predict'])){?>
                                <label for="maleCheck">Male</label> 
                                <input type="radio" onclick="javascript:genderCheck();" name="inputGender" id="maleCheck" value="Male" checked> 
                                <label for="femaleCheck">Female</label>
                                <input type="radio" onclick="javascript:genderCheck();" name="inputGender" id="femaleCheck" value="Female"><br>
                            <?php }?>

                            <span class="errorDisplay">
                                <?php if (isset($err['gender'])){
                                echo $err['gender'];
                              } ?>
                            </span> 
                          </div>  

                          <script type="text/javascript">
          
                              function genderCheck() {
                                if (document.getElementById('femaleCheck').checked) {
                                document.getElementById('ifYes').style.visibility = 'visible';
                              }else {
                                document.getElementById('ifYes').style.visibility = 'hidden';
                              }
                            }
                        </script>
                           <br>
                          
                            <?php if(isset($_POST['predict'])){ ?>
                                <?php if($inputGender=="Female"){ 

                                  ?>
                                      <div class="form-group" id="ifYes" style="visibility:visible">
                                        <label for="inputPregnancy">Pregnancies</label>
                                        <input type="text" class="form-control"  name ="pregnancy" id="inputPregnancy" value="" placeholder="Enter Pregnancy Value"/>
                                        <span class="errorDisplay">
                                        <?php if (isset($err['pregnancy'])){
                                                echo $err['pregnancy'];
                                        } ?>
                                       </span>
                                      
                              <?php } ?>

                              <?php if($inputGender=="Male"){ ?>
                                  <div class="form-group" id="ifYes" style="visibility:hidden">
                                      <label for="inputPregnancy">Pregnancies</label>
                                      <input type="text" class="form-control"  name ="pregnancy" id="inputPregnancy" value="" placeholder="Enter Pregnancy Value" />
                                      <span class="errorDisplay">
                                      <?php if (isset($err['pregnancy'])){
                                              echo $err['pregnancy'];
                                      } ?>
                                       </span>
                              <?php } ?>
                          <?php } ?>

                           <?php if(!isset($_POST['predict'])){ ?>
                            <div class="form-group" id="ifYes" style="visibility:hidden">
                              <label for="inputPregnancy">Pregnancies</label>
                              <input type="text" class="form-control"  name ="pregnancy" id="inputPregnancy" value="" placeholder="Enter Pregnancy Value"/>
                              <span class="errorDisplay">
                              <?php if (isset($err['pregnancy'])){
                                echo $err['pregnancy'];
                              } ?>
                              </span>
                             <?php } ?> 
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

                          <br>
                          <div class="form-group">
                            <label for="inputBP">Blood Pressure</label>
                            <input type="text" class="form-control"  name="BP" id="inputBP" placeholder="Enter Blood Pressure Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['BP'])){
                                echo $err['BP'];
                              } ?>
                            </span>
                          </div>
                          
                        </div>

                        <div class="col-md-6 col-sm-6">
                          
                          <div class="form-group">
                            <label for="inputSkin">Skin Thickness</label>
                            <input type="text" class="form-control" name="skin" id="inputSkin" placeholder="Enter Skin Thickness Value">
                            <span class="errorDisplay">
                                <?php if (isset($err['skin'])){
                                echo $err['skin'];
                              } ?>
                            </span>
                          </div>

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
