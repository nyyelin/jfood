<?php
$servername="localhost";
$dbname = "zayban";
$user = "root";
$password = "";

$dsn = "mysql:hsot=$servername;dbname=$dbname";
$pdo = new PDO($dsn,$user,$password);

try
{
	$conn = $pdo;
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// echo "ConnectSuccess";
}
catch(PDOException $e)
{
	echo "Connection Fail".$e->getmessage();
}

?>