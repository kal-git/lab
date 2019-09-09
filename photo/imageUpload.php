<?php

require('db_config.php');
session_start();


if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])){


	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	$tmp = $_FILES['image']['tmp_name'];


	if(move_uploaded_file($tmp, 'uploads/'.$image_name)){


		$sql = "INSERT INTO image_gallery (title, image) VALUES ('".$_POST['title']."', '".$image_name."')";
		$mysqli->query($sql);


		$_SESSION['success'] = 'Image Uploaded successfully.';
		header("location: https://photoup.azurewebsites.net/");
		
	}else{
		$_SESSION['error'] = 'image uploading failed';
		header("location: https://photoup.azurewebsites.net/");
	}
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
	header("location: https://photoup.azurewebsites.net/");
}


?>