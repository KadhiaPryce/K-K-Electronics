<!DOCTYPE html>
<html>

<head>
    <title>Orders Database</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="orders.css">
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
        <br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Orders</h2>
                <?php

                session_start();
                require_once("connect.php");
                $sql = "SELECT * FROM orders";
                $result = mysqli_query($conn, $sql);


                echo "<table>
      <tr>
        <th>Order Number</th>
        <th>Order Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Customer Email</th>
        <th>Customer Address</th>
        <th>Products</th>
      </tr>";


                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
              <td>" . $row["Order Number"] . "</td>
              <td>" . $row["Order Name"] . "</td>
              <td>" . $row["Date"] . "</td>
              <td>" . $row["Time"] . "</td>
              <td>" . $row["Customer Email"] . "</td>
              <td>" . $row["Customer Address"] . "</td>
              <td>" . $row["Products"] . "</td>
              </tr>";
                }

                echo "</table>";
                mysqli_close($conn);
                ?>

</body>

</html>