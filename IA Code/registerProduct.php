<!DOCTYPE html>
<html>

<head>
    <title>Register Info</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ia.css">

</head>


<!-- <form action="productInfo.php" method="POST"> -->
<form method="post" action="registerProduct.php">

    <input type="submit" name="write_files" value="Write Files">
</form>

<?php

if (isset($_POST["write_files"])) {
    session_start();
    $productName = $_SESSION['product-name'];
    $productCode = $_SESSION['product-code'];
    $productType = $_SESSION['product-type'];
    $productDescription = $_SESSION['product-description'];
    $costPrice = $_SESSION['cost-price'];
    $salesPrice = $_SESSION['sales-price'];
    $quantityStock = $_SESSION['quantity-in-stock'];


    echo '<h3 style="display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:left;">
    Product Name: ' . $productName . '<br>
    Product Code: ' . $productCode . '<br>
    Product Type: ' . $productType . '<br>
    Product Description: ' . $productDescription . '<br>
    The Cost Price you entered is: ' . "$" . $costPrice . '<br>
    The Sales Price you entered is: ' . "$" . $salesPrice . '<br>
    The Quantity you entered is: ' . $quantityStock . '</h3><br>';


    // Write product information to product.txt
    $productFile = fopen("./product.txt", "a");
    fwrite($productFile, "Product Name: " . $productName . "\n" .
        "Product Code: " . $productCode . "\n" .
        "Product Type: " . $productType . "\n" .
        "Product Description: " . $productDescription . "\n" .
        "Cost Price: $" . $costPrice . "\n" .
        "Sales Price: $" . $salesPrice . "\n" .
        "Quantity in Stock: " . $quantityStock . "\n" .
        "------------------------\n");
    fclose($productFile);

    // Write cost information to cost.txt
    $costFile = fopen("./cost.txt", "a");
    fwrite($costFile, "Product Name: " . $productName . "\n" .
        "Product Code: " . $productCode . "\n" .
        "Product Type: " . $productType . "\n" .
        "Product Description: " . $productDescription . "\n" .
        "Cost Price: $" . $costPrice . "\n" .
        "Sales Price: $" . $salesPrice . "\n" .
        "Quantity in Stock: " . $quantityStock . "\n" .
        "------------------------\n");
    fclose($costFile);

    echo "Files written successfully!";
    session_destroy();
    header("Location: productInfo.php");
}

// header("Location: productInfo.php");
?>


</body>

</html>