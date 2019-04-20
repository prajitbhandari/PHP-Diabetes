<?php 
 require "connect.php";
 //query to select data
 $Id=$_GET['id'];
 $sql="select * from tbl_doctor where Id='$Id'";
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


<?php
//check for button click---form submit
$result='';
if(isset($_POST['update'])){
  $err = array();
  
  //check for Doctor Name
  if (isset($_POST['docName']) && !empty($_POST['docName']) ){
    $docName = $_POST['docName'];
    if (!preg_match("/^[a-zA-Z]+$/",$docName)) {
      $err['docName'] = "*Invalid Name";
    }
     }else {
    $err['docName'] = "*Enter Doctor Name";
  }

  //check for Doctor Email
  if (isset($_POST['docEmail']) && !empty($_POST['docEmail']) ){
    $docEmail = $_POST['docEmail'];
    if(!filter_var($docEmail,FILTER_VALIDATE_EMAIL)){
      $err['docEmail'] = "*Invalid Email Address";
    }
     }else {
    $err['docEmail'] = "*Enter Doctor Email Address";
  }

  
  //check for Doctor Phone
if (isset($_POST['docPhone']) && !empty($_POST['docPhone'])){
    $docPhone = $_POST['docPhone'];
    if(!preg_match('/^[0-9]{10}+$/', $docPhone)){
      $err['docPhone'] = "*Enter Valid Contact number";
    } 
  }else{
    $err['docPhone'] = "*Enter contact number";
  }

  //check for Doctor Address
  if (isset($_POST['docAddress']) && !empty($_POST['docAddress'])){
    $docAddress = $_POST['docAddress'];
    if (!preg_match("/^[a-zA-Z0-9 ]+$/",$docAddress)) {
      $err['docAddress'] = "*Invalid Address";
    }
  }else {
    $err['docAddress'] = "*Enter Doctor Address";
    }
  

  //check for Qualification
  if (isset($_POST['docQualification']) && !empty($_POST['docQualification']) ){
    $docQualification = $_POST['docQualification'];
    if (!preg_match("/^[a-zA-Z ]*$/",$docQualification)) {
      $err['docQualification'] = "*Invalid Doctor Qualification";
    }
     }else {
    $err['docQualification'] = "*Enter Doctor Qualification";
  }

  
  // check for number of error
  if(count($err) == 0) {
    require "connect.php";

    $sql ="update tbl_doctor set docName='$docName',docEmail='$docEmail',docPhone='$docPhone',docAddress='$docAddress',docQualification='$docQualification'
    where Id=$Id";
    $res=mysqli_query($conn, $sql);
    
    if ($res){
      $result='<div class="alert alert-success"> Doctor Updated Successfully</div>';
    }else{
      $result='<div class="alert alert-danger">Failed to Update Doctor</div>';
    }   
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
         .errorDisplay{
          color: red;
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
                        <li><a href="manageDoctors.php">Manage Doctors</a></li>
                        <li><a href="manageUsers.php">Manage Users</a></li>
                        <li><a href="Logout.php"><?php 
                          // if(!isset($_COOKIE['username']))
                          //   echo "Login";
                          // else
                          //   echo "Logout";
                        ?></a></li>
                </ul>
            </div>  
        </div>
    </div>
     <!--END NAV SECTION -->
    
  

      <!-- PORTFOLIO SECTION-->
   <section id="port-sec">
       <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="width: 559px;
                     margin-left: 306px; border-radius: 8px;">
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Update Doctors</h4>
                                     
                    </div> 
                </div>
                  </div>
           <div class="row g-pad-bottom" >
                <div class="col-md-6 col-md-offset-3">
                  <?php foreach ($data as $info){?>
                   <form method="POST" action="" name="doctorForm">
                      <?php 
                          echo $result;
                      ?>
                      <div class="form-group">
                        <label for="docName">DocName</label>
                        <input type="text" class="form-control" name="docName" id="docName" value="<?php echo $info['docName']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['docName'])){
                                echo $err['docName'];
                              } ?>
                        </span>
                            <br>
                      </div>

                      <div class="form-group">
                        <label for="docEmail">E-mail</label>
                        <input type="text" class="form-control" name="docEmail" id="docEmail" value="<?php echo $info['docEmail']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['docEmail'])){
                                echo $err['docEmail'];
                              } ?>
                        </span>
                          <br>
                      </div>

                      <div class="form-group">
                        <label for="docPhone">Phone</label>
                        <input type="text" class="form-control" name="docPhone" id="docPhone"value="<?php echo $info['docPhone']?> ">
                        <span class="errorDisplay">
                            <?php if (isset($err['docPhone'])){
                                echo $err['docPhone'];
                              } ?>
                        </span>
                          <br>
                      </div>
                      
                      <div class="form-group">
                        <label for="docAddress">Address</label>
                        <input type="text" class="form-control" name="docAddress" id="docAddress" value="<?php echo $info['docAddress']?> ">
                        <span class="errorDisplay">
                                <?php if (isset($err['docAddress'])){
                                echo $err['docAddress'];
                              } ?>
                        </span>
                            <br>
                      </div>
                      
                      <div class="form-group">
                        <label for="docQualification">Qualification</label>
                        <input type="text" class="form-control" name="docQualification" id="docQualification" value="<?php echo $info['docQualification']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['docQualification'])){
                                echo $err['docQualification'];
                              } ?>
                        </span>
                            <br>
                      </div>
                      <?php } ?>

                      <button type="submit" name="update" class="btn btn-block btn-primary">Update</button>
                    </form>
                </div>
           </div>
       </div>
   </section>
     <!-- END PORTFOLIO SECTION-->
   

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
