<?php
  include 'db_connect.php';
  session_start();
  $noti = $_POST['noti'];
  $mycartarr = $_POST['mycartarr'];
  // echo $noti;
  // var_dump($mycartarr);
  // die();
  $voucherno = date("his");
  $orderdate = date("Y-m-d");
  $status = 'order';
  $user_id = $_SESSION['login_user']['id'];

  foreach($mycartarr as $order)
  {
    $id = $order['id'];
    $price = $order['price'];
    $qty = $order['qty'];
    $photo = $order['photo'];

    $sql = "INSERT INTO order_details (voucherno,order_date,item_id,price,photo,qty,user_id)VALUES(:voucherno,:order_date,:id,:price,:photo,:qty,:user_id)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':voucherno',$voucherno);
    $stmt->bindParam(':order_date',$orderdate);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':photo',$photo);
    $stmt->bindParam(':price',$price);
    $stmt->bindParam(':qty',$qty);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->execute();

  }

  $order = "INSERT INTO orders (voucherno,order_date,noti,status)VALUES(:voucherno,:order_date,:noti,:status)";
  $order_stmt=$pdo->prepare($order);
  $order_stmt->bindParam(':voucherno',$voucherno);
  $order_stmt->bindParam(':order_date',$orderdate);
  $order_stmt->bindParam(':noti',$noti);
  $order_stmt->bindParam(':status',$status);
  $order_stmt->execute();

?>