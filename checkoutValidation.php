<?php
if (isset($_POST["submit"])) {
    session_start();
    $_SESSION['errFlag'] = 0;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $card_holder = $_POST['card_holder'];
    $card_number = $_POST['card_number'];
    $expire = $_POST['expire'];
    $cvc = $_POST['cvc'];

    if (empty($name)) {

        $_SESSION['errName'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['name'] = $name;
    } else {
        $_SESSION['name'] = $name;
        $_SESSION['errName'] = "";
    }

    if (empty($email)) {
        $_SESSION['errEmail'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Email should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['email'] = $email;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errEmail'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Invalid email format!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['email'] = $email;
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['errEmail'] = "";
    }

    if (empty($address)) {
        $_SESSION['errAddress'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Address should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['address'] = $address;
    } else {
        $_SESSION['address'] = $address;
        $_SESSION['errAddress'] = "";
    }

    if (empty($card_holder)) {
        $_SESSION['errCardHolder'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Card holder name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['card_holder'] = $card_holder;
    } else {
        $_SESSION['card_holder'] = $card_holder;
        $_SESSION['errCardHolder'] = "";
    }

    if (empty($card_number)) {
        $_SESSION['errCardNumber'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Card Number should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['card_number'] = $card_number;
    } else {
        $_SESSION['card_number'] = $card_number;
        $_SESSION['errCardNumber'] = "";
    }

    if (empty($expire)) {
        $_SESSION['errExpire'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">Expire should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['expire'] = $expire;
    } else {
        $_SESSION['expire'] = $expire;
        $_SESSION['errExpire'] = "";
    }
    if (empty($cvc)) {
        $_SESSION['errCVC'] = '<span style="display: block; color: #ff0000; text-align: center; font-size: 12px; padding: 5px;">CVC should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['cvc'] = $cvc;
    } else {
        $_SESSION['cvc'] = $cvc;
        $_SESSION['errCVC'] = "";
    }

    if ($_SESSION['errFlag'] > 0) {
        header("Location: checkoutPage.php");
    } else {
        header("Location: receiptPage.php");
    }
}