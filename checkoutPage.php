<!-- Checkout Page from https://codepen.io/utbaz/pen/xxzRVqg -->
<?php
session_start();

$total_price = $_SESSION['total_price'];
// $quantity = $_SESSION['quantity'];

if (isset($_SESSION['errFlag'])) {
    unset($_SESSION['errFlag']);
} else {
    $_SESSION['errName'] = "";
    $_SESSION['errEmail'] = "";
    $_SESSION['errAddress'] = "";
    $_SESSION['errCardHolder'] = "";
    $_SESSION['errCardNumber'] = "";
    $_SESSION['errExpire'] = "";
    $_SESSION['errCVC'] = "";

    $_SESSION['name'] = "";
    $_SESSION['email'] = "";
    $_SESSION['address'] = "";
    $_SESSION['card_holder'] = "";
    $_SESSION['card_number'] = "";
    $_SESSION['expire'] = "";
    $_SESSION['cvc'] = "";
}


?>
<html>

<title>Checkout</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="checkout.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


<body>
    <form action="checkoutValidation.php" method="POST">
        <main class="container">
            <div class="main">
                <!-- Shipping Address Section  -->
                <section class="shipping_address">
                    <h2 class="ship_head">Shipping Address</h2>
                    <div class="addresses">

                        <div class="address_primary">
                            <div class="info">
                                <label class="bold" for="name">Name:</label>
                                <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" />
                            </div>
                            <!-- <?php echo $_SESSION['errName']; ?> -->
                            <div class="info">
                                <label class="bold" for="email">Email:</label>
                                <input type="text" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
                            </div>
                            <!-- <?php echo $_SESSION['errEmail']; ?> -->
                            <div class="info">
                                <label class="bold" for="address">Address:</label>
                                <textarea id="address" name="address"
                                    style="height: 39px;"><?php echo $_SESSION['address']; ?></textarea>
                            </div>
                            <!-- <?php echo $_SESSION['errAddress']; ?> -->
                        </div>

                        <!-- </form> -->
                    </div>
                </section>
                <!-- Payment Method Section  -->
                <section class=" payment_method">
                    <h2 class="ship_head">Payment Method</h2>
                    <div class="card_info">
                        <div class="card_head">
                            <h2 class="card_title">Debit or Credit Card</h2>
                        </div>
                        <div class="card_types">
                            <img class="card_img" src="https://cdn-icons-png.flaticon.com/512/349/349221.png" alt="" />
                            <img class="card_img" src="https://cdn-icons-png.flaticon.com/512/349/349230.png" alt="" />
                            <img class="card_img" src="https://cdn-icons-png.flaticon.com/512/349/349228.png" alt="" />
                            <img class="card_img" src="https://img.icons8.com/fluency/512/mastercard.png" alt="" />
                        </div>
                        <!-- <form action="checkoutValidation.php" method="POST"> -->
                        <input type="text" name="card_holder" value="<?php echo $_SESSION['card_holder']; ?>"
                            placeholder="Card Holder" maxlength="60" />
                        <!-- <?php echo $_SESSION['errCardHolder']; ?> -->
                        <input type="text" name="card_number" value="<?php echo $_SESSION['card_number']; ?>"
                            placeholder="Card Number" maxlength="16" />
                        <!-- <?php echo $_SESSION['errCardNumber']; ?> -->

                        <div>
                            <input type="text" name="expire" value="<?php echo $_SESSION['expire']; ?>"
                                placeholder="Expire" maxlength="4" />
                            <input type="text" name="cvc" value="<?php echo $_SESSION['cvc']; ?>" placeholder="CVC"
                                maxlength="3" />
                        </div>
                        <!-- </form> -->
                    </div>
                    <div class="e_payment">
                        <div class="pay">
                            <img src="https://cdn-icons-png.flaticon.com/512/6124/6124998.png" alt="" />
                        </div>
                        <div class="pay">
                            <img src="https://cdn-icons-png.flaticon.com/512/5977/5977576.png" alt="" />
                        </div>
                        <div class="pay">
                            <img src="https://cdn-icons-png.flaticon.com/512/196/196565.png" alt="" />
                        </div>
                    </div>

                </section>
                <!-- Order Summary Section  -->
                <section class="order_summary">
                    <h2 class="order_head">Order Summary</h2>
                    <div class="order_price">
                        <hr />
                        <div class="price">
                            <p>Order price:</p>
                            <p>
                                <?php echo "$" . number_format($total_price, 2); ?>
                            </p>
                        </div>
                        <div class="price">
                            <?php $shipping_fee = $total_price * 0.2;
                            $_SESSION['shipping_fee'] = $shipping_fee; ?>

                            <p>Shipping:</p>
                            <p>
                                <?php echo "$" . number_format($shipping_fee, 2); ?>
                            </p>
                        </div>
                        <div class="price">
                            <?php $tax_percent = $total_price * 0.35;
                            $_SESSION['tax_percent'] = $tax_percent; ?>
                            <p>Tax:</p>
                            <p>
                                <?php echo "$" . number_format($tax_percent, 2); ?>
                            </p>
                        </div>
                        <br />
                        <hr />
                        <div class="total_price">
                            <?php $totalOrder = $total_price + $shipping_fee + $tax_percent;
                            $_SESSION['totalOrder'] = $totalOrder; ?>
                            <p class="dark">
                            </p>
                            <p class="dark">
                                <?php echo "$" . number_format($totalOrder, 2); ?>
                            </p>
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Review and Continue" class="review_btn">

                </section>

                <small class="project_by"><b>Develped by <span>Utba Zafar</span></b></small>

            </div>

        </main>

    </form>
</body>

</html>