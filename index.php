<?php
include "includes/head.php";
include "load.php";
?>

<style>
        .grid-container {
            display: grid;
            position: fixed;
            right: 70px;
            top: 90px;
            width: calc(95% - 250px);
            height: 750px;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 20px;
            text-align: center;
            
        }

        .grid-item {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .grid-item {
            padding: 20px;
            background-color: #F4F6F6;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>

<div class="grid-container">
        <div class="grid-item categories-container">
            <h2>Total Categories</h2>
        </div>
        <div class="grid-item product-container">
            <h2>Total Products</h2>
        </div>
        <div class="grid-item suppliers-container">
            <h2>Total Suppliers</h2>
        </div>
        <div class="grid-item store-container">
            <h2>Total Store</h2>
        </div>
    </div>


<script src="js\script.js"></script>

<?php
include "includes/footer.php";
?>
