<?php
include "config.php";

if(empty($_FILES['new-image']['name'])){
    $file_name = $_POST['old-image'];
}else {
    $error = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext = end(explode('.',$file_name));
    $extensions = array("jpeg","jpg","png","svg","webp");

    if(in_array($file_ext,$extensions) === false){ // in_array(value, which array)
        $error[] = "This extension is not allow";
    }
    if($file_size > 2097152 ){
        $error[] = "File size must be 2Mb or lower";
    }
    if(empty($error) == true){
        move_uploaded_file($file_tmp, "upload/".$file_name);
    }
    else{
        print_r($error); 
        die();
       }
} // else close
/*
, description='{$_POST["postdesc"]}', category={$_POST["category"]}, post_img='{$file_name}'
*/
$updatesql = "UPDATE post 
        SET title='{$_POST["post_title"]}',description='{$_POST["postdescription"]}', category={$_POST["category"]},post_img='{$file_name}'
        WHERE post_id = {$_POST["post_id"]} ";
// echo $updatesql;
// die();
$result = mysqli_query($conn, $updatesql);
if($result){
    header("Location:../admin/post.php");

}else {
    echo "Query Failed";
}