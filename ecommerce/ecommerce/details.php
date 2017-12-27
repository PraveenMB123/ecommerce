<!DOCTYPE>
<?php
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
				<img id="logo" src="images/logo.gif"/>
				<img id="banner" src="images/ad_banner.gif"/>  
			
			
			
		</div>
		<!--Header Ends here-->
		<!--Navigation bar Starts here-->
			<div class="menubar">
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">All Products</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				
				
				
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
			<div id="shopping_cart">
				<span style="float:right; font-size:20px; padding:5px; line-height:40px;">
					Welcome Guest!<b style="color:yellow">Shopping Cart</b>Total Items:Total Price:<a href="shoppingcart.php">Go To Cart</a>
				</span>
			</div>
				<div id="products_box">
				<?php
				if(isset($_GET['product_id'])){
					$product_id =$_GET['product_id'];
				$get_products = "select * from products where product_id='$product_id'";
	$run_products = mysqli_query($con,$get_products);
	while($row_products=mysqli_fetch_array($run_products)){
		$product_id = $row_products['product_id'];
		$product_category = $row_products['product_category'];
		$product_brand = $row_products['product_brand'];
		$product_title = $row_products['product_title'];
		$product_price = $row_products['product_price'];
		$product_image = $row_products['product_image'];
		$product_description = $row_products['product_description'];
		
		echo"
			<div id='single_product'>
				<h3>$product_title</h3>
				<img src='admin_area/product_images/$product_image' width='500' height='500'/>
				<p><b>Price:$.$product_price/-</b></p>
				<p>$product_description</p>
				<a href='index.php?product_id=$product_id' style='float:left;'>Back</a>
				<a href='index.php?product_id=$product_id'><button style='float:right'>Add to your cart</button></a>
			
			
			</div>
		
		
		
		
		
		
		
		";
	}
				}
				
				
				
				?>
				</div>
			
			
			
			</div>
			</div>
			<!--Content Wrapper Starts here-->
			<div id="footer">This is footer</div>
		
		
		
		</div>
		<!--Main Container Ends here-->
	</body>
	<html> 