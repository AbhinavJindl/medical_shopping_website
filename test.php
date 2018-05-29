<?php include 'php/connect.php';?>
<!DOCTYPE html>
<html>
<head>
<!--php include-->
<title>EzDoc</title>
</head>
<body>

<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>

</tr>	

		

<?php
	$personId=1;			
	$sql="INSERT INTO category (category_name) VALUES ('spray');";
	$buystatus=1;
	echo $_GET["a"];
	$result=mysqli_query($conn,$sql);
	$rowcount = mysqli_num_rows($result);
	$city=$_POST["city"];	
?>
</body>
