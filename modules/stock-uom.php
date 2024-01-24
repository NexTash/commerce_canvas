<?php
session_start();

// Initialize variables
$stock_uom_id = 1;
$stock_uom_name = "";
$disabled = "";
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $stock_uom_name = $_POST['stock_uom_name'];
    $disabled = isset($_POST['disabled']) ? 1 : 0;

    mysqli_query($db, "INSERT INTO `stock_uom`(`stock_uom_name`, `disabled`) VALUES ('$stock_uom_name', '$disabled')"); 

    $_SESSION['message'] = "Stock UOM saved"; 
    header('location: stock-uom.php');
}

// Update records
if (isset($_POST['update'])) {
    $stock_uom_id = $_POST['stock_uom_id'];
    $stock_uom_name = $_POST['stock_uom_name'];
    $disabled = isset($_POST['disabled']) ? 1 : 0;

    mysqli_query($db, "UPDATE `stock_uom` SET `stock_uom_name`='$stock_uom_name', `disabled`='$disabled' WHERE stock_uom_id=$stock_uom_id");

    $_SESSION['message'] = "Stock UOM updated!"; 
    header('location: stock-uom.php');
}

// Delete records
if (isset($_GET['del'])) {
    $stock_uom_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM stock_uom WHERE stock_uom_id=$stock_uom_id");
    $_SESSION['message'] = "Stock UOM deleted!"; 
    header('location: ../stock-uom.php');
}
?>
