<?php
if (isset($_POST["submit"])) {
    session_start();
    $_SESSION['errFlag'] = 0;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    if (empty($name)) {
        $_SESSION['errName'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Name
    should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['name'] = $name;
    } else {
        if (preg_match('/^[a-zA-Z ]+$/', $name)) {
            $_SESSION['name'] = $name;
            $_SESSION['errName'] = "";
        } else {
            $_SESSION['errName'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Name
    should only contain letters and spaces!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['name'] = $name;
        }
    }

    if (empty($email)) {
        $_SESSION['errEmail'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Email
    should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['email'] = $email;
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email'] = $email;
            $_SESSION['errEmail'] = "";
        } else {
            $_SESSION['errEmail'] = '<span
    style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Invalid email format!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['email'] = $email;
        }
    }

    if (empty($description)) {
        $_SESSION['errDescription'] = '<span
    style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Description should not be
    empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['description'] = $description;
    } else {
        $_SESSION['description'] = $description;
        $_SESSION['errDescription'] = "";
    }

    if ($_SESSION['errFlag'] > 0) {
        header("Location: contactPage.php");
    } else {
        include 'connect.php';

        $sql = "INSERT INTO `contact_us`(`name`, `email`, `description`) VALUES ('$name','$email','$description')";
        //add code block to check if username is unique
        if ($conn->query($sql) === TRUE) {
            header("Location: contactPage.php");
        } else {
            header('Location: contactPage.php');
        }
        $conn->close();
    }
}
?>