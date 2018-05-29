<?php
	include 'php/connect.php';
	include("loginid.php");				
	$sql="SELECT cart.medicine_id,medicine_name,quantity,price from cart INNER JOIN medicine ON cart.medicine_id=medicine.medicine_id where person_id=$personId order by time DESC";
	$buystatus=1;
	$result=mysqli_query($conn,$sql);
	$rowcount = mysqli_num_rows($result);
	$city=$_GET["city"];
	while($row=mysqli_fetch_assoc($result)) {
				$sql="SELECT * from shop INNER JOIN shop_medicine ON shop.shop_id=shop_medicine.shop_id INNER JOIN city ON shop.city_id=city.city_id WHERE city_name='".$city."' and quantity>0 and shop_medicine.medicine_id=".$row['medicine_id'];
				$result1=mysqli_query($conn,$sql);
				$rowcount = mysqli_num_rows($result1);
				$row1=mysqli_fetch_assoc($result1);
				$sql="update shop_medicine set quantity=quantity-".$row["quantity"]." where shop_id=".$row1["shop_id"]." and medicine_id=".$row['medicine_id'];
				$result1=mysqli_query($conn,$sql);
				$shop=$row1["shop_id"];
				$sql="INSERT INTO buy (person_id,medicine_id,quantity,prescription,shop_id) VALUES ($personId,".$row['medicine_id'].",".$row["quantity"].",' ".$_POST["prescription"]." ',$shop)";
				$result1=mysqli_query($conn,$sql);
				$sql="delete from cart where person_id=$personId";
				$result1=mysqli_query($conn,$sql);
	}
	session_start();
    $_SESSION['mes'] = "Order placed";
    header('location:index.php');
?>	
