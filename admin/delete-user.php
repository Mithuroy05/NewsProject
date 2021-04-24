<?php
if($_SESSION['role'] == 0){
    header("Location:../admin/post.php");
}

include "config.php";
$user_id = $_GET['id'];
$sql =" DELETE FROM user WHERE  user_id = '{$user_id}' ";
if(mysqli_query($conn,$sql)){
    header("Location:../admin/users.php");
}else{
    echo "<p style='color:red; text-align:center; margin:10px 0'  > Can't delete the User record . </p>";
}
mysqli_close($conn);
