
<?php

    $msg='';
    if (isset($_POST['upload'])){
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

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
   <title>Multipager Template- Travelic </title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--ANIMATED FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
     <!--PRETTYPHOTO MAIN STYLE -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
       <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        #services-sec .row {
          height: 500px;
        }
    </style>

</head>
<body>
     <!-- NAV SECTION -->
        <div class="navbar navbar-inverse navbar-fixed-top">
           <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">YOUR LOGO</a>
                </div>
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav navbar-right" id="nav-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="createDataSet.php">Create Data Set</a></li>
                        <li><a href="addDoctors.php">Add Doctors</a></li>
                        <li><a href="manageDOctors.php">Manage Doctors</a></li>
                        <li><a href="manageUsers.php">Manage Users</a></li>
                        <li><a href="Logout.php"><?php 
                          // if(!isset($_COOKIE['username']))
                          //   echo "LOGIN";
                          // else
                          //   echo "LOGOUT";
                        ?></a></li>
                    </ul>
                </div> 
            </div>
        </div>
     <!--END NAV SECTION -->
  
    <!--Package SECTION-->    
    <section  id="services-sec">
        <div class="container ">
            <div class="row">
                <?php 
                    echo $msg;
                ?>
               <div class="col-md-4 col-sm-4 col-sm-offset-4 " >
                     <h4>Create New Data set</h4>
                   <form method="POST" action=" " enctype="multipart/form-data">
                     <input type="file" name="dataSet">
                     <br><br>
                     <input type="submit" name="upload" value="Upload" class="btn btn-primary">
                 </form>      
                </div>    
            </div>
        </div>
    </section>
    <!--END Package SECTION-->

    <!--FOOTER SECTION -->
    <div id="footer">
        2014 www.yourdomain.com | All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="assets/plugins/bootstrap.min.js"></script>  
     <!-- ISOTOPE SCRIPT   -->
    <script src="assets/plugins/jquery.isotope.min.js"></script>
    <!-- PRETTY PHOTO SCRIPT   -->
    <script src="assets/plugins/jquery.prettyPhoto.js"></script>    
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
