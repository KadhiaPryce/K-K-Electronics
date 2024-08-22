<!--Cart Code is from: https://phppot.com/php/simple-php-shopping-cart/ -->
<?php
session_start();
require_once("connect.php");
$db_handle = new DBController();

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $productByCode = $db_handle->runQuery("SELECT p.*, pi.* FROM products p INNER JOIN product_images pi ON p.`Product Code` = pi.`productCode` WHERE p.`Product Code`='" . $_GET["Product_Code"] . "'");
                $itemArray = array($productByCode[0]["Product Code"] => array('Product Name' => $productByCode[0]["Product Name"], 'Product Code' => $productByCode[0]["Product Code"], 'Product Type' => $productByCode[0]["Product Type"], 'quantity' => $_POST["quantity"], 'Product Price' => $productByCode[0]["Product Price"], 'filename' => $productByCode[0]["filename"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (array_key_exists($productByCode[0]["Product Code"], $_SESSION["cart_item"])) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["Product Code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["Product_Code"] == $k) {
                        unset($_SESSION["cart_item"][$k]);
                    }
                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<html>

<head>
    <TITLE>Shopping Cart</TITLE>
    <link href="cart.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <h1 style="font-family: Malaga, serif;">K&K Electronics!</h1>
    <nav class="navbar navbar-expand-lg navbar-light navbar-expand-sm" style="background-color: #FFE5E5;">
        <div class="d-flex justify-content-between w-100">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./homePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contactPage.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logoutPage.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cartPage.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>

        <a id="btnEmpty" href="cartPage.php?action=empty">Empty Cart</a>
        <?php
        if (isset($_SESSION["cart_item"])) {
            $total_quantity = 0;
            $total_price = 0;
            ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Type</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["Product Price"];

                        ?>
                        <tr>
                            <td><img src="./images/<?php echo $item["filename"]; ?>" class="cart-item-image" /><?php echo $item["Product Name"]; ?>
                            <td style="text-align:right;">
                                <?php echo $item["Product Type"]; ?>
                            </td>
                            <td style="text-align:right;">
                                <?php echo $item["quantity"]; ?>
                            </td>
                            <td style="text-align:right;">
                                <?php echo "$ " . $item["Product Price"]; ?>
                            </td>

                            <td style="text-align:right;">
                                <?php echo "$ " . number_format($item_price, 2); ?>
                            </td>
                            <td style="text-align:center;"><a
                                    href="cartPage.php?action=remove&Product Code=<?php echo $item["Product Code"]; ?>"
                                    class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                        </tr>
                        <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["Product Price"] * $item["quantity"]);


                    }
                    $_SESSION['total_price'] = $total_price;
                    ?>

                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right">
                            <?php echo $total_quantity; ?>
                        </td>

                        <td align="right" colspan="2"><strong>
                                <?php echo "$ " . number_format($total_price, 2); ?>
                            </strong></td>

                        <td><a id="checkoutBtn" href="checkoutPage.php"
                                style="background-color: #ffffff; border: #00d01c 1px solid; padding: 5px 10px; color: #00d01c; float: left; text-decoration: none; border-radius: 3px; margin: 10px 0px;">Checkout</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php
        } else {
            ?>
            <div class="no-records">Your Cart is Empty</div>
            <?php
        }
        ?>
    </div>

    <div id="product-grid">
        <div class="txt-heading">Products</div>
        <?php

        $product_array = $db_handle->runQuery("SELECT products.*, product_images.*
                                       FROM products 
                                       INNER JOIN product_images 
                                       ON products.`Product Code` = product_images.`productCode` 
                                       ORDER BY products.`Product Code` ASC");


        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
                ?>
                <div class="product-item">
                    <form method="post"
                        action="cartPage.php?action=add&Product Code=<?php echo $product_array[$key]["Product Code"]; ?>">
                        <div class="product-image"><img src="./images/<?php echo $product_array[$key]["filename"]; ?>"
                                width="150px">
                        </div>

                        <div class="product-tile-footer">
                            <div class="product-title">
                                <?php echo $product_array[$key]["Product Name"]; ?>
                            </div>
                            <div class="product-price">
                                <?php echo "$" . $product_array[$key]["Product Price"]; ?>
                            </div>
                            <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1"
                                    size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                        </div>
                    </form>

                </div>

                <?php
            }
        }
        ?>
    </div>

</body>

</html>