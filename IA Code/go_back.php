<!DOCTYPE html>
<html>

<head>
    <title>Nowhere</title>

</head>

<style>
    body {
        background-color: #C8A2C8;
    }
</style>

<body>

    <div id="form_container">
        <div id="footer_2">
            <?php


            if (isset($_POST["submit"])) {
                session_start();
                $_SESSION['errFlag'] = 0;
                // Get the form data
                $productName = $_POST['product-name'];
                $productCode = $_POST['product-code'];
                $productType = $_POST['product-type'];
                $productDescription = $_POST['product-description'];

                // echo "hi";
                if (empty($productName)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Name should not be empty! </p><br>';
                    $_SESSION['errProductname'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Name should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['product-name'] = $productName;
                } else {
                    if (preg_match("/^[a-zA-Z 0-9\W]+$/", $productName)) {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">Product Name: ' . $productName . '</p><br>';
                        $_SESSION['product-name'] = $productName;
                        $_SESSION['errProductname'] = "";
                    } else {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Name can only contain letters and numbers! </p>';
                        $_SESSION['errProductname'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #fff; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Name can only contain letters and numbers!</span> <br><br>';
                        $_SESSION['errFlag']++;
                        $_SESSION['product-name'] = $productName;
                    }
                }
                if (empty($productCode)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Code should not be empty!</p><br>';
                    $_SESSION['errProductcode'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Code should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['product-code'] = $productCode;
                } else {
                    if (preg_match("/^[A-Z]{1}[-]{1}[0-9]{4}+$/", $productCode)) {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">Product Code: ' . $productCode . '</p><br>';
                        $_SESSION['product-code'] = $productCode;
                        $_SESSION['errProductcode'] = "";
                    } else {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Code should start with a Capital Letter, hyphen and numbers!</p><br>';
                        $_SESSION['errProductcode'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Code should start with a Capital Letter, hyphen and numbers!</span>';
                        $_SESSION['errFlag']++;
                        $_SESSION['product-code'] = $productCode;
                    }
                }
                if ($productType === 'empty') {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Type should not be empty!</p><br>';
                    $_SESSION['errProducttype'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Type should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['product-type'] = $productType;
                } elseif (!empty($productType)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">Product Type: ' . $productType . '</p><br>';
                    // Product type is valid
                    $_SESSION['product-type'] = $productType;
                    $_SESSION['errProducttype'] = "";
                }
                if (empty($productDescription)) {
                    echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Description should not be empty!</p><br>';
                    $_SESSION['errProductdescription'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Description should not be empty!</span>';
                    $_SESSION['errFlag']++;
                    $_SESSION['product-description'] = $productDescription;
                } else {
                    if (preg_match("/^[A-Z\s]+[A-Za-z\s\W]*$/", $productDescription)) {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #6c6aa9;text-align:center;">Product Description: ' . $productDescription . '</p><br>';
                        $_SESSION['product-description'] = $productDescription;
                        $_SESSION['errProductdescription'] = "";
                    } else {
                        echo '<p style = "display: inline-block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Description should start with a Capital Letter!</p><br>';
                        $_SESSION['errProductdescription'] = '<span style="display: block; padding: 5px 10px; border: 1px solid #333; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Product Description should start with a Capital Letter!</span>';
                        $_SESSION['errFlag']++;
                        $_SESSION['product-description'] = $productDescription;
                    }
                }

                if ($_SESSION['errFlag'] > 0) {
                    // header("Location: indivi-assign.php");
                } else {
                    // session_destroy();
                }
            }

            ?>

            <div style="display: flex;">
                <a href="./productInfo.php"
                    style="display: inline-block; padding: 10px 20px; background-color: #c86feb; color: #fff; text-decoration: none; border-radius: 5px; margin-right: 10px;">Go
                    Back</a>
                <a href="./costingInfo.php"
                    style="display: inline-block; padding: 10px 20px; background-color: #c86feb; color: #fff; text-decoration: none; border-radius: 5px;">Cost
                    Info</a>
            </div>

        </div>
    </div>
</body>

</html>