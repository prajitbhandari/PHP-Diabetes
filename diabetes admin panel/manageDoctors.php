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
    <![endif]--></head>
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
                          if(!isset($_COOKIE['username']))
                            echo "LOGIN";
                          else
                            echo "LOGOUT";
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
                   <div class="col-md-12 col-sm-12 alert-info">
                        <h4><i class="fa fa-user-md fa-2x" ></i>&nbsp;Manage Doctors</h4>
                                     
                    </div>  
                </div>
                  </div>
           <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">DoctorName</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Address</th>
                              <th scope="col">Action</th>
                            </tr>
                       </thead>
                       <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>xyz@gmail.com</td>
                              <td>12345687</td>
                              <td>ktm</td>
                              <td><a href="">Delete</a></td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jack</td>
                              <td>jack@gmail.com</td>
                              <td>12345687</td>
                              <td>Pkr</td>
                              <td><a href="">Delete</a></td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>John</td>
                              <td>john@gmail.com</td>
                              <td>12345687</td>
                              <td>DML</td>
                              <td><a href="">Delete</a></td>
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