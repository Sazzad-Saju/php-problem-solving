<?php
    if(isset($_POST['submit'])){  //name submit button
        $file = $_FILES['myImg'];
        // var_dump($file);
        // print_r($file);
        $filename = $file['name']; //img/file array has a name
        $fileTempLocation = $file['tmp_name']; //temp location of the file
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.',$filename);
        $fileActualExt = strtolower(end($fileExt)); //2nd piece of data from explode
        // print($fileActualExt); 
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    // uniqueid + true->gives current millisecond
                    $NewFileName = uniqid('',true).".".$fileActualExt;
                    // echo $NewFileName;
                    $fileNewDestination = 'uploads/'.$NewFileName;
                    move_uploaded_file($fileTempLocation,$fileNewDestination);
                    //message print out in url
                    header("Location: index.php?upload_successful"); 
                }else{
                    echo "File too big";
                }
            }else{
                echo "Something went wrong";
            }
        }else{
            echo "Wrong file format";
        }
    }
?>