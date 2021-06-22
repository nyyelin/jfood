<?php
	require 'db_connect.php';
	$id = $_POST['id'];
	// echo $id;
	$name = $_POST['name'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$oldphoto = $_POST['oldphoto'];
	$newphoto = $_FILES['newphoto'];
	$des = $_POST['desc'];

	if($newphoto['name'])
	{
		$source_dir="image/item/";
		$file_path=$source_dir.$newphoto['name'];
		move_uploaded_file($newphoto['tmp_name'],$file_path);

	}
	else
	{
		$file_path = $oldphoto;
	}
	$sql = "UPDATE items SET  name=:name,price=:price,photo=:photo,category_id=:category,description=:des where id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':price',$price);
	$stmt->bindParam(':photo',$file_path);
	$stmt->bindParam(':category',$category);
	$stmt->bindParam(':des',$des);
	$stmt->execute();
	header("location:item_list.php");

?>