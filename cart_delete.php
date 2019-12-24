<?php
session_start();
include "include/config.php";

if(!isset($_SESSION['email'])){
    header("Location: ligin.php");
}else{
    $user = $_SESSION['email'];	
    $bookid = $_POST["bookid"];

	$delete = "DELETE FROM  WHERE id = '$bookid'";
	if(mysqli_query($db_con,$delete)){
		 header("Location: show-cart.php");
	}else{
		echo "Error";
	}

}


?>