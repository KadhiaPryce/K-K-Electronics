<?php
if (isset($_POST["search"])) {
    include 'connect.php';

    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productCode = mysqli_real_escape_string($conn, $_POST['productCode']);
    $productType = mysqli_real_escape_string($conn, $_POST['productType']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $salesPrice = mysqli_real_escape_string($conn, $_POST['salesPrice']);
    $productQuantity = mysqli_real_escape_string($conn, $_POST['productQuantity']);

    // Create session variables for product-image input field
    if (isset($_FILES['productImage']) && $_FILES['productImage'] != null) {
        $_SESSION['productImageCount'] = count($_FILES['productImage']['name']);
    } else {
        $_SESSION['productImageCount'] = 0;
    }

    if ($_SESSION['errFlag'] > 0) {
        header("Location: productPage.php");
        exit();
    } else {
        if (isset($_POST["search"])) {
            $sql = "SELECT * FROM products
            WHERE 'Product Name' LIKE '%$search%' 
            AND 'Product Type' = '%$search%' 
            AND Manufacturer = '%$search%'
            AND Sales Price = '%$search%'";
           
           // Execute the query
            $result = mysqli_query($conn, $sql);

            // Display the results
            echo "<table>";
            echo "<tr><th>Product Image</th><th>Product Name</th><th>Product Code</th><th>Product Type</th><th>Product Description</th><th>Manufacturer</th><th>Product Price</th><th>Sales Price</th><th>Quantity</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><img src='./images/" . $row["Product Image"] . "'></td>";
                echo "<td>" . $row["Product Name"] . "</td>";
                echo "<td>" . $row["Product Code"] . "</td>";
                echo "<td>" . $row["Product Type"] . "</td>";
                echo "<td>" . $row["Product Description"] . "</td>";
                echo "<td>" . $row["Manufacturer"] . "</td>";
                echo "<td>" . $row["Product Price"] . "</td>";
                echo "<td>" . $row["Sales Price"] . "</td>";
                echo "<td>" . $row["Quantity"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            if (!$result) {
                die(mysqli_error($conn));
            }
        }


        // Unset session variables for all input field
        unset($_SESSION['productName']);
        unset($_SESSION['productCode']);
        unset($_SESSION['productType']);
        unset($_SESSION['productDescription']);
        unset($_SESSION['manufacturer']);
        unset($_SESSION['productImage']);
        unset($_SESSION['productPrice']);
        unset($_SESSION['salesPrice']);
        unset($_SESSION['productQuantity']);
        unset($_SESSION['productImage']);
        unset($_SESSION['productImageCount']);
        header("Location: productPage.php");
        exit();
    }
}
?>