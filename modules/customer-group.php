<?php 
        session_start();

        // initialize variables
        $group_id = 1;
        $group_name = "";
        $group_description = "";

        
        $update = false;

        //connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'commerce_canvas');

        //if save button is clicked
        if (isset($_POST['save'])) {
                $group_name = $_POST['group_name'];
                $group_description = $_POST['group_description'];

                mysqli_query($db, "INSERT INTO user_group (`group_name`, `group_description`)
                 VALUES ('$group_name','$group_description')"); 
                $_SESSION['message'] = "Address saved"; 
                header('location: customer-group.php');
        }

        //update records
        if (isset($_POST['update'])) {
                $group_id = $_POST['group_id'];
                $group_name = $_POST['group_name'];
                $group_description = $_POST['group_description'];
        
                mysqli_query($db, "UPDATE user_group SET `group_name`='$group_name',`group_description`='$group_description' WHERE group_id=$group_id");
                $_SESSION['message'] = "Address updated!"; 
                header('location: customer-group.php');
        }

        //delete records
        if (isset($_GET['del'])) {
                $group_id = $_GET['del'];
                mysqli_query($db, "DELETE FROM user_group WHERE group_id=$group_id");
                $_SESSION['message'] = "Address deleted!"; 
                header('location: ../customer-group.php');
        }