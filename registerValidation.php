<?php
if (isset($_POST["submit"])) {
    session_start();
    $_SESSION['errFlag'] = 0;
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $emailaddress = $_POST['emailaddress'];
    $usernames = $_POST['username'];
    $pwd1 = $_POST['password'];
    $pwd2 = $_POST['password2'];
    $role = $_POST['role'];

    if (empty($fname)) {
        $_SESSION['errFirstname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">First Name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['firstname'] = $fname;
    } else {
        if (preg_match('/[a-zA-Z]+$/', $fname)) {
            $_SESSION['firstname'] = $fname;
            $_SESSION['errFirstname'] = "";
        } else {
            $_SESSION['errFirstname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">First Name should only contain letters!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['firstname'] = $fname;
        }
    }

    if (empty($lname)) {
        $_SESSION['errLastname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Last Name should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['lastname'] = $lname;
    } else {
        if (preg_match('/[a-zA-Z-\']+$/', $lname)) {
            $_SESSION['lastname'] = $lname;
            $_SESSION['errLastname'] = "";
        } else {
            $_SESSION['errLastname'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Last Name should contain letters, apostrophe and hyphen only!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['lastname'] = $lname;
        }
    }

    if (empty($emailaddress)) {
        $_SESSION['errEmailAddress'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Email should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['emailaddress'] = $emailaddress;
    } else {
        if (filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailaddress'] = $emailaddress;
            $_SESSION['errEmailAddress'] = "";
        } else {
            $_SESSION['errEmailAddress'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Invalid email format!</span>';
            $_SESSION['errFlag']++;
            $_SESSION['emailaddress'] = $emailaddress;
        }
    }

    if (empty($usernames)) {
        $_SESSION['errUsername'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">Username should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['username'] = $usernames;
    } else {
        $_SESSION['username'] = $usernames;
        $_SESSION['errUsername'] = "";
    }

    $password_length = strlen($pwd1);
    if (empty($pwd1) || empty($pwd2)) {
        $_SESSION['errPassword'] = '<span style="display: block; padding: 5px 5px; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Password should not be empty!</span>';
        $_SESSION['errVPassword'] = '<span style="display: block; padding: 5px 5px; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Verify Password should not be empty!</span>';
        $_SESSION['errFlag']++;
    } else {
        if ($pwd1 == $pwd2) {
            if (preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $pwd1)) {
                $_SESSION['password'] = $pwd1;
                $_SESSION['password2'] = $pwd2;
                $_SESSION['errPassword'] = "";
            } else {
                $_SESSION['errPassword'] = '<span style="display: block; padding: 5px 5px; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Password must be at least 8 characters long and contain at least one number and one special character!</span>';
                $_SESSION['errFlag']++;
            }
        } else {
            $_SESSION['errPassword'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">The Passwords do not match!</span>';
            $_SESSION['errVPassword'] = '<span style="display: block; background-color: #fff; color: #ff0000; text-align: center;">The Passwords do not match!</span>';
            $_SESSION['errFlag']++;
        }
    }

    if ($role === 'empty') {
        $_SESSION['errRole'] = '<span style="display: block; padding: 5px 5px; border-radius: 5px; background-color: #fff; color: #ff0000;text-align:center;">Role should not be empty!</span>';
        $_SESSION['errFlag']++;
        $_SESSION['role'] = $role;
    } elseif (!empty($role)) {
        $_SESSION['role'] = $role;
        $_SESSION['errRole'] = "";
    }

    if ($_SESSION['errFlag'] > 0) {
        header("Location: registerPage.php");
    } else {
        include 'connect.php';

        $sql = "INSERT INTO `users`(`Email`, `Username`, `Password`, `Firstname`, `Lastname`, `Role`) VALUES ('$emailaddress','$usernames','$pwd1','$fname','$lname','$role')";
        //add code block to check if username is unique
        if ($conn->query($sql) === TRUE) {
            header("Location: loginPage.php");
        } else {
            header('Location: registerPage.php');
        }
        $conn->close();
    }


}



?>