<?php
session_start();
if (isset($_SESSION['errFlag'])) {
    unset($_SESSION['errFlag']);

} else {
    $_SESSION['errCostprice'] = "";
    $_SESSION['errSalesprice'] = "";
    $_SESSION['errQuantity'] = "";

    $_SESSION['cost-price'] = "";
    $_SESSION['sales-price'] = "";
    $_SESSION['quantity-in-stock'] = "";
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Costing Info</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ia.css">
</head>

<style>
    body {
        background-color: #C8A2C8;
    }
</style>

<body>
    <h1>Costing Info</h1>
    <form method="post" action="process_costing_info.php">

        <label for="cost-price">Cost Price:</label>
        <input type="text" id="cost-price" name="cost-price"
            value="<?php echo isset($_SESSION['cost-price']) ? $_SESSION['cost-price'] : ''; ?>" />
        <?php echo isset($_SESSION['errCostprice']) ? $_SESSION['errCostprice'] : ''; ?>
        <br><br>

        <label for="sales-price">Sales Price:</label>
        <input type="text" id="sales-price" name="sales-price"
            value="<?php echo isset($_SESSION['sales-price']) ? $_SESSION['sales-price'] : ''; ?>" />
        <?php echo isset($_SESSION['errSalesprice']) ? $_SESSION['errSalesprice'] : ''; ?>
        <br><br>

        <label for="quantity-in-stock">Quantity in Stock:</label>
        <input type="text" id="quantity-in-stock" name="quantity-in-stock"
            value="<?php echo isset($_SESSION['quantity-in-stock']) ? $_SESSION['quantity-in-stock'] : ''; ?>" />
        <?php echo isset($_SESSION['errQuantity']) ? $_SESSION['errQuantity'] : ''; ?>
        <br><br>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>