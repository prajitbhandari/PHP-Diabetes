<?php 
 require "connect.php";
 //query to select data
 $sql="select * from tbl_feedback";
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
                        <li><a href="Predict.php">Predict Disease</a></li>
                        <li><a href="viewDoctor.php">View Doctors</a></li>
                        <li><a href="doctorResponse.php">Doctors Response</a></li>
                        <li><a href="Help.php">Help</a></li>
                        <li><a href="Contact.php">Contact Us</a></li>
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
                   <div class="col-md-12 col-sm-12 alert-info" style="width: 98%;
                     margin-left: 12px; border-radius: 8px;">
                        <h4><i class="fa fa-user-md fa-2x" ></i>&nbsp;Doctors Response</h4>
                                     
                    </div>  
                </div>
                  </div>
           <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Name</th>
                              <th scope="col">Feedback</th>
                            </tr>
                       </thead>
                       <tbody>
                        <?php foreach ($data as $info){?>
                            <tr>
                              <th scope="row"><?php echo $info['Id'] ?></th>
                              <td><?php echo $info['docName'] ?></td>
                              <td><?php echo $info['feedback'] ?></td>
                            </tr>
                          <?php }?>
                        </tbody>
                    </table>
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
