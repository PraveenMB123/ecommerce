<?php
$con = mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
function getIp(){
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
  
function cart(){

if(isset($_GET['add_cart'])){

	global $con; 
	
	$ip = getIp();
	
	$product_id = $_GET['add_cart'];

	$check_product = "select * from cart where ip_address='$ip' AND pro_id='$product_id'";
	
	$run_check = mysqli_query($con, $check_product); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_product = "insert into cart (pro_id,ip_address) values('$product_id','$ip')";
	
	$run_product = mysqli_query($con, $insert_product); 
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	
}

}
function total_items(){
		if(isset($_GET['add_cart'])){
			global $con;
			$ip = getIp();
			$get_items = "select * from cart where ip_address='$ip'";
			$run_items = mysqli_query($con,$get_items);
			$count_items = mysqli_num_rows($run_items);
		}
			else{
				global $con;
				$ip = getIp();
			$get_items = "select * from cart where ip_address='$ip'";
			$run_items = mysqli_query($con,$get_items);
			$count_items = mysqli_num_rows($run_items);
			}
			echo $count_items;
}
function total_price(){
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
					$values = array_sum($product_price);
					$total +=$values;
					}
		}
		echo "Rs." . $total . "/-";
}
function getcategories(){
	global $con;
	$get_categories = "select * from categories";
	$run_categories = mysqli_query($con,$get_categories);
	while($row_categories=mysqli_fetch_array($run_categories)){
		$category_id = $row_categories['category_id'];
		$category_title = $row_categories['category_title'];
		
		echo"<li><a href='index.php?categories=$category_id'>$category_title</a></li>";
	}
	
}
function getbrands(){
	global $con;
	$get_brands = "select * from brands";
	$run_brands = mysqli_query($con,$get_brands);
	while($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];
		
		echo"<li><a href='index.php?brands=$brand_id'>$brand_title</a></li>";
	}
	
}
function getproducts(){
	if(!isset($_GET['categories'])){
		if(!isset($_GET['brands'])){
	global $con;
	$get_products = "select * from products order by RAND() LIMIT 0,6";
	$run_products = mysqli_query($con,$get_products);
	while($row_products=mysqli_fetch_array($run_products)){
		$product_id = $row_products['product_id'];
		$product_category = $row_products['product_category'];
		$product_brand = $row_products['product_brand'];
		$product_title = $row_products['product_title'];
		$product_price = $row_products['product_price'];
		$product_image = $row_products['product_image'];
		echo"
			<div id='single_product'>
				<h3>$product_title</h3>
				<img src='admin_area/product_images/$product_image' width='180' height='180'/>
				<p><b>Price:Rs.$product_price/-</b></p>
				<a href='details.php?product_id=$product_id' style='float:left;'>Details</a>
				<a href='index.php?add_cart=$product_id'><button style='float:right'>Add to your cart</button></a>
			
			
			</div>
		
		
		
		
		
		
		
		";
	}
		}

	
}
}
function getcategoriesproducts(){
	if(isset($_GET['categories'])){
		$category_id = $_GET['categories'];
	global $con;
	$get_categories_products = "select * from products where product_category='$category_id'";
	$run_categories_products = mysqli_query($con,$get_categories_products);
	$count_categories = mysqli_num_rows($run_categories_products);
	if($count_categories==0){
		echo"<h2>No Products in this category</h2>";
		exit(0);
	}
	
	else
	{
	while($row_categories_products=mysqli_fetch_array($run_categories_products)){
		$product_id = $row_categories_products['product_id'];
		$product_category = $row_categories_products['product_category'];
		$product_brand = $row_categories_products['product_brand'];
		$product_title = $row_categories_products['product_title'];
		$product_price = $row_categories_products['product_price'];
		$product_image = $row_categories_products['product_image'];
		
	
		echo"
			<div id='single_product'>
				<h3>$product_title</h3>
				<img src='admin_area/product_images/$product_image' width='180' height='180'/>
				<p><b>Rs.$product_price/-</b></p>
				<a href='details.php?product_id=$product_id' style='float:left;'>Details</a>
				<a href='index.php?product_id=$product_id'><button style='float:right'>Add to your cart</button></a>
			
			
			</div>
		
		
		
		
		
		
		
		";
	}
	}
	}	
}
function getbrandsproducts(){
	if(isset($_GET['brands'])){
		$brand_id = $_GET['brands'];
	global $con;
	$get_brands_products = "select * from products where product_brand='$brand_id'";
	$run_brands_products = mysqli_query($con,$get_brands_products);
	$count_brands = mysqli_num_rows($run_brands_products);
	if($count_brands==0){
		echo"<h2>No Products in this brand</h2>";
		exit(0);
	}
	
	else{
	while($row_brands_products=mysqli_fetch_array($run_brands_products)){
		$product_id = $row_brands_products['product_id'];
		$product_category = $row_brands_products['product_category'];
		$product_brand = $row_brands_products['product_brand'];
		$product_title = $row_brands_products['product_title'];
		$product_price = $row_brands_products['product_price'];
		$product_image = $row_brands_products['product_image'];
		
	
		echo"
			<div id='single_product'>
				<h3>$product_title</h3>
				<img src='admin_area/product_images/$product_image' width='180' height='180'/>
				<p><b>Rs.$product_price/-</b></p>
				<a href='details.php?product_id=$product_id' style='float:left;'>Details</a>
				<a href='index.php?product_id=$product_id'><button style='float:right'>Add to your cart</button></a>
			
			
			</div>
		
		
		
		
		
		
		
		";
	}
	}
	}
}
?>