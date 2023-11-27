<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $product_name = $_POST['product_name'];
    $category_fk = $_POST['category_fk'];
    $supplier_fk = $_POST['supplier_fk'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $dimensions = $_POST['dimensions'];
    $warranty_info = $_POST['warranty_info'];


    $query = "INSERT INTO product (product_name, category_fk, supplier_fk, price, weight, dimensions, warranty_info)
              VALUES ('$product_name', '$category_fk', '$supplier_fk', '$price', '$weight', '$dimensions', '$warranty_info')";

    if (mysqli_query($con, $query)) {
        
        header("Location: ../product.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
