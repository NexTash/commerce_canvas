<?php require_once "modules/customer-group.php"; ?>

<?php 
    if (isset($_GET['edit'])) {
        $group_id = $_GET['edit'];
        $update = true;
        $rec = mysqli_query($db, "SELECT * FROM user_group id WHERE $group_id=group_id");
        $record = mysqli_fetch_array($rec);
        $group_name = $record['group_name'];
        $group_description = $record['group_description'];
        $group_id  = $record['group_id'];

        }
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template">

<?php
include "components/head.php"; ?>

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
            <?php include "components/sidebar.php";?>
            <!-- Layout container -->
            <div class="layout-page">
                <?php include "components/navbar.php"; ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Customer /</span> Group
                        </h4>
                        <div class="card p-2  w-100 " style="overflow-x: auto;">
                            <div class="card-datatable table-responsive overflow-hidden">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header flex-column flex-md-row">
                                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                            <div class="dt-buttons"> <button type="button" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#adduser"><span><i
                                                            class="bx bx-plus me-sm-1"></i> <span
                                                            class="d-none d-sm-inline-block">Add New
                                                            Record</span></span></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $results = mysqli_query($db, "SELECT * FROM user_group"); ?>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Group Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php while ($row = mysqli_fetch_array($results)) { ?>

                                <tr>
                                    <td><?= $row['group_name']; ?></td>
                                    <td><?= $row['group_description']; ?></td>
                                    <td>
                                        <a href="customer-group-edit.php?edit=<?php echo $row['group_id']; ?>"> <button
                                                type="button" class='btn btn-outline-primary'><i
                                                    class="bx bxs-edit"></i></button></a>
                                        <a href="modules/customer-group.php?del=<?php echo $row['group_id']; ?>"><button
                                                type='button' class='btn btn-outline-danger'><i
                                                    class='bx bxs-trash'></i></button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>


                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Add User Modal -->
            <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3>Group Information</h3>

                            </div>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Group Name</label>
                                    <input type="text" id="modalEditUserName" value="<?php echo $group_name; ?>"
                                        name="group_name" class="form-control" placeholder="Group Name" />
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Group
                                        Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        value="<?php echo $group_description; ?>" name="group_description" rows="3"
                                        placeholder="Group Description"></textarea>
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
            <!--/ Add User Modal -->

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>


            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <?php include "components/script.php";
?>

</body>

</html>