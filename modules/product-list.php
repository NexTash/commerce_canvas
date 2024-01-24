<?php
session_start();

// Initialize variables
$product_id = 1;
$category_id = "";
$brand_id = "";
$product_name = "";
$product_code = "";
$barcode = "";
$product_short_description = "";
$product_detailed_description = "";
$stock_uom_id = "";
$min_selling_qty = "";
$refundable = "";

$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $barcode = $_POST['barcode'];
    $product_short_description = $_POST['product_short_description'];
    $product_detailed_description = $_POST['product_detailed_description'];
    $stock_uom_id = $_POST['stock_uom_id'];
    $min_selling_qty = $_POST['min_selling_qty'];
    $refundable = isset($_POST['refundable']) ? 1 : 0;

    mysqli_query($db, "INSERT INTO `product`(`category_id`, `brand_id`, `product_name`, `product_code`, `barcode`, `product_short_description`, `product_detailed_description`, `stock_uom_id`, `min_selling_qty`, `refundable`)
     VALUES ('$category_id', '$brand_id', '$product_name', '$product_code', '$barcode', '$product_short_description', '$product_detailed_description', '$stock_uom_id', '$min_selling_qty', '$refundable')"); 
    $_SESSION['message'] = "Product saved"; 
    header('location: product-list.php');
}

// Update records
if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $barcode = $_POST['barcode'];
    $product_short_description = $_POST['product_short_description'];
    $product_detailed_description = $_POST['product_detailed_description'];
    $stock_uom_id = $_POST['stock_uom_id'];
    $min_selling_qty = $_POST['min_selling_qty'];
    $refundable = isset($_POST['refundable']) ? 1 : 0;

    mysqli_query($db, "UPDATE `product` SET `category_id`='$category_id', `brand_id`='$brand_id', `product_name`='$product_name', `product_code`='$product_code', 
    `barcode`='$barcode', `product_short_description`='$product_short_description', `product_detailed_description`='$product_detailed_description', `stock_uom_id`='$stock_uom_id', 
    `min_selling_qty`='$min_selling_qty', `refundable`='$refundable' WHERE product_id=$product_id");
    $_SESSION['message'] = "Product updated!"; 
    header('location: product-list.php');
}

// Delete records
if (isset($_GET['del'])) {
    $product_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM product WHERE product_id=$product_id");
    $_SESSION['message'] = "Product deleted!"; 
    header('location: ../product-list.php');
}
?>