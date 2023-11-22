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

    // Get supplier data from form
    $supplier_name = $_POST['supplier_name'];
    $contactinfo = $_POST['contactinfo'];

    // Prepare SQL query to insert supplier data into the 'supplier' table
    $query = "INSERT INTO supplier (supplier_name, contactinfo) VALUES ('$supplier_name', '$contactinfo')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Redirect to a success page after the supplier is added
        header("Location: ../supplier.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
