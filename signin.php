<?php
	require 'db_connect.php';
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	// echo $email;
	// echo $password;
	$sql = "SELECT * FROM users where email=:email and password=:password";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->execute();
	session_start();

	if($stmt->rowCount())
	{
		$rows=$stmt->fetchAll();

		$row = $rows[0];

		$_SESSION['login_user']=$row;
		if($row['role']=="admin")
		{
			header("location:dashboard.php");
		}
		else
		{
			header("location:index.php");
		}
	}

	else
	{
		$_SESSION['login_reject'] = "Email and Password invaild!!!!";
		header("location:login.php");
	}
?>