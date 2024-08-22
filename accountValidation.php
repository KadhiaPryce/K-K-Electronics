<?php
if (isset($_POST["submit"])) {
    session_start();
    $_SESSION['errFlag'] = 0;

    $fn = $_POST['first-name'];
    $ln = $_POST['last-name'];
    $rle = $_POST['role'];

    if (empty($fn)) {
        $_SESSION['errFirstname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">First Name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['firstname'] = $fn;
    } else {
        if (preg_match('/[a-zA-Z]+$/', $fn)) {
            $_SESSION['firstname'] = $fn;
            $_SESSION['errFirstname'] = "";
        } else {
            $_SESSION['errFirstname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">First Name should only contain letters!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['firstname'] = $fn;
        }
    }

    if (empty($ln)) {
        $_SESSION['errLastname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Last Name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['lastname'] = $ln;
    } else {
        if (preg_match('/[a-zA-Z-\']+$/', $ln)) {
            $_SESSION['lastname'] = $ln;
            $_SESSION['errLastname'] = "";
        } else {
            $_SESSION['errLastname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Last Name should contain letters, apostrophe and hyphen only!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['lastname'] = $ln;
        }
    }

    if ($rle === 'empty') {
        $_SESSION['errRole'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Role should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['role'] = $rle;
    } elseif (!empty($rle)) {
        $_SESSION['role'] = $rle;
        $_SESSION['errRole'] = "";
    }

    if ($_SESSION['errFlag'] > 0) {
        header("Location: accountPage.php");
    }
}

?>