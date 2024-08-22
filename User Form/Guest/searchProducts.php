<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="search.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Search Product</title>
</head>

<body>

    <form action="search.php" method="get">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name">

        <label for="type">Product Type:</label>
        <select id="type" name="type">
            <option value="">--Select Type--</option>
            <option value="electronics">Electronics</option>
            <option value="clothing">Clothing</option>
            <option value="home">Home</option>
        </select>

        <label for="manufacturer">Manufacturer:</label>
        <input type="text" id="manufacturer" name="manufacturer">

        <label for="min_price">Minimum Price:</label>
        <input type="number" id="min_price" name="min_price">

        <label for="max_price">Maximum Price:</label>
        <input type="number" id="max_price" name="max_price">

        <button type="submit">Search</button>
    </form>

</body>

<?php
// Retrieve search parameters
// $name = $_GET['name'];
// $type = $_GET['type'];
// $manufacturer = $_GET['manufacturer'];
// $min_price = $_GET['min_price'];
// $max_price = $_GET['max_price'];

// // Build query
// $query = "SELECT * FROM products WHERE 1=1";

// if (!empty($name)) {
//   $query .= " AND name LIKE '%$name%'";
// }

// if (!empty($type)) {
//   $query .= " AND type = '$type'";
// }

// if (!empty($manufacturer)) {
//   $query .= " AND manufacturer LIKE '%$manufacturer%'";
// }

// if (!empty($min_price)) {
//   $query .= " AND sales_price >= $min_price";
// }

// if (!empty($max_price)) {
//   $query .= " AND sales_price <= $max_price";
// }

// // Execute query and display results
// // ...
?>


<!-- // Execute query and display results
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>Name</th><th>Type</th><th>Manufacturer</th><th>Sales Price</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['manufacturer'] . "</td>";
    echo "<td>" . $row['sales_price'] . "</td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "No results found.";
}

mysqli_close($connection); -->


</html>