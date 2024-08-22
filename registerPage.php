<?php
session_start();

if (isset($_SESSION['errFlag'])) {
    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errFirstname'] = "";
    $_SESSION['errLastname'] = "";
    $_SESSION['errEmailAddress'] = "";
    $_SESSION['errUsername'] = "";
    $_SESSION['errPassword'] = "";
    $_SESSION['errVPassword'] = "";
    $_SESSION['errRole'] = "";

    $_SESSION['firstname'] = "";
    $_SESSION['lastname'] = "";
    $_SESSION['emailaddress'] = "";
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
    $_SESSION['password2'] = "";
    $_SESSION['role'] = "empty";
}

if ($_SESSION['role'] === "admin") {
    $_SESSION['username'] = "admin@website.com";
    $_SESSION['password'] = "MoreandMore#789";
    $_SESSION['password2'] = "MoreandMore#789";
    $disabled = "disabled";
} else {
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
    $disabled = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register.css">
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
                        <h2 class="text-center mb-4">Register</h2>
                        <form action="registerValidation.php" method="post" id="register-form">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" class="form-control"
                                    placeholder="Enter first name" value="<?php echo $_SESSION['firstname']; ?>" />
                                <?php echo $_SESSION['errFirstname']; ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control"
                                    placeholder="Enter last name" value="<?php echo $_SESSION['lastname']; ?>" />
                                <?php echo $_SESSION['errLastname']; ?>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Email</label>
                                <input type="text" id="emailaddress" name="emailaddress" class="form-control"
                                    placeholder="Enter email" value="<?php echo $_SESSION['emailaddress']; ?>" />
                                <?php echo $_SESSION['errEmailAddress']; ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Enter username" value="<?php echo $_SESSION['username']; ?>" />
                                <?php echo $_SESSION['errUsername']; ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter password" value="<?php echo $_SESSION['password']; ?>" ?>
                                <?php echo $_SESSION['errPassword']; ?>
                            </div>
                            <div class="form-group">
                                <label for="password2">Verify Password</label>
                                <input type="password" id="password2" name="password2" class="form-control"
                                    placeholder="Enter password again" value="<?php echo $_SESSION['password2']; ?>" />
                                <?php echo $_SESSION['errVPassword']; ?>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control">

                                    <option value="empty" <?php if ($_SESSION['role'] == 'empty')
                                        echo 'selected'; ?>>Select role
                                    </option>
                                    <option value="vendor" <?php if ($_SESSION['role'] == 'vendor')
                                        echo 'selected'; ?>>Vendor</option>
                                    <option value="admin" <?php if ($_SESSION['role'] == 'admin')
                                        echo 'selected'; ?>>Admin</option>

                                </select>
                                <?php echo $_SESSION["errRole"]; ?>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">Register</button>
                        </form>
                        <div>
                            <br> Already have an account? Click
                            <a href="loginPage.php"> Here!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>