<?php

session_start();

if (isset($_SESSION['errFlag'])) {

    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errEmails'] = "";
    $_SESSION['errPassword'] = "";

    $_SESSION['emails'] = "";
    $_SESSION['password'] = "";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
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
                        <h2>Login</h2>
                        <form action="loginValidation.php" method="post">
                            <label for="emails">Email address</label>
                            <input type="text" id="emails" name="emails" placeholder="Enter email"
                                value="<?php echo $_SESSION['emails']; ?>" />
                            <?php echo $_SESSION['errEmails']; ?>
                            <br>

                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter password"
                                value="<?php echo $_SESSION['password']; ?>" />
                            <?php echo $_SESSION['errPassword']; ?>
                            <br>
                            <center><input type="submit" name="submit" value="Login"></center>
                            <br>
                            <div>
                                Don't have an account? Click
                                <a href="guestPage.php"> Here!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>