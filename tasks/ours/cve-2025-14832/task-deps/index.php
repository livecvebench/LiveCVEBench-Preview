<?php include('includes/connection.php');?>  
<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>


          <!-- Breadcrumbs-->
<!--breadcrumbs area-->
<?php if (isset($_SESSION['userid'])) { 
	 if ($_SESSION['position']=='Admin') {

		include 'includes/breadcrumbs.php';
	}elseif ($_SESSION['position']=='Customer') {
		include 'includes/cakes.php';
	}

}else{
	include 'includes/cakes.php';
} 
?>

          <!-- Icon Cards-->       
          
         <!--Icon Card area-->
<?php /*include 'includes/iconcards.php'*/; ?>
          <!-- Area Chart Example-->

          <!-- DataTables Example -->

      <!--footer area-->
<?php include 'includes/footer.php'; ?>