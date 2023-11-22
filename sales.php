<?php
include "includes/head.php";
include "load.php";
?>
<script src="js\script.js"></script>

<style>

</style>

</div>

<div class="add-container">
    <h2>Add Sales</h2>
    <form  action="includes/addsales.php" method="post">

    <div class="input-container">
            <label for="product">Product</label>
            <select id="product_id" name="product_id" placeholder="Select Product" required>
                <option value="">Product</option>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');
                $query = "SELECT product_id, product_name FROM product";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No Category Found</option>";
                }

                mysqli_close($con);
                ?>
            </select>
    </div>

    <div class="input-container">
        <label for="sold-qty">Quantity Sold</label>
        <input type="number" id="sold_qty" name="sold_qty" placeholder="Enter Quantity Sold" required>
    </div>    

    <div class="input-container">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Enter Price" required>
    </div> 

    <div class="input-container">
            <input type="submit" class="btn btn-primary" value="Add">
    </div>

    </form>
    </div>

</div>
<div class="tablecontainer1">
    <div class="row">

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sales ID</th>
                                <th>Product ID</th>
                                <th>Sold Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

                            // Check if the search parameter is set
                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                // Modify the SQL query to perform a search
                                $query = "SELECT * FROM sales WHERE CONCAT(sales, product_id, sold_qty, price) LIKE '%$filtervalues%'";
                            } else {
                                // If no search parameter is provided, select all records
                                $query = "SELECT * FROM sales";
                            }

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                            ?>
                                    <tr>
                                        <td><?= $items['sales_id'] ?></td>
                                        <td><?= $items['product_id'] ?></td>
                                        <td><?= $items['sold_qty'] ?></td>
                                        <td><?= $items['price'] ?></td>
                                        <td>

                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="7">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

