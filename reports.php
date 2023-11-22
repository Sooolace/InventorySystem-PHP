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
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: auto; /* Single row */
        gap: 20px;
        text-align: center;
    }

    .grid-item {
        padding: 20px;
        background-color: #F4F6F6;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Updated grid-column values for each container */
    .categories-container {
        grid-column: 1;
    }

    .product-container {
        grid-column: 2;
    }

    .suppliers-container {
        grid-column: 3;
    }
</style>

<div class="grid-container">
    <div class="grid-item categories-container">
        <h2>Fast selling products</h2>
    </div>
    <div class="grid-item product-container">
        <h2>Slow moving products</h2>
    </div>
    <div class="grid-item suppliers-container">
        <h2>Needs Restocking</h2>
    </div>
</div>

<script src="js\script.js"></script>

<?php include "includes/footer.php"; ?>
