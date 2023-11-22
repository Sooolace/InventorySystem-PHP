<?php
include "includes/head.php";
include "load.php";
?>
<script src="js\script.js"></script>

<style>
    .tablecontainer1 {
        position: fixed;
        right: 40px; /* Adjust the distance from the right */
        top: 90px; /* Adjust the distance from the top */
        width: calc(70% - 290px); /* Calculate the width considering both margins and the sidebar */

    }
</style>

</div>

<div class="tablecontainer1">
    <div class="row">
        <!-- Your existing search form -->
        <!-- ... -->

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
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
                                $query = "SELECT * FROM product WHERE CONCAT(product_id, name, price, weight, dimensions, warranty_information) LIKE '%$filtervalues%'";
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
                                        <td><?= $items['name'] ?></td>
                                        <td><?= $items['price'] ?></td>
                                        <td><?= $items['weight'] ?></td>
                                        <td><?= $items['dimensions'] ?></td>
                                        <td><?= $items['warranty_information'] ?></td>
                                        <td>
                                            <!-- You can have action buttons here if needed -->
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

