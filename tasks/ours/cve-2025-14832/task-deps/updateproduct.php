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
$query = 'SELECT * FROM `tblproducts`
              WHERE `product_code` ='.$_GET['id'].' GROUP BY product_code';
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
               $zz = $row['product_id'];
               $i = $row['product_name'];
               $a = $row['quantity'];
               $b = $row['price'];
               $c = $row['profit'];
               $d = $row['selling_price'];
               $e = $row['product_code'];

              }
              
              $id = $_GET['id'];
         
?>

             <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Product</div>
        <div class="card-body">

                        <form role="form" method="post" action="updateproduct1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <a>Product Name:</a>
                              <input class="form-control" placeholder="Product Name" name="Productname" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="hidden" placeholder="Available Quantity" name="Quantity" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <a>Original Price:</a>
                              <input class="form-control" placeholder="Price" id="price" name="Price" value="<?php echo $b; ?>">
                            </div>
                            <div class="form-group">
                              <a>Markup:</a>
                              <input class="form-control" placeholder="Markup" id="price" name="Markup" value="<?php echo $c; ?>">
                            </div>  
                            <div class="form-group">
                              <a>Selling Price:</a>
                              <input class="form-control" placeholder="Selling Price" id="sale" name="Selling" value="<?php echo $d; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control"  type="hidden" name="code" value="<?php echo $e; ?>">
                            </div>
                           
                            <button type="submit" class="btn btn-default">Update</button>
                         


                      </form>  
                    </div>
                </div>
                </div>
<script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('input').change(function(){
      var toplam=0;
      $('input[id=price]').each(function(){
        toplam = toplam + parseInt($(this).val());
      })
      $('input[id=sale]').val(toplam);
    });

  });
</script>
           <!--footer area-->
<?php include 'includes/footer.php'; ?>