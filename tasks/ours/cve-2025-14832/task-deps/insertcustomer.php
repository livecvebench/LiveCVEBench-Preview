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
						$fname = $_POST['firstname'];
					    $lname = $_POST['lastname'];
					    $email = $_POST['Email'];
						$contct = $_POST['Contact'];
						$address = $_POST['Address'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO tblcustomer
								(customer_id,fname, lname, email,contact,address)
								VALUES ('Null','".$fname."','".$lname."','".$email."','$contct','".$address."')";
								mysqli_query($db,$query)or die ('Error in updating Database');
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "customer.php";
		</script>
</body>
</html>