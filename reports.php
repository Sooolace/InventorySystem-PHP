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
        width: calc(96% - 250px);
        height: 790px;
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
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Store</th>
                    <th>Sold Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

            if (!$con) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Modify the SQL query to include the ORDER BY clause
            $query = "SELECT s.sales_id, s.store_id, s.product_id, s.sold_qty, s.salesdate, s.price, p.product_name 
                    FROM sales s 
                    INNER JOIN product p ON s.product_id = p.product_id 
                    ORDER BY s.sold_qty DESC"; // ORDER BY added to sort by sold_qty in descending order

            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<tr>";
                    echo "<td>" . $row['sales_id'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['store_id'] . "</td>";
                    echo "<td>" . $row['sold_qty'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found.</td></tr>";
            }

            mysqli_close($con);
            ?>

            </tbody>
        </table>
    </div>
</div>

    
    <div class="grid-item product-container">
        <h2>Slow moving products</h2>
        <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Store</th>
                    <th>Sold Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

            if (!$con) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Modify the SQL query to include the ORDER BY clause
            $query = "SELECT s.sales_id, s.store_id, s.product_id, s.sold_qty, s.salesdate, s.price, p.product_name 
                    FROM sales s 
                    INNER JOIN product p ON s.product_id = p.product_id 
                    ORDER BY s.sold_qty ASC"; // ORDER BY added to sort by sold_qty in descending order

            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<tr>";
                    echo "<td>" . $row['sales_id'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['store_id'] . "</td>";
                    echo "<td>" . $row['sold_qty'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found.</td></tr>";
            }

            mysqli_close($con);
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="grid-item suppliers-container">
    <h2>Needs Restocking</h2>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (!$con) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM invetory WHERE quantity <= reorder_level"; // Select items where quantity meets reorder level

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<table class='table table-bordered mt-4'>";
        echo "<thead><tr>
                <th>ID</th>
                <th>Product</th>
                <th>Store</th>
                <th>Left</th>
                <th>Action</th>
        </tr></thead>";
        echo "<tbody>";

        while ($items = mysqli_fetch_assoc($query_run)) {
            echo "<tr>";
            echo "<td>" . $items['inventory_id'] . "</td>";
            echo "<td>" . $items['product_id'] . "</td>";
            echo "<td>" . $items['store_id'] . "</td>";
            echo "<td>" . $items['quantity'] . "</td>";
            echo "<td>" . $items['quantity'] . "</td>";
            echo '<td><a href="edit_inventory.php?id=' . $items['inventory_id'] . '" class="btn btn-primary">Restock</a></td>';
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>No records found.</p>";
    }

    mysqli_close($con);
    ?>
</div>


</div>

<script src="js\script.js"></script>

<?php include "includes/footer.php"; ?>