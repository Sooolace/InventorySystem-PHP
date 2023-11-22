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

    // Get product details from form
    $product_name = $_POST['product_name'];
    $category_fk = $_POST['category_fk'];
    $supplier_fk = $_POST['supplier_fk'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $dimensions = $_POST['dimensions'];
    $warranty_info = $_POST['warranty_info'];

    // Prepare SQL query to insert product details into the 'products' table
    $query = "INSERT INTO product (product_name, category_fk, supplier_fk, price, weight, dimensions, warranty_info)
              VALUES ('$product_name', '$category_fk', '$supplier_fk', '$price', '$weight', '$dimensions', '$warranty_info')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Redirect to a success page after the product is added
        header("Location: ../product.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
