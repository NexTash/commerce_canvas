<?php 
session_start();

// Initialize variables
$brand_id = 1;
$brand_title = "";
$brand_description = "";
$brand_image = "";
$alt_image = "";
$show_in_brand_menu = "";
$disabled = "";
$featured = "";

$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $brand_title = $_POST['brand_title'];
    $brand_description = $_POST['brand_description'];
    $brand_image = $_POST['brand_image'];
    $alt_image = $_POST['alt_image'];
    $show_in_brand_menu = isset($_POST['show_in_brand_menu']) ? 1 : 0;
    $disabled = isset($_POST['disabled']) ? 1 : 0;
    $featured = isset($_POST['featured']) ? 1 : 0;

    mysqli_query($db, "INSERT INTO `brand`(`brand_title`, `brand_description`, `brand_image`, `alt_image`, `show_in_brand_menu`, `disabled`, `featured`)
     VALUES ('$brand_title','$brand_description','$brand_image','$alt_image','$show_in_brand_menu','$disabled','$featured')"); 
    $_SESSION['message'] = "Brand saved"; 
    header('location: brand-list.php');
}

// Update records
if (isset($_POST['update'])) {
    $brand_id = $_POST['brand_id'];
    $brand_title = $_POST['brand_title'];
    $brand_description = $_POST['brand_description'];
    $brand_image = $_POST['brand_image'];
    $alt_image = $_POST['alt_image'];
    $show_in_brand_menu = isset($_POST['show_in_brand_menu']) ? 1 : 0;
    $disabled = isset($_POST['disabled']) ? 1 : 0;
    $featured = isset($_POST['featured']) ? 1 : 0;

    mysqli_query($db, "UPDATE `brand` SET `brand_title`='$brand_title',`brand_description`='$brand_description',`brand_image`='$brand_image',
    `alt_image`='$alt_image',`show_in_brand_menu`='$show_in_brand_menu',`disabled`='$disabled',`featured`='$featured' WHERE brand_id=$brand_id");
    $_SESSION['message'] = "Brand updated!"; 
    header('location: brand-list.php');
}

// Delete records
if (isset($_GET['del'])) {
    $brand_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM brand WHERE brand_id=$brand_id");
    $_SESSION['message'] = "Brand deleted!"; 
    header('location: ../brand-list.php');
}
?>