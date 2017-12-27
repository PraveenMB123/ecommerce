<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");


?>
<html>
	<head>
			<title>my online shop</title>
			<link rel="stylesheet" href="styles/styles.css" media="all" />
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
					<li><a href="customers/my_account.php">My Account</a></li>
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
				<div id="sidebar_title">My Account:</div>
				<ul id="categories">
				<?php
				$user = $_SESSION['customer_email'];
				$get_image = "select * from customers where customer_email='$user'";
				
				$run_image = mysqli_query($con, $get_image); 
				
				$row_image = mysqli_fetch_array($run_image); 
				$c_name = $row_image['customer_name'];
				?>	
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				
				</ul>
				</div>
				
			<div id="content_area">
			<?php cart();?>
			
			<div id="shopping_cart">
				<span style="float:right; font-size:15px; padding:5px; line-height:40px;">
				<?php 
					
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>!" . $_SESSION['customer_email'] ."-";
					}
					
					?>		
				
					
					
					
					
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
					
				<h2>Welcome:<?php echo $c_name; ?></h2>
				<?php
					if(!isset($_GET['my_orders'])){
						
					if(!isset($_GET['edit_account'])){
						
						if(!isset($_GET['change_pass'])){
							
							if(!isset($_GET['delete_account'])){
								
								echo "<b>Check your orders here<a href='my_account.php?my_orders'>link</a></b>";
								
							}
							
						}
						
					}
					
					}
					
					
				?>
				<?php
				if(isset($_GET['edit_account'])){
					
					include("edit_account.php");
				
				}
				if(isset($_GET['change_pass'])){
					
					include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
					
					include("delete_account.php");
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