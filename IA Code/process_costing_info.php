<!DOCTYPE html>
<html>

<head>
    <title>Nowhere</title>

</head>


<body>

    <div id="form_container">
        <div id="footer_2">
            <?php

            if (isset($_POST["submit"])) {
                session_start();
                $_SESSION['errFlag'] = 0;
                $costPrice = $_POST['cost-price'];
                $salesPrice = $_POST['sales-price'];
                $quantityStock = $_POST['quantity-in-stock'];

                if (empty($costPrice)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">The Cost Price should not be empty!</p><br>';
                    $_SESSION['errCostprice'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">The Cost Price should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['cost-price'] = $costPrice;
                } else {
                    if (preg_match('/^[1-9][0-9.]*$/', $costPrice)) {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">The Cost Price you entered is: ' . "$" . $costPrice . '</p><br>';
                        $_SESSION['cost-price'] = $costPrice;
                        $_SESSION['errCostprice'] = "";
                    } else {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">This should have numbers only!</p><br>';
                        $_SESSION['errCostprice'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">This should have numbers only!</span>';
                        $_SESSION['errFlag']++;
                        $_SESSION['cost-price'] = $costPrice;
                    }
                }
                if (empty($salesPrice)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">The Sales Price should not be empty!</p><br>';
                    $_SESSION['errSalesprice'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">The Sales Price should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['sales-price'] = $salesPrice;
                } else {
                    if (preg_match('/^[1-9][0-9.]*$/', $salesPrice)) {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">The Sales Price you entered is: ' . "$" . $salesPrice . '</p><br>';
                        $_SESSION['sales-price'] = $salesPrice;
                        $_SESSION['errSalesprice'] = "";
                    } else {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">This should have numbers only!</p><br>';
                        $_SESSION['errSalesprice'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">This should have numbers only!</span>';
                        $_SESSION['errFlag']++;
                        $_SESSION['sales-price'] = $salesPrice;
                    }
                }
                if (empty($quantityStock)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">The Quantity should not be empty!</p><br>';
                    $_SESSION['errQuantity'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">The Quantity should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['quantity-in-stock'] = $quantityStock;
                } else {
                    if (preg_match('/^[1-9][0-9.]*$/', $quantityStock)) {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">The Quantity you entered is: ' . $quantityStock . '</p><br>';
                        $_SESSION['quantity-in-stock'] = $quantityStock;
                        $_SESSION['errQuantity'] = "";
                    } else {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">This should have numbers only!</p><br>';
                        $_SESSION['errQuantity'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">This should have numbers only!</span>';
                        $_SESSION['errFlag']++;
                        $_SESSION['quantity-in-stock'] = $quantityStock;
                    }
                }


                if ($_SESSION['errFlag'] > 0) {
                    // header("Location: indivi-assign.php");
                } else {
                    // session_destroy();
                }
            }

            ?>


            <div style="display: flex;">
                <a href="./costingInfo.php"
                    style="display: inline-block; padding: 10px 20px; background-color: #c86feb; color: #fff; text-decoration: none; border-radius: 5px; margin-right: 10px;">Go
                    Back</a>
                <a href="./registerProduct.php"
                    style="display: inline-block; padding: 10px 20px; background-color: #c86feb; color: #fff; text-decoration: none; border-radius: 5px; margin-right: 10px;">Register
                    Info</a>

            </div>
        </div>
    </div>
</body>

</html>