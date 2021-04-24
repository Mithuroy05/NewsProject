<?php
include "config.php";

session_start();
if(isset($_SESSION['username'])){
    header("Location:../admin/post.php");
}
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}'  AND password = '{$password}'";
    // die();
    $result = mysqli_query($conn, $sql) or die("Query Failed");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            
            header("Location:../admin/post.php");
        }

    }
    else{
        echo '<div class="alert alert-danger">Your Username and Password is not correct.</div>';
    }
}


?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/navbar-style.css" />

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
            <div class="logo"><a href="../index.php"><img  src="images/<?php echo $row['web_logo']; ?>" height="150px"></a></div>
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
                </ul>
            </div>
        </nav>
    </header>
<!-- Menu Bar -->
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="../images/logo.svg">
                        <h3 class="heading"><i class='fa fa-user'></i> Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?Php $_SERVER['PHP_SELF'] ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" id="login-btn" class="btn btn-primary " value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>

<!-- /Footer -->
<script>
    const toggleBtn = document.getElementsByClassName('togglebtn')[0]
    const navbarLinks = document.getElementsByClassName('navbar-links')[0]

    toggleBtn.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
})
</script>
</body>
</html>
