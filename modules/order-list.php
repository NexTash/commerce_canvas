<?php
session_start();

// Initialize variables
$order_id = 1;
$product_id = "";
$user_id = "";
$date_purchased = "";
$status = "";
$total_amount = "";
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $date_purchased = $_POST['date_purchased'];
    $status = $_POST['status'];
    $total_amount = $_POST['total_amount'];

    mysqli_query($db, "INSERT INTO `orders`(`product_id`, `user_id`, `date_purchased`, `status`, `total_amount`)
     VALUES ('$product_id', '$user_id', '$date_purchased', '$status', '$total_amount')"); 

    $_SESSION['message'] = "Order saved"; 
    header('location: order-list.php');
}

// Update records
if (isset($_POST['update'])) {
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $date_purchased = $_POST['date_purchased'];
    $status = $_POST['status'];
    $total_amount = $_POST['total_amount'];

    mysqli_query($db, "UPDATE `orders` SET `product_id`='$product_id', `user_id`='$user_id', `date_purchased`='$date_purchased', 
    `status`='$status', `total_amount`='$total_amount' WHERE order_id=$order_id");

    $_SESSION['message'] = "Order updated!"; 
    header('location: order-list.php');
}

// Delete records
if (isset($_GET['del'])) {
    $order_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM orders WHERE order_id=$order_id");
    $_SESSION['message'] = "Order deleted!"; 
    header('location: ../order-list.php');
}
?>
