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
       foreach ($data as $info){
         $DBfname=$info['fname'];
         $DBlname=$info['lname'];
         $DBgender=$info['gender'];
         $DBdocEmail=$info['docEmail'];
         $DBdocPhone=$info['docPhone'];
         $DBdocAddress=$info['docAddress'];
         $DBdocQualification=$info['docQualification'];
         $DBdocPassword=$info['docPassword'];
      }
    }else{
      echo "data not found";
    }
  
?>


<?php
  $msg='';
  //check for button click---form submit
  if(isset($_POST['update'])){
    $err = array();
    
    //check for Doctor First Name
    if (isset($_POST['fname']) && !empty($_POST['fname']) ){
      $fname = trim($_POST['fname']);
      if (!preg_match("/^([a-zA-Z]+)$/",$fname)) {
        $err['fname'] = "*Invalid Doctor First Name";
      }
       }else {
      $err['fname'] = "*Enter Doctor First Name";
    }
     //check for Doctor Last Name
    if (isset($_POST['lname']) && !empty($_POST['lname']) ){
      $lname = trim($_POST['lname']);
      if (!preg_match("/^([a-zA-Z]+)$/",$lname)) {
        $err['lname'] = "*Invalid Doctor Last  Name";
      }
       }else {
      $err['lname'] = "*Enter Doctor Last Name";
    }


    //check for Gender
    if (isset($_POST['inputGender']) && !empty($_POST['inputGender'])){
        $inputGender = trim($_POST['inputGender']);
      }else{
        $err['gender'] = "*Select Gender";         
    }

    //check for Doctor Email
    if (isset($_POST['docEmail']) && !empty($_POST['docEmail']) ){
      $docEmail = trim($_POST['docEmail']);
      if(!filter_var($docEmail,FILTER_VALIDATE_EMAIL)){
        $err['docEmail'] = "*Invalid Email Address";
      }
      require "connect.php";
      $sql="select * from tbl_doctor where docEmail='$docEmail' AND Id!='$Id'";
      $result=mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
        $err['docEmail'] = "*Email Already Created";
      }
       }else {
      $err['docEmail'] = "*Enter Doctor Email Address";
    }
    
    //check for Doctor Phone
    if (isset($_POST['docPhone']) && !empty($_POST['docPhone'])){
        $docPhone = trim($_POST['docPhone']);
        if(!preg_match('/^[0-9]{10}$/', $docPhone)){
          $err['docPhone'] = "*Enter Valid Contact number";
      }
       require "connect.php";
      $sql="select * from tbl_doctor where docPhone='$docPhone'AND Id!='$Id'";
      $result=mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
        $err['docPhone'] = "*Phone Number Already Created";
      } 
    }else{
      $err['docPhone'] = "*Enter contact number";
    }
    //check for Doctor Address
     if (isset($_POST['docAddress']) && !empty($_POST['docAddress']) ){
      $docAddress = trim($_POST['docAddress']);
      if (!preg_match("/^([a-zA-Z]+)$/",$docAddress)) {
        $err['docAddress'] = "*Invalid Doctor Address";
      }
       }else {
      $err['docAddress'] = "*Enter Doctor Address";
    }
    
    //check for Qualification
    if (isset($_POST['docQualification']) && !empty($_POST['docQualification']) ){
      $docQualification = trim($_POST['docQualification']);
      if (!preg_match("/^([a-zA-Z]+)$/",$docQualification)) {
        $err['docQualification'] = "*Invalid Doctor Qualification";
      }
       }else {
      $err['docQualification'] = "*Enter Doctor Qualification";
    }
    //check for doctor password
     if(isset($_POST['docPassword'])&& !empty($_POST['docPassword']))
      {
        $docPassword=trim($_POST['docPassword']);
      }
    else{
        $err['docPassword']= "*Enter Doctor Password";
      }
    // check for number of error
    if(count($err) == 0) {
      echo '<br><br><br><br>'; 
      $Id=$_GET['id'];        
      if($fname==$DBfname && $lname==$DBlname && $inputGender==$DBgender && $docEmail==$DBdocEmail && $docPhone==$DBdocPhone && $docAddress==$DBdocAddress 
        && $docQualification==$DBdocQualification && $docPassword==$DBdocPassword){
          $msg= '<div class="alert alert-danger"> Please Change the content</div>';
        
        }
     else{
        require "connect.php";
        $sql ="update tbl_doctor set fname='$fname',lname='$lname',gender='$inputGender',docEmail='$docEmail',docPhone='$docPhone',docAddress='$docAddress',
        docQualification='$docQualification',docPassword='$docPassword' where Id=$Id";
        $res=mysqli_query($conn, $sql);
        if ($res){
          $msg= '<div class="alert alert-success"> Doctor Updated Successfully</div>';
        }
      }
  }else{
          $msg= '<div class="alert alert-danger">Failed to Update Doctor</div>';
      }  
    //keep track of current text field value
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
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
      body{
        background-color:/* #0091ea;*/
      }
      #my-nav{
        position:absolute; 
        top: 0px; 
        width: 100%;
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
  
  <nav class="navbar navbar-inverse" id="my-nav"">
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
              <li><a href="loadDataSet.php">Load Data Set</a></li>
              <li><a href="Predict.php">Predict Diabetes</a></li>
              <li><a href="Help.php">Help</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">View Users</a></li>
              <li><a href="viewEnquiry.php">View Enquiry</a></li>
              <li><a href="adminlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to Admin Panel</p>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav><br><br><br><br>
  <!-----------END NAV SECTION-------->
    <!--HOME SECTION-->
      <section>
           <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="width: 559px;
                     margin-left: 306px; border-radius: 8px;">
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp;Update Doctor</h4>
                                     
                    </div> 
                </div>
            </div><br>
            <div class="row g-pad-bottom" >
                <div class="col-md-6 col-md-offset-3">
                  <?php foreach ($data as $info){?>
                   <form method="POST" action="" name="doctorForm">
                      <?php 
                          echo $msg;
                      ?>
                      
                      <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $info['fname']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['fname'])){
                                echo $err['fname'];
                              } ?>
                        </span>
                            <br>
                      </div>
                      <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $info['lname']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['lname'])){
                                echo $err['lname'];
                              } ?>
                        </span>
                            <br>
                      </div>

                       <div class="form-group">
                        <label for="inputGender">Gender</label>
                        <input type="text" class="form-control" name="inputGender" id="inputGender" value="<?php echo $info['gender']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['gender'])){
                                echo $err['gender'];
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
                        <input type="text" class="form-control" name="docPhone" id="docPhone"value="<?php echo $info['docPhone']?>">
                        <span class="errorDisplay">
                            <?php if (isset($err['docPhone'])){
                                echo $err['docPhone'];
                              } ?>
                        </span>
                          <br>
                      </div>
                      
                      <div class="form-group">
                        <label for="docAddress">Address</label>
                        <input type="text" class="form-control" name="docAddress" id="docAddress" value="<?php echo $info['docAddress']?>">
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
                      <div class="form-group">
                        <label for="docPassword">Password</label>
                        <input type="text" class="form-control" name="docPassword" id="docPassword" value="<?php echo $info['docPassword']?>">
                        <span class="errorDisplay">
                                <?php if (isset($err['docPassword'])){
                                echo $err['docPassword'];
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
   <br>
    <!-- END Home SECTION -->
     <!--FOOTER SECTION -->
    <div id="footer">
        2019 www.yourdomain.com|All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->
</body>
</html>