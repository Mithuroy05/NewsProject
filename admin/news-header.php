<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../admin/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/navbar-style.css" />

</head>
<body>
<!-- Menu Bar -->
<header>
        <nav class="navbar">
            <?php
                $sql = "SELECT * FROM settings" ;
                $result = mysqli_query($conn, $sql) or die("Query Failed Settings");
                if(mysqli_num_rows($result) > 0 ){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="logo"><a href="../index.php"><img  src="images/<?php echo $row['web_logo']; ?>" height="150px"></a></div>
            <?php
            }
                }
            ?>
            <a class="togglebtn" href="#">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span></a>
            <div class="navbar-links">
                <ul>
                <li><a href="../index.php" class="" >HOME</a></li>

                    <?php
                        $cat_id = "";
                        if(isset($_GET['cid'])){
                            $cat_id = $_GET['cid'];
                        }
                        $categorySql = "SELECT * FROM category WHERE post>0";
                        $getResult = mysqli_query($conn, $categorySql) or die("Query Filed");;
                        if(mysqli_num_rows($getResult)>0){
                            $active = "";
                            while($row = mysqli_fetch_assoc($getResult)){
                                
                    ?>
                    <!-- class php for when select then it's work like a hover button 
                    if isset get value then check get value == category_id? if yes then 
                    class name set autoHover or not set then class name is blank. -->
                    
                    <li><a class="<?php if($cat_id == $row['category_id'] ){echo  "autoHover"; } else{echo "";}  ?>" href="../category.php?cid=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
                    <?php
                       }
                    }
                    ?>
                    <li><a href="logout.php" class="admin-logout" ><i class='fa fa-user'></i> Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
<!-- Menu Bar -->
<div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu admin-manus">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <!--For admin access  -->
                            <?php
                                
                                if($_SESSION['role'] == 1):               
                            ?>
                                <li>
                                    <a href="category.php">Category</a>
                                </li>
                                <li>
                                    <a href="users.php">Users</a>
                                </li>
                                <li>
                                    <a href="settings.php">Settings</a>
                                </li>
                            <?php endif; // endif condition ?>
                            <!-- Admin access -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- /Menu Bar -->