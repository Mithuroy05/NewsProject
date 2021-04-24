<?php
if($_SESSION['role'] == 0){
    header("Location:../admin/post.php");
}

include "config.php";
$category_id = $_GET['id'];
$sql =" DELETE FROM category WHERE  category_id = '{$category_id}'; ";
$sql .= "DELETE FROM post WHERE category = {$category_id}";
// if detete one category and then delete all post under this category post.
if(mysqli_multi_query($conn,$sql)){
    header("Location:../admin/category.php");
}else{
    echo "<p style='color:red; text-align:center; margin:10px 0'  > Can't delete the Category record . </p>";
}
mysqli_close($conn);
