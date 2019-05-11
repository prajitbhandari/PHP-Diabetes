<?php 
 require "connect.php";
 //query to select data
 $Id=$_GET['id'];
 $sql="Delete from tbl_doctor where Id=$Id";
 //execute query and return result object
 $result=mysqli_query($conn,$sql);
 //default array
  if ($result){
      header('location:manageDoctors.php');

    }
  else{
    echo "Deletion Failed";
  }
?>

