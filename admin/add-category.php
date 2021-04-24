<?php 
include "news-header.php"; 
if($_SESSION['role'] == 0){
    header("Location:../admin/post.php");
}

if(isset($_POST['save'])){
    
        $categoryName =mysqli_real_escape_string($conn, $_POST['category_name']);
    
    $sql = "SELECT category_name FROM category WHERE category_id = '{$categoryName}'";
    // echo $sql;

    $result = mysqli_query($conn, $sql) or die("Query Failed");
    if(mysqli_num_rows($result) > 0){
         echo "<p style='color:red; text-align:center; margin:10px 0' >Category already exist.</p>";
    }
    else{
        $insertSql = "INSERT INTO category (category_name) VALUES ('{$categoryName}') " ;
            // echo $insertSql;
        if(mysqli_query($conn, $insertSql)){
            echo '<script>location="category.php"</script>';
            //header("Location:category.php");
        }
        else{
            echo '<script>location="add-category.php"</script>';
            //header("Location:add-category.php");
    
        }
    }
    
    }
    
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
