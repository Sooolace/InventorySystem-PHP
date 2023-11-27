<?php
include "includes/head.php";
include "load.php";

?>


<style>
.input-container {
    width: 200px; 
    margin-right: 10px; 
    padding: 4px;  
}

.tablecontainer1{
    height: 900px;
}

</style>


<div class="add-container">
    <h2>Inventory</h2>
    <form  action="includes/addinventory.php" method="post">
     
    <div class="input-container">
            <label for="product_id">Product</label>
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
            <label for="store_id">Store</label>
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
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" placeholder="Quantity" required>
    </div>

    <div class="input-container">
        <label for="reorder">Reorder</label>
        <input type="number" id="reorder_level" name="reorder_level" placeholder="Reorder" required>
    </div>
    
    <div class="input-container">
        <label for="restock">Restock Date</label>
        <input type="date" id="restockdate" name="restockdate" placeholder="Restock Date" required>
    </div>  

    <div class="input-container">
        <label for="date-added">Date added</label>
        <input type="date" id="date_added" name="date_added" placeholder="Date added" required>
    </div>     
    
    <div class="input-container">
            <input type="submit" class="btn btn-primary" value="Add">
    </div>

    </form>
    </div>

</div>
<div class="tablecontainer1">
    <div class="row">
    <div class="col-md-6" style="margin-top: 20px;">
    <form action="" method="GET">
    <div class="input-group mb-3">
        <div class="col-md-6">
            <select id="filter_store_id" name="filter_store_id" class="form-control">
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
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block">Filter Store</button>
        </div>
    </div>
</form>

        </div>

        <div class="col-md-12">
            <div class="card mt-1">
                <div class="card-body">
                    <table class="table table-bordered" style="height: 100px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>Store ID</th>
                                <th>In stock</th>
                                <th>Reorder level</th>
                                <th>Restock date</th>
                                <th>Date added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

                            if (isset($_GET['filter_store_id'])) {
                                
                                $filtervalues = $_GET['filter_store_id'];
                                $query = "SELECT * FROM invetory WHERE store_id = '$filtervalues'";
                            } else {
                                $query = "SELECT * FROM invetory";
                            }
                            

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                            ?>
                                <tr>
                                    <td><?= $items['inventory_id'] ?></td>
                                    <td><?= $items['product_id'] ?></td>
                                    <td><?= $items['store_id'] ?></td>
                                    <td><?= $items['quantity'] ?></td>
                                    <td><?= $items['reorder_level'] ?></td>
                                    <td><?= $items['restockdate'] ?></td>
                                    <td><?= $items['date_added'] ?></td>
                                    <td>
                                        <a href="edit_inventory.php?id=<?= $items['inventory_id'] ?>" class="btn btn-primary">Restock</a>

                                        <form action="delete_inventory.php" method="post" style="display: inline;">
                                            <input type="hidden" name="id" value="<?= $items['inventory_id'] ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                        </form>
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

<script src="js\script.js"></script>
