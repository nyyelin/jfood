<?php
	require 'db_connect.php';
	$id = $_POST['id'];
	// echo $id;
	$password=sha1($_POST['pass']);
	$sql = "UPDATE users SET password=:pass where id=:id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':pass',$password);
	$stmt->execute();
	header("location:profile.php");

?>