<?php 
	require "connect.php";
	$Id=$_GET['Id'];
	$userSql="Select email from tbl_result where Id='$Id'";
	echo $userSql;
	 //execute query and return result object
	$userResult=mysqli_query($conn,$userSql);

	if(mysqli_num_rows($userResult)>0){
	    $info=mysqli_fetch_assoc($userResult);
        $dbUserEmail=$info['email'];
        echo $dbUserEmail;
       
		$countDocSql="Select * from tbl_doctor order by Id asc"; echo '<br>';
		echo $countDocSql;
	    $countDocResult=mysqli_query($conn,$countDocSql);
         //first inner if
		if(mysqli_num_rows($countDocResult)==0){
				echo "No doctor Available";
		}else{
		    //check if a pateient has been assigned with a doctor already
			$userDocSql="Select doctorEmail from tbl_user_doctor where userEmail='$dbUserEmail'";
	  		$userDocResult =mysqli_query($conn,$userDocSql);
	  		if(mysqli_num_rows($userDocResult)>0){
	  			//assign previously added doctor
	  			$val=mysqli_fetch_assoc($userDocResult);
	  			$previousDocEmail=$val['doctorEmail'];
	      		// $addSql="Insert into tbl_user_doctor (userEmail,doctorEmail) values ('$dbUserEmail','$previousDocEmail')";
      			// $addSqlResult =mysqli_query($conn,$addSql);
		 
      		}else{
      			$checkUserDocSql="Select doctorEmail FROM tbl_user_doctor order by Id desc limit 1";
      			$checkUserDocResult=mysqli_query($conn,$checkUserDocSql);
      			if(mysqli_num_rows($checkUserDocResult)!=1){
      				//assign 1st doctor of table
      				$value=mysqli_fetch_assoc($countDocResult);
	  				$dbDoctorEmail=$value['docEmail'];
      				$addSql="Insert into tbl_user_doctor (userEmail,doctorEmail) values ('$dbUserEmail','$dbDoctorEmail')";
      				$addSqlResult =mysqli_query($conn,$addSql);
      				
      			}
      			else{
      				$info=mysqli_fetch_assoc($checkUserDocResult);
      				$prevDocEmail=$info['doctorEmail'];
      				$prevDocIdsql="Select Id from tbl_doctor where docEmail='$prevDocEmail'";
	  				$prevDocIdResult =mysqli_query($conn,$prevDocIdsql);
	  				$data=mysqli_fetch_assoc($prevDocIdResult);
	  				$prevDocId=$data['Id'];
	  				$nextDocEmailsql="Select docEmail from tbl_doctor where Id>'$prevDocId' limit 1";
	  				$nextDocEmailResult =mysqli_query($conn,$nextDocEmailsql);
	  				$value=mysqli_fetch_assoc($nextDocEmailResult);
	  				$nextDocEmail=$value['docEmail'];
	  				if(mysqli_num_rows($nextDocEmailResult)!=1){
      				//assign 1st doctor of table
	  					$value=mysqli_fetch_assoc($countDocResult);
	  					$dbDoctorEmail=$value['docEmail'];
	  					$addSql="Insert into tbl_user_doctor (userEmail,doctorEmail) values ('$dbUserEmail','$dbDoctorEmail')";
      					$addSqlResult =mysqli_query($conn,$addSql);
      					

      				}
      				else{
      					//assign $nextDocEmailResult['docEmail']
      					$addNextSql="Insert into tbl_user_doctor (userEmail,doctorEmail) values ('$dbUserEmail','$nextDocEmail')";
      					$addNextSqlResult =mysqli_query($conn,$addNextSql);
      					
      				}
      			}

      			
      		}
		}//end of inner else of first inner if 	
		    
	}//end of main if loop
	

?>

