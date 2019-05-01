<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
            </div>
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right" id="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="createDataSet.php">Create Data Set</a></li>
                    <li><a href="addDoctors.php">Add Doctors</a></li>
                    <li><a href="addHelpInfo.php">Add HelpInfo</a></li>
                    <li><a href="manageHelpInfo.php">Manage HelpInfo</a></li>
                    <li><a href="manageDoctors.php">Manage Doctors</a></li>
                    <li><a href="manageUsers.php">Manage Users</a></li>
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
           <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                      <caption>Diabetes Disease View:Sheet 1</caption>
                      <thead class="bg-success">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Attributes</th>
                          <th scope="col">Description</th>
                          <th scope="col">Values</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>Continuous</td>
                        </tr>
                        
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>Continuous</td>
                        </tr>
                        
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>Continuous</td>
                        </tr>
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
