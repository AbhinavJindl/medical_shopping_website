<?php include 'php/connect.php';?>
<!DOCTYPE html>
<html>
<head>
<!--php include-->
<title>EzDoc</title>
<!--for pagination-->
<style>
.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    font-size:150%;
    transition: background-color .3s;
}

.pagination a.active {
    background-color: dodgerblue;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!--shailendra-->
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
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

</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 >
					<a href="index.php"><b>T<br>H<br>E</b>EzDoc<span>The Best Online Medical Store</span></a>
				</h1>
			</div>
				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>					

					</div> 
					</nav>
					 <div class="cart" >
						<a href="cart.php"><img src="images/cart.png" width=30% height=30%></a>
						<!--span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span-->
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>



  <!---->
  <!--search form-->
  <div class="search-form">
		<form style="background-color:black" action="search.php?page=1" method="post">
			<input type="text" placeholder="Search..." name="Search">
			<input type="submit" value=" " >
		</form>
</div>	

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <center><img class="first-slide" src="images/co1.jpg" alt="First slide" height=400px></center>
        </div>
        <div class="item">
         <center> <img class="second-slide " src="images/co2.jpg" alt="Second slide" height=400px></center>         
        </div>
        <div class="item">
          <center><img class="third-slide " src="images/co3.jpg" alt="Third slide" height=400px></center>
        </div>
      </div>
    
    </div><!-- /.carousel -->


<?php
session_start();
if(isset($_POST['Search']) || isset($_SESSION['searchtext'])){
	if(isset($_POST['Search'])){
	$searchText=$_POST['Search'];
	session_start();
	$_SESSION['searchtext']=$searchText;
	$page=(int)$_GET['page'];
	}
	else if(isset($_SESSION['searchtext'])){
		$searchText=$_SESSION['searchtext'];
		$page=(int)$_GET['page'];
	}
	$result=mysqli_query($conn,"SELECT * FROM medicine where medicine_name LIKE '%$searchText%';");
	$_SESSION['searchtext']=$searchText;
	$n=mysqli_num_rows($result);
		echo"<div class='product'>
		<div class='container'>
			<div class='spec '>
				<h3>Products</h3>
				<div class='ser-t'>
					<b></b>
					<span><i></i></span>
					<b class='line'></b>
				</div>
			</div>
				<div class=' con-w3l agileinf'>";
							include("onsinglepage.php");
							
					echo"<div class='clearfix'></div>
						 </div>
		</div>
	</div>";

}

?>
<!--page-->
<center>
<div class='pagination'>
  <a href='search.php?<?php $page--; echo "page=$page";?>'>&laquo;</a>
  <a href='search.php?<?php $page=$page+2; echo "page=$page";?>'>&raquo;</a>
</div>
</center>
<!-- category names-->
<?php
$result=mysqli_query($conn,'SELECT * FROM category;');
echo "<div class='kic-top '>
			<div class='container '>
				<div class='kic '>
					<h3>All Categories</h3>
				</div>";
$n=mysqli_num_rows($result);
for($a=0;$a<$n;$a=$a+1){ 
	$row = mysqli_fetch_assoc($result);
	$category=$row["category_name"];
	$categoryID=$row["category_id"];
	echo"<div class='col-md-4 kic-top1'>
			<a href='kitchen.php?categoryID=$categoryID&page=1'>
				<!--img src='images/spray.jpg' class='img-responsive' alt=''-->
				<h6>$category</h6>
			</a>
		</div>";
		}
			echo"</div>
	</div>";
?>

<br/><br/><br/>


<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
<?php
if(isset($_POST['Search']) || isset($_SESSION['searchtext'])){
	if(isset($_POST['Search'])){
	$searchText=$_POST['Search'];
	}
	else if(isset($_SESSION['searchtext'])){
		$searchText=$_SESSION['searchtext'];
	}
	$result=mysqli_query($conn,"SELECT * FROM medicine where medicine_name LIKE '%$searchText%';");
	$_SESSION['searchtext']=$searchText;
	$n=mysqli_num_rows($result);
for($a=0;$a<$n;$a++){
	$row = mysqli_fetch_assoc($result);
	$medicineName=$row["medicine_name"];
	$medicineId=$row["medicine_id"];
	$price=$row["price"];
	$desc=$row["description"];
	$actualprice=1.1*$price;
	$model="myModal".$a;
			echo"<div class='modal fade' id='$model' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content modal-info'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>						
						</div>
						<div class='modal-body modal-spa'>
								<div class='col-md-5 span-2'>
											<div class='item'>
												<img src='images/tablets.jpg' class='img-responsive' alt=''>
											</div>
								</div>
								<div class='col-md-7 span-1 '>
									<h3>$medicineName</h3>
									<div class='price_single'>
									  <span class='reducedfrom '><del>$actualprice</del> $price</span>
									
									 <div class='clearfix'></div>
									</div>
									<h4 class='quick'>Quick Overview:</h4>
									<p class='quick_desc'>$desc</p>
									 <div class='add-to'>
										   <!--button class='btn btn-danger my-cart-btn my-cart-btn1 ' data-id='$medicineId' data-name='$medicineName' data-summary='summary 24' data-price='$price' data-quantity='1' data-image='images/tablets.jpg'>Add to Cart</button-->
										</div>
								</div>
								<div class='clearfix'> </div>
							</div>
						</div>
					</div>
				</div>";
}

}

?>

<?php include("footer.php"); ?>
				
</body>
</html>
