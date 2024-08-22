<?php

if (isset($_POST["submit"])) {
    session_start();
    $_SESSION['errFlag'] = 0;

    $emails = $_POST['emails'];
    $pass = $_POST['password'];

    if (empty($emails)) {
        $_SESSION['errEamils'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Email should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['emails'] = $emails;
    } else {
        $_SESSION['emails'] = $emails;
        $_SESSION['errEmails'] = "";
    }

    if (empty($pass)) {
        $_SESSION['errPassword'] = '<span style="display: block; padding: 5px 5px; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Password should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['password'] = $pass;
    } else {
        $_SESSION['password'] = $pass;
        $_SESSION['errPassword'] = "";
    }

    if ($_SESSION['errFlag'] > 0) {
        header("Location: loginPage.php");
    } else {
        include 'connect.php';
        $emailsaddress = mysqli_real_escape_string($conn, $_POST['emails']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE `Email`='$emailsaddress' AND `Password`='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row["Role"] == "admin") {
                header("Location: adminPage.php");
            } else if ($row["Role"] == "vendor") {
                header("Location: vendorPage.php");
            }
        } else {
            echo "Invalid email or password";
            header("Location: loginPage.php");
        }


    }
    session_destroy();
    mysqli_close($conn);


}
?>