
<?php 
        if (isset($_SESSION['userid'])) {
          if ($_SESSION['position']=='Admin') {
           echo '<div id="wrapper">
         <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a title="Customers" class="nav-link" href="customer.php">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Customers</span></a>
        </li>
        <li class="nav-item">
          <a title="Products" class="nav-link" href="product.php">
            <i class="fas fa-fw fa-birthday-cake"></i>
            <span>Products</span></a>
        </li>
        <li class="nav-item">
          <a title="Supplier" class="nav-link" href="supplier.php">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Supplier</span></a>
        </li>
        <li class="nav-item">
          <a title="Transaction" class="nav-link" href="detail.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaction</span></a>
        </li>
                <li class="nav-item">
          <a title="Admins" class="nav-link" href="admin.php">
            <i class="fas fa-fw fa-user-secret"></i>
            <span>Admins</span></a>
        </li>
      </ul>
         <div id="content-wrapper">

        <div class="container-fluid">';
          }
          elseif ($_SESSION['position']=='Encoder') {
             echo '<div id="wrapper">
         <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="customer.php">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Customers</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php">
            <i class="fas fa-fw fa-birthday-cake"></i>
            <span>Products</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supplier.php">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Supplier</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tdetailtable.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaction</span></a>
        </li>
        
      </ul>
         <div id="content-wrapper">

        <div class="container-fluid">';
         
         }elseif ($_SESSION['position']=='Customer') {

            echo '<div id="wrapper">
         <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a title="Order" class="nav-link" href="cart.php">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Cart</span></a>
        </li>
        <li class="nav-item">
          <a title="List of Orders" class="nav-link" href="order.php">
            <i class="fas fa-fw fa-th-list"></i>
            <span>List of Orders</span></a>
        </li>
         
        
      </ul>
         <div id="content-wrapper">

        <div class="container-fluid">';
          }
        }
          else{
          echo '<div id="wrapper">

           <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Cart</span></a>
        </li>
         </ul>
         <div id="content-wrapper">

        <div class="container-fluid">';
          }
         ?>
        
      <!-- Sidebar -->
     

         