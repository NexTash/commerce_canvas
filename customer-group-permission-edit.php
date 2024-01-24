<?php require_once "modules/customer-group-permission.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $group_permission_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM group_permissions WHERE group_permission_id=$group_permission_id");
    $record = mysqli_fetch_array($rec);
    $group_permission_id = $record['group_permission_id'];
    $group_id = $record['group_id'];
    $role_id = $record['role_id'];
    $module_name = $record['module_name'];
    $create_permission = isset($record['create_permission']) ? 1 : 0;
    $read_permission = isset($record['read_permission']) ? 1 : 0;
    $update_permission = isset($record['update_permission']) ? 1 : 0;
    $delete_permission = isset($record['delete_permission']) ? 1 : 0;
    $print_permission = isset($record['print_permission']) ? 1 : 0;
    $export_permission = isset($record['export_permission']) ? 1 : 0;

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
                            <h3 style='text-align: center;'>Edit Permission Information</h3>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                                <input type="hidden" name="group_permission_id"
                                    value="<?php echo $group_permission_id; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Group ID</label>
                                    <input type="text" id="modalEditUserFirstName" name="group_id"
                                        value="<?php echo $group_id; ?>" class="form-control" placeholder="Group" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Role ID</label>
                                    <input type="text" id="modalEditUserLastName" name="role_id"
                                        value="<?php echo $role_id; ?>" class="form-control" placeholder="Role Id" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Module Name</label>
                                    <input type="text" id="modalEditUserLastName" name="module_name"
                                        value="<?php echo $module_name; ?>" class="form-control"
                                        placeholder="Module Name" />
                                </div>

                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Create it?</span>
                                        <input type="checkbox" name="create_permission"
                                            value="<?php echo $create_permission; ?>" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Read it?</span>
                                        <input type="checkbox" name="read_permission"
                                            value="<?php echo $read_permission; ?>" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Update it?</span>
                                        <input type="checkbox" name="update_permission"
                                            value="<?php echo $update_permission; ?>" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Delete it?</span>
                                        <input type="checkbox" name="delete_permission"
                                            value="<?php echo $delete_permission; ?>" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Print it?</span>
                                        <input type="checkbox" name="print_permission"
                                            value="<?php echo $print_permission; ?>" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Expert it?</span>
                                        <input type="checkbox" name="export_permission"
                                            value="<?php echo $export_permission; ?>" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
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