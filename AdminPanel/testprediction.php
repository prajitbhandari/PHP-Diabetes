<?php
  
         require "connect.php";
         //query to select data
         echo $sql="select * from tbl_dataSet where Outcome=0 LIMIT 10";
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
  <title></title>
</head>
<body>
    <h2 style="text-align: center">Hello Prediction</h2>
      <table border="1px">
          <thead class="bg-success">
              <tr>
                <th scope="col">Pregnanices</th>
                <th scope="col">Glucose</th>
                <th scope="col">Blood Pressure</th>
                <th scope="col">Skin Thickness</th>
                <th scope="col">Insulin</th>
                <th scope="col">BMI</th>
                <th scope="col">DPF</th>
                <th scope="col">Age</th>
                <th scope="col">Outcome</th>
              </tr>
         </thead>
         <tbody>
              <?php foreach ($data as $info){?>
                <tr>
                  <td><?php echo $info['Pregnancies'] ?> </td>
                  <td><?php echo $info['Glucose'] ?> </td>
                  <td><?php echo $info['BloodPressure'] ?> </td>
                  <td><?php echo $info['SkinThickness'] ?> </td>
                  <td><?php echo $info['Insulin'] ?> </td>
                  <td><?php echo $info['BMI'] ?> </td>
                  <td><?php echo $info['DiabetesPedigreeFunction'] ?> </td>
                  <td><?php echo $info['Age'] ?> </td> 
                  <td><?php echo $info['Outcome'] ?> </td>  
                </tr>
              <?php } ?>
          </tbody>
        </table>
</body>
</html>