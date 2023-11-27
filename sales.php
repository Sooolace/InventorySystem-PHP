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
            <label for="store">Store</label>
            <select id="store_id" name="store_id" placeholder="Select Store" required>
                <option value="">Store</option>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');
                $query = "SELECT store_id, location FROM store";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='" . $row['store_id'] . "'>" . $row['location'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No Category Found</option>";
                }

                mysqli_close($con);
                ?>
            </select>
    </div> 

    <div class="input-container">
        <label for="salesdate">Date</label>
        <input type="date" id="salesdate" name="salesdate" placeholder="Sales Date" required>
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
                                <th>Store</th>
                                <th>Product ID</th>
                                <th>Sold Quantity</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];

                                $query = "SELECT * FROM sales WHERE CONCAT(sales, store_id, product_id, sold_qty, salesdate, price) LIKE '%$filtervalues%'";
                            } else {

                                $query = "SELECT * FROM sales";
                            }

                                $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

                                if (!$con) {
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    exit();
                                }

                                $query = "SELECT s.sales_id, s.store_id, s.product_id, s.sold_qty, s.salesdate, s.price, p.product_name 
                                        FROM sales s 
                                        INNER JOIN product p ON s.product_id = p.product_id";

                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['sales_id'] ?></td>
                                            <td><?= $row['store_id'] ?></td>
                                            <td><?= $row['product_id'] ?> (<?= $row['product_name'] ?>)</td>
                                            <td><?= $row['sold_qty'] ?></td>
                                            <td><?= $row['salesdate'] ?></td>
                                            <td><?= $row['price'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">No Record Found</td>
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

