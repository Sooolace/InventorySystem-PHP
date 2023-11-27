<?php
include "includes/head.php";
include "load.php";
?>


<style>
.input-container {
    width: 300px; /* Set the desired width */
    margin-right: 10px; /* Adjust spacing between input elements */
    padding: 4px; /* Add padding to input elements */
}
</style>

</div>

<div class="add-container">
    <h2>Add Product</h2>
    <form  action="includes/addproduct.php" method="post">

    <div class="input-container">
        <label for="product-name">Product Name</label>
        <input type="text" id="product_name" name="product_name" placeholder="Product name" required>
    </div>

    <div class="input-container">
            <label for="category">Category</label>
            <select id="category_fk" name="category_fk" placeholder="Select Category" required>
                <option value="">Category</option>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');
                $query = "SELECT category_id, category_name FROM category";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No Category Found</option>";
                }

                mysqli_close($con);
                ?>
            </select>
    </div>

    <div class="input-container">
            <label for="category">Supplier</label>
            <select id="supplier_fk" name="supplier_fk" placeholder="Select Supplier" required>
                <option value="">Supplier</option>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');
                $query = "SELECT supplier_id, supplier_name FROM supplier";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='" . $row['supplier_id'] . "'>" . $row['supplier_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No Supplier Found</option>";
                }

                mysqli_close($con);
                ?>
            </select>
    </div>
    
    <div class="input-container">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Price" required>
    </div>    

    <div class="input-container">
        <label for="weight">Weight (kg)</label>
        <input type="number" id="weight" name="weight" placeholder="Weight" required>
    </div> 

    <div class="input-container">
        <label for="dimension">Dimension</label>
        <input type="text" id="dimensions" name="dimensions" placeholder="Dimension" required>
    </div> 

    <div class="input-container">
        <label for="warranty">Warranty</label>
        <input type="text" id="warranty_info" name="warranty_info" placeholder="Warranty" required>
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
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Category ID</th>
                                <th>Supplier ID</th>
                                <th>Price</th>
                                <th>Weight</th>
                                <th>Dimension</th>
                                <th>Warranty Information</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

                            // Check if the search parameter is set
                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                // Modify the SQL query to perform a search
                                $query = "SELECT * FROM product WHERE CONCAT(product_id, product_name, category_fk, price, weight, dimensions, warranty_info) LIKE '%$filtervalues%'";
                            } else {
                                // If no search parameter is provided, select all records
                                $query = "SELECT * FROM product";
                            }

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                            ?>
                                    <tr>
                                        <td><?= $items['product_id'] ?></td>
                                        <td><?= $items['product_name'] ?></td>
                                        <td><?= $items['category_fk'] ?></td>
                                        <td><?= $items['supplier_fk'] ?></td>
                                        <td><?= $items['price'] ?></td>
                                        <td><?= $items['weight'] ?> (kg)</td>
                                        <td><?= $items['dimensions'] ?></td>
                                        <td><?= $items['warranty_info'] ?></td>
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
<script src="js\script.js"></script>
