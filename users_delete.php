<?php
	require 'db_connect.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM users where id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	if($stmt->rowCount())
	{
		header("Location:customer.php");
	}
	else {
		echo "Errors!!";
	}

?>