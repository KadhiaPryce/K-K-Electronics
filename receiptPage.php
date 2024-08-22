<?php
session_start();
require_once("connect.php");
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
$shipping_fee = $_SESSION['shipping_fee'];
$tax_percent = $_SESSION['tax_percent'];
$totalOrder = $_SESSION['totalOrder'];
$cartItem = $_SESSION['cart_item'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="receipt.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <title>Receipt</title>

</head>

<body>
    <h1>Receipt</h1>
    <div class="order-info">
        <p>
            <?php $orderNumber = uniqid();
            echo "Order Number: " . $orderNumber; ?>
        </p>
        <p>
            <?php $date = date("F j, Y");
            echo "Date: " . $date; ?>
        </p>
        <p>
            <?php
            date_default_timezone_set('America/Bogota');
            $timeStamp = date("h:i:s A");
            echo "Time: " . $timeStamp; ?>
        </p>
    </div>
    <div class="customer-info">
        <h2>Customer Information</h2>

        <p>
            <?php
            echo "Name: " . $name;
            ?>
        </p>
        <p>
            <?php
            echo "Email: " . $email;
            ?>
        </p>
        <p>
            <?php
            echo "Shipping Address: " . $address;
            ?>
        </p>
    </div>
    <div class="order-details">
        <h2>Order Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>


                <?php
                if ($cartItem != null) {
                    foreach ($cartItem as $product) {
                        $productId = $product['Product Code'];
                        $query = "SELECT * FROM products WHERE `Product Code`='$productId'";
                        $result = mysqli_query($conn, $query);
                        $dbProduct = mysqli_fetch_assoc($result);

                        $newQuantity = $dbProduct['Quantity'] - $product['quantity'];
                        $updateQuery = "UPDATE products SET `Quantity`=$newQuantity WHERE `Product Code`='$productId'";
                        mysqli_query($conn, $updateQuery);

                        echo "<tr>";
                        echo "<td>" . $product['Product Name'] . "</td>";
                        echo "<td>" . $product['quantity'] . "</td>";
                        echo "<td>" . "$" . $product['Product Price'] . "</td>";
                        echo "<td>" . "$" . number_format(($product['Product Price'] * $product['quantity']), 2) . "</td>";
                        echo "</tr>";
                    }

                }
                ?>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Shipping</td>
                    <td>
                        <?php echo "$" . number_format($shipping_fee, 2); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Tax</td>
                    <td>
                        <?php echo "$" . number_format($tax_percent, 2); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td>
                        <?php echo "$" . number_format($totalOrder, 2); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <?php
    if (isset($_SESSION['cart_item'])) {
        require_once("connect.php");

        $productsJson = json_encode($cartItem);
        $query = "INSERT INTO `orders` (`Order Number`, `Order Name`, `Date`, `Time`, `Customer Email`, `Customer Address`, `Products`)
            VALUES ('$orderNumber', '$name', '$date', '$timeStamp', '$email', '$address', '$productsJson')";

        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        session_destroy();
        ?>
        <a href="homePage.php">Home</a>
        <?php
    }
    ?>


</body>

</html>