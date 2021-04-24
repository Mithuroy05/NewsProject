<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <?php
                        $sql = "SELECT * FROM settings" ;
                        $result = mysqli_query($conn, $sql) or die("Query Failed Settings");
                        if(mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <span> <?php echo $row['footer_description']; ?></span>
                    <?php
                    }
                        }
                    ?>
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