<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
			$zz = $_POST['id'];
			$supplier = $_POST['suppliername'];
		    $contact = $_POST['contact'];
			$email = $_POST['Email'];
			$address = $_POST['address'];
			
			
	   include('includes/connection.php');
		
	 			$query = 'UPDATE tblsupplier set supplier_name ="'.$supplier.'",
					contact ='.$contact.', email="'.$email.'",
					address ="'.$address.'" WHERE
					supplier_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "supplier.php";
		</script>
</body>
</html>