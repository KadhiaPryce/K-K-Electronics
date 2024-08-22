<?php
if (isset($_POST['submit'])) {

    // Get the form data
    include "accountValidation.php";
    if ($_SESSION['errFlag'] > 0) {
        header("Location: accountPage.php");
    } else {
        include 'connect.php';
        $fn = mysqli_real_escape_string($conn, $_POST['first-name']);
        $ln = mysqli_real_escape_string($conn, $_POST['last-name']);
        $rle = mysqli_real_escape_string($conn, $_POST['role']);
        $uname = mysqli_real_escape_string($conn, $_POST['username']);

        $sql = "INSERT INTO `users` (`Firstname`, `Lastname`, `Role`, `Username`) 
                      VALUES ('$fn', '$ln', '$rle', '$uname')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die(mysqli_error($conn));
        }


    }

    // Redirect back to the user accounts page
    header("Location: accountPage.php");
    exit();
} elseif (isset($_POST['update'])) {

    // Get the form data
    include "accountValidation.php";
    if ($_SESSION['errFlag'] > 0) {
        header("Location: accountPage.php");
    } else {
        include 'connect.php';
        $fn = mysqli_real_escape_string($conn, $_POST['first-name']);
        $ln = mysqli_real_escape_string($conn, $_POST['last-name']);
        $rle = mysqli_real_escape_string($conn, $_POST['role']);
        $uname = mysqli_real_escape_string($conn, $_POST['username']);


        // Update the data in the database
        $sql = "UPDATE `users` SET `Firstname`='$fn', `Lastname`='$ln', `Role`='$rle' WHERE `Username`='$uname'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die(mysqli_error($conn));
        }

    }



    // Redirect back to the user accounts page
    header("Location: accountPage.php");
    exit();
} elseif (isset($_POST['delete'])) {

    // Get the form data
    include "accountValidation.php";
    if ($_SESSION['errFlag'] > 0) {
        header("Location: accountPage.php");
    } else {
        include 'connect.php';
        $fn = mysqli_real_escape_string($conn, $_POST['first-name']);
        $ln = mysqli_real_escape_string($conn, $_POST['last-name']);
        $rle = mysqli_real_escape_string($conn, $_POST['role']);
        $uname = mysqli_real_escape_string($conn, $_POST['username']);


        // Update the data in the database
        $sql = "DELETE FROM `users` WHERE `Username`='$uname'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die(mysqli_error($conn));
        }

    }

    // Redirect back to the user accounts page
    header("Location: accountPage.php");
    exit();
}
?>