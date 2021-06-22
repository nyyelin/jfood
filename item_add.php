<?php
	require 'db_connect.php';
	$name = $_POST['name'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$desc = $_POST['desc'];
	$photo = $_FILES['photo'];

	$souce_dir = "image/item/";
	$file_part = $souce_dir.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $file_part);

	$sql = "INSERT INTO items (name,price,photo,category_id,description) VALUES (:name,:price,:photo,:category_id,:description)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':price',$price);
	$stmt->bindParam(':photo',$file_part);
	$stmt->bindParam(':category_id',$category);
	$stmt->bindParam(':description',$desc);

	$stmt->execute();

	if($stmt->rowCount())
	{
		header("Location:item_list.php");
	}
	else {
		echo "Errors!!";
	}

?>