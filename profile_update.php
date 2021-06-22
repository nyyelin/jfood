<?php
	require 'db_connect.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$oldphoto = $_POST['oldphoto'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$newphoto = $_FILES['newphoto'];

	if($newphoto['name'])
	{
		$resource_dir = "image/user/";
		$file_part = $resource_dir.$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'],$file_part);
	}
	else
	{
		$file_part = $oldphoto;
	}
	$sql = "UPDATE users SET name=:name,email=:email,phone=:phone,address=:address,profile=:photo WHERE id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":id",$id);
	$stmt->bindParam(":name",$name);
	$stmt->bindParam(":email",$email);
	$stmt->bindParam(":phone",$phone);
	$stmt->bindParam(":address",$address);
	$stmt->bindParam(":photo",$file_part);
	$stmt->execute();
	// header('Location: ' . $_SERVER['HTTP_REFERER']);
	header("location:index.php");
?>