<?php include 'news-header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                        if(isset($_GET['cid'])){
                            $cat_id = $_GET['cid'];
                        }
                        $headingSql = "SELECT category_name FROM category WHERE category_id = {$cat_id};";
                        $headingResult = mysqli_query($conn, $headingSql) or die("Query Failed");
                        $headingRow = mysqli_fetch_assoc($headingResult);


                    ?>
                  <h2 class="page-heading"><?php echo $headingRow['category_name']; ?></h2>

                  <?php
                            // if(isset($_GET['cid'])){
                            //     $cat_id = $_GET['cid'];
                            // }
                            $limit = 3;
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page = 1;
                            }
                            $offset = ($page - 1) * $limit;

                            $sql = "SELECT post.post_id, post.title, post.description, post.post_date,post.category,post.author,
                            post.post_img, category.category_name, user.username, user.first_name, user.last_name 
                            FROM post 
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            WHERE category = {$cat_id}
                            ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                                // echo $sql;
                                // die();
                            $result = mysqli_query($conn, $sql) or die("Query Failed News Report");
                            
                            if(mysqli_num_rows($result) > 0 ){
                                while($row = mysqli_fetch_assoc($result)){

                        ?>

                    <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?postId=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?postId=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>

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
                                        <p class="description">
                                        <?php echo substr($row['description'],0,140)."..."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?postId=<?php echo $row['post_id']; ?>'><img src="images/readmore.webp" alt="" id="fullcoverage"> View Full Coverage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php   
                                }
                            }else{
                                echo "<h2>No Record Fund!</h>";
                            }
                        ?>
                        <!-- End of new report -->

                            <!-- Start pagination -->
                        <?php
                            $queryForPage = "SELECT * FROM post WHERE category = {$cat_id};";
                            $pageResult = mysqli_query($conn, $queryForPage) or die("Query Failed");
                            
                            if(mysqli_num_rows($pageResult) > 0){
                                $totalRecord = mysqli_num_rows($pageResult);
                                $totalPage = ceil($totalRecord/$limit);
                                echo '<ul class="pagination admin-pagination">';
                                    if($page > 1){
                                        echo '<li> <a href="category.php?cid='.$cat_id.'&page='.($page - 1).'"><</a></li>';
                                    }
                                for($i=1; $i<=$totalPage; $i++){
                                    if($i==$page){
                                        $active = "active";
                                    }
                                    else{
                                        $active ="";
                                    }
                                    echo '<li class="'.$active.'"><a href="category.php?cid='.$cat_id.'&page='. $i. ' "> '. $i. '</a></li>' ;

                                }
                                if($totalPage > $page){
                                    echo '<li> <a href="category.php?cid='.$cat_id.'&page='.($page + 1).'">></a></li>';
                                }
                                echo '</ul>';
                            }                      
                            ?>
                            <!-- end pagination -->
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
