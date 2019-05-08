<?php

  $msg='';
  
  //check for button click---form submit
  if(isset($_POST['add'])){
    $err = array();

    //check for Doctor First Name
    // if (isset($_POST['fname']) && !empty($_POST['fname']) ){
    //   $fname = trim($_POST['fname']);
    //   if(!preg_match("/^([a-zA-Z]+)$/",$fname)){
    //     $err['fname'] = "*Invalid First Name";
    //   }
    //    }else {
    //   $err['fname'] = "*Enter First  Name";
    // }

     //check for Doctor Last  Name
    // if (isset($_POST['lname']) && !empty($_POST['lname']) ){
    //   $lname = trim($_POST['lname']);
    //   if(!preg_match("/^([a-zA-Z]+)$/",$lname)){
    //     $err['lname'] = "*Invalid Last Name";
    //   }
    //    }else {
    //   $err['lname'] = "*Enter Last  Name";
    // }


    //check for Doctor Address
    if (isset($_POST['feedback']) && !empty($_POST['feedback'])){
      $feedback = trim($_POST['feedback']);
      if(!preg_match("/^([a-zA-Z0-9' ]+)$/",$feedback)){
        $err['feedback'] = "*Invalid Feedback";
      }
    }else {
      $err['feedback'] = "*Enter Doctor Feedback";
    }
    

    
    //check for number of error
    if(count($err) == 0) {
      require "connect.php";
      $sql = "insert into tbl_feedback (feedback) values ($feedback')";
      $res=mysqli_query($conn, $sql);
      
      if ($res){
        $msg='<div class="alert alert-success"> Feedback Added Successfully</div>';
      }   
    }else{
        $msg='<div class="alert alert-danger">Failed to Add Feedback</div>';
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
                <li><a href="viewReport.php">View Report</a></li>
                <li><a href="Feedback.php">Feedback </a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to Doctor Panel</p>
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
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp; Doctor Feedback</h4>
                                     
                    </div> 
                </div>
            </div>
            <br>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                <form method="POST" action="Feedback.php" name="doctorFeedbackForm">
                  <div class="form-group">
                    <?php echo $msg;?>
                  </div>

                  <!-- <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Doctor First Name">
                    <span class="errorDisplay"> -->
                          
                    <!-- </span>
                        <br>
                  </div> -->


                  <!-- <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Doctor Last Name">
                    <span class="errorDisplay"> -->
                            
                   <!--  </span>
                        <br>
                  </div> -->


                  <div class="form-group">
                    <label for="feedback">FeedBack</label>
                    <textarea type="text" class="form-control" name="feedback" id="feedback" placeholder="Please Provie some Feedback"></textarea>
                    <span class="errorDisplay">
                            <?php if (isset($err['feedback'])){
                            echo $err['feedback'];
                          } ?>
                    </span>
                        <br>
                  </div>
                  <button type="submit" name="add" class="btn btn-block btn-primary">Add</button>
                </form>
              </div>
           </div>
       </div>
   </section>
    <!-- END Home SECTION -->

     <!--FOOTER SECTION -->
    <div id="footer">
        2019 www.yourdomain.com|All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

</body>
</html>
