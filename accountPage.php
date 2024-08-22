<?php

session_start();

if (isset($_SESSION['errFlag'])) {

    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errFirstname'] = "";
    $_SESSION['errLastname'] = "";
    $_SESSION['errRole'] = "";
    $_SESSION['errUsername'] = "";

    $_SESSION['first-name'] = "";
    $_SESSION['last-name'] = "";
    $_SESSION['role'] = "empty";
    $_SESSION['username'] = "";

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Account Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="account.css">
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
                        <a class="nav-link" href="./cartPage.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Account Form</h2>
                <form action="accountDatabase.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control"
                            value="<?php echo $_SESSION['username']; ?>" />
                        <?php echo $_SESSION['errUsername']; ?>
                    </div>
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name"
                        value="<?php echo $_SESSION['first-name']; ?>" />
                    <?php echo $_SESSION['errFirstname']; ?>

                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" value="<?php echo $_SESSION['last-name']; ?>" />
                    <?php echo $_SESSION['errLastname']; ?>

                    <label for="role">Role</label>
                    <select id="role" name="role">
                        <option value="empty" <?php if ($_SESSION['role'] == 'empty')
                            echo 'selected'; ?>>Select role
                        </option>
                        <option value="vendor" <?php if ($_SESSION['role'] == 'vendor')
                            echo 'selected'; ?>>Vendor</option>
                        <option value="admin" <?php if ($_SESSION['role'] == 'admin')
                            echo 'selected'; ?>>Admin</option>

                    </select>
                    <?php echo $_SESSION["errRole"]; ?> <br>

                    <div class="button-container">
                        <button type="submit" name="submit" id="add-btn">Add</button>
                        <button type="submit" name="update" id="update-btn">Update</button>
                        <button type="submit" name="delete" id="delete-btn">Delete</button>
                    </div>
                </form>

            </div>


            <div class="col-md-6">
                <h2>Account Database</h2>
                <?php
                include 'connect.php';
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                echo "<table>";
                echo "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Role</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["Username"] . "</td><td>" . $row["Firstname"] . "</td><td>" . $row["Lastname"] . "</td><td>" . $row["Role"] . "</td></tr>";
                }
                echo "</table>";
                mysqli_close($conn);
                ?>

            </div>
        </div>
    </div>

</body>

</html>