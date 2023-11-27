<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = mysqli_connect('localhost', 'root', '', 'inventory_sys');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $category_name = $_POST['category_name'];

    $query = "INSERT INTO category (category_name) VALUES ('$category_name')";

    if (mysqli_query($con, $query)) {

        header("Location: ../category.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
