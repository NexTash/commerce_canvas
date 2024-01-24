<?php require_once "modules/role.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $role_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM role WHERE role_id=$role_id");
    $record = mysqli_fetch_array($rec);
    $role_id = $record['role_id'];
    $role_name = $record['role_name'];

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
                            <h3 style='text-align: center;'>Edit Role Information</h3>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                            <input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Role Name</label>
                                    <input type="text" id="modalEditUserName" name="role_name"
                                        value="<?php echo $role_name; ?>" class="form-control"
                                        placeholder="Role Name" />
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