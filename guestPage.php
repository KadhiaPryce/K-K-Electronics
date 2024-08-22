<!DOCTYPE html>
<html>

<head>
    <title>Guest Viewing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="guest.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="./guest.js"></script>

</head>
<h1 style="font-family: Malaga, serif;">Welcome to K&K Electronics!</h1>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-expand-sm" style="background-color: #FFE5E5;">
        <div class="d-flex justify-content-between w-100">
            <div class="d-flex">
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
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
                        <a class="nav-link" href="./cartPage.php">Cart</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <form class="form-inline " id="search-form" method="post"
                    onsubmit="event.preventDefault(); searchItems()">
                    <label for="search">Search:</label>
                    <input class="form-control" type="text" id="search" name="search">

                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type">
                        <option value="">--All--</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Phones">Phones</option>
                        <option value="Gaming Consoles">Gaming Consoles</option>
                    </select>

                    <label for="manufacturer">Manufacturer:</label>
                    <select class="form-control" id="manufacturer" name="manufacturer">
                        <option value="">--All--</option>
                        <option value="Huawei Inc.">Huawei Inc.</option>
                        <option value="Apple Inc.">Apple Inc.</option>
                        <option value="Nintendo Inc.">Nintendo Inc.</option>
                        <option value="Samsung Ltd.">Samsung Ltd.</option>
                        <option value="Google Inc.">Google Inc.</option>
                    </select>

                    <label for="price-range">Price Range:</label>
                    <select class="form-control" id="price-range" name="price-range">
                        <option value="">--All--</option>
                        <option value="$0-$9.99">$0-$9.99</option>
                        <option value="$10-$19.99">$10-$19.99</option>
                        <option value="$20-$29.99">$20-$29.99</option>
                        <option value="$30-$39.99">$30-$39.99</option>
                        <option value="$40.00+">$40.00+</option>
                    </select>
                    <button type="button" onclick="searchItems()">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="item" data-name="Huawei Watch 2" data-type="Electronics" data-manufacturer="Huawei Inc."
            data-price="$10.99">
            <a href="#"
                onclick="displayInfo('./images/applewatch.jpg','Huawei Watch 2','Type: Electronics', 'Colours: Green & Pink','Huawei Inc.','876-123-4567', 'huaweiInc@email.com')">
                <img src="./images/applewatch.jpg" alt="Item 1">
            </a>
            <p>Price: $10.99</p>
            <p>Manufacturer: Huawei Inc.</p>
        </div>

        <div class="item" data-name="IPhone 13" data-type="Phones" data-manufacturer="Apple Inc." data-price="$39.99">
            <a href="#"
                onclick="displayInfo('./images/iphone13.png','IPhone 13','Type: Phones', '256 & 512 GB Available','Apple Inc.','547-456-7786', 'appleInc@email.com')">
                <img src="./images/iphone13.png" alt="Item 2">
            </a>
            <p>Price: $39.99</p>
            <p>Manufacturer: Apple Inc.</p>
        </div>

        <div class="item" data-name="IPhone 12" data-type="Phones" data-manufacturer="Apple Inc." data-price="$24.99">
            <a href="#"
                onclick="displayInfo('./images/iphone12.jpg','IPhone 12','Type: Phones', '256 & 512 GB Available', 'Apple Inc.','326-165-4667', 'appleInc@email.com')">
                <img src="./images/iphone12.jpg" alt="Item 3">
            </a>
            <p>Price: $24.99</p>
            <p>Manufacturer: Apple Inc.</p>
        </div>

        <div class="item" data-name="Nintendo Switch" data-type="Gaming Consoles" data-manufacturer="Nintendo Inc."
            data-price="$12.99">
            <a href="#"
                onclick="displayInfo('./images/nintendoswitch.jpg','Nintendo Switch','Type: Gaming Consoles', 'Has Pre-Installed Games','Nintendo Inc.','952-121-4343', 'helpnintendo@email.com')">
                <img src="./images/nintendoswitch.jpg" alt="Item 4">
            </a>
            <p><b>On Sale!</b></p>
            <p>Price: $12.99</p>
            <p>Manufacturer: Nintendo Inc.</p>
        </div>

        <div class="item" data-name="PSP 2012 Model" data-type="Gaming Consoles" data-manufacturer="Samsung Ltd."
            data-price="$8.99">
            <a href="#"
                onclick="displayInfo('./images/psp.jpg','PSP 2012 Model','Type: Gaming Consoles', 'Has Pre-Installed Games','Samsung Ltd.','945-675-3421', 'vendorSamsungLtd@email.com')">
                <img src="./images/psp.jpg" alt="Item 5">
            </a>
            <p><b>On Sale!</b></p>
            <p>Price: $8.99</p>
            <p>Manufacturer: Samsung Ltd.</p>
        </div>

        <div class="item" data-name="Samsung S23 Phone" data-type="Phones" data-manufacturer="Samsung Ltd."
            data-price="$26.99">
            <a href="#"
                onclick="displayInfo('./images/samsung23.jpg.png', 'Samsung S23 Phone', 'Type: Phones', '256 GB Available Only', 'Samsung Ltd.', '945-675-3421', 'vendorSamsungLtd@email.com')">
                <img src="./images/samsung23.jpg.png" alt="Item 6">
            </a>
            <p><b>On Sale!</b></p>
            <p>Price: $26.99</p>
            <p>Manufacturer: Samsung Ltd.</p>
        </div>

        <div class="item" data-name="Samsung A30 Phone" data-type="Phones" data-manufacturer="Samsung Ltd."
            data-price="$24.99">
            <a href="#"
                onclick="displayInfo('./images/samsunga30.jpg', 'Samsung A30 Phone', 'Type: Phones', '64 GB Available Only', 'Samsung Ltd.', '945-675-3421', 'vendorSamsungLtd@email.com')">
                <img src="./images/samsunga30.jpg" alt="Item 7">
            </a>
            <p><b>On Sale!</b></p>
            <p>Price: $24.99</p>
            <p>Manufacturer: Samsung Ltd.</p>
        </div>

        <div class="item" data-name="Intel Desktop 2023" data-type="Electronics" data-manufacturer="Google Inc."
            data-price="$96.99">
            <a href="#"
                onclick="displayInfo('./images/intelDesktop.png', 'Intel Desktop 2023', 'Type: Electronics', '16GB RAM & 512GB SSD w/ 20 Inch Monitor', 'Google Inc.', '234-343-9090', 'GoogleServicesLtd@email.com')">
                <img src="./images/intelDesktop.png" alt="Item 8">
            </a>
            <p><b>On Sale!</b></p>
            <p>Price: $96.99</p>
            <p>Manufacturer: Google Inc.</p>
        </div>

        <div class="item" data-name="FitBit Watch Pro" data-type="Electronics" data-manufacturer="Google Inc."
            data-price="$8.99">
            <a href="#"
                onclick="displayInfo('./images/fitbit.jpg', 'FitBit Watch Pro', 'Type: Electronics', 'Has Waterproof features & Colours Available: Blue & Black!', 'Google Inc.', '234-343-9090', 'GoogleServicesLtd@email.com')">
                <img src="./images/fitbit.jpg" alt="Item 9">
            </a>
            <p>Price: $8.99</p>
            <p>Manufacturer: Google Inc.</p>
        </div>

        <div class="item" data-name="Nintendo 3DS" data-type="Electronics" data-manufacturer="Google Inc."
            data-price="$6.99">
            <a href="#"
                onclick="displayInfo('./images/3ds.jpg','Nintendo 3DS','Type: Gaming Consoles', 'Has Pre-Installed Games & Colours Available: White, Blue & Black','Nintendo Inc.','952-121-4343', 'helpnintendoInc@email.com')">
                <img src="./images/3ds.jpg" alt="Item 10">
            </a>
            <p>Price: $6.99</p>
            <p>Manufacturer: Nintendo Inc.</p>
        </div>
    </div>
</body>

</html>