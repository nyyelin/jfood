<?php
	require 'db_connect.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM order_details where id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	if($stmt->rowCount())
	{
		header("Location:order_list.php");
	}
	else {
		echo "Errors!!";
	}

?>