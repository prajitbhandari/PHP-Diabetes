<?php

    $msg='';
    require "connect.php";
    if (isset($_POST['upload'])){

        $err = array();
        $filename=$_FILES['file']['name'];
        $fileerror=$_FILES['file']['error'];
        $filesize=$_FILES['file']['size'];
        $filetmp=$_FILES['file']['tmp_name'];
        $fileext=explode('.',$filename);
        $filecheck=strtolower(end($fileext));
        $fileextstored=array('csv');
        
        //check for file error  
            if ($fileerror == 0) {

            // code.....
            // type validation
            if (in_array($filecheck, $fileextstored)){
                # code...
                if ($filesize<=50000000 ) {
                    
                    // $destinationfile='upload/'.$filename;
                    // $result=move_uploaded_file($filetmp, $destinationfile);
                     $file = fopen($filetmp, "r");
                     $first=true;
                     $second=true;
                     echo '<br>';echo '<br>';echo '<br>';echo '<br>';
                     $sqlInsert = "insert into tbl_dataSet (Pregnancies,Glucose,BloodPressure,SkinThickness,Insulin,BMI,DiabetesPedigreeFunction,Age,Outcome) values";
                     while (($column = fgetcsv($file, 10000, ",")) !== FALSE ) { 
                        if(!$first){
                            
                            if(!$second){
                                
                                 $sqlInsert = $sqlInsert.",";
                                 
                            }
                            
                            $second=false;
                            $sqlInsert = $sqlInsert."('$column[0]','$column[1]','$column[2]','$column[3]','$column[4]','$column[5]','$column[6]','$column[7]',
                            '$column[8]')";
                             
                            }
                            $first= false;


                        }//end of while loop



                        $result = mysqli_query($conn, $sqlInsert);            
                           if ($result) {
                                $msg="<div class='alert alert-success col-md-4 col-md-offset-4'>File successfully uploaded</div>";
                            } else {
                                $msg="<div class='alert alert-danger col-md-4 col-md-offset-4'>File Upload Failed</div>";
                            }
                        
                }else{
                    $msg= "<div class='alert alert-danger col-md-4 col-md-offset-4'>File Size Invalid</div>";
                }

            }else{
                $msg="<div class='alert alert-danger col-md-4 col-md-offset-4'>Files Type Invalid!</div>";
            }
        }
        else{
            $msg="<div class='alert alert-danger col-md-4 col-md-offset-4'>Select a file</div>";
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

  <br><br><br><br><br>

    <!--HOME SECTION-->
     <section >
        <div class="container ">
            <div class="row">   
                <?php 
                    echo $msg; echo "<br>";
                ?>
               <div class="col-md-4 col-sm-4 col-sm-offset-4 " >
                    <h4>Create New Data set</h4>
                    <form method="POST" action=" " enctype="multipart/form-data">
                     <input type="file" name="file">
                     <br><br>
                     <input type="submit" name="upload" value="Upload" class="btn  btn-block btn-primary">
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
         
    </div><br>
    <!-- END FOOTER SECTION -->

</body>
</html>