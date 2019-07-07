<?php 
   require "connect.php";
   //query to select data
   $sql="select * from tbl_user";
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
              <li><a href="adminIndex.php">Home</a></li>
              <li><a href="importgaussiandata.php">Load Data Set</a></li>
              <li><a href="Predict.php">Predict Diabetes</a></li>
              <li><a href="Help.php">Help</a></li>
              <li><a href="addDoctors.php">Add Doctors</a></li>
              <li><a href="manageDoctors.php">Manage Doctors</a></li>
              <li><a href="manageUsers.php">View Users</a></li>
              <li><a href="adminlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to Admin Panel</p>
          </div><!--/.nav-collapse -->  
        </div><!--/.container-fluid -->
      </nav>
  <!-----------END NAV SECTION-------->

    <!--HOME SECTION-->
   <section>
      <div class="container">
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                     <div class="col-md-12 col-sm-12 alert-info" style="width: 98%;
                     margin-left: 12px; border-radius: 8px;">
                        <h4><i class="" ></i>&nbsp;User Details</h4>

                                     
                    </div>  
                </div>
            </div><br/>

            <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <table class="table table-bordered table-striped">
                        <thead class="bg-success">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Address</th>
                            </tr>
                       </thead>
                       <tbody>
                            <?php foreach ($data as $in){?>
                              <tr>
                                <td><?php echo $in['Id'] ?> </td>
                                <td><?php echo $in['fname'] ?> </td>
                                <td><?php echo $in['lname'] ?> </td>
                                <td><?php echo $in['email'] ?> </td>
                                <td><?php echo $in['phone'] ?> </td>
                                <td><?php echo $in['address'] ?> </td>  
                              </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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