<?php
session_start();

// Initialize variables
$group_permission_id = 1;
$group_id = "";
$role_id = "";
$module_name = "";
$create_permission = 0;
$read_permission = 0;
$update_permission = 0;
$delete_permission = 0;
$print_permission = 0;
$export_permission = 0;
$update = false;

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

// If save button is clicked
if (isset($_POST['save'])) {
    $group_id = $_POST['group_id'];
    $role_id = $_POST['role_id'];
    $module_name = $_POST['module_name'];
    $create_permission = isset($_POST['create_permission']) ? 1 : 0;
    $read_permission = isset($_POST['read_permission']) ? 1 : 0;
    $update_permission = isset($_POST['update_permission']) ? 1 : 0;
    $delete_permission = isset($_POST['delete_permission']) ? 1 : 0;
    $print_permission = isset($_POST['print_permission']) ? 1 : 0;
    $export_permission = isset($_POST['export_permission']) ? 1 : 0;

    mysqli_query($db, "INSERT INTO `group_permissions`(`group_id`, `role_id`, `module_name`, `create_permission`, `read_permission`, `update_permission`, `delete_permission`, `print_permission`, `export_permission`) 
    VALUES ('$group_id', '$role_id', '$module_name', '$create_permission', '$read_permission', '$update_permission', '$delete_permission', '$print_permission', '$export_permission')");

    $_SESSION['message'] = "Group Permission saved"; 
    header('location: customer-group-permission.php');
}

// Update records
if (isset($_POST['update'])) {
    $group_permission_id = $_POST['group_permission_id'];
    $group_id = $_POST['group_id'];
    $role_id = $_POST['role_id'];
    $module_name = $_POST['module_name'];
    $create_permission = isset($_POST['create_permission']) ? 1 : 0;
    $read_permission = isset($_POST['read_permission']) ? 1 : 0;
    $update_permission = isset($_POST['update_permission']) ? 1 : 0;
    $delete_permission = isset($_POST['delete_permission']) ? 1 : 0;
    $print_permission = isset($_POST['print_permission']) ? 1 : 0;
    $export_permission = isset($_POST['export_permission']) ? 1 : 0;

    mysqli_query($db, "UPDATE `group_permissions` SET `group_id`='$group_id', `role_id`='$role_id', `module_name`='$module_name', 
                    `create_permission`='$create_permission', `read_permission`='$read_permission', `update_permission`='$update_permission', 
                    `delete_permission`='$delete_permission', `print_permission`='$print_permission', `export_permission`='$export_permission' 
                    WHERE group_permission_id=$group_permission_id");

    $_SESSION['message'] = "Group Permission updated!"; 
    header('location: customer-group-permission.php');
}

// Delete records
if (isset($_GET['del'])) {
    $group_permission_id = $_GET['del'];
    mysqli_query($db, "DELETE FROM group_permissions WHERE group_permission_id=$group_permission_id");
    $_SESSION['message'] = "Group Permission deleted!"; 
    header('location: ../customer-group-permission.php');
}
?>