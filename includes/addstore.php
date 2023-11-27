<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Get store details from form
    $location = $_POST['location'];
    $opening_date = $_POST['opening_date'];
    $opening_hours = $_POST['opening_hours'];

    // Prepare SQL query to insert store details into the 'stores' table
    $query = "INSERT INTO store (location, opening_date, opening_hours)
              VALUES ('$location', '$opening_date', '$opening_hours')";

    if (mysqli_query($con, $query)) {
        header("Location: ../store.php"); // Redirect to a success page after adding the store
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
