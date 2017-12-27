<?php
include("includes/db.php");

?>
<div>
<form method="post" action="">
<table align="center" width="500" border="2">
	<tr align="center">
		<td colspan="8"><h2>Login or Sign up to Buy</h2></td>
	
	</tr>
	<tr>
		<td align="right"><b>Email:</b></td>
			<td><input type="text" name="email" placeholder="enter your email" required/></td>
			</tr>
		<tr>
		<td align="right"><b>Password:</b></td>
			<td><input type="password" name="pass" placeholder="enter your password"  required/></td>
			</tr>
			<tr align="center">
				<td colspan="8"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
			</tr>
			<tr align="center">
			<td colspan="8"><input type="submit" name="login" value="Login"/>

 
 </table>
 <h2 style="float:left; text-decoration:none;"><a href="customer_register.php" style="text-decoration:none;">New?Sign up here</a></h2>

</form>
<?php 
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customers = mysqli_num_rows($run_c);
		if($check_customers==0){
		
		echo "<script>alert('Password or email is incorrect')</script>";
		exit(0);
		}
		$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_address='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customers>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customers/my_account.php','_self')</script>";
		
		}
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}
	
	?>
</div>