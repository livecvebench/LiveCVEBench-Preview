<!--header area-->
<?php include 'includes/header.php'; ?>
<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">404 Error</li>
          </ol>

          <!-- Page Content -->
          <h1 class="display-1">404</h1>
          <?php if($_GET["useruid"]){
            echo "hh".$_GET['useruid'];
            exit();
          }
          ?>
          <p class="lead">Page not found. You can
            <a href="javascript:history.back()">go back</a>
            to the previous page, or
            <a href="index.php">return home</a>.</p>

             <!--footer area-->
<?php include 'includes/footer.php'; ?>