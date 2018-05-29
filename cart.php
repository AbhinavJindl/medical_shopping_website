<!--php include-->
<html>
<title>EzDoc</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate-->
<style>
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px; 
    box-sizing: border-box;
}

input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
::placeholder{
	color: #d2d2d2;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body style="background-image:url('images/background.jpg');height: 100%; background-position: center;background-repeat: no-repeat; background-size: cover;">
<center>
<!--body main-->
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 >
					<a href="index.php"><b>T<br>H<br>E</b>EzDoc<span>The Best Online Medical Store</span></a>
				</h1>
			</div>
					
				</div>			
</div>
<br/><br/>
<?php include 'php/connect.php';?>
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
				<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" style="text-align:left;">Name</th>
									<th class="cell100 column2"style="text-align:left;">Quanitity</th>
									<th class="cell100 column3" style="text-align:left;">Price</th>
									<th class="cell100 column4" style="text-align:left;">Action</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
<?php
	include("loginid.php");				
	$sql="SELECT cart.medicine_id,medicine_name,quantity,price from cart INNER JOIN medicine ON cart.medicine_id=medicine.medicine_id where person_id=$personId order by time DESC";
	$result=mysqli_query($conn,$sql);
	$rowcount = mysqli_num_rows($result);
	$a=0;
	while($row=mysqli_fetch_assoc($result)) {
		$a++;
		echo"
				<tr class='row100 body'>
				<td class='cell100 column1' style='text-align:left;border-bottom:#F0F0F0 1px solid;'><strong>".$row['medicine_name']."</strong></td>
				<td class='cell100 column2' style='text-align:left;border-bottom:#F0F0F0 1px solid;'>".$row['quantity']."</td>
				<td class='cell100 column3' style='text-align:left;border-bottom:#F0F0F0 1px solid;'>".$row['price']."</td>
				<td class='cell100 column4' style='text-align:left;border-bottom:#F0F0F0 1px solid;'><a id='formoid$a' href='php/cartAction.php?action=remove&medicineId=".$row['medicine_id']."' class='btnRemoveAction'>Remove Item</a></td>
				</tr>";
        		$item_total += ($row["price"]*$row["quantity"]);?>
							
							<script type='text/javascript'>
							$(<?php echo "'#formoid$a'"?>).on('click', function(event) {
								console.log($(<?php echo "'#formoid$a'"?>).val())
							  event.preventDefault();
							  var $form = $( this ),
								url = $form.attr( 'href' );
							  $.ajax({
							  	url: url,
							  	type: "POST",
							  	data: { "quantity" : $(<?php echo "'#medicineId$a'"?>).val()},
							  	success: function(data){
							  			//alert('added to cart');
							  			location.reload();
							  			console.log(data)
							  		},
							  	error: function(error){
							  		alert('failed');
							  		console.log(error)
							  	}
							  });

							  
							});
						</script>
							<?php
	}
	
	
	
	
?>

<tr>
<td colspan="2" align=right><a id="empty" href='php/cartAction.php?action=empty' class='btnRemoveAction'>EMPTY CART</a></td>
<script type='text/javascript'>
							$('#empty').on('click', function(event) {
								console.log($('#empty').val())
							  event.preventDefault();
							  var $form = $( this ),
								url = $form.attr( 'href' );
							  $.ajax({
							  	url: url,
							  	type: "POST",
							  	data: { "quantity" : $(<?php echo "'#medicineId$a'"?>).val()},
							  	success: function(data){
							  			//alert('added to cart');
							  			location.reload();
							  			console.log(data)
							  		},
							  	error: function(error){
							  		alert('failed');
							  		console.log(error)
							  	}
							  });

							  
							});
						</script>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div style="border-radius: 5px; padding: 20px;">
<form action="buy.php" method="post">
	<input style="box-shadow: 10px 10px 5px black;" type="text" placeholder="Address" name="address" required>
	<input style="box-shadow: 10px 10px 5px black;" type="text" placeholder="City" name="city" required>
	<input type="submit" value="BUY" >
</form>
</div>
<!--a href='cart.php?action=buy' class='btnRemoveAction'>BUY</a-->
</center>
</body>
</html>
