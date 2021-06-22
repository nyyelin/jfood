<?php
	require 'db_connect.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM categories where id=:id";
	$stmt = $pdo->prepare($sql);
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