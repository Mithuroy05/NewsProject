
<?php
define("DB_HOST","localhost"); // localhost
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_NAME","news-site");

$conn= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_set_charset($conn, "utf8");

