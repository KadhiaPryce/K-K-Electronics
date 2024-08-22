<?php

session_start();

if (isset($_SESSION['errFlag'])) {
    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errName'] = "";
    $_SESSION['errEmail'] = "";
    $_SESSION['errDescription'] = "";

    $_SESSION['name'] = "";
    $_SESSION['email'] = "";
    $_SESSION['description'] = "";
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Contact Us Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="contact.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>
        <h1 style="font-family: Malaga, serif; text-align:left">K&K Electronics</h1>
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
                            <a class="nav-link" href="./loginPage.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./registerPage.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./cartPage.php">Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 style="text-align:center">Contact Us</h2>
                            <form method="post" action="contactValidation.php">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter name" value="<?php echo $_SESSION['name']; ?>" />
                                    <?php echo $_SESSION['errName']; ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter email" value="<?php echo $_SESSION['email']; ?>" />
                                    <?php echo $_SESSION['errEmail']; ?>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="5"
                                        value="<?php echo $_SESSION['description']; ?>"></textarea>
                                    <?php echo $_SESSION['errDescription']; ?>
                                </div>
                                <br>
                                <center><button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>