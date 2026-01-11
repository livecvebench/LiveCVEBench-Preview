<?php
       
       include('includes/connection.php');
       
       
        ?>  
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php
						$sm = $_POST['supplier'];
					    $contacts = $_POST['contact'];
					    $emails = $_POST['email'];
						$address = $_POST['address'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO tblsupplier(supplier_id,supplier_name,contact,email,address)
								VALUES ('Null','".$sm."','.$contacts.','".$emails."','".$address."')";
								mysqli_query($db,$query)or die ('Error in updating Database');
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "supplier.php";
		</script>
</body>
</html>