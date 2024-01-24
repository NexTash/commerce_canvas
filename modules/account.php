<?php
session_start();

// Initialize variables
$id = 1;
$username = "";
$email = "";
$password = "";

$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// Handle signup
if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Hash the password before saving to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO `login` (`username`, `email`, `password`) VALUES ('$username', '$email', '$hashed_password')");

    $_SESSION['message'] = "Signup successful. You can now log in.";
    header('location: login.php');
    exit();
}

// Handle login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $result = mysqli_query($db, "SELECT * FROM `login` WHERE `email`='$email'");
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['email'] = $row['email'];
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['message'] = "Invalid email or password";
        header('Location: signup.php');
        exit();
    }
}
?>
