<?php 
if(!isset($_COOKIE['email'])){
    header('location:userlogin.php?a=1');
  }
?>

<?php 
   $currentEmail=$_COOKIE['email'];
   require "connect.php";

   $sql="select * from tbl_result where email='$currentEmail'";  
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
          background-color:#538cc6;
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
                <li><a href="index.php">Home</a></li>
                <li><a href="viewResult.php">View Result</a></li>
                <li><a href="userlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            <p class="navbar-text" style="color:#fff;font-size: 16px;">Welcome to User Panel</p>
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
                        <h3><i class="fa fa-user-md fa-2x" ></i>&nbsp;View Result</h3>
                                     
                    </div>    
                </div>
              </div>
              <br>
            <div class="row g-pad-bottom">
                <div class="text-center g-pad-bottom">
                    <div class="col-md-12 col-sm-12 alert alert-warning" style="width: 30%;height:30%;left:68%;
                     margin-left: 12px; border-radius: 8px;">
                        <h3>Range for Diabetes</h3>
                        <p>Probability (0-39)%: Low</p>
                        <p style="margin-left:30px;">Probability (40-69)%: Medium</p>
                        <p style="margin-left:17px;">Probability (70-100)%: High</p>             
                    </div>    
                </div>
              </div>

           <div class="row g-pad-bottom" >
                <div class="col-md-12 col-sm-12" >
                   <h4 class="text-center" style="font-weight: bold;">Diabetes Result Based on  Naive Bayes and Gaussian Naive Bayes Algorithm</h4>
                   <table class="table table-bordered table-striped">
                      <thead class="bg-success">
                          <tr>
                            <th scope="col">Predicted Date</th>
                            <th scope="col">Pregnancies</th>
                            <th scope="col">Glucose</th>
                            <th scope="col">BP</th>
                            <th scope="col">Skin Thickness</th>
                            <th scope="col">Insulin</th>
                            <th scope="col">BMI</th>
                            <th scope="col">DPF</th>
                            <th scope="col">Age</th>
                            <th scope="col">Outcome for Gaussian </th>
                            <th scope="col">Probability for Gaussian</th>
                            <th scope="col">Outcome for Naive Bayes </th>
                            <th scope="col">Probability for Naive Bayes</th>

                          </tr>
                     </thead> 
                     <tbody>
                       <?php foreach ($data as $info){?>
                              <tr>
                                <td><?php echo $info['date'] ?></td>
                                <td><?php echo $info['pregnancies'] ?></td>
                                <td><?php echo $info['glucose'] ?></td>
                                <td><?php echo $info['bp'] ?></td>
                                <td><?php echo $info['skin'] ?></td>
                                <td><?php echo $info['insulin'] ?></td>
                                <td><?php echo $info['bmi'] ?></td>
                                <td><?php echo $info['pedegree'] ?></td>
                                <td><?php echo $info['age'] ?></td>
                                <td><?php echo $info['gaussianOutcome']?></td>
                                <td><?php echo $info['gaussianValue'].'%'?></td>
                                <td><?php echo $info['naiveOutcome']?></td>
                                <td><?php echo $info['naiveValue'].'%'?></td>
                                
                              </tr>
                         <?php } ?>

                    </tbody>
                    </table>
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
