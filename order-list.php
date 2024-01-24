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


                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Order /</span> List
                        </h4>

                        <div class="card p-2 w-100 " style="overflow-x: auto;">
                            <div class="card-datatable table-responsive overflow-hidden">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header flex-column flex-md-row">
                                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                            <div class="dt-buttons"> <button type="button" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#editUser"><span><i
                                                            class="bx bx-plus me-sm-1"></i> <span
                                                            class="d-none d-sm-inline-block">Add New
                                                            Order</span></span></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $results = mysqli_query($db, "SELECT * FROM orders"); ?>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>User ID</th>
                                        <th>Date Purchased</th>
                                        <th>Status</th>
                                        <th>Total Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['date_purchased']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['total_amount']; ?></td>
                                        <td>
                                            <a href="order-list-edit.php?edit=<?php echo $row['order_id']; ?>">
                                                <button type="button" class='btn btn-outline-primary'>
                                                    <i class="bx bxs-edit"></i>
                                                </button>
                                            </a>
                                            <a href="modules/order-list.php?del=<?php echo $row['order_id']; ?>">
                                                <button type='button' class='btn btn-outline-danger'>
                                                    <i class='bx bxs-trash'></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Edit User Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3>Order Information</h3>

                            </div>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
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
                                    <select name="status" value="<?php echo $status; ?>" class="form-control">
                                        <option value="1">Initiated</option>
                                        <option value="2">Dispatched</option>
                                        <option value="3">In Progress</option>
                                        <option value="4">Completed</option>
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
                                        name="save">Save</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>


            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <?php include 'components/script.php'; ?>
</body>

</html>