<?php

$type="";
$message="";
require "connect.php";

if (isset($_POST["upload"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        $first=true;
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE ) {

            if(!$first){

            $sqlInsert = "INSERT into tbl_dataSet (Pregnancies,Glucose,BloodPressure,SkinThickness,Insulin,BMI,DiabetesPedigreeFunction,Age,Outcome) 
         values('$column[0]','$column[1]','$column[2]','$column[3]','$column[4]','$column[5]','$column[6]','$column[7]','$column[8]')";
         echo '<br>';echo '<br>';echo '<br>';echo '<br>';
         
            $result = mysqli_query($conn, $sqlInsert);            
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
        $first= false;
    }
    }
}
?>



<?php

    $msg='';
    if (isset($_POST['upload'])){
        $err = array();
        $filename=$_FILES['dataSet']['name'];
        $fileerror=$_FILES['dataSet']['error'];
        $filesize=$_FILES['dataSet']['size'];
        $filetmp=$_FILES['dataSet']['tmp_name'];
        $fileext=explode('.',$filename);
        $filecheck=strtolower(end($fileext));
        $fileextstored=array('csv');
        
        //check for file error  
                if ($fileerror == 0) {
                // code...
                // type validation
                if (in_array($filecheck, $fileextstored)){
                    # code...
                    if ($filesize<=20000000 ) {
                        
                        $destinationfile='upload/'.$filename;
                        $result=move_uploaded_file($filetmp, $destinationfile);
                        
                        if($result){
                            $msg="<div class='alert alert-success col-md-4 col-md-offset-4'>File successfully uploaded</div>";
                        }else{
                            $msg="<div class='alert alert-danger col-md-4 col-md-offset-4'>File Upload Failed</div>";
                        }

                    }else{
                        $msg= "<div class='alert alert-dangercol-md-4 col-md-offset-4'>File Size Too Large! than 2 mb</div>";
                    }

                }else{
                    $msg="<div class='alert alert-danger col-md-4 col-md-offset-4'>Files Type Invalid!</div>";
                }
            }
            else{
                $msg="<div class='alert alert-danger col-md-4 col-md-offset-4'>File Error!</div>";
            }
                
    }
    ?> 