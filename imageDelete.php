<?php


session_start();
require('db_config.php');


if(isset($_POST) && !empty($_POST['id'])){


		$sql = "DELETE FROM image_gallery WHERE id = ".$_POST['id'];
		$mysqli->query($sql);


		$_SESSION['success'] = 'Image Deleted successfully.';
		header("location: http://localhost/index.php");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("location: http://localhost/index.php");
}


?>