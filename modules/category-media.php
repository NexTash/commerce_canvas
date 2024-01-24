<?php
session_start();

// Initialize variables
$category_media_id = 1;
$image = "";
$alt_image = "";
$description = "";
$category_banner_image = "";
$product_category_id = "";
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $image = $_POST['image'];
    $alt_image = $_POST['alt_image'];
    $description = $_POST['description'];
    $category_banner_image = $_POST['category_banner_image'];
    $product_category_id = $_POST['product_category_id'];

    mysqli_query($db, "INSERT INTO `category_media`(`image`, `alt_image`, `description`, `category_banner_image`, `product_category_id`)
     VALUES ('$image', '$alt_image', '$description', '$category_banner_image', '$product_category_id')"); 

    $_SESSION['message'] = "Category Media saved"; 
    header('location: category-media.php');
}

// Update records
if (isset($_POST['update'])) {
    $category_media_id = $_POST['category_media_id'];
    $image = $_POST['image'];
    $alt_image = $_POST['alt_image'];
    $description = $_POST['description'];
    $category_banner_image = $_POST['category_banner_image'];
    $product_category_id = $_POST['product_category_id'];

    mysqli_query($db, "UPDATE `category_media` SET `image`='$image', `alt_image`='$alt_image', `description`='$description', 
    `category_banner_image`='$category_banner_image', `product_category_id`='$product_category_id' WHERE category_media_id=$category_media_id");

    $_SESSION['message'] = "Category Media updated!"; 
    header('location: category-media.php');
}

// Delete records
if (isset($_GET['del'])) {
    $category_media_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM category_media WHERE category_media_id=$category_media_id");
    $_SESSION['message'] = "Category Media deleted!"; 
    header('location: ../category-media.php');
}
?>