<?php
include "config.php";
if(isset($_FILES['fileToUpload'])){
    $error = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));
    //strtolower == create small characte {Image.JPG} = {jpg}
    // end == catch .then {Image.JPG} = { JPG }
    // explode == divide by .  one sentence {Image.JPG} = { .JPG }
    $extensions = array("jpeg","jpg","png","svg","webp");

    if(in_array($file_ext,$extensions) === false){ // in_array(value, which array)
        $error[] = "This extension is not allow";
        header("Location:../admin/add-post.php");

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
        
    } 

session_start();
$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$description = mysqli_real_escape_string($conn, $_POST['postdesc']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];

// if verchar then include '{variable}'
// if int or number then include only {variable}
 $sql = "INSERT INTO post(title,description,category,post_date,author,post_img)
        VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}' ); ";

$sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";
 // $sql .= is a concatenation , include add two sql command and run together

 if(mysqli_multi_query($conn, $sql)){
     header("Location:../admin/post.php");
 }
 else{
     echo "<div class='alert alert-danger'> Query Failed </div>";
 }














