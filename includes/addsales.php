<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Get sale details from the form
    $product_id = $_POST['product_id'];
    $sold_qty = $_POST['sold_qty'];
    $price = $_POST['price'];

    // Prepare SQL query to insert sale details into the 'sales' table
    $query = "INSERT INTO sales (product_id, sold_qty, price)
              VALUES ('$product_id', '$sold_qty', '$price')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Deduct sold quantity from product quantity
        $update_query = "UPDATE product SET quantity = quantity - '$sold_qty' WHERE product_id = '$product_id'";
        
        if (mysqli_query($con, $update_query)) {
            // Redirect to a success page after the sale is added and quantity is updated
            header("Location: ../sales.php");
            exit();
        } else {
            echo "Error updating product quantity: " . mysqli_error($con);
        }
    } else {
        echo "Error adding sale: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
