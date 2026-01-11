  </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-right: 20%">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 950px">
          
          <?php  
$query = "SELECT * FROM tblsupplier";
$result = mysqli_query($db,$query);
$query3 = "SELECT * FROM tblcategory";
$result3 = mysqli_query($db,$query3);

$query2 = 'SELECT current_date FROM tblusers';
            $result2 = mysqli_query($db, $query2) or die(mysqli_error($db));
              while($row2 = mysqli_fetch_array($result2))
              {   
               $date = $row2['current_date'];
              }
?>

            <!-- Page Heading -->
            <div class="container">
      <div class="card-header" style="background-color: white"><center><h3>Add Product</h3></center></div>

        <div class="card-body">
  <form role="form" method="post" action="insertproduct.php?action=add">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="Product Name" name="product" required autofocus="autofocus">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Quantity" name="qntty">
                            </div> 
                            <div class="form-group">
                              <input type="hidden" value="1" class="form-control" placeholder="Quantity" name="quantity">
                            </div> 
                             <div class="form-group">
                              <input type="hidden" value="1" class="form-control" placeholder="Available" name="available">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" type="number" id="price" placeholder="Original Price" name="price"required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="number" id="price" placeholder="Markup" name="profit"required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="number" id="sale" placeholder="Selling Price" name="sale"required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" readonly type="hidden" placeholder="Date In" name="date" value="<?php echo $date ?>">
                            </div>
                            <div class="form-group">
                              <select class="form-control"name="cat">
                                <option selected disabled>Category</option>
                                <?php while($row3 = mysqli_fetch_array($result3)):; ?>
                              <option value="<?php echo $row3[0]; ?>"><?php echo $row3[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>  
                            <div class="form-group">
                              <input class="form-control" type="hidden" value="<?php echo $_SESSION['userid'] ?>" name="user">
                            </div> 
                            <div class="form-group">
                              <select class="form-control"name="supplier">
                                <option selected disabled>Supplier</option>
                                <?php while($row = mysqli_fetch_array($result)):; ?>
                              <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>  
                            <div class="form-group">
                              <input class="form-control" type="number" placeholder="Product Code" name="nq"required>
                            </div>
                            <button type="submit" class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>
                            


                      </form>  
                       </div>
                </div>
              </div>
            </div>
          </div>
     <script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('input').change(function(){
      var sum=0;
      $('input[id=price]').each(function(){
        sum = sum + parseInt($(this).val());
      })
      $('input[name=sale]').val(sum);
    });

  });
</script>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>

<?php include 'includes/footer.php'; ?>