<?php
include "includes/head.php";
include "load.php";
?>

<style>
        .grid-container {
            display: grid;
            position: fixed;
            right: 70px;
            top: 90px;
            width: calc(95% - 250px);
            height: 750px;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 20px;
            text-align: center;
            
        }

        .grid-item {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .grid-item {
            padding: 20px;
            background-color: #F4F6F6;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .row-count {
            font-size: 70px; /* Adjust font size as needed */         
        }


    </style>

<div class="grid-container">
        <div class="grid-item categories-container">
            <h2>Total Categories</h2>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "inventory_sys";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $tableName = 'category';

                    $sql = "SELECT COUNT(*) AS row_count FROM $tableName"; // Query to count rows

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rowCount = $row["row_count"];
                        echo "<p class='row-count'> $rowCount</p>";
                        echo '<form action="category.php"><input type="submit" value="View" class="btn btn-primary" style="width: 150px;"></form>';
                    }

                    $conn->close();
            ?>

        </div>

        <div class="grid-item product-container">
            <h2>Total Products</h2>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "inventory_sys";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $tableName = 'product';

                    $sql = "SELECT COUNT(*) AS row_count FROM $tableName"; // Query to count rows

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rowCount = $row["row_count"];
                        echo "<p class='row-count'> $rowCount</p>";
                        echo '<form action="product.php"><input type="submit" value="View" class="btn btn-primary"  style="width: 150px;"></form>';
                    }

                    $conn->close();
            ?>
        </div>

        <div class="grid-item suppliers-container">
            <h2>Total Suppliers</h2>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "inventory_sys";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $tableName = 'supplier'; // Replace 'your_table_name' with your actual table name

                    $sql = "SELECT COUNT(*) AS row_count FROM $tableName"; // Query to count rows

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rowCount = $row["row_count"];
                        echo "<p class='row-count'> $rowCount</p>";
                        echo '<form action="supplier.php"><input type="submit" value="View" class="btn btn-primary"  style="width: 150px;"></form>';
                    }

                    $conn->close();
            ?>
        </div>

        <div class="grid-item store-container">
            <h2>Total Store</h2>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "inventory_sys";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $tableName = 'store'; // Replace 'your_table_name' with your actual table name

                    $sql = "SELECT COUNT(*) AS row_count FROM $tableName"; // Query to count rows

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $rowCount = $row["row_count"];
                        echo "<p class='row-count'> $rowCount</p>";
                        echo '<form action="store.php"><input type="submit" value="View" class="btn btn-primary"  style="width: 150px;"></form>';
                    }

                    $conn->close();
            ?>
        </div>
    </div>


<script src="js\script.js"></script>

<?php
include "includes/footer.php";
?>
