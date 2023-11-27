<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $product_id = $_POST['product_id'];
    $store_id = $_POST['store_id'];
    $quantity = $_POST['quantity'];
    $reorder_level = $_POST['reorder_level'];
    $restockdate = $_POST['restockdate'];
    $date_added = $_POST['date_added'];

    $query = "INSERT INTO invetory (product_id, store_id, quantity, reorder_level, restockdate, date_added)
              VALUES ('$product_id', '$store_id', '$quantity', '$reorder_level', '$restockdate', '$date_added')";

    if (mysqli_query($con, $query)) {

        header("Location: ../inventory.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
