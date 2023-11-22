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

    // Get category name from form
    $category_name = $_POST['category_name'];

    // Prepare SQL query to insert category name into the 'category' table
    $query = "INSERT INTO category (category_name) VALUES ('$category_name')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Redirect to a success page after the category is added
        header("Location: ../category.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
