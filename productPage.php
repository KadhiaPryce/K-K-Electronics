<?php

session_start();

if (isset($_SESSION['errFlag'])) {

    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errProductname'] = "";
    $_SESSION['errProductcode'] = "";
    $_SESSION['errProducttype'] = "";
    $_SESSION['errProductdescription'] = "";
    $_SESSION['errManufacturer'] = "";
    $_SESSION['errProductprice'] = "";
    $_SESSION['errProductquantity'] = "";
    $_SESSION['errSalesprice'] = "";
    $_SESSION['errProductquantity'] = "";
    $_SESSION['errProductimage'] = "";

    $_SESSION['productName'] = "";
    $_SESSION['productCode'] = "";
    $_SESSION['productType'] = "empty";
    $_SESSION['productDescription'] = "";
    $_SESSION['manufacturer'] = "";
    $_SESSION['productImage'] = "";
    $_SESSION['productPrice'] = "";
    $_SESSION['salesPrice'] = "";
    $_SESSION['productQuantity'] = "";

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="product.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h1 style="font-family: Malaga, serif; text-align:left">K&K Electronics</h1><br>
    <nav class="navbar navbar-expand-lg navbar-light navbar-expand-sm" style="background-color: #FFE5E5;">
        <div class="d-flex justify-content-between w-100">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./homePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./productPage.php">Products</a>
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
                        <a class="nav-link" href="./registerPage.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cartPage.php">Cart</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-end">
                    <form class="form-inline" id="search-form" method="post" action="productDatabase.php">
                        <label for="search">Search:</label>
                        <input class="form-control" type="text" id="search">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type">
                            <option value="">--All--</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Phones">Phones</option>
                            <option value="Gaming Consoles">Gaming Consoles</option>
                        </select>
                        <label for="price-range">Price Range:</label>
                        <select class="form-control" id="salesPrice" name="salesPrice">
                            <option value="">--All--</option>
                            <option value="$0-$9.99">$0-$9.99</option>
                            <option value="$10-$19.99">$10-$19.99</option>
                            <option value="$20-$29.99">$20-$29.99</option>
                            <option value="$30-$39.99">$30-$39.99</option>
                            <option value="$40+">$40+</option>
                        </select>
                        <button type="submit" name="search" class="btn btn-primary ml-2">Search</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <br><br>

    <div class="container" style="margin-right: 100%;">
        <div class="row">
            <div class="col-md-4">
                <h2>Product Form</h2>
                <div class="productForm">
                    <form method="post" action="productDatabase.php" enctype="multipart/form-data">
                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" name="productName"
                            value="<?php echo $_SESSION['productName']; ?>" />
                        <?php echo $_SESSION['errProductname']; ?><br>

                        <label for="productCode">Product Code</label>
                        <input type="text" id="productCode" name="productCode"
                            value="<?php echo $_SESSION['productCode']; ?>" />
                        <?php echo $_SESSION['errProductcode']; ?><br>

                        <label for="productType">Product Type</label>
                        <select id="productType" name="productType">
                            <option value="empty" <?php if ($_SESSION['productType'] == 'empty')
                                echo 'selected'; ?>>~Select an
                                Option~</option>
                            <option value="Electronics" <?php if ($_SESSION['productType'] == 'Electronics')
                                echo 'selected'; ?>>
                                Electronics
                            </option>
                            <option value="Phones" <?php if ($_SESSION['productType'] == 'Phones')
                                echo 'selected'; ?>>Phones
                            </option>
                            <option value="Gaming Consoles" <?php if ($_SESSION['productType'] == 'Gaming Consoles')
                                echo 'selected'; ?>>
                                Gaming Consoles
                            </option>
                        </select>
                        <?php echo $_SESSION["errProducttype"]; ?><br>

                        <label for="productDescription">Product Description</label>
                        <textarea id="productDescription" name="productDescription"
                            rows="5"><?php echo $_SESSION['productDescription']; ?></textarea>
                        <?php echo $_SESSION['errProductdescription']; ?><br>

                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" id="manufacturer" name="manufacturer"
                            value="<?php echo $_SESSION['manufacturer']; ?>" />
                        <?php echo $_SESSION['errManufacturer']; ?><br>

                        <label for="productImage">Product Image</label>
                        <input type="file" id="productImage" name="productImage[]" accept="images/*" multiple><br>
                        <?php echo $_SESSION['errProductimage']; ?><br>

                        <br>
                        <label for="productPrice">Product Price</label><br>
                        <input type="price" id="productPrice" name="productPrice"
                            value="<?php echo $_SESSION['productPrice']; ?>" />
                        <?php echo $_SESSION['errProductprice']; ?><br>

                        <br>
                        <label for="salesPrice">Sales Price</label><br>
                        <input type="price" id="salesPrice" name="salesPrice"
                            value="<?php echo $_SESSION['salesPrice']; ?>" />
                        <?php echo $_SESSION['errSalesprice']; ?><br>

                        <br>
                        <label for="productQuantity">Product Quantity</label><br>
                        <input type="number" id="productQuantity" name="productQuantity"
                            value="<?php echo $_SESSION['productQuantity']; ?>" />
                        <?php echo $_SESSION['errProductquantity']; ?><br><br>

                        <div class="button-container" style="text-align: center;">
                            <button type="submit" name="submit" id="add-btn">Add</button>
                            <button type="submit" name="update" id="update-btn">Update</button>
                            <button type="submit" name="delete" id="delete-btn">Delete</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <h2>Product Gallery</h2>
                <?php
                include 'connect.php';

                // Display all products
                $sql = "SELECT p.*, i.filename AS 'Product Image' FROM products p LEFT JOIN product_images i ON p.`Product Code` = i.`productCode`";
                $result = mysqli_query($conn, $sql);

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

                mysqli_close($conn);

                ?>
            </div>
        </div>
    </div>

</body>

</html>