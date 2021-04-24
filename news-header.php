<?php
 require("database.php");
 $page = basename($_SERVER['PHP_SELF']);
 switch($page){
     case "single.page":
        if(isset($_GET['postId'])){
            $sqlTitle = "SELECT * FROM post WHERE post_id = {$_GET['postId']}";
            $titleResult = mysqli_query($conn, $sqlTitle) or die("Title query is error");
            $rowTitle = mysqli_fetch_assoc($titleResult);
            $pageTitle = $rowTitle['title']. " News";
        }else{
            $pageTitle = "No Result Found";
        }
        break;
     case "category.php":
        if(isset($_GET['cid'])){
            $sqlTitle = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
            $titleResult = mysqli_query($conn, $sqlTitle) or die("Title query is error");
            $rowTitle = mysqli_fetch_assoc($titleResult);
            $pageTitle = $rowTitle['category_name']. " NEWS";
        }else{
            $pageTitle = "No Result Found";
        }
        break;
     case "author.php":
        if(isset($_GET['auth'])){
            $sqlTitle = "SELECT first_name, last_name FROM user WHERE user_id = {$_GET['auth']}";
            $titleResult = mysqli_query($conn, $sqlTitle) or die("Title query is error");
            $rowTitle = mysqli_fetch_assoc($titleResult);
            $pageTitle = "News By ". $rowTitle['first_name'].' '. $rowTitle['last_name'];
        }else{
            $pageTitle = "No Result Found";
        }
        break;
     case "search.php":
        if(isset($_GET['search'])){
            $pageTitle = $_GET['search'];
        }else{
            $pageTitle = "No Result Found";
        }
        break;
    
    default:
    $pageTitle =  "News site";
    break;


 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $pageTitle ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar-style.css" />

</head>
<body>
<!-- Menu Bar -->
<header>
        <nav class="navbar">
            <!-- for logo -->
        <?php
                $sql = "SELECT * FROM settings" ;
                $result = mysqli_query($conn, $sql) or die("Query Failed Settings");
                if(mysqli_num_rows($result) > 0 ){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="logo"><a href="index.php"><img  src="admin/images/<?php echo $row['web_logo']; ?>" height="150px"></a></div>
            <?php
            }
                }
            ?>
            <!-- for logo -->

            <a class="togglebtn" href="#"><span class="line"></span>
                <span class="line"></span>
                <span class="line"></span></a>
            <div class="navbar-links">
                <ul>
                <li><a href="index.php" class="" >HOME</a></li>

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
                    
                    <li><a class="<?php if($cat_id == $row['category_id'] ){echo  "autoHover"; } else{echo "";}  ?>" href="category.php?cid=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
                    <?php
                       }
                    }
                    ?>
                    <li><a href="admin/index.php" class="admin-logout" ><i class='fa fa-user'></i> Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
<!-- /Menu Bar -->
