<?php
session_start();
if(file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])){
    $client = $_SESSION['client'];
    $temp_time = time();
    $file_name = $_FILES['file']['name'];
    $temp_array = explode(".", $file_name);
    $file_extension = strtolower(end($temp_array));
    $ok= 1;

    $valid_extensions = array("jpg","jpeg","png","gif");

    if( !in_array($file_extension,$valid_extensions) ) {
    $ok = 0;
    }
    if($ok == 0){
    echo 0;
    }else{
        $path = "img/content_image/".$client['uid'].$temp_time.MD5($file_name).".".$file_extension;
        if(move_uploaded_file($_FILES['file']['tmp_name'],"../".$path)){
            $_SESSION['content']['fimg'] = $path;
            $_SESSION['changes'] = true;
            echo 1;
        }else{
            echo 0;
        }
        }
}else{
    echo 0;
}