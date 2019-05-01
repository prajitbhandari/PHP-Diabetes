<?php

  $result='';
  
  //check for button click---form submit
  if(isset($_POST['add'])){
    $err = array();

    //check for Doctor Name
    if (isset($_POST['docName']) && !empty($_POST['docName']) ){
      $docName = $_POST['docName'];
      if (!preg_match("/^[a-zA-Z ]*$/",$docName)) {
        $err['docName'] = "*Invalid Name";
      }
       }else {
      $err['docName'] = "*Enter Doctor Name";
    }


    //check for Doctor Address
    if (isset($_POST['feedback']) && !empty($_POST['feedback'])){
      $feedback = $_POST['feedback'];
      if (!preg_match("/^[a-zA-Z0-9 ]*$/",$feedback)) {
        $err['feedback'] = "*Invalid Feedback";
      }
    }else {
      $err['feedback'] = "*Enter Doctor Feedback";
    }
    

    
    //check for number of error
    if(count($err) == 0) {
      require "connect.php";
      $sql = "insert into tbl_feedback (docName,feedback) values ('$docName','$feedback')";
      $res=mysqli_query($conn, $sql);
      
      if ($res){
        $result='<div class="alert alert-success"> Feedback Added Successfully</div>';
      }   
    }else{
        $result='<div class="alert alert-danger">Failed to Add Feedback</div>';
      }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Diabetes Prediction System </title>
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
                      <li><a href="viewReport.php">View Report</a></li>
                      <li><a href="Feedback.php">Feedback </a></li>
                      <li><a href="Logout.php"><?php 
                        if(!isset($_COOKIE['username']))
                          echo "Login";
                        else
                          echo "Logout";
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
                        <h4><i class="fa fa-user-md fa-2x"></i>&nbsp; Doctor Feedback</h4>
                                     
                    </div> 
                </div>
            </div>

           <div class="row g-pad-bottom" >
              <div class="col-md-6 col-md-offset-3">
                <form method="POST" action="Feedback.php" name="doctorFeedbackForm">
                  <div class="form-group">
                    <?php echo $result;?>
                    <br>
                  </div>

                  <div class="form-group">
                    <label for="docName">DocName</label>
                    <input type="text" class="form-control" name="docName" id="docName" placeholder="Enter Doctor Name">
                    <span class="errorDisplay">
                            <?php if (isset($err['docName'])){
                            echo $err['docName'];
                          } ?>
                    </span>
                        <br>
                  </div>

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
     <!-- END PORTFOLIO SECTION-->
   

    <!--FOOTER SECTION -->
    <div id="footer">
        2019 www.yourdomain.com | All Right Reserved  
         
    </div>
    <!-- END FOOTER SECTION -->

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
