<?php require_once "modules/order-list.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $order_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM orders WHERE order_id=$order_id");
    $record = mysqli_fetch_array($rec);
    $order_id = $record['order_id'];
    $product_id = $record['product_id'];
    $user_id = $record['user_id'];
    $date_purchased = $record['date_purchased'];
    $status = $record['status'];
    $total_amount = $record['total_amount'];

}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template">

<?php include "components/head.php"; ?>

<body>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <?php include 'components/sidebar.php'; ?>

            <!-- Layout container -->
            <div class="layout-page">
                <?php include 'components/navbar.php'; ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>


            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>


            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <?php include 'components/script.php'; ?>
</body>

</html>