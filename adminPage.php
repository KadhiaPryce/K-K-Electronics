<!DOCTYPE html>
<html>

<head>
    <title>Admin Viewing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<h1> Welcome Admin
    <!-- <?php session_start();
    echo $_SESSION['firstname']; ?>! -->
</h1>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./homePage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logoutPage.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <a href="accountPage.php">
            <div class="placard account">Account</div>
        </a>
        <a href="productPage.php">
            <div class="placard product">Product</div>
        </a>
        <a href="orderPage.php">
            <div class="placard orders">Orders</div>
        </a>
    </div>
</body>

</html>