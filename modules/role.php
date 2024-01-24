<?php
session_start();

// Initialize variables
$role_id = 1;
$role_name = "";
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $role_name = $_POST['role_name'];

    mysqli_query($db, "INSERT INTO `role`(`role_name`) VALUES ('$role_name')"); 

    $_SESSION['message'] = "Role saved"; 
    header('location: role.php');
}

// Update records
if (isset($_POST['update'])) {
    $role_id = $_POST['role_id'];
    $role_name = $_POST['role_name'];

    mysqli_query($db, "UPDATE `role` SET `role_name`='$role_name' WHERE role_id=$role_id");

    $_SESSION['message'] = "Role updated!"; 
    header('location: role.php');
}

// Delete records
if (isset($_GET['del'])) {
    $role_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM role WHERE role_id=$role_id");
    $_SESSION['message'] = "Role deleted!"; 
    header('location: ../role.php');
}
?>