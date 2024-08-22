<?php
if (isset($_POST["submit"])) {
    session_start();
    $_SESSION['errFlag'] = 0;

    // Get the form data
    $productName = $_POST['productName'];
    $productCode = $_POST['productCode'];
    $productType = $_POST['productType'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $salesPrice = $_POST['salesPrice'];
    $productQuantity = $_POST['productQuantity'];
    $manufacturer = $_POST['manufacturer'];

    // Handle file upload
    if (isset($_FILES['productImage'])) {
        $productImage = $_FILES['productImage'];
        $_SESSION['productImage'] = $productImage;
    }

    // Retrieve uploaded product images information from session
    $productImage = isset($_SESSION['productImage']) ? $_SESSION['productImage'] : null;

    // Process the uploaded images or display them as needed

    if (empty($productName)) {
        $_SESSION['errProductname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['productName'] = $productName;
    } else {
        if (preg_match("/^[a-zA-Z 0-9\W]+$/", $productName)) {
            $_SESSION['productName'] = $productName;
            $_SESSION['errProductname'] = "";
        } else {
            $_SESSION['errProductname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Name can only contain letters and numbers!</span> <br><br>';
            $_SESSION['errFlag']++;
            $_SESSION['productName'] = $productName;
        }
    }


    if (empty($productCode)) {
        $_SESSION['errProductcode'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Code should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['productCode'] = $productCode;
    } else {
        if (preg_match("/^[A-Z]{1}[-]{1}[0-9]{4}+$/", $productCode)) {
            $_SESSION['productCode'] = $productCode;
            $_SESSION['errProductcode'] = "";
        } else {
            $_SESSION['errProductcode'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Code should start with a Capital Letter, hyphen and numbers!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['productCode'] = $productCode;
        }
    }


    if ($productType === 'empty') {
        $_SESSION['errProducttype'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Type should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['productType'] = $productType;
    } elseif (!empty($productType)) {
        $_SESSION['productType'] = $productType;
        $_SESSION['errProducttype'] = "";
    }


    if (empty($productDescription)) {
        $_SESSION['errProductdescription'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Description should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['productDescription'] = $productDescription;
    } else {
        if (preg_match("/^[A-Z][\w\W]*$/", $productDescription)) {
            $_SESSION['productDescription'] = $productDescription;
            $_SESSION['errProductdescription'] = "";
        } else {
            $_SESSION['errProductdescription'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Description should start with a capital letter!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['productDescription'] = $productDescription;
        }
    }


    if (empty($manufacturer)) {
        $_SESSION['errManufacturer'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Manufacturer should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['manufacturer'] = $manufacturer;
    } else {
        if (preg_match("/^[a-zA-Z 0-9\W]+$/", $manufacturer)) {
            $_SESSION['manufacturer'] = $manufacturer;
            $_SESSION['errManufacturer'] = "";
        } else {
            $_SESSION['errManufacturer'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Manufacturer can only contain letters and numbers!</span> <br><br>';
            $_SESSION['errFlag']++;
            $_SESSION['manufacturer'] = $manufacturer;
        }
    }


    if (empty($productPrice)) {
        $_SESSION['errProductprice'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Price should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['productPrice'] = $productPrice;
    } else {
        if (preg_match("/^\d+(\.\d{1,2})?$/", $productPrice)) {
            $_SESSION['productPrice'] = $productPrice;
            $_SESSION['errProductprice'] = "";
        } else {
            $_SESSION['errProductprice'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Price should be a valid number with up to two decimal places!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['productPrice'] = $productPrice;
        }
    }

    if (empty($salesPrice)) {
        $_SESSION['errSalesprice'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Sales Price should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['salesPrice'] = $salesPrice;
    } else {
        if (preg_match("/^\d+(\.\d{1,2})?$/", $salesPrice)) {
            $_SESSION['salesPrice'] = $salesPrice;
            $_SESSION['errSalesprice'] = "";
        } else {
            $_SESSION['errSalesprice'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">sales Price should be a valid number with up to two decimal places!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['salesPrice'] = $salesPrice;
        }
    }

    if (empty($productQuantity)) {
        $_SESSION['errProductquantity'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Quantity should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['productQuantity'] = $productQuantity;
    } else {
        if (preg_match("/^\d+$/", $productQuantity)) {
            $_SESSION['productQuantity'] = $productQuantity;
            $_SESSION['errProductquantity'] = "";
        } else {
            $_SESSION['errProductquantity'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Quantity should be a valid whole number!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['productQuantity'] = $productQuantity;
        }
    }

    // Check if file was uploaded successfully
    // Process the uploaded images or display them as needed
    if ($productImages) {
        $numFiles = count($productImages['name']);
        for ($i = 0; $i < $numFiles; $i++) {
            // Check if file was uploaded successfully
            if ($productImages['error'][$i] == UPLOAD_ERR_OK) {
                $tempFile = $productImages['tmp_name'][$i];
                $fileName = $productImages['name'][$i];
                $fileSize = $productImages['size'][$i];
                $fileType = $productImages['type'][$i];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Define allowed file extensions and max file size
                $allowedExt = array('jpg', 'jpeg', 'png', 'gif');
                $maxSize = 1073741824; // 1 GB

                // Check if file extension and size are valid
                if (in_array($fileExt, $allowedExt) && $fileSize <= $maxSize) {
                    // Move uploaded file to destination folder
                    $uploadDir = './images/';
                    $newFileName = uniqid('product_', true) . '.' . $fileExt;
                    $targetFile = $uploadDir . $newFileName;
                    move_uploaded_file($tempFile, $targetFile);

                    // Save product image filename in session variable
                    $_SESSION['productImages'][$i] = $newFileName;
                } else {
                    $_SESSION['errProductimage'][$i] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Image should be a valid image file!</span>';
                    $_SESSION['errFlag']++;
                }
            } else {
                $_SESSION['errProductimage'][$i] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Product Image upload failed!</span>';
                $_SESSION['errFlag']++;
            }
        }
    }



}

?>