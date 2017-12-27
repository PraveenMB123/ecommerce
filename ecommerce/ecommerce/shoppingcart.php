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
				<span style="float:right; font-size:16px; padding:5px; line-height:40px;">
				<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>!" . $_SESSION['customer_email'] ."-" . "<b style='color:yellow;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>	
				
				
				
					<b style="color:yellow">Shopping Cart</b>Total Items:<?php total_items(); ?>Total Price:<?php total_price(); ?><a href="index.php">Back </a>
				
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
				
					<form action="" method="post" enctype="multipart/form-data">
						<table align="center" width="700" bgcolor="skyblue">
							
							<tr align="center">
								<th>Remove</th>
								<th>Products</th>
								<th>Quantity</th>
								<th>Price:</th>
							</tr>
							<?php
							$total = 0;
		global $con;
		$ip = getIp();
		$sel_price = "select * from cart where ip_address='$ip'";
		$run_price = mysqli_query($con,$sel_price);
		while($p_price=mysqli_fetch_array($run_price)){
			$product_id = $p_price['pro_id'];
			$product_price ="select * from products where product_id='$product_id'";
			$run_pro_price = mysqli_query($con,$product_price);
			while($pp_price=mysqli_fetch_array($run_pro_price)){
					$product_price = array($pp_price['product_price']);
					$product_title = $pp_price['product_title'];
					$product_image = $pp_price['product_image'];
					$single_price = $pp_price['product_price'];
					$values = array_sum($product_price);
					$total +=$values;
					
		
		
		?>
		<tr align="center">
			<td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"/></td>
			<td><?php echo $product_title;?><br>
			<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
			</td>
			<td><input type="text" size="10" name="quantity"/></td>
			<?php
			global $con;
				if(isset($_POST['update_cart'])){
					$quantity = $_POST['quantity'];
					$update_cart = "update cart set quantity = '$quantity'";
					$run_quantity = mysqli_query($con,$update_cart);
					$total = $total*$quantity;
			
			
			
			
				}
			?>
			<td><?php echo "Rs." . $single_price . "/-";?></td>
		</tr>
		
		<?php }} ?>
		<tr align="right">
			<td colspan="4"><b>Total:<b></td>
			<td><?php echo "Rs." . $total . "/-";?></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
			<td><input type="submit" name="continue" value="Continue Shopping"/></td>
			<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
		
		
		
		</tr>
						</table>
					</form>
					<?php
						function update_cart(){
							global $con;
						$ip = getIp();
						if(isset($_POST['update_cart'])){
							foreach($_POST['remove[]'] as $remove_id){
								$delete_product = "delete from cart where pro_id = '$remove_id' AND ip_address='$ip'";
								$run_delete = mysqli_query($con,$delete_product);
								if($run_delete){
										echo"<script>window.open('shoppingcart.php','_self')</script>";
								}
								}
								}
								
								echo @$up_cart = update_cart();
						}
					?>		
							<?php
								if(isset($_POST['continue'])){
									echo"<script>window.open('index.php','_self')</script>";
									
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