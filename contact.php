<?php require_once "modules/contact.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $contact_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM contact WHERE contact_id=$contact_id");
    $record = mysqli_fetch_array($rec);
    $contact_id = $record['contact_id'];
    $user_id = $record['user_id'];
    $address_line1 = $record['address_line1'];
    $address_line2 = $record['address_line2'];
    $country = $record['country'];
    $state = $record['state'];
    $city = $record['city'];
    $zip = $record['zip'];

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
                            <span class="text-muted fw-light"></span> Contact
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
                                                            Contact</span></span></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $results = mysqli_query($db, "SELECT * FROM contact");?>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Address Line 1</th>
                                        <th>Address Line 2</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>ZIP</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['address_line1']; ?></td>
                                        <td><?php echo $row['address_line2']; ?></td>
                                        <td><?php echo $row['country']; ?></td>
                                        <td><?php echo $row['state']; ?></td>
                                        <td><?php echo $row['city']; ?></td>
                                        <td><?php echo $row['zip']; ?></td>
                                        <td>
                                            <a href="contact-edit.php?edit=<?php echo $row['contact_id']; ?>">
                                                <button type="button" class='btn btn-outline-primary'>
                                                    <i class="bx bxs-edit"></i>
                                                </button>
                                            </a>
                                            <a href="modules/contact.php?del=<?php echo $row['contact_id']; ?>">
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
                                <h3>Contact Information</h3>

                            </div>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">User ID</label>
                                    <input type="text" id="modalEditUserName" name="user_id" class="form-control"
                                        value="<?php echo $user_id; ?>" placeholder="User ID" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Address Line 1</label>
                                    <input type="text" id="modalEditUserName" name="address_line1" class="form-control"
                                        value="<?php echo $address_line1; ?>" placeholder="Address Line 1" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Address Line 2</label>
                                    <input type="text" id="modalEditUserName" name="address_line2" class="form-control"
                                        value="<?php echo $address_line2; ?>" placeholder="Address Line 2" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Country</label>
                                    <input type="text" id="modalEditUserName" name="country" class="form-control"
                                        value="<?php echo $country; ?>" placeholder="Country" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">State</label>
                                    <input type="text" id="modalEditUserName" name="state" class="form-control"
                                        value="<?php echo $state; ?>" placeholder="State" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">City</label>
                                    <input type="text" id="modalEditUserName" name="city" class="form-control"
                                        value="<?php echo $city; ?>" placeholder="City" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Zip</label>
                                    <input type="text" id="modalEditUserName" name="zip" class="form-control"
                                        value="<?php echo $zip; ?>" placeholder="Zip" />
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