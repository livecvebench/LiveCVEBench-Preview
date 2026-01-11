<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
			$zz = $_POST['id'];
			$productname = $_POST['Productname'];
		    $quantity = $_POST['Quantity'];
			$price = $_POST['Price'];
			$prft = $_POST['Markup'];
			$sale = $_POST['Selling'];
			$code = $_POST['code'];
			
			
	   include('includes/connection.php');
		
	 			$query = 'UPDATE tblproducts set product_name ="'.$productname.'", price="'.$price.'",
					profit ="'.$prft.'",
					selling_price="'.$sale.'" WHERE
					product_code ="'.$code.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "product.php";
		</script>
</body>
</html>