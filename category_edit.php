<?php
	require 'db_connect.php';
	$name = $_POST['name'];
	$id = $_POST['id'];

	$sql = "UPDATE categories SET name=:name WHERE id=:id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);

	$stmt->execute();

	if($stmt->rowCount())
	{
		header("Location:categories_list.php");
	}
	else {
		echo "Errors!!";
	}
?>