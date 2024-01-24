<?php require_once "modules/product-category.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $category_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM product_category WHERE category_id=$category_id");
    $record = mysqli_fetch_array($rec);
    $category_id = $record['category_id'];
    $parent_category = $record['parent_category'];
    $is_child = $record['is_child'];
    $category_title = $record['category_title'];
    $category_description = $record['category_description'];
    $brand_id = $record['brand_id'];
    $category_media_id = $record['category_media_id'];
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
                            <h3 style='text-align: center;'>Edit Category Information</h3>
                            <form id="editUserForm" method="POST" action="" class="row g-3">
                                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Parent Category (if any)</label>
                                    <input type="text" id="modalEditUserName" name="parent_category"
                                        value="<?php echo $parent_category; ?>" class="form-control"
                                        placeholder="Parent Category (if any)" />
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Is
                                            Child Category<br>(if not parent)</span>
                                        <input type="checkbox" name="is_child" value="<?php echo $is_child; ?>"
                                            class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Category Title</label>
                                    <input type="text" id="modalEditUserName" value="<?php echo $category_title; ?>"
                                        name="category_title" class="form-control" placeholder="Category Title" />
                                </div>

                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Category
                                        Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="category_description"
                                        placeholder="Category Description"><?php echo $category_description; ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserFirstName">Brand ID</label>
                                    <input type="text" id="modalEditUserFirstName" name="brand_id"
                                        value="<?php echo $brand_id; ?>" class="form-control" placeholder="Brand" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserLastName">Category Media ID</label>
                                    <input type="text" id="modalEditUserLastName" name="category_media_id"
                                        value="<?php echo $category_media_id; ?>" class="form-control"
                                        placeholder="Category Media ID" />
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