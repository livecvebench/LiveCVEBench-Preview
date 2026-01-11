<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<!--breadcrumbs area-->
<!--breadcrumbs area-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Transaction</li>
          </ol>
          <?php
if(!isset($_SESSION["userid"])){
 header("Location: index.php");
}
else{
?>
<?php
}
?> 
          <div class="card mb-3">
            <div class="card-header">
              <h2>Transaction</h2>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order No.#</th>
                                        <th>Customer</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Option</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php                  
                $query = 'SELECT a.transac_code,concat(b.fname," ",b.lname)as name,a.date,a.delivery_date,a.totalprice,a.status FROM tbltransacdetail a, tblusers b WHERE a.customer_id=b.user_id ';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                          
                            echo '<tr>';
                            echo '<td><a title="View list Of Ordered" href="detailtransac.php?id='. $row['transac_code'].'" style="color: blue;font-size: 21px">'. $row['transac_code'].' </a></td>';                     
                            echo '<td>'. $row['name'].'</td>';
                            echo '<td>'. $row['date'].'</td>';
                             echo '<td>'. $row['delivery_date'].'</td>';
                            echo '<td>'. $row['totalprice'].'</td>';
                            echo '<td>'. $row['status'].'</td>';
                            echo '<td>';
                            if ($row['status']=='Pending') {?>
                            <a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="confirm.php?action=edit & cancel=<?php echo $row['transac_code']; ?> ">Cancel</a>
                            <a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="confirm.php?action=edit & confirm=<?php echo $row['transac_code']; ?>">Confirm</a>
                            <?php
                             }elseif ($row['status']=='Confirmed') {?>
                               <a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="confirm.php?action=edit & cancel=<?php echo $row['transac_code']; ?> ">Cancel</a>
                            <?php 
                             }elseif ($row['status']=='Cancelled') {?>
                                <a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="confirm.php?action=edit & confirm=<?php echo $row['transac_code']; ?>">Confirm</a>
                             <?php 
                             }    
                            echo '</td>';
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
            </div>
           
          </div>

          
        </div>
        <!-- /.container-fluid -->

<?php include 'includes/footer.php'; ?>
<?php include 'addtransac.php'; ?>