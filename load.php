<?php
include "includes/header.php";
include "includes/head.php";
?>

<div id="wrapper" class="toggled">
    <div class="overlay"></div>
    
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <a href="index.php">Inventory System</a>
                </div>
            </div>
            <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="product.php"><i class="fa fa-th" aria-hidden="true"></i> Products</a></li>
            <li><a href="category.php"><i class="fa fa-bars" aria-hidden="true"></i> Category</a></li>
            <li><a href="store.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Stores</a></li>
            <li><a href="inventory.php"><i class="fa fa-archive" aria-hidden="true"></i> Inventory</a></li>
            <li><a href="supplier.php"><i class="fa fa-users" aria-hidden="true"></i> Suppliers</a></li>
            <li><a href="sales.php"><i class="fa fa-cash-register" aria-hidden="true"></i> Sales</a></li>
            <li><a href="reports.php"><i class="fa fa-file" aria-hidden="true"></i> Reports</a></li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
            <!-- Your page content goes here -->
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<script src="js/script.js"></script>

<?php
include "includes/footer.php";
?>
