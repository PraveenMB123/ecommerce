<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");

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
					<li><a href="allproducts.php">All Products</a></li>
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
			<?php cart();?>
			
			<div id="shopping_cart">
				<span style="float:right; font-size:20px; padding:5px; line-height:40px;">
					Welcome Guest!<b style="color:yellow">Shopping Cart</b>Total Items:<?php total_items(); ?>Total Price:<?php total_price(); ?><a href="shoppingcart.php">Go To Cart</a>
						
				</span>
			</div>
			
				<form action="customer_register.php" method="post" enctype="multipart/form-data">
					<table align="center" width="750" border="2">
					<tr align="center">
					<td colspan="8"><h2>Sign up</h2></td>
					</tr>
					<tr>
					<td align="right"><b>Customer name:</b></td>
						<td><input type="text" name="c_name" required/></td>
						</tr>
						<tr>
					<td align="right"><b>Customer E-mail:</b></td>
						<td><input type="text" name="c_email" required/></td>
						</tr>
						<tr>
					<td align="right"><b>Customer Password:</b></td>
						<td><input type="password" name="c_pass" required/></td>
						</tr>
						
						<tr>
					<td align="right"><b>Customer Country:</b></td>
						<td>
							<select name="c_country">
								<option>Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select>
							
						</td>
						</tr>
						<tr>
					<td align="right"><b>Customer City:</b></td>
						<td><input type="text" name="c_city" required/></td>
						</tr>
						<tr>
					<td align="right"><b>Customer Contact:</b></td>
					<td><input type="text" name="c_contact" required/>
						
						</td>
						</tr>
						<tr>
					<td align="right"><b>Customer Address:</b></td>
						<td><textarea cols="50" rows="10" name="c_address" required/></textarea></td>
						</tr>
						<tr align="center">
						<td colspan="8"><input type="submit" name="sign_up" value="Sign up"/>
						</tr>			
								
			
				</table>
				</form>
			</div>
			</div>
			<!--Content Wrapper Starts here-->
			<div id="footer">This is footer</div>
		
		
		
		</div>
		<!--Main Container Ends here-->
	</body>
	<html> 
	 <?php 
	if(isset($_POST['sign_up'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		
	
		
		
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_address='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customers/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}





?>



	