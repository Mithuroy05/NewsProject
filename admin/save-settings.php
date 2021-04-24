<?php
include "config.php";

if(empty($_FILES['new-logo']['name'])){
    $file_name = $_POST['old-logo'];
}else {
    $error = array();

    $file_name = $_FILES['new-logo']['name'];
    $file_size = $_FILES['new-logo']['size'];
    $file_tmp = $_FILES['new-logo']['tmp_name'];
    $file_type = $_FILES['new-logo']['type'];
    $file_ext = end(explode('.',$file_name));
    $extensions = array("jpeg","jpg","png","svg","webp");

    if(in_array($file_ext,$extensions) === false){ // in_array(value, which array)
        $error[] = "This extension is not allow";
    }
    if($file_size > 2097152 ){
        $error[] = "File size must be 2Mb or lower";
    }
    if(empty($error) == true){
        move_uploaded_file($file_tmp, "images/".$file_name);
    }
    else{
        print_r($error); 
        die();
       }
} 
$updatesql = "UPDATE settings SET web_logo='{$file_name}', footer_description='{$_POST["footerdisc"]}'";
// echo $updatesql;
// die();
$result = mysqli_query($conn, $updatesql);
if($result){
    header("Location:../admin/settings.php");

}else {
    echo "Query Failed";
}
