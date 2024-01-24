<?php
session_start();

// Initialize variables
$contact_id = 1;
$user_id = "";
$address_line1 = "";
$address_line2 = "";
$country = "";
$state = "";
$city = "";
$zip = "";
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $user_id = $_POST['user_id'];
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    mysqli_query($db, "INSERT INTO `contact`(`user_id`, `address_line1`, `address_line2`, `country`, `state`, `city`, `zip`) 
                    VALUES ('$user_id', '$address_line1', '$address_line2', '$country', '$state', '$city', '$zip')");

    $_SESSION['message'] = "Contact saved"; 
    header('location: contact.php');
}

// Update records
if (isset($_POST['update'])) {
    $contact_id = $_POST['contact_id'];
    $user_id = $_POST['user_id'];
    $address_line1 = $_POST['address_line1'];
    $address_line2 = $_POST['address_line2'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    mysqli_query($db, "UPDATE `contact` SET `user_id`='$user_id', `address_line1`='$address_line1', `address_line2`='$address_line2',
     `country`='$country', `state`='$state', `city`='$city', `zip`='$zip' WHERE contact_id=$contact_id");

    $_SESSION['message'] = "Contact updated!"; 
    header('location: contact.php');
}

// Delete records
if (isset($_GET['del'])) {
    $contact_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM contact WHERE contact_id=$contact_id");
    $_SESSION['message'] = "Contact deleted!"; 
    header('location: ../contact.php');
}
?>