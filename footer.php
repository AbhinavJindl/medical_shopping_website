<!-- Footer -->

	<footer class="footer" id="footer">
		<div class="container">
			
			<!-- Newsletter -->

			
			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-5 footer_col">

						<div class="logo_container">
			              <div class="logo">
			                
			                <span>EzDoc</span>
			              </div>
			            </div>

			            <p>EzDoc is an open discussion portal where people with health issues can ask either personal queries to any doctor or can post their problems online so that others give suggestions regarding that problem. </p>

					</div>

					<div class="col-lg-2 footer_col"></div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-2 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="../main/index.php">Home</a></li>
								<li class="footer_list_item"><a href="../main/aboutus.php">About Us</a></li>
								<li class="footer_list_item"><a href="#">QnA Portal</a></li>
								<li class="footer_list_item"><a href="../main/contact.php">Contact</a></li>
								<?php 
									session_start();
									
									if($_SESSION['username'] != null){

										echo '<li class="footer_list_item"><form method="post" action="../main/logout.php">			
				      							<input type="submit" name="logout" value="'.$_SESSION['username'].' [LOG OUT]">
				      						</form></li>';
									}
									else{

										echo '<li class="footer_list_item"><a href="http://localhost/csp203_project/Login/index.php">Login/Sign Up</a></li>';
									}
								?>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									IIT Ropar
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									+91 172 2233564
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>helpservices@ezdoc.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

		</div>
	</footer> 
