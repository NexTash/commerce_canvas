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

                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="card p-3 col-6">
                            <h3 style='text-align: center;'>Edit Contact Information</h3>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                                <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
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
<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

</div>
<?php include 'components/script.php'; ?>
</body>

</html>