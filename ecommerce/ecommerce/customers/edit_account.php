				<?php
				include("includes/db.php");
				$user = $_SESSION['customer_email'];
				$get_customer = "select * from customers where customer_email='$user'";
				
				$run_customer = mysqli_query($con, $get_customer); 
				
				$row_customer = mysqli_fetch_array($run_customer);
				$c_id = $row_image['customer_id'];				
				$name = $row_image['customer_name'];
				$email = $row_image['customer_email'];
				$country = $row_image['customer_country'];
				$city = $row_image['customer_city'];
				$contact = $row_image['customer_contact'];
				$address = $row_image['customer_address'];
				
				
				?>
				<form action="" method="post" enctype="multipart/form-data">
					<table align="center" width="750" border="2">
					<tr align="center">
					<td colspan="8"><h2>Edit Your Account</h2></td>
					</tr>
					<tr>
					<td align="right"><b>Customer name:</b></td>
						<td><input type="text" name="c_name" value="<?php echo $name; ?>"required/></td>
						</tr>
						<tr>
					<td align="right"><b>Customer E-mail:</b></td>
						<td><input type="text" name="c_email" value="<?php echo $email; ?>"required/></td>
						</tr>					
						<tr>
					<td align="right"><b>Customer Country:</b></td>
						<td>
							<select name="c_country">
								<option><?php echo $country; ?></option>
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
						<td><input type="text" name="c_city" value="<?php echo $city; ?>" required/></td>
						</tr>
						<tr>
					<td align="right"><b>Customer Contact:</b></td>
					<td><input type="text" name="c_contact" value="<?php echo $contact; ?>" required/>
						
						</td>
						</tr>
						<tr>
					<td align="right"><b>Customer Address:</b></td>
						<td><textarea cols="50" rows="10" name="c_address" required/><?php echo $address; ?></textarea></td>
						</tr>
						<tr align="center">
						<td colspan="8"><input type="submit" name="update_account" value="Update"/>
						</tr>			
								
			
				</table>
				</form>
			
			
	 <?php 
	if(isset($_POST['update_account'])){
	
		
		$ip = getIp();
		$customer_id = $_GET['c_id'];
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		
	
		
		
		
		 $update_c = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$c_id'";
	
		$run_update = mysqli_query($con, $update_c); 
		
			if($run_update){
				
				echo"<script>alert('Accont updation is successful')</script>";
				echo"<script>window.open('my_account.php','_self')</script>";
			}
	}





?>



	