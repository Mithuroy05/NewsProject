<?php include "news-header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading"><i class='fa fa-sign-out'></i> All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
              <?php
                       
                        $limit = 8;
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = 1;
                        }
                        $offset = ($page - 1) * $limit;

                        if($_SESSION['role'] == '1'){ // For admin only and access all option
                            $sql = "SELECT post.post_id, post.title, post.description, post.post_date,post.category, category.category_name, user.username FROM post 
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                        
                        }
                        elseif($_SESSION['role'] == '0'){ // user can see only her/him post
                            $sql = "SELECT post.post_id, post.title, post.description, post.post_date,post.category, category.category_name, user.username FROM post 
                            LEFT JOIN category ON post.category = category.category_id
                            LEFT JOIN user ON post.author = user.user_id
                            WHERE post.author = {$_SESSION['user_id']}
                            ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                            //only won user_id post create delete and update
                        }
                        
                        $result = mysqli_query($conn, $sql) or die("Query Failed");
                        if(mysqli_num_rows($result) > 0 ){

                    // start table
                    ?>
                  <table class="content-table">
                      <thead>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result) ){ ?>
                        
                          <tr>
                              <td class='id'><?php echo $row['post_id']; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>&cate=<?php echo $row['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                          <!-- end while loop -->
                         
                      </tbody>
                  </table>
                  <?php
                   } 
                  $queryForPage = "SELECT * FROM post";
                  $pageResult = mysqli_query($conn, $queryForPage) or die("Query Failed");
                  
                  if(mysqli_num_rows($pageResult) > 0){
                      $totalRecord = mysqli_num_rows($pageResult);
                      $totalPage = ceil($totalRecord/$limit);
                      echo '<ul class="pagination admin-pagination">';
                        if($page > 1){
                            echo '<li> <a href="post.php?page='.($page - 1).'"><</a></li>';
                        }
                      for($i=1; $i<=$totalPage; $i++){
                          if($i==$page){
                              $active = "active";
                          }
                          else{
                              $active ="";
                          }
                          echo '<li class="'.$active.'"><a href="post.php?page='. $i. ' "> '. $i. '</a></li>' ;

                      }
                      if($totalPage > $page){
                        echo '<li> <a href="post.php?page='.($page + 1).'">></a></li>';
                    }
                      echo '</ul>';
                  }
                                 
                  ?>
                         <!-- end pagination -->
                     
                  
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
