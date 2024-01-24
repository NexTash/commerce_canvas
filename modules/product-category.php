<?php
session_start();

// Initialize variables
$category_id = 1;
$parent_category = "";
$is_child = "";
$category_title = "";
$category_description = "";
$brand_id = "";
$category_media_id = "";
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $parent_category = $_POST['parent_category'];
    $is_child = isset($_POST['is_child']) ? 1 : 0;
    $category_title = $_POST['category_title'];
    $category_description = $_POST['category_description'];
    $brand_id = $_POST['brand_id'];
    $category_media_id = $_POST['category_media_id'];

    mysqli_query($db, "INSERT INTO `product_category`(`parent_category`, `is_child`, `category_title`, `category_description`, `brand_id`, `category_media_id`)
     VALUES ('$parent_category', '$is_child', '$category_title', '$category_description', '$brand_id', '$category_media_id')"); 

    $_SESSION['message'] = "Category saved"; 
    header('location: product-category.php');
}

// Update records
if (isset($_POST['update'])) {
    $category_id = $_POST['category_id'];
    $parent_category = $_POST['parent_category'];
    $is_child = isset($_POST['is_child']) ? 1 : 0;
    $category_title = $_POST['category_title'];
    $category_description = $_POST['category_description'];
    $brand_id = $_POST['brand_id'];
    $category_media_id = $_POST['category_media_id'];

    mysqli_query($db, "UPDATE `product_category` SET `parent_category`='$parent_category', `is_child`='$is_child', `category_title`='$category_title', 
    `category_description`='$category_description', `brand_id`='$brand_id', `category_media_id`='$category_media_id' WHERE category_id=$category_id");

    $_SESSION['message'] = "Category updated!"; 
    header('location: product-category.php');
}

// Delete records
if (isset($_GET['del'])) {
    $category_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM product_category WHERE category_id=$category_id");
    $_SESSION['message'] = "Category deleted!"; 
    header('location: ../product-category.php');
}
?>
