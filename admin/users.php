<?php include "news-header.php";
if($_SESSION['role'] == 0){
    header("Location:../admin/post.php");

}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading"><i class='fa fa-sign-out'></i> All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                    <?php
                        $limit = 3;
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = 1;
                        }

                        $offset = ($page - 1) * $limit;
                        $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset}, {$limit}";
                        $result = mysqli_query($conn, $sql) or die("Query Failed");
                        if(mysqli_num_rows($result) > 0 ){

                    // start table
                    ?>

                  <table class="content-table">
                      <thead>
                          <th>User ID</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($result) ){ ?>
                        
                          <tr>
                              <td class='id'><?php echo $row['user_id']; ?></td>
                              <td><?php echo $row['first_name']. " ". $row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php 
                                    if($row['role'] == 1){
                                        echo "Admin";
                                    }else{
                                        echo "User";
                                    } 
                                    ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row['user_id'] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row['user_id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>

                          <?php } ?>
        
                           
                      </tbody>
                  </table>

                  <?php
                   } 
                  $queryForFage = "SELECT * FROM user";
                  $pageResult = mysqli_query($conn, $queryForFage) or die("Query Failed");
                  
                  if(mysqli_num_rows($pageResult) > 0){
                      $totalRecord = mysqli_num_rows($pageResult);
                      $totalPage = ceil($totalRecord/$limit);
                      echo '<ul class="pagination admin-pagination">';
                        if($page > 1){
                            echo '<li> <a href="users.php?page='.($page - 1).'"><</a></li>';
                        }
                      for($i=1; $i<=$totalPage; $i++){
                          if($i==$page){
                              $active = "active";
                          }
                          else{
                              $active ="";
                          }
                          echo '<li class="'.$active.'"><a href="users.php?page='. $i. ' "> '. $i. '</a></li>' ;

                      }
                      if($totalPage > $page){
                        echo '<li> <a href="users.php?page='.($page + 1).'">></a></li>';
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

