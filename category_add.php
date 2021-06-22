<?php
	require 'db_connect.php';
	$name = $_POST['name'];
	$sql = "INSERT INTO categories(name) VALUES (:name)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->execute();

	if($stmt->rowCount())
	{
		header("Location:categories_list.php");
	}
	else {
		echo "Errors!!";
	}
?>