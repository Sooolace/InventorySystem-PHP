<?php
include "includes/head.php";
include "load.php";
?>
<script src="js\script.js"></script>

<style>

</style>

<div class="add-container">
    <h2>Add Supplier</h2>
    <form action="includes/addsupplier.php" method="post">

        <div class="input-container">  
            <label for="supplier-name">Supplier Name</label>
            <input type="text" id="supplier_name" name="supplier_name" placeholder="Supplier name" required>
        </div>

        <div class="input-container">
             <label for="contact-info">Contact Information</label>
            <input type="number" id="contactinfo" name="contactinfo" placeholder="Contact" required>
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
                                <th>Supplier ID</th>
                                <th>Supplier Name</th>
                                <th>Contact Info</th>                                
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
                                $query = "SELECT * FROM supplier WHERE CONCAT(supplier_id, supplier_name, contactinfo) LIKE '%$filtervalues%'";
                            } else {
                                // If no search parameter is provided, select all records
                                $query = "SELECT * FROM supplier";
                            }

                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $supplier) {
                            ?>
                                    <tr>
                                        <td><?= $supplier['supplier_id'] ?></td>
                                        <td><?= $supplier['supplier_name'] ?></td>
                                        <td><?= $supplier['contactinfo'] ?></td>
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