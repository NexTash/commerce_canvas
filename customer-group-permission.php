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

                    <!-- Content -->


                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Permissions /</span>Customer Group Permission
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
                                                            Permission</span></span></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $results = mysqli_query($db, "SELECT * FROM group_permissions"); ?>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Group ID</th>
                                        <th>Role ID</th>
                                        <th>Module Name</th>
                                        <th>Create Permission</th>
                                        <th>Read Permission</th>
                                        <th>Update Permission</th>
                                        <th>Delete Permission</th>
                                        <th>Print Permission</th>
                                        <th>Export Permission</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['group_id']; ?></td>
                                        <td><?php echo $row['role_id']; ?></td>
                                        <td><?php echo $row['module_name']; ?></td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['create_permission'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['read_permission'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['update_permission'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['delete_permission'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['print_permission'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['export_permission'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="customer-group-permission-edit.php?edit=<?php echo $row['group_permission_id']; ?>">
                                                <button type="button" class='btn btn-outline-primary'>
                                                    <i class="bx bxs-edit"></i>
                                                </button>
                                            </a>
                                            <a
                                                href="modules/customer-group-permission.php?del=<?php echo $row['group_permission_id']; ?>">
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
                                <h3>Permissions Information</h3>

                            </div>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
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
                                        <span class="switch-label">Do You Want to Export it?</span>
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