
<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>


<!--breadcrumbs area-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Admins</li>
          </ol>

<!-- CustomerTables -->
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
              <h2>Admins </h2> <a href="register.php" type="button" class="btn btn-xs btn-info">Register</a>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped"id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Position</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php                  
                $query = 'SELECT * FROM tblusers WHERE position="Admin" OR position="Encoder"';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['user_id'].'</td>';
                            echo '<td>'. $row['fname'].'</td>';
                            echo '<td>'. $row['lname'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>'. $row['username'].'</td>';
                            echo '<td>'. $row['position'].'</td>';
                            echo '<td>  ';
                            echo ' <a  type="button" class="btn btn-lg btn-warning fas fa-user-tag" href="admindetail.php?action=edit & id='.$row['user_id'] . '"></a> ';

                            
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

<!--footer area-->
<?php include 'includes/footer.php'; ?>
