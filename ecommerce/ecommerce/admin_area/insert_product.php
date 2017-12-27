<!DOCTYPE>
<?php
include("includes/db.php");

	?>

<html>
<head>
	<title>Insert Products</title>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
<body>
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="750" border="2">
		<tr align="center">
			<td colspan="8"><h2>Insert Produts</h2></td>
		
		
		
		</tr>
		<tr>
		<td align="right"><b>Product title:</b></td>
			<td><input type="text" name="product_title" required/></td>
			</tr>
			<tr>
		<td align="right"><b>Product Category:</b></td>
			<td>
			<select name="product_category" >
					<option>Select a Category</option>
					<?php 
		$get_categories = "select * from categories";
	
		$run_categories = mysqli_query($con, $get_categories);
	
		while ($row_categories=mysqli_fetch_array($run_categories)){
	
		$category_id = $row_categories['category_id']; 
		$category_title = $row_categories['category_title'];
	
		echo "<option value='$category_id'>$category_title</option>";
	
	
	}
					
					?>
				</select>
			</td>
			</tr>
			<tr>
		<td align="right"><b>Product Brand:</b></td>
			<td>
			<select name="product_brand" >
					<option>Select a Brand</option>
					<?php 
		$get_brands = "select * from brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands=mysqli_fetch_array($run_brands)){
	
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	
	echo "<option value='$brand_id'>$brand_title</option>";
	
	
	}
					
					?>
				</select>
			
			
			
			</td>
			</tr>
			<tr>
		<td align="right"><b>Product image:</b></td>
			<td><input type="file" name="product_image" required/></td>
			</tr>
			<tr>
		<td align="right"><b>Product Price:</b></td>
			<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
		<td align="right"><b>Product description</b></td>
			<td><textarea name="product_description" cols="50" rows="10">
			</textarea>
			</td>
			</tr>
			<tr>
		<td align="right"><b>Product Keyword:</b></td>
			<td><input type="text" name="product_keywords" size="60" required/></td>
			</tr>
			<tr align="center">
			<td colspan="8"><input type="submit" name="insert_post" value="Insert"/>
			</tr>			
		</table>
		</form>


</body>
</html>
<?php 

	if(isset($_POST['insert_post'])){
	
		//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_category= $_POST['product_category'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_description = $_POST['product_description'];
		$product_keywords = $_POST['product_keywords'];
	
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
		 $insert_product = "insert into products (product_category,product_brand,product_title,product_price,product_description,product_image,product_keywords) values ('$product_category','$product_brand','$product_title','$product_price','$product_description','$product_image','$product_keywords')";
		 
		 $insert_product = mysqli_query($con, $insert_product);
		 
		 if($insert_product){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('insert_product.php','_self')</script>";
		 
		 }
	}








?>























