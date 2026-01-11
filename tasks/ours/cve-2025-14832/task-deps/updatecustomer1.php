
<?php
			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
		    $lname = $_POST['lastname'];
			$email = $_POST['Email'];
			$contct = $_POST['Contact'];
			$address = $_POST['Address'];
			
	   include('includes/connection.php');
		
	 			$query = 'UPDATE tblusers set fname ="'.$fname.'",
					lname ="'.$lname.'", email="'.$email.'",
					contact='.$contct.',address="'.$address.'" WHERE
					user_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "customer.php";
		</script>
