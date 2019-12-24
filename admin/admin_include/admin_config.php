<?php
$db_server_name = "localhost";
$db_user_name = "root";
$db_password = "";
$db_name = "thebookshop";
$db_con = mysqli_connect($db_server_name, $db_user_name, $db_password, $db_name);

if(!$db_con){
    die("Database Connection Error : " .mysqli_connect_error());
}
?>
