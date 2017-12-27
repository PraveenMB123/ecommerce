<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

?>
<html>
	<head>
			<title>my online shop</title>
			<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
	<body>
		<!--Main Container Starts here-->
		<div class="main_wrapper">
			<!--Header Starts here-->
			<div class="header_wrapper">
				<img id="logo" src="images/mensneaker.jpg"/>
				<img id="banner" src="images/women.jpg"/>  
			
			
			
		</div>
		<!--Header Ends here-->
		<!--Navigation bar Starts here-->
			<div class="menubar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="allproducts.php">All Products</a></li>
					<li><a href="customers/my_account.php">My Account</a></li>
					<li><a href="customer_register.php">Sign Up</a></li>
					<li><a href="shoppingcart.php">Shopping Cart</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
				
				
				
				</ul>
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="search for a product" />
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
			</div>
			<!--Navigation Bar Ens here-->
			<!--Content Wrapper Starts here-->
			<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="categories">
					<?php getcategories(); ?>
				
				</ul>
				<div id="sidebar_title">Brands</div>
				<ul id="categories">
					<?php getbrands();?>
				
				
				</ul>
			</div>
			<div id="content_area">
			<?php cart();?>
			
			<div id="shopping_cart">
				<span style="float:left; font-size:15px; padding:5px; line-height:40px;">
				<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>!" . $_SESSION['customer_email'] ."-" . "<b style='color:yellow;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>		
				
					
					
					
					<b style="color:yellow">Shopping Cart-</b>Total Items:<?php total_items(); ?>Total Price:<?php total_price(); ?><a href="shoppingcart.php">Go To Cart</a>
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>	
				</span>
			</div>
			
				<div id="products_box">
				<?php getproducts(); ?>
				<?php getcategoriesproducts();?>
				<?php getbrandsproducts();?>
			
				
				</div>
			
			
			
			</div>
			</div>
			<!--Content Wrapper Starts here-->
			<div id="footer">&copy;SANA CHANDSHA</div>
		
		
		
		</div>
		<!--Main Container Ends here-->
	</body>
	<html> 