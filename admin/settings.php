<?php include "news-header.php";
if($_SESSION['role'] == 0){
    header("Location:../admin/post.php");
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Website Settings</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                    <?php
                        $sql = "SELECT * FROM settings" ;
                        $result = mysqli_query($conn, $sql) or die("Query Failed Settings");
                        if(mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_assoc($result)){

                    ?>
                  <!-- Form Start -->
                  <form  action="../admin/save-settings.php" method ="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-logo">
                        <img  src="images/<?php echo $row['web_logo']; ?>" height="150px">
                        <input type="hidden" name="old-logo" value="<?php echo $row['web_logo']; ?>">
                    </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Footer Description</label>
                          <textarea name="footerdisc" class="form-control" rows="5"  required><?php echo $row['footer_description']; ?></textarea>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form> 
                   <!-- Form End-->
                   <?php
                    }
                } // end while loop
                ?>
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
