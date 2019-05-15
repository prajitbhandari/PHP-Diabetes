
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

  function sqlResult($outcome,$value){
      require "connect.php";
      $addsql = "insert into tbl_result (email,pregnancies,glucose,bp,skin,insulin,bmi,pedegree,age,outcome,value) values 
      ('$email','$pregnancy','$glucose','$BP','$skin','$insulin','$BMI','$pedegree','$age','$outcome','$value')";
      $result=mysqli_query($conn, $addsql);
      
    } 


   //check for button click---form submit
  if(isset($_POST['predict'])){
    $err = array();

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



 //check for number of error
    if (count($err)==0) {
    		require "connect.php";
    		$data=array();
      //query to select data
      $sql="select * from tbl_dataSet where Outcome=1 ";
      //execute query and return result object
      $result=mysqli_query($conn,$sql);
      //default array
      
     	 if(mysqli_num_rows($result)>0){
        while($d=mysqli_fetch_assoc($result)){
          array_push($data,$d);
        }
    }else{
    	echo "no data found";
    }








    }//count errore
    else{
    	echo "no count error";
    }


  } //end of main if      
?>