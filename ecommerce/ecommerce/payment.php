<?php
include("includes/db.php");
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
					$values = array_sum($product_price);
					$total +=$values;
					}
		}




?>
<div>
<h2>Pay now with paypal</h2>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="sanabusiness@shop.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $product_title; ?>">
  <input type="hidden" name="amount" value="<?php echo $total; ?>">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="return" value="http://localhost:81/ecommerce/paypal_success.php" />
  <input type="hidden" name="cancel_return" value="http://localhost:81/ecommerce/paypal_cancel.php" />
	

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>

</div>
</div>