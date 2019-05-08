<?php 
   require "connect.php";
   //query to select data
   $Id=$_GET['id'];
   $sql="select * from tbl_help where Id='$Id'";
   //execute query and return result object
   $result=mysqli_query($conn,$sql);
   //default array
   $data=array();
    if(mysqli_num_rows($result)>0){
      while($d=mysqli_fetch_assoc($result)){
        array_push($data,$d);
      }
       foreach ($data as $info){
       $DBattribute=$info['attribute'];
       $DBdescription=$info['description'];
       $DBvalue=$info['value'];
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
    
    //check for Attribute
     if (isset($_POST['attribute']) && !empty($_POST['attribute']) ){
      $attribute = trim($_POST['attribute']);
     if (!preg_match("/^([a-zA-Z0-9' ]+)$/",$attribute)) {
        $err['attribute'] = "*Invalid Attribute Name";
      }
       }else {
      $err['attribute'] = "*Enter Attribute Name";
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

    //check for Value
    if (isset($_POST['value']) && !empty($_POST['value']) ){
      $value = trim($_POST['value']);
      if (!preg_match("/^([a-zA-Z0-9' ]+)$/",$value)) {
        $err['value'] = "*Invalid Value";
      }
       }else {
      $err['value'] = "*Enter the value";
    }


    // check for number of error
    if(count($err) == 0) {
      echo '<br><br><br><br>'; 
      $Id=$_GET['id'];        
      if($attribute==$DBattribute && $description==$DBdescription && $value==$DBvalue){
          $msg= '<div class="alert alert-danger"> Please Change the content</div>';
        
        }
    else{
      $insql="select * from tbl_help  where attribute='$attribute' AND Id!='$Id'";
      $result=mysqli_query($conn, $insql);
      if(mysqli_num_rows($result)>0){
           $msg= '<div class="alert alert-danger">Attribute Name Already Created</div>';
       }

      else{
        require "connect.php";
        $sql ="update tbl_help set attribute='$attribute',description='$description',value='$value' where Id=$Id";
        echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';
        $res=mysqli_query($conn, $sql);
        if ($res){
          $msg= '<div class="alert alert-success"> Attribute Updated Successfully</div>';
        }else{
          $msg= '<div class="alert alert-danger">Failed to Update Attribute</div>';
        } 
      }    
      
    }
  }

  //keep track of current text field value
   require "connect.php";
   //query to select data
   $Id=$_GET['id'];
   $sql="select * from tbl_help where Id='$Id'";
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
        /*padding-top:2px;
        margin-top:2px;*/
        position: absolute;
        top:100px;
        left:100px;
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
      </nav><br><br><br><br>
  <!-----------END NAV SECTION-------->

    <!--HOME SECTION-->
      <section>
          <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                   <div class="col-md-6 col-md-offset-3 alert-info" style="width: 559px;
                     margin-left: 306px; border-radius: 8px;">
                        <h4><i class=""></i>&nbsp;Update Help Info</h4>
                                     
                    </div> 
                </div>
            </div>
            <br>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                <?php foreach ($data as $info){?>
                 <form method="POST" action="" name="helpForm">
                    <?php 
                        echo $msg;
                    ?>
                       
                       <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="attribute">Attribute</label>
                            <input type="text" class="form-control" name="attribute" id="attribute" value="<?php echo $info['attribute']?>">
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
                          <input type="text" class="form-control" name="description" id="description" value="<?php echo $info['description']?>">
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
                          <input type="text" class="form-control" name="value" id="value" value="<?php echo $info['value']?>">
                          <span class="errorDisplay">
                              <?php if (isset($err['value'])){
                              echo $err['value'];
                            } ?>
                            </span>
                            <br>
                        </div>
                    </div>
                    
                    <button type="submit" name="update" class="btn btn-block btn-primary">Update</button>
                  </form>
                <?php }?>
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