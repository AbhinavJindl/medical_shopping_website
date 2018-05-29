<!DOCTYPE html>
<html>
<head>
<!--php include-->
<?php include 'php/connect.php';?>
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
<!--shailendra-->
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
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
<!---//End-rate---->

</head>
<body onload="var p = '<?php session_start(); echo $_SESSION['mes']; $_SESSION['mes'] = ''; ?>'; if(p!=''){alert(p);}">
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.php"><b>T<br>H<br>E</b>EzDoc<span>The Best Online Medical Store</span></a></h1>
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
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" active"><a href="../main/index.php" class="hyper "><span>Home</span></a></li>
						</ul>
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
<div data-vide-bg="video/video">
    <div class="container">
		<div class="banner-info">
			<h3>Search for the medicines here....</h3>	
			<div class="search-form">
				<form action="search.php?page=1" method="post">
					<input type="text" placeholder="Search..." name="Search">
					<input type="submit" value=" " >
				</form>
			</div>		
		</div>	
    </div>
</div>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>
<br/>
<!--content-->
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


<!--content-->
<?php
$result=mysqli_query($conn,'SELECT * FROM category;');
$n=mysqli_num_rows($result);
for($a=0;$a<$n;$a=$a+3){ 
	echo "<div class='content-mid'>
			<div class='container'>";
			for($b=0;$b<3 && $a+$b<$n;$b++){
				$row = mysqli_fetch_assoc($result);
				$category=$row["category_name"];
				$categoryID=$row["category_id"];	
				echo "<div class='col-md-4 m-w3ls1'>
					<div class='col-md '>
						<a href='kitchen.php?categoryID=$categoryID&page=1'>
							<img src='images/co.jpg' class='img-responsive img' alt=''>
							<div class='big-sale'>
								<div class='big-sale1'>
									<h3><span>$category</span></h3>
									<p>$category</p>
								</div>
							</div>
						</a>
					</div>
				</div>";
			}
			echo"<div class='clearfix'></div>
		</div>
	</div>";
}
?>

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
<?php include("footer.php"); ?>
</body>
</html>

