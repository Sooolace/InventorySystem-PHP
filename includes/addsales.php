<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $product_id = $_POST['product_id'];
    $sold_qty = $_POST['sold_qty'];
    $store_id = $_POST['store_id'];
    $salesdate = $_POST['salesdate'];

    // Insert the sale into the sales table with calculated total price
    $insert_sale_query = "INSERT INTO sales (product_id, sold_qty, price, store_id, salesdate)
                          SELECT '$product_id', '$sold_qty', (p.price * '$sold_qty'), '$store_id', '$salesdate'
                          FROM product p
                          WHERE p.product_id = '$product_id'";

    if (mysqli_query($con, $insert_sale_query)) {
        // Update the quantity in the inventory table
        $update_query = "UPDATE invetory SET quantity = quantity - '$sold_qty' WHERE product_id = '$product_id' AND store_id = '$store_id'";
        
        if (mysqli_query($con, $update_query)) {
            header("Location: ../sales.php");
            exit();
        } else {
            echo "Error updating product quantity: " . mysqli_error($con);
        }
    } else {
        echo "Error adding sale: " . mysqli_error($con);
    }
    
    mysqli_close($con);
}

?>
