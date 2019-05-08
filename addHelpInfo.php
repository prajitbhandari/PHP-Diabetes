<?php
  
  $msg='';

  //check for button click---form submit
  if(isset($_POST['add'])){
  $err = array();

  //check for Attribute
  if (isset($_POST['attribute']) && !empty($_POST['attribute']) ){
    $attribute = trim($_POST['attribute']);
        if (!preg_match("/^([a-zA-Z0-9' ]+)$/",$attribute)) {
      $err['attribute'] = "*Invalid Attribute";
    }
     }else {
    $err['attribute'] = "*Enter the Attribute name";
  }


  //check for Description
  if (isset($_POST['description']) && !empty($_POST['description']) ){
    $description = trim($_POST['description']);
        if (!preg_match("/^([a-zA-Z0-9' ]+)$/",$description)) {
      $err['description'] = "*Invalid Description";
    }
     }else {
    $err['description'] = "*Enter Description";
  }

  //check for  value
  if (isset($_POST['value']) && !empty($_POST['value']) ){
    $value = trim($_POST['value']);
        if (!preg_match("/^([a-zA-Z0-9' ]+)$/",$value)) {
      $err['value'] = "*Invalid Value";
    }
     }else {
    $err['value'] = "*Enter the Value";
  }

 // check for number of error
  if(count($err) == 0) {
    require "connect.php";
    $insql="select * from tbl_help  where attribute='$attribute'";
    $result=mysqli_query($conn, $insql);
    if(mysqli_num_rows($result)>0){
         $msg= '<div class="alert alert-danger">Attribute Already Created</div>';
     }

    else{
       $addsql = "insert into tbl_help(attribute,description,value) values 
      ('$attribute','$description','$value')";
      $res=mysqli_query($conn, $addsql);
      
      if ($res){
        $msg='<div class="alert alert-success">Attribute Added Successfully</div>';
      } else{
        $msg='<div class="alert alert-danger">Failed to Add Attribute</div>';
      }  
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
              <li><a href="index.php">Home</a></li>
              <li><a href="createDataSet.php">Create Data Set</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="addHelpInfo.php">Add HelpInfo</a></li>
              <li><a href="manageHelpInfo.php">Manage HelpInfo</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">Manage Users</a></li>
              <li><a href="viewEnquiry.php">View Enquiry</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav>
  <!-----------END NAV SECTION-------->

    <!--HOME SECTION-->
    <section>
         <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="width: 559px;
                     margin-left: 306px; border-radius: 8px;">
                        <h4><i class=""></i>&nbsp;Add Help Info</h4>
                                     
                    </div> 
                </div>
            </div>
            <br>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                 <form method="POST" action="" name="helpForm">
                    <?php 
                        echo $msg;
                    ?>
                       
                       <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="attribute">Attribute</label>
                            <input type="text" class="form-control" name="attribute" id="attribute">
                            <span class="errorDisplay">
                              <?php if (isset($err['attribute'])){
                              echo $err['attribute'];
                            } ?>
                            </span>
                            <br>

                          </div>
                       </div>
                 
                    

                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="description">Description</label>
                          <input type="text" class="form-control" name="description" id="description">
                          <span class="errorDisplay">
                              <?php if (isset($err['description'])){
                              echo $err['description'];
                            } ?>
                            </span>
                            <br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="value">Value</label>
                          <input type="text" class="form-control" name="value" id="value">
                          <span class="errorDisplay">
                              <?php if (isset($err['value'])){
                              echo $err['value'];
                            } ?>
                            </span>
                            <br>
                        </div>
                    </div>
                    
                    <button type="submit" name="add" class="btn btn-block btn-primary">Add</button>
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