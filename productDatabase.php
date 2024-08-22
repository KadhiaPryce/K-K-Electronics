<?php
if (isset($_POST["submit"]) || isset($_POST["update"]) || isset($_POST["delete"]) || isset($_POST["search"])) {
    include 'productValidation.php';
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
        if (isset($_POST["submit"])) {
            $query = "INSERT INTO products (`Product Name`, `Product Code`, `Product Type`, `Product Description`, `Manufacturer`, `Product Price`, `Sales Price`,`Quantity`) 
                      VALUES ('$productName', '$productCode', '$productType', '$productDescription', '$manufacturer', '$productPrice', '$salesPrice', '$productQuantity')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die(mysqli_error($conn));
            }
            $productId = mysqli_insert_id($conn);

            $imageCount = isset($_FILES['productImage']) && $_FILES['productImage'] != null ? count($_FILES['productImage']['name']) : 0;
            for ($i = 0; $i < $imageCount; $i++) {
                $imageName = $_FILES['productImage']['name'][$i];
                $imageTmpName = $_FILES['productImage']['tmp_name'][$i];
                $imageType = $_FILES['productImage']['type'][$i];
                $imageSize = $_FILES['productImage']['size'][$i];
                $imageError = $_FILES['productImage']['error'][$i];
                if ($imageError === UPLOAD_ERR_OK) {
                    $imagePath = "./images/" . $imageName;
                    if (move_uploaded_file($imageTmpName, $imagePath)) {
                        $query = "INSERT INTO product_images (productCode, filename) 
                      VALUES ('$productCode', '$imageName')";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            die(mysqli_error($conn));
                        }
                    } else {
                        echo '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Sorry, there was an error uploading your file.</span>';
                        $_SESSION['errors'] = true;
                    }
                } else {
                    echo '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Sorry, there was an error uploading your file.</span>';
                    $_SESSION['errors'] = true;
                }
            }
        } elseif (isset($_POST["update"])) {
            $sql = "UPDATE `products` SET `Product Name`='$productName', `Product Description`='$productDescription', `Manufacturer`='$manufacturer', `Product Type`='$productType',
            `Product Price`='$productPrice',  `Sales Price`='$salesPrice', `Quantity`='$productQuantity' WHERE `Product Code`='$productCode'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die(mysqli_error($conn));
            }

            $imageIds = $_POST['imageId'];
            $imageCount = isset($_FILES['productImage']) && $_FILES['productImage'] != null ? count($_FILES['productImage']['name']) : 0;
            for ($i = 0; $i < $imageCount; $i++) {
                $imageName = $_FILES['productImage']['name'][$i];
                $imageTmpName = $_FILES['productImage']['tmp_name'][$i];
                if (!empty($imageName)) {
                    $imagePath = "./images/" . $imageName;
                    move_uploaded_file($imageTmpName, $imagePath);
                    $query = "INSERT INTO product_images (productCode, filename) 
                              VALUES ('$productCode', '$imageName')";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        die(mysqli_error($conn));
                    }
                } elseif (isset($imageIds[$i])) {
                    $imageId = $imageIds[$i];
                    $query = "DELETE FROM product_images WHERE id='$imageId'";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        die(mysqli_error($conn));
                    }
                }
            }
        } elseif (isset($_POST["delete"])) {
            $sql = "DELETE FROM `products` WHERE `Product Code`='$productCode'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die(mysqli_error($conn));
            }
            $sql = "DELETE FROM `product_images` WHERE `productCode`='$productCode'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die(mysqli_error($conn));
            }
        } elseif (isset($_POST["search"])) {
            // Retrieve search inputs from the form
            $search_name = $_POST['search_name'];
            $search_type = $_POST['search_type'];
            $max_price = $_POST['max_price'];

            // Build the SQL query with search parameters
            $sql = "SELECT p.*, i.filename AS 'Product Image' 
            FROM products p 
            LEFT JOIN product_images i 
            ON p.`Product Code` = i.`productCode`
            WHERE p.`Product Name` LIKE '%$search_name%' 
            AND ('$search_type' = '' OR p.`Product Type` = '$search_type') 
            AND ('$max_price' = '' OR p.`Sales Price` <= '$max_price')";

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