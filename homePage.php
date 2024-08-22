<!DOCTYPE html>
<html>

    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./home.css">
        <link rel="stylesheet" type="text/css" href="style.css">

        <script type="text/javascript" src="script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

        <script src="jquery.mousewheel.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
            integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <!-- Hero -->
    <section class="et-hero-tabs">
        <h1>K&K Electronics</h1>
        <h3>"Connecting you to cutting-edge technology"!</h3>
        <div class="split-slideshow">
            <div class="slideshow">
                <div class="slider">
                    <!-- <div class="item">
                        <img src="./images/image1.jpg" />
                    </div> -->
                    <div class="item">
                        <img src="./images/image2.jpg" />
                    </div>
                    <!-- <div class="item">
                        <img src="./images/image3.jpg" />
                    </div>
                    <div class="item">
                        <img src="./images/image4.jpg" />
                    </div> -->
                </div>
            </div>
        </div>
        <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href="#tab-home">Home</a>
            <a class="et-hero-tab" href="#tab-sale">Sale!</a>
            <a class="et-hero-tab" href="#tab-login">Login</a>
            <a class="et-hero-tab" href="#tab-aboutus">About Us</a>
            <a class="et-hero-tab" href="#tab-contact">Contact</a>
            <span class="et-hero-tab-slider"></span>
        </div>
    </section>

    <div class="et-main">
        <section class="et-slide" id="tab-home">
            <a href="./homePage.php">
                <h1>Home Page</h1>
            </a>
            <h3>Welcome to K&K Electronics!</h3>
        </section>

        <section class="et-slide" id="tab-sale">
            <h1>Sale!</h1>
            <h3>Check Out Our Sale!</h3>
            <div class="container">
                <div class="item">
                    <a href="#"
                        onclick="displayInfo('./images/nintendoswitch.jpg','Nintendo Switch','Type: Gaming Consoles', 'Has Pre-Installed Games','Nintendo Inc.','952-121-4343', 'helpnintendoInc@email.com')">
                        <img src="./images/nintendoswitch.jpg" alt="Item 4">
                    </a>
                    <p><b>On Sale!</b></p>
                    <p>Price: $12.99</p>
                    <p>Manufacturer: Nintendo Inc.</p>
                </div>

                <div class="item">
                    <a href="#"
                        onclick="displayInfo('./images/psp.jpg','PSP 2012 Model','Type: Gaming Consoles', 'Has Pre-Installed Games','Samsung Ltd.','945-675-3421', 'vendorSamsungLtd@email.com')">
                        <img src="./images/psp.jpg" alt="Item 5">
                    </a>
                    <p><b>On Sale!</b></p>
                    <p>Price: $8.99</p>
                    <p>Manufacturer: Samsung Ltd.</p>
                </div>

                <div class="item">
                    <a href="#"
                        onclick="displayInfo('./images/samsung23.jpg.png','Samsung S23 Phone','Type: Phones', '256 GB Available Only', 'Samsung Ltd.','945-675-3421', 'vendorSamsungLtd@email.com')">
                        <img src="./images/samsung23.jpg.png" alt="Item 6">
                    </a>
                    <p><b>On Sale!</b></p>
                    <p>Price: $26.99</p>
                    <p>Manufacturer: Samsung Ltd.</p>
                </div>

                <div class="item">
                    <a href="#"
                        onclick="displayInfo('./images/samsunga30.jpg','Samsung A30 Phone','Type: Phones', '64 GB Available Only', 'Samsung Ltd.','945-675-3421', 'vendorSamsungLtd@email.com')">
                        <img src="./images/samsunga30.jpg" alt="Item 7">
                    </a>
                    <p><b>On Sale!</b></p>
                    <p>Price: $24.99</p>
                    <p>Manufacturer: Samsung Ltd.</p>
                </div>

                <div class="item">
                    <a href="#"
                        onclick="displayInfo('./images/intelDesktop.png','Intel Desktop 2023','Type: Electronics', '16GB RAM & 512GB SSD w/ 20 Inch Monitor','Google Inc.','234-343-9090', 'GoogleServicesLtd@email.com')">
                        <img src="./images/intelDesktop.png" alt="Item 8">
                    </a>
                    <p><b>On Sale!</b></p>
                    <p>Price: $96.99</p>
                    <p>Manufacturer: Google Inc.</p>
                </div>
            </div>
        </section>

        <section class="et-slide" id="tab-login">
            <a href="./loginPage.php">
                <h1>Login</h1>
            </a>
            <h3>Wanna Join? Click Login!</h3>
        </section>

        <section class="et-slide page" id="tab-aboutus">
            <a href="./about_us.php">
                <h1>About Us</h1>
            </a>
            <h3>Click Here to Know More About Our Dedicated Team of Developers!</h3>
        </section>

        <section class="et-slide" id="tab-contact">
            <a href="./contactPage.php">
                <h1>Contact</h1>
            </a>
            <h3>Feel Free to Leave a Feedback to Better Improve Our Services!</h3>
        </section>
    </div>

    <footer id="footer" class="footer-m">
        <p class="copyright">
            2023 - All rights reserved
        </p>
    </footer>

</html>