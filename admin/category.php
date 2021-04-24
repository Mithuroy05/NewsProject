<?php include "news-header.php"; 
if($_SESSION['role'] == 0){
    header("Location:../admin/post.php");
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading"><i class='fa fa-sign-out'></i> All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
            <?php
                        $limit = 3;
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = 1;
                        }
                        //<?php echo $row['category'] 
                        //category.category_id, category.category_name, category.post, post.category 
                        //LEFT JOIN post ON category.category_id = post.category
                        $offset = ($page - 1) * $limit;
                        $sql = "SELECT *
                        FROM category 
                        
                        ORDER BY category_id DESC LIMIT {$offset}, {$limit}";
                        $result = mysqli_query($conn, $sql) or die("Query Failed");
                        if(mysqli_num_rows($result) > 0 ){

                    // start table
                    ?>

                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                      <?php while($row = mysqli_fetch_assoc($result) ){ ?>
                            
                        <tr>
                            <td class='id'><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_name']; ?> </td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'><a href='update-category.php?id=<?php echo $row['category_id'] ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id=<?php echo $row['category_id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php } ?>
                        
                        
                    </tbody>
                </table>
                <?php
                   } 
                  $queryForFage = "SELECT * FROM category";
                  $pageResult = mysqli_query($conn, $queryForFage) or die("Query Failed");
                  
                  if(mysqli_num_rows($pageResult) > 0){
                      $totalRecord = mysqli_num_rows($pageResult);
                      $totalPage = ceil($totalRecord/$limit);
                      echo '<ul class="pagination admin-pagination">';
                        if($page > 1){
                            echo '<li> <a href="category.php?page='.($page - 1).'"><</a></li>';
                        }
                      for($i=1; $i<=$totalPage; $i++){
                          if($i==$page){
                              $active = "active";
                          }
                          else{
                              $active ="";
                          }
                          echo '<li class="'.$active.'"><a href="category.php?page='. $i. ' "> '. $i. '</a></li>' ;

                      }
                      if($totalPage > $page){
                        echo '<li> <a href="category.php?page='.($page + 1).'">></a></li>';
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