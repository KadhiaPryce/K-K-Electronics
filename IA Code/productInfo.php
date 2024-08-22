<?php

session_start();

if (isset($_SESSION['errFlag'])) {

    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errProductname'] = "";
    $_SESSION['errProductcode'] = "";
    $_SESSION['errProducttype'] = "";
    $_SESSION['errProductdescription'] = "";

    $_SESSION['product-name'] = "";
    $_SESSION['product-code'] = "";
    $_SESSION['product-type'] = "empty";
    $_SESSION['product-description'] = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="ia.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap"
        rel="stylesheet">
</head>

<body>


    <!-- Header -->
    <header>

        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <a class="nav-link" href="#">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <div class="hero">
        <h1>Online Store Inventory</h1>
    </div>

    <!-- Featured Products -->
    <section class="featured-products">
        <h2>Featured Products</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 15%">Product Image</th>
                    <th style="width: 10%">Product Name</th>
                    <th style="width: 10%">Product Code</th>
                    <th style="width: 10%">Product Type</th>
                    <th style="width: 35%">Description</th>
                    <th style="width: 5%">Price</th>
                    <th style="width: 5%">Quantity</th>
                    <th style="width: 5%">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="applewatch.jpg" alt="Product 1" class="small-image"></td>
                    <td>Product 1</td>
                    <td>C-0410</td>
                    <td>Electronics</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>$199.99</td>
                    <td>1</td>
                    <td>
                        <input type="submit" value="Remove"
                            style="background-color: red; color: white; font-weight: bold; padding: 5px 10px; border-radius: 10%; cursor: pointer;">
                    </td>
                </tr>
                <tr>
                    <td><img src="applewatch.jpg" alt="Product 2" class="small-image"></td>
                    <td>Product 2</td>
                    <td>C-0412</td>
                    <td>Electronics</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>$199.99</td>
                    <td>1</td>
                    <td>
                        <input type="submit" value="Remove"
                            style="background-color: red; color: white; font-weight: bold; padding: 5px 10px; border-radius: 10%; cursor: pointer;">
                    </td>
                    </td>
                </tr>
                <tr>
                    <td><img src="applewatch.jpg" alt="Product 3" class="small-image"></td>
                    <td>Product 3</td>
                    <td>C-0414</td>
                    <td>Electronics</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>$199.99</td>
                    <td>1</td>
                    <td>
                        <input type="submit" value="Remove"
                            style="background-color: red; color: white; font-weight: bold; padding: 5px 10px; border-radius: 10%; cursor: pointer;">
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>


    <!-- Products Page -->
    <section class="products">
        <h2>Add Products</h2>
        <form method="post" action="go_back.php">
            <!-- <form method="post" action="registerProduct.php"> -->
            <label for="product-name">Product Name:</label><br>

            <input type="text" id="product-name" name="product-name" value="<?php echo $_SESSION['product-name']; ?>" />
            <?php echo $_SESSION['errProductname']; ?>
            <br><br>

            <label for="product-code">Product Code:</label><br>
            <input type="text" id="product-code" name="product-code" value="<?php echo $_SESSION['product-code']; ?>" />
            <?php echo $_SESSION['errProductcode']; ?><br><br>




            <label for="product-type">Product Type:</label><br>
            <select id="product-type" name="product-type">
                <option value="empty" <?php if ($_SESSION['product-type'] == 'empty')
                    echo 'selected'; ?>>~Select an
                    Option~</option>
                <option value="Electronics" <?php if ($_SESSION['product-type'] == 'Electronics')
                    echo 'selected'; ?>>
                    Electronics
                </option>
                <option value="Phones" <?php if ($_SESSION['product-type'] == 'Phones')
                    echo 'selected'; ?>>Phones
                </option>
                <option value="Gaming Consoles" <?php if ($_SESSION['product-type'] == 'Gaming Consoles')
                    echo 'selected'; ?>>
                    Gaming Consoles
                </option>
            </select>
            <?php echo $_SESSION["errProducttype"]; ?><br><br>

            <label for="product-description">Product Description:</label><br>
            <textarea id="product-description" name="product-description" rows="4"
                cols="50"><?php echo $_SESSION['product-description']; ?></textarea>
            <?php echo $_SESSION['errProductdescription']; ?><br><br>


            <input type="submit" name="submit" value="Submit">
        </form>


        <footer>
            <p>&copy; My Online Store, 2023</p>
        </footer>

</body>

</html>