<?php 
session_start();

?>
<!DOCTYPE>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>
<h2 style="color:black; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

<h2 style="color:black; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
<div>
<form method="post" action="">
<table align="center" width="500" border="2">
	<tr align="center">
		<td colspan="8"><h2>Admin Login</h2></td>
	
	</tr>
	<tr>
		<td align="right"><b>Email:</b></td>
			<td><input type="text" name="email" placeholder="enter your email" required/></td>
			</tr>
		<tr>
		<td align="right"><b>Password:</b></td>
			<td><input type="password" name="password" placeholder="enter your password"  required/></td>
			</tr>
			
			<tr align="center">
			<td colspan="8"><input type="submit" name="login" value="Login"/>

 
 </table>
  

</form>
</body>
</html>
<?php 

include("includes/db.php"); 
	
	if(isset($_POST['login'])){
	
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['password']);
	
	$sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";
	
	$run_user = mysqli_query($con, $sel_user); 
	
	 $check_user = mysqli_num_rows($run_user); 
	
	if($check_user==1){
	
	$_SESSION['user_email']=$email; 
	
	echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	
	}
	else {
	
	echo "<script>alert('Password or Email is wrong, try again!')</script>";
	
	}
	
	
	}
	
	
	
	
	








?>