<?php
       
       require('includes/connection.php');
       
       
        ?>  
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php
						$product = $_POST['product'];
						$qntty = $_POST['qntty'];
					    $quantity = $_POST['quantity'];
					    $available = $_POST['available'];
					    $price = $_POST['price'];
					    $profit = $_POST['profit'];
					    $sale = $_POST['sale'];
					    $date = $_POST['date'];
					    $cat = $_POST['cat'];
					    $user = $_POST['user'];
					    $nq = $_POST['nq'];
						$supplier = $_POST['supplier'];
						
				
					switch($_GET['action']){
						case 'add':
						
									$query = "INSERT INTO tblproducts
								(product_id,product_name,quantity,available,price,profit,selling_price,date_in,category_id,user_id,supplier_id,product_code,status)
								VALUES ('Null','".$product."','.$qntty.','.$qntty.','.$price.','.$profit.','.$sale.','$date','".$cat."','".$user."','".$supplier."','".$nq."','available')";
								mysqli_query($db,$query)or die ('Error in updating Database');
												
								
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "product.php";
		</script>
</body>
</html>