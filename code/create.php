<?php
$stage_dir ="uploads/";
$target_file =$target_dir . basename($_FILES["imagen"]["name"]);

if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)){
    echo "The file has been uploaded.";
 } else{
echo"Sorry, there was an error uploading your file.";
    }


?>