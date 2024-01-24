<?php require_once "modules/brand-list.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $brand_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM brand WHERE brand_id=$brand_id");
    $record = mysqli_fetch_array($rec);
    $brand_title = $record['brand_title'];
    $brand_description = $record['brand_description'];
    $brand_image = $record['brand_image'];
    $alt_image = $record['alt_image'];
    $show_in_brand_menu = $record['show_in_brand_menu'];
    $disabled = $record['disabled'];
    $featured = $record['featured'];
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
                            <h3 style='text-align: center;'>Edit Brand Information</h3>
                            <form id="editUserForm" class="row g-3" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="brand_id" value="<?php echo $brand_id; ?>">
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Brand Title</label>
                                    <input type="text" id="modalEditUserName" value="<?php echo $brand_title; ?>"
                                        name="brand_title" class="form-control" placeholder="Brand Title" />
                                </div>

                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Brand
                                        Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="brand_description"
                                        placeholder="Brand Description"><?php echo $brand_description; ?></textarea>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Brand Image</label>
                                    <input type="file" id="modalEditUserFirstName" name="brand_image"
                                        class="form-control" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Alt Image</label>
                                    <input type="file" id="modalEditUserLastName" name="alt_image"
                                        class="form-control" />
                                </div>

                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Show in Brand Menu?</span>
                                        <input type="checkbox" class="switch-input" name="show_in_brand_menu"
                                            <?php echo $show_in_brand_menu ? 'checked' : ''; ?>>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Disable it?</span>
                                        <input type="checkbox" class="switch-input" name="disabled"
                                            <?php echo $disabled ? 'checked' : ''; ?>>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Do You Want to Feature it?</span>
                                        <input type="checkbox" class="switch-input" name="featured"
                                            <?php echo $featured ? 'checked' : ''; ?>>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1"
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