<?php

include "config.php";
$post_id = $_GET['id'];
$cate_id = $_GET['cate'];

$deleteImageSql = "SELECT * FROM post WHERE post_id = {$post_id}";
$result = mysqli_query($conn, $deleteImageSql)or die("Query Failed");
$row = mysqli_fetch_assoc($result);
unlink("upload/".$row['post_img']); // this post table = this post_id = unlike this image or delete file


$sql =" DELETE FROM post WHERE  post_id = '{$post_id}'; ";
$sql .= "UPDATE category SET post=post-1 WHERE category_id = {$cate_id}";
if(mysqli_multi_query($conn,$sql)){
    header("Location:../admin/post.php");
}else{
    echo "<p style='color:red; text-align:center; margin:10px 0'  > Can't delete the User record . </p>";
}
mysqli_close($conn);
