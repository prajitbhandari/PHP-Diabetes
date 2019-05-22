<?php 

echo '<br>';echo '<br>';
        
   $currentDate= date('Y-m-d');
   $requireDate=date("m-d-Y", strtotime($currentDate));
   echo 'current Date is '.$currentDate;echo '<br>';
   echo 'Required date is '.$requireDate; echo '<br>';echo '<br>';

$err=array();
if(isset($_POST['submit'])){

	if (isset($_POST['predictionDate']) && !empty($_POST['predictionDate']) ){

		$predictionDate=date("m-d-Y", strtotime($_POST['predictionDate']));

         echo  $predictionDate;

         if($predictionDate!=$requireDate){
         	echo "Invalid Date";
         }else{
         	echo "Valid date";
         }

         
        // $predictionDate =strtotime($_POST['predictionDate']);
        // echo $predictionDate;
        //   if($predictionDate!=$requireDate){
        //      echo  "*Invalid Prediction Date";
        // } 
      }else {
        echo "*Enter Prediction Date";
      }
}




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <form method="POST" action=""  >
  	<br>
  	Date: <input type="date" name="predictionDate"/><br><br>
    <label>Choose a browser from this list:
      <input list="inputEmail" name="inputEmail" /></label>
        <datalist id="inputEmail">
          <option value="Chrome">
          <option value="Firefox">
          <option value="Internet Explorer">
          <option value="Opera">
          <option value="Safari">
          <option value="Microsoft Edge">
</datalist>
  	<input type="submit" name="submit">

  </form>
</body>
</html>