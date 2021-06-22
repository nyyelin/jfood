<?php
	require "db_connect.php";
	// $months=array();
	$data=array();
	for ($i=1; $i <=12 ; $i++) { 
		$month = date('M',mktime(0,0,0,$i,1));
		$months= date('m',mktime(0,0,0,$i,1));
	
	$sql = "SELECT count(id) as month_id FROM orders WHERE MONTH(order_date)=:month";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':month',$months);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	// var_dump($row);
	
	
	
	foreach ($row as $month_num) {
		$data[]=array(
			'month_name' => $month,
			'month_num' => $month_num,
		);
		}
	}
		echo json_encode($data);



	
	// return response($data);




	
?>