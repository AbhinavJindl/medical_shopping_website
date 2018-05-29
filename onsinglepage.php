<?php
$onsinglepage=8;
if($page<1){
	$page=1;
}
else if($onsinglepage*$page>$n){
	$page=(int)ceil((float)$n/$onsinglepage);
}
for($a=0;$a<$n;$a++){
					$row = mysqli_fetch_assoc($result);
					$medicineName=$row["medicine_name"];
					$medicineId=$row["medicine_id"];
					$price=$row["price"];
					$actualprice=1.1*$price;
					$model="#myModal".$a;
					if($a<$onsinglepage*$page && $a>=$onsinglepage*($page-1)){
						echo"<form id='formoid".$a."' method='post' action='php/cartAction.php?categoryID=$categoryID&action=add&medicineId=$medicineId'>
							<div class='col-md-3 pro-1'>
								<div class='col-m'>
								<a href='#' data-toggle='modal' data-target='$model' class='offer-img'>
										<img src='images/tablets.jpg' class='img-responsive' alt=''>
									</a>
									<div class='mid-1'>
										<div class='women'>
											<h6>$medicineName</h6>							
										</div>
										<div class='mid-2'>
											<p ><label>$actualprice</label><em class='item_price'>$price</em></p>
											  <div class='block'>
												<!--div class='starbox small ghosting'> </div-->
											</div>
											<div class='clearfix'></div>
										</div>
											<div><input id='medicineId$a' type='text' name='quantity' value='1' size='2' /><input type='submit' value='Add to cart' class='btnAddAction'  /></div></form>
											<div class='add'>
										   <!--button class='btn btn-danger my-cart-btn my-cart-b' data-id='$medicineId' data-name=$medicineName data-summary='summary 24' data-price='$price' data-quantity='1' data-image='images/tablets.jpg'>Add to Cart</button-->
										</div>
									</div>
								</div>
							</div>";?>
							
							<script type='text/javascript'>
							$(<?php echo "'#formoid$a'"?>).submit(function(event) {
								console.log($(<?php echo "'#medicineId$a'"?>).val())
							  event.preventDefault();
							  var $form = $( this ),
								url = $form.attr( 'action' );
							  $.ajax({
							  	url: url,
							  	type: "POST",
							  	data: { "quantity" : $(<?php echo "'#medicineId$a'"?>).val()},
							  	success: function(data){
							  			alert('added to cart');
							  			console.log(data)
							  		},
							  	error: function(error){
							  		alert('failed');
							  		console.log(error)
							  	}
							  });

							  
							});
						</script>
							<?php }}

?>
