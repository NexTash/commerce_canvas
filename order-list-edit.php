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

                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="card p-3 col-6">
                            <h3 style='text-align: center;'>Edit Order Information</h3>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Product ID</label>
                                    <input type="text" id="modalEditUserFirstName" name="product_id"
                                        value="<?php echo $product_id; ?>" class="form-control"
                                        placeholder="Product ID" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">User ID</label>
                                    <input type="text" id="modalEditUserLastName" name="user_id"
                                        value="<?php echo $user_id; ?>" class="form-control" placeholder="User ID" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Date Purchased</label>
                                    <input type="date" id="modalEditUserFirstName" name="date_purchased"
                                        value="<?php echo $date_purchased; ?>" class="form-control" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php echo ($status == 1) ? 'selected' : ''; ?>>Initiated
                                        </option>
                                        <option value="2" <?php echo ($status == 2) ? 'selected' : ''; ?>>Dispatched
                                        </option>
                                        <option value="3" <?php echo ($status == 3) ? 'selected' : ''; ?>>In Progress
                                        </option>
                                        <option value="4" <?php echo ($status == 4) ? 'selected' : ''; ?>>Completed
                                        </option>
                                    </select>

                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Total Amount</label>
                                    <input type="text" id="modalEditUserName" name="total_amount"
                                        value="<?php echo $total_amount; ?>" class="form-control"
                                        placeholder="Total Amount" />
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1" value="0"
                                        name="update">Update</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

</html>