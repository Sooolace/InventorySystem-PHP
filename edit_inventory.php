<?php
include_once 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission for updating inventory
    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $inventory_id = $_POST['inventory_id'];
    $quantity = $_POST['quantity'];
    $reorder_level = $_POST['reorder_level'];
    $restockdate = $_POST['restockdate'];

    $query = "UPDATE invetory 
              SET quantity = '$quantity', reorder_level = '$reorder_level', restockdate = '$restockdate'
              WHERE inventory_id = '$inventory_id'";

    if (mysqli_query($con, $query)) {
        header("Location: inventory.php");
        exit();
    } else {
        echo "Error updating inventory: " . mysqli_error($con);
    }

    mysqli_close($con);
} elseif (isset($_GET['id'])) {
    // Display form for editing inventory
    $inventory_id = $_GET['id'];

    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM invetory WHERE inventory_id = '$inventory_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $inventory = mysqli_fetch_assoc($result);
?>

<?php
include "includes/head.php";
include "load.php";
?>
<div class="container">
    <section class="vh-100 gradient-custom">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Restock Product</h3>

                            <form action="edit_inventory.php" method="post" class="edit-form">
                                <input type="hidden" name="inventory_id" value="<?= $inventory['inventory_id'] ?>">
                                <div class="form-group mb-4">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="<?= $inventory['quantity'] ?>">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="reorder_level">Reorder Level:</label>
                                    <input type="number" id="reorder_level" name="reorder_level" class="form-control" value="<?= $inventory['reorder_level'] ?>">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="restockdate">Restock Date:</label>
                                    <?php
                                    $today = date('Y-m-d');
                                    ?>
                                    <input type="date" id="restockdate" name="restockdate" class="form-control" value="<?= $inventory['restockdate'] ?>" min="<?= $today ?>" max="<?= $today ?>">
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Update" class="btn btn-primary btn-lg">
                                    <a href="inventory.php" class="btn btn-secondary btn-lg">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php
    } else {
        echo "Inventory item not found!";
    }

    mysqli_close($con);
} else {
    echo "No inventory ID provided!";
}
?>
