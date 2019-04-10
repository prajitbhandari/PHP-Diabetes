
<?php
    if (isset($_POST['upload'])){

        echo '<pre>';

        print_r($_FILES);
        $filename=$_FILES['photo']['name'];
        $fileerror=$_FILES['photo']['error'];
        $filesize=$_FILES['photo']['size'];
        $filetmp=$_FILES['photo']['tmp_name'];
        $fileext=explode('.',$filename);
        $filecheck=strtolower(end($fileext));
        $fileextstored=array('png','jpg','jpeg','csv');
        
        //check for file error  
                if ($fileerror == 0) {
                // code...
                // type validation
                if (in_array($filecheck, $fileextstored)){
                    # code...
                    if ($filesize<=20000000 ) {
                        
                        $destinationfile='upload/'.$filename;
                        $result=move_uploaded_file($filetmp, $destinationfile);
                        
                        if($result){
                            echo "successfully uploaded";
                        }else{
                            echo "Image Upload Failed";
                        }

                    }else{
                        echo "File Size Too Large! than 2 mb";
                    }

                }else{
                    echo "Files Type Invalid!";
                }
            }
            else{
                echo "File Error!";
            }
                
    }
    ?> 

     


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
 <form method="POST" action=" " enctype="multipart/form-data">
    <input type="file" name="photo">
    <br><br>
    <input type="submit" name="upload" value="Upload">
 </form>
</body>
</html>