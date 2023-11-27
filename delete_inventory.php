<?php
// Check if the form is submitted and the ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Establish database connection
    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Get the inventory ID from the form
    $inventory_id = $_POST['id'];

    // Prepare SQL query to delete the inventory item
    $query = "DELETE FROM invetory WHERE inventory_id = '$inventory_id'";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Redirect to the inventory page after deletion
        header("Location: ../inventory.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    // Redirect to a suitable error page or handle the error scenario
    header("Location: ../error.php");
    exit();
}
?>
