 <?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

 <?php 
 if (isset($_GET["action"])) {
  if ($_GET["action"]=='delete') {
    foreach ($_SESSION["cart"] as $keys => $values) {
      if ($values['ids']==$_GET["id"]) {
        unset($_SESSION["cart"][$keys]);
        echo '<script>alert("Product is Remove")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
} 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["cart"] as &$value){
    if($value['ids'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after found the product
    }
}

    
}
?>

 <div class="card mb-3">
            <div class="card-header">
              <center><h2 class="fas fa-shopping-cart">Cart(s)</h2></center>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table " width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                      <th>Image</th>
                                        <th>Product</th>
                                        <th width="300">Quantity</th>
                                        <th width="300">Price</th>
                                        <th>Total</th> 
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if (!empty($_SESSION["cart"])) {
                                  $_SESSION['mm']=0;
                                  foreach($_SESSION["cart"] as $keys => $values){
                                    ?>
                                    <tr>
                                      <td><img src="img/cakes.jpg" style="width: 100px"></td>
                                      <td><?php echo $values["name"]; ?></td>
                                      <td>

<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $values["ids"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($values["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($values["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($values["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($values["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($values["quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($values["quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($values["quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($values["quantity"]==8) echo "selected";?> value="8">8</option>
<option <?php if($values["quantity"]==9) echo "selected";?> value="9">9</option>
<option <?php if($values["quantity"]==10) echo "selected";?> value="10">10</option>
<option <?php if($values["quantity"]==11) echo "selected";?> value="11">11</option>
<option <?php if($values["quantity"]==12) echo "selected";?> value="12">12</option>
<option <?php if($values["quantity"]==13) echo "selected";?> value="13">13</option>
<option <?php if($values["quantity"]==14) echo "selected";?> value="14">14</option>
<option <?php if($values["quantity"]==15) echo "selected";?> value="15">15</option>
<option <?php if($values["quantity"]==16) echo "selected";?> value="16">16</option>
<option <?php if($values["quantity"]==17) echo "selected";?> value="17">17</option>
<option <?php if($values["quantity"]==18) echo "selected";?> value="18">18</option>
<option <?php if($values["quantity"]==19) echo "selected";?> value="19">19</option>
<option <?php if($values["quantity"]==20) echo "selected";?> value="20">20</option>
</select>
</form>
</td>
                                      <td>&#8369 <?php echo $values["price"]; ?></td>
                                      <td>&#8369 <?php echo $values["quantity"] * $values["price"]; ?></td>
                                      <td><a class="btn btn-danger" type="button" onclick="return confirm('Are you sure?')" href="cart.php?action=delete&id=<?php echo $values["ids"]; ?>">Remove</a></td>
                                    </tr>
                                    <?php 
                                    $name= $values["name"];
                                    

                                    $_SESSION['mm'] = $_SESSION['mm'] + ($values["quantity"] * $values["price"]);

                                  }
                                  ?>
                                
                             </tbody>
                             <tr>
                               <td colspan="4" align="right">Total Price</td>
                                  <td align="left">&#8369 <?php echo $_SESSION['mm']; ?></td>
                                  <td><a type="button" class="btn btn-success" href="addprod.php" >Proceed and Checkout</a></td>
                             </tr>
                               <?php
                                }
                                 ?>
                              </table>
                        </div>
                    
            </div>
           
          </div>

          
        </div>
        <?php include 'includes/footer.php'; ?>