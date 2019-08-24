<?php
  if(!isset($_COOKIE['adminName'])){
    header('location:adminlogin.php?b=1');
    }
?>



<?php
   //Gaussian Global Variables
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
   
  // $email=null;
  $pregnancy=null;
  $glucose=null;
  $BP=null;
  $skin=null;
  $insulin=null;
  $BMI=null;
  $pedegree=null;
  $age=null;
  $gaussianPredicted=null;
  $naivePredicted=null;
  // $value=null;
  
  $msg='';
  // $inputGender='';
  
  $err = array();
  $data=array();
  $testdata=array();
  
  $DBtotalDataCount=null;
  $DByesTotalCount=null;
  $DBnoTotalCount=null;
    
  $err = array();
  $data=array();

  $valueCount=array();
  $yesCount=array();
  $noCount=array();


  $gDBTP=null;
  $gDBTN=null;
  $gDBFP=null;
  $gDBFN=null;
 
  // Naive Bayes Global variables

  $nDBTP=null;
  $nDBTN=null;
  $nDBFP=null;
  $nDBFN=null;

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
    
   
  // $email=null;
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
  $show='';
  // $inputGender='';
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


  $gTP=0;
  $gTN=0;
  $gFN=0;
  $gFP=0;

  $gPrecision=null;
  $gRecall=null;
  $gF1=null;

  $nTP=0;
  $nTN=0;
  $nFN=0;
  $nFP=0;

  $nPrecision=null;
  $nRecall=null;
  $nF1=null;

  $gAccuracy=null;
  $nAccuracy=null;

// Functions for Gaussian Naive Bayes 
    
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


  // Functions for Naive Bayes
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
      }else {
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
    }else{
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
   
    require "connect.php";

       $sql="select * from tbl_testdata;";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $testdata=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($testdata,$d);
          }
          
        }else{
          echo "data not found";
        }
        
        foreach ($testdata as $key ) {
      # code...
        $pregnancy=$key['Pregnancies'];
        $glucose=$key['Glucose'];
        $BP=$key['BloodPressure'];
        $skin=$key['SkinThickness'];
        $insulin=$key['Insulin'];
        $BMI=$key['BMI'];
        $pedegree=$key['DiabetesPedigreeFunction'];
        $age=$key['Age'];
        $outcome=$key['Outcome'];  
    

//check for number of error

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
      // print_r($dbPregnancy);
      
    }else{
      echo "data not found";
  }

    require "connect.php";

      //query to select total number of data 
      $sql="select count(Id) as totalDataCount from tbl_dataSet";
      $totalDataCount=mysqli_query($conn,$sql);
        if(mysqli_num_rows($totalDataCount)>0){
          while($d=mysqli_fetch_assoc($totalDataCount)){
            array_push($valueCount,$d);
          }
          foreach ($valueCount as $info){
             $DBtotalDataCount=$info['totalDataCount'];
          }
          
        }else{
          echo "data not found";
        }

      //query to select total number of data for Outcome 1  
      $sql="select count(Id) as yesDataCount from tbl_dataSet where Outcome=1";
      $yesDataCount=mysqli_query($conn,$sql);
        if(mysqli_num_rows($yesDataCount)>0){
          while($d=mysqli_fetch_assoc($yesDataCount)){
            array_push($yesCount,$d);
          }
          foreach ($yesCount as $info){
             $DByesTotalCount=$info['yesDataCount'];
          }
          
        }else{
          echo "data not found";
        }

      $diabetesPriorProbability=($DByesTotalCount/$DBtotalDataCount);
    // echo $diabetesPriorProbability;

      $diabetesResult= likelihoodProb($pregnancy,$dbPregnancy)*likelihoodProb($glucose,$dbGlucose)*likelihoodProb($BP,$dbBP)*likelihoodProb($skin,$dbSkin)*likelihoodProb($insulin,$dbInsulin)*likelihoodProb($BMI,$dbBMI)*likelihoodProb($pedegree,$dbPedegree)*likelihoodProb($age,$dbAge)*$diabetesPriorProbability;
      // 0.33796940194715
      
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
          // print_r($dbPregnancy);
      
      }else{
        echo "data not found";
      }

      require "connect.php";

      //query to select total number of data for Outcome 1  
      $sql="select count(Id) as noDataCount from tbl_dataSet where Outcome=0";
      $noDataCount=mysqli_query($conn,$sql);
        if(mysqli_num_rows($noDataCount)>0){
          while($d=mysqli_fetch_assoc($noDataCount)){
            array_push($noCount,$d);
          }
          foreach ($noCount as $info){
             $DBnoTotalCount=$info['noDataCount'];
          }
          
        }else{
          echo "data not found";
        }

      $noDiabetesPriorProbability=($DBnoTotalCount/$DBtotalDataCount);
      // echo $noDiabetesPriorProbability;


      $noDiabetesResult= likelihoodProb($pregnancy,$dbPregnancy)*likelihoodProb($glucose,$dbGlucose)*likelihoodProb($BP,$dbBP)*likelihoodProb($skin,$dbSkin)*likelihoodProb($insulin,$dbInsulin)*likelihoodProb($BMI,$dbBMI)*likelihoodProb($pedegree,$dbPedegree)*likelihoodProb($age,$dbAge)*$noDiabetesPriorProbability;
      // 0.66203059805


      $probDiabetes = $diabetesResult/($diabetesResult+$noDiabetesResult);
      $probNoDiabetes = $noDiabetesResult/($diabetesResult+$noDiabetesResult);

      $probDiabetesPercentage = round($probDiabetes,3)*100;
      $probNoDiabetesPercentage =round($probNoDiabetes,3)*100;

    // echo "Gaussian Diabetes Probability is ".$probDiabetes; echo '<br>';
    // echo $probDiabetesPercentage;echo '<br>';
    
    // echo "Gaussian No Diabetes Probability is ".$probNoDiabetes; echo '<br>';
    // echo $probNoDiabetesPercentage;echo '<br>';
    // echo "<br>";echo "<br>";

    
    
   
      if($diabetesResult>=$noDiabetesResult){
        $msg='<div class="alert alert-danger"> Using Gaussian Naive Bayes Patient has Diabetes Chance of '.($probDiabetesPercentage).'%</div>';
          $gaussianPredicted=1;
          $gaussianValue=$probDiabetesPercentage;
          
       }else{
        $msg='<div class="alert alert-success"> Using Gaussian Naive Bayes Patient has no Diabetes Chance of '.($probNoDiabetesPercentage).'%</div>';
        $gaussianPredicted=0;
        $gaussianValue=$probNoDiabetesPercentage;
       }
   
      //Naive Bayes Algorithm Calculation
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
      // echo $sql;
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

          // echo "<br><br><br>";
          // echo "Naive Diabetes Probability is ".$probDiabetes; echo '<br>';
          // echo $probDiabetesPercentage;echo '<br>';
          
          // echo $probNoDiabetes; echo '<br>';
          // echo "Naive Bayes NO Diabetes Probability is ".$probNoDiabetesPercentage;echo '<br>';
          // echo "<br>";echo "<br>";
        
        
       
          if($diabetesResult>=$noDiabetesResult){
            $show='<div class="alert alert-danger"> Using Naive Bayes Patient has Diabetes Chance of '.($probDiabetesPercentage).'%</div>';
              $naivePredicted=1;
              $naiveValue=$probDiabetesPercentage;
              
           }else{
            $show='<div class="alert alert-success"> Using Naive Bayes Patient has no Diabetes Chance of '.($probNoDiabetesPercentage).'%</div>';
            $naivePredicted=0;
            $naiveValue=$probNoDiabetesPercentage;
             
           }
          

          
           if($key['Outcome']==1 && $gaussianPredicted==1 ){ 
             $gaussianPredicted="TP";
             $gTP=$gTP+1;  
           }
           
           else if($key['Outcome']==0 && $gaussianPredicted==0 ){ 
            $gaussianPredicted="TN";
             $gTN=$gTN+1;
           }                     
           else if($key['Outcome']==0 && $gaussianPredicted==1 ){ 
            $gaussianPredicted="FP";
             $gFP=$gFP+1;
           }
           else if($key['Outcome']==1 && $gaussianPredicted==0 ){ 
             $gaussianPredicted="FN";
             $gFN=$gFN+1;
           }


           if($key['Outcome']==1 && $naivePredicted==1 ){ 
             $naivePredicted="TP";
             $nTP=$nTP+1;
           }
           else if($key['Outcome']==0 && $naivePredicted==0 ){ 
             $naivePredicted="TN";
             $nTN=$nTN+1;
           }
            else if($key['Outcome']==0 && $naivePredicted==1 ){ 
             $naivePredicted="FP";
             $nFP=$nFP+1;
           }
           else if($key['Outcome']==1 && $naivePredicted==0 ){
             $naivePredicted="FN";  
             $nFN=$nFN+1;
           }
           

           if(!isset($_COOKIE['test'])){
              require "connect.php";
              $addsql = "insert into tbl_testResult (pregnancies,glucose,bp,skin,insulin,bmi,pedegree,age,outcome,gaussianPredicted,naivePredicted) values 
             ('$pregnancy','$glucose','$BP','$skin','$insulin','$BMI','$pedegree','$age','$outcome','$gaussianPredicted','$naivePredicted')";
              // echo $addsql;echo "<br>";
               if (mysqli_query($conn, $addsql)){
                setcookie('test',$addsql,time()+7*24*60*60);
              }
          }

    
         //  echo "<br>";echo "<br>";echo "<br>";
      }//end of main for each loop

      //Count positive and negative values for Gaussian
        require "connect.php";

       $sql="select COUNT(ID) as gaussTP from tbl_testResult WHERE gaussianPredicted='TP'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $gaussdata1=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($gaussdata1,$d);
          }
          foreach ($gaussdata1 as $value){
                 $gDBTP=$value['gaussTP'];
              }
          
        }else{
          echo "data not found";
        }

        require "connect.php";

       $sql="select COUNT(ID) as gaussTN from tbl_testResult WHERE gaussianPredicted='TN'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $gaussdata2=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($gaussdata2,$d);
          }
          foreach ($gaussdata2 as $value){
                 $gDBTN=$value['gaussTN'];
              }
          
        }else{
          echo "data not found";
          }


         require "connect.php";

       $sql="select COUNT(ID) as gaussFP from tbl_testResult WHERE gaussianPredicted='FP'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $gaussdata3=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($gaussdata3,$d);
          }
          foreach ($gaussdata3 as $value){
                 $gDBFP=$value['gaussFP'];
              }
        }else{
          echo "data not found";
        }


       require "connect.php";

       $sql="select COUNT(ID) as gaussFN from tbl_testResult WHERE gaussianPredicted='FN'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $gaussdata4=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($gaussdata4,$d);
          }
          foreach ($gaussdata4 as $value){
                 $gDBFN=$value['gaussFN'];
              }
          
        }else{
          echo "data not found";
        }

        //positive and negative values for Naive  
         require "connect.php";
         $sql="select COUNT(ID) as naiveTP from tbl_testResult WHERE naivePredicted='TP'";  
           //execute query and return result object
         $result=mysqli_query($conn,$sql);
         //default array
         $naivedata1=array();
          if(mysqli_num_rows($result)>0){
            while($d=mysqli_fetch_assoc($result)){
              array_push($naivedata1,$d);
            }
            foreach ($naivedata1 as $value){
                   $nDBTP=$value['naiveTP'];
                }
            
          }else{
            echo "data not found";
          } 

          require "connect.php"; 
       $sql="select COUNT(ID) as naiveTN from tbl_testResult WHERE naivePredicted='TN'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $naivedata2=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($naivedata2,$d);
          }
          foreach ($naivedata2 as $value){
                 $nDBTN=$value['naiveTN'];
              }
          
        }else{
          echo "data not found";
        }

      require "connect.php";
      $sql="select COUNT(ID) as naiveFP from tbl_testResult WHERE naivePredicted='FP'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $naivedata3=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($naivedata3,$d);
          }
          foreach ($naivedata3 as $value){
                 $nDBFP=$value['naiveFP'];
              }
          
        }else{
          echo "data not found";
        }

       require "connect.php";
       $sql="select COUNT(ID) as naiveFN from tbl_testResult WHERE naivePredicted='FN'";  
         //execute query and return result object
       $result=mysqli_query($conn,$sql);
       //default array
       $naivedata4=array();
        if(mysqli_num_rows($result)>0){
          while($d=mysqli_fetch_assoc($result)){
            array_push($naivedata4,$d);
          }
          foreach ($naivedata4 as $value){
                 $nDBFN=$value['naiveFN'];
              }
          
        }else{
          echo "data not found";
        } 

        
        // echo "Gaussian TP ".$gDBTP;echo "<br>";echo "<br>";
        // echo "Gaussian TN ".$gDBTN;echo "<br>";echo "<br>";
        // echo "Gaussian FP ".$gDBFP;echo "<br>";echo "<br>";
        // echo "Gaussian FN ".$gDBFN;echo "<br>";echo "<br>";

        // echo "Naive TP ".$nDBTP;echo "<br>";echo "<br>";
        // echo "Naive TN ".$nDBTN;echo "<br>";echo "<br>";
        // echo "Naive FP ".$nDBFP;echo "<br>";echo "<br>";
        // echo "Naive FN ".$nDBFN;echo "<br>";echo "<br>";

        //gaussian Accuracy
        $gPrecision = $gDBTP/($gDBTP+$gDBFP);
        $gRecall = $gDBTP/($gDBTP+$gDBFN);
        $gF1= 2*($gRecall * $gPrecision) / ($gRecall + $gPrecision);
        $gAccuracy=$gF1*100;


        //Naive Accuracy
        $nPrecision = $nDBTP/($nDBTP+$nDBFP);
        $nRecall = $nDBTP/($nDBTP+$nDBFN);
        $nF1 = 2*($nRecall * $nPrecision) / ($nRecall + $nPrecision);
        $nAccuracy=$nF1*100;    
   ?>


<?php 
   require "connect.php";
   //query to select data
   $sql="select * from tbl_testResult";
   //execute query and return result object
   $result=mysqli_query($conn,$sql);
   //default array
   $resultdata=array();
    if(mysqli_num_rows($result)>0){
      while($d=mysqli_fetch_assoc($result)){
        array_push($resultdata,$d);
      }
      
    }else{
      echo "data not found";
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
      /*position: fixed;*/
      width: 100%;
      bottom: 0;
      height: 60px;
      background-color:#538cc6;
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
              <li><a href="importgaussiandata.php">Load Data Set</a></li>
              <li><a href="importTestData.php">Import Test Data Set</a></li>
              <li><a href="Predict.php">Predict Diabetes</a></li>
              <li><a href="Help.php">Help</a></li>
              <li><a href="viewUsers.php">View Users</a></li>
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
                     <div class="col-md-12 col-sm-12 " style="width: 98%;
                     margin-left: 12px; border-radius: 8px;">
                        <h4>Testing Data Set for Prediction</h4>               
                    </div>  
                </div>
            </div><br/>

            <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                              <th scope="col">Pregnancies</th>
                              <th scope="col">Glucose</th>
                              <th scope="col">Blood Pressure</th>
                              <th scope="col">Skin Thickness</th>
                              <th scope="col">Insulin</th>
                              <th scope="col">BMI</th>
                              <th scope="col">DPF</th>
                              <th scope="col">Age</th>
                              <th scope="col">Outcome</th>
                              <th scope="col">GaussianPredicted</th>
                              <th scope="col">naivePredicted</th>
                            </tr>
                       </thead>
                       <tbody>
                            <?php foreach ($resultdata as $in){?>
                              <tr>
                                <td><?php echo $in['pregnancies'] ?> </td>
                                <td><?php echo $in['glucose'] ?> </td>
                                <td><?php echo $in['bp'] ?> </td>
                                <td><?php echo $in['skin'] ?> </td>
                                <td><?php echo $in['insulin'] ?> </td>
                                <td><?php echo $in['bmi'] ?> </td>  
                                <td><?php echo $in['pedegree'] ?> </td>  
                                <td><?php echo $in['age'] ?> </td> 
                                <td><?php echo $in['outcome'] ?> </td>   
                                <td><?php echo $in['gaussianPredicted'] ?> </td>
                                <td><?php echo $in['naivePredicted'] ?> </td>  
                              </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
           </div>

           <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                    <caption style="text-align: center">Confusion Matrix for Gaussian Naive Bayes</caption>
                        <thead class="bg-success">
                            <tr>
                              <th scope="col" style="visibility: hidden;"></th>
                              <th scope="col">Predicted No</th>
                              <th scope="col">Predicted Yes</th>
                            </tr>
                            <tr>
                              <th scope="col">Actual No </th>
                              <th scope="col">TN: <?php echo $gDBTN?></th>
                              <th scope="col">FP: <?php echo $gDBFP?></th>
                            </tr>
                            <tr>
                              <th scope="col">Actual Yes</th>
                              <th scope="col">FN: <?php echo $gDBFN?></th>
                              <th scope="col">TP: <?php echo $gDBTP?></th>
                              
                            </tr>
                       </thead>
                    </table>
                </div>
           </div>

           <div class="row g-pad-bottom" style="position: relative;left:25%">
                <div class="col-md-6 col-sm-6" >
                   <table class="table table-bordered table-striped">
                    <caption style="text-align: center">Accuracy  for Gaussian Naive Bayes</caption>
                        <thead class="bg-success" style="width:50px;">
                            <tr>
                              <th scope="col">Precision:  </th>
                              <th scope="col"><?php echo $gPrecision;?> </th>
                            </tr>
                            <tr>
                              <th scope="col">Recall: </th>
                              <th scope="col"><?php echo $gRecall;?> </th>
                            </tr>
                            <tr>
                              <th scope="col">F1-Score:  </th> 
                              <th scope="col" style="background: red;"><?php echo $gF1?> </th>                              
                            </tr>
                       </thead>
                    </table>
                </div>
           </div>

           <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                    <caption style="text-align: center">Confusion Matrix for Naive Bayes</caption>
                        <thead class="bg-success">
                            <tr>
                              <th scope="col" style="visibility: hidden;"></th>
                              <th scope="col">Predicted No</th>
                              <th scope="col">Predicted Yes</th>
                            </tr>
                            <tr>
                              <th scope="col">Actual No </th>
                              <th scope="col">TN: <?php echo $nDBTN?></th>
                              <th scope="col">FP: <?php echo $nDBFP?></th>
                            </tr>
                            <tr>
                              <th scope="col">Actual Yes</th>
                              <th scope="col">FN: <?php echo $nDBFN?></th>
                              <th scope="col">TP: <?php echo $nDBTP?></th>
                              
                            </tr>
                       </thead>
                    </table>
                </div>
           </div>

           <div class="row g-pad-bottom"  style="position: relative;left:25%"">
                <div class="col-md-6 col-sm-6" >
                   <table class="table table-bordered table-striped">
                    <caption style="text-align: center">Accuracy  for Naive Bayes</caption>
                        <thead class="bg-success">
                          <tr>                           
                            <th scope="col">Precision:  </th>
                            <th scope="col"><?php echo $nPrecision;?> </th>
                          </tr>
                          <tr>
                            <th scope="col">Recall: </th>
                            <th scope="col"><?php echo $nRecall;?> </th>
                          </tr>
                          <tr>
                            <th scope="col">F1-Score: </th> 
                            <th scope="col" style="background: red"><?php echo $nF1?> </th>                             
                          </tr>
                       </thead>
                    </table>
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