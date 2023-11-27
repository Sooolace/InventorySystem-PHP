<?php
include "includes/head.php";
include "load.php";
?>
<script src="js\script.js"></script>

<style>
</style>

<div class="add-container">
    <h2>Add Category</h2>
    <form action="includes/addcategory.php" method="post">

        <div class="input-container">
            <label for="category-name">Name</label>
            <input type="text" id="category-name" name="category_name" placeholder="Category name" required>
        </div>
        <div class="input-container">

            <input type="submit" class="btn btn-primary" value="Add">
        </div>

    </form>
</div>

<div class="tablecontainer1">
    <div class="row">

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
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
                                $query = "SELECT * FROM category WHERE CONCAT(category_id, category_name) LIKE '%$filtervalues%'";
                            } else {
                                // If no search parameter is provided, select all records
                                $query = "SELECT * FROM category";
                            }

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $category) {
                            ?>
                                    <tr>
                                        <td><?= $category['category_id'] ?></td>
                                        <td><?= $category['category_name'] ?></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="3">No Record Found</td>
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