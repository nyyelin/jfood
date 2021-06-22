<?php
	require 'db_connect.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$profile = $_FILES['profile'];
	$role = "customer";


	$user = "SELECT * FROM users";
	$emails = $pdo->prepare($user);
	$emails->execute();
	$e = $emails->fetchALL();
	foreach ($e as $value) {
		$v= $value['email'];
		
	}
	if($v==$email)
	{
		header('location:register.php?status=0');
	}
	else
	{

		if($profile[size]>0)
		{
			$resource_dir = "image/user/";
			$file_part = $resource_dir.$profile['name'];
			move_uploaded_file($profile['tmp_name'], $file_part);
		}
		else
		{
			$file_part = 'image/user/avatar.jpg';
		}
		$sql = "INSERT INTO users (name,email,password,phone,address,profile,role)VALUES(:name,:email,:password,:phone,:address,:photo,:role)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':name',$name);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->bindParam(':phone',$phone);
		$stmt->bindParam(':address',$address);
		$stmt->bindParam(':photo',$file_part);
		$stmt->bindParam(':role',$role);

		$stmt->execute();
		session_start();
		$_SESSION['reg_success']="Successfully created your acoount!!!";
		header("location:login.php");




	}

	
	


?>