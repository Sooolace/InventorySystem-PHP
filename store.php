<?php
include "includes/head.php";
include "load.php";
?>
<script src="js\script.js"></script>

<style>

</style>

<div class="add-container">
    <h2>Add Store</h2>
    <form action="includes/addstore.php" method="post">

        <div class="input-container">
             <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="Location" required>
        </div>

        <div class="input-container">
             <label for="opendate">Open date</label>
            <input type="date" id="opening_date" name="opening_date" placeholder="Open date" required>
        </div>   

        <div class="input-container">
             <label for="opehour">Open hours</label>
            <input type="text" id="opening_hours" name="opening_hours" placeholder="Open hours" required>
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
                                <th>Store ID</th>
                                <th>Location</th>
                                <th>Opening Date</th>
                                <th>Opening Hours</th>
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
                                $query = "SELECT * FROM store WHERE CONCAT(store_id, location, opening_date, opening_hours) LIKE '%$filtervalues%'";
                            } else {
                                // If no search parameter is provided, select all records
                                $query = "SELECT * FROM store";
                            }

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $store) {
                            ?>
                                    <tr>
                                        <td><?= $store['store_id'] ?></td>
                                        <td><?= $store['location'] ?></td>
                                        <td><?= $store['opening_date'] ?></td>
                                        <td><?= $store['opening_hours'] ?></td>
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