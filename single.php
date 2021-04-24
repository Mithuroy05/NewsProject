<?php include 'news-header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php
                    // include "config.php";
                    $postDetails = $_GET['postId'];

                    $sql = "SELECT post.post_id, post.title, post.description, post.post_date,post.category,post.author,
                    post.post_img, category.category_name, user.username, user.first_name, user.last_name 
                    FROM post 
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.post_id = {$postDetails} ";
                                
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                    if(mysqli_num_rows($result) > 0 ){
                        while($row = mysqli_fetch_assoc($result)){

                        ?>                    
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row['category_name']; ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?auth=<?php echo $row['author']; ?>'><?php echo $row['first_name']. ' '; ?><?php echo $row['last_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description']; ?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                    <?php
                        }
                    }else{
                        echo "<h2>No Record Fund!</h>";
                    }
                    ?>
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
