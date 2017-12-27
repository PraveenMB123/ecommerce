<?php


session_start();

?>
<html>
<head>
<title></title>
</head>
<body>
<h1>WELCOME <?php echo $_SESSION['customer_email']; ?> </h1>

<h2>Payment successful</h2>
<h3><a href="http://localhost:81/ecommerce/customers/my_account.php">Go to your account</a></h3>


</body>