<?php include('includes/connection.php');?>  
<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>
<?php
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}
else{
?>

<?php
}
?>

                <!-- Page Heading -->
                
                <!-- /.row -->
<?php 
$query = 'SELECT * FROM tblsupplier
              WHERE
              supplier_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
               $zz = $row['supplier_id'];
               $i = $row['supplier_name'];
               $a = $row['contact'];
               $b = $row['email'];
               $d = $row['address'];
               
      
             
              }
              
              $id = $_GET['id'];
         
?>

         <div class="container">
          <div class="card card-register mx-auto mt-5">
           <div class="card-header">Update Supplier</div>
             <div class="card-body">

                        <form role="form" method="post" action="updatesupplier1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Supplier Name" name="suppliername" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Contact" name="contact" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Email" name="Email" value="<?php echo $b; ?>">
                            </div>  
                            <div class="form-group">
                              <input class="form-control" placeholder="Address" name="address" value="<?php echo $d; ?>">
                            </div> 
                           
                            <button type="submit" class="btn btn-default">Update</button>
                         


                      </form>  
                    </div>
                </div>
                
<!--footer area-->
<?php include 'includes/footer.php'; ?>