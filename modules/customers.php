<?php 
session_start();

// initialize variables
$user_id = 1;
$first_name = "";
$last_name = "";
$group_id = "";
$username = "";
$email = "";
$phone = "";
$contact_id = "";
$password = "";
$reward_points = "";
$role_id = "";
$created_at	 = "";

$update = false;

//connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

//if save button is clicked
if (isset($_POST['save'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $group_id = $_POST['group_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $contact_id = $_POST['contact_id'];
        $password = $_POST['password'];
        $reward_points = $_POST['reward_points'];
        $role_id = $_POST['role_id'];
        $created_at = $_POST['created_at'];

        mysqli_query($db, "INSERT INTO users (`first_name`, `last_name`, `group_id`, `username`, `email`, `phone`, `contact_id`, `password`, `reward_points`, `role_id`, `created_at`)
                VALUES ('$first_name','$last_name','$group_id','$username','$email','$phone','$contact_id','$password','$reward_points','$role_id','$created_at')"); 
        $_SESSION['message'] = "Address saved"; 
        header('location: ../customer-list.php');
}

//update records
if (isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $group_id = $_POST['group_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $contact_id = $_POST['contact_id'];
        $password = $_POST['password'];
        $reward_points = $_POST['reward_points'];
        $role_id = $_POST['role_id'];
        $created_at = $_POST['created_at'];

        mysqli_query($db, "UPDATE users SET `first_name`='$first_name',`last_name`='$last_name',`group_id`='$group_id',`username`='$username',`email`='$email',
        `phone`='$phone',`contact_id`='$contact_id',`password`='$password',`reward_points`='$reward_points',`role_id`='$role_id',`created_at`='$created_at' WHERE user_id=$user_id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: customer-list.php');
}

//delete records
if (isset($_GET['del'])) {
        $user_id = $_GET['del'];
        mysqli_query($db, "DELETE FROM users WHERE user_id=$user_id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: ../customer-list.php');
}