<?php require_once "modules/category-media.php"; ?>

<?php
// Edit operation
if (isset($_GET['edit'])) {
    $category_media_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM category_media WHERE category_media_id=$category_media_id");
    $record = mysqli_fetch_array($rec);
    $category_media_id = $record['category_media_id'];
    $image = $record['image'];
    $alt_image = $record['alt_image'];
    $description = $record['description'];
    $category_banner_image = $record['category_banner_image'];
    $product_category_id = $record['product_category_id'];
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
                            <h3 style='text-align: center;'>Edit Media Information</h3>
                            <form id="editUserForm" method="POST" action="" class="row g-3">
                                <input type="hidden" name="category_media_id" value="<?php echo $category_media_id; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Image</label>
                                    <input type="file" id="modalEditUserFirstName" name="image"
                                        value="<?php echo $image; ?>" class="form-control" placeholder="Product ID" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Alt image</label>
                                    <input type="file" id="modalEditUserLastName" name="alt_image"
                                        value="<?php echo $alt_image; ?>" class="form-control" placeholder="User ID" />
                                </div>

                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Category
                                        Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                                        value="<?php echo $description; ?>" rows="3"
                                        placeholder="Category Description"></textarea>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">category banner
                                        image</label>
                                    <input type="file" id="modalEditUserFirstName"
                                        value="<?php echo $category_banner_image; ?>" name="category_banner_image"
                                        class="form-control" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Product Category</label>
                                    <input type="text" id="modalEditUserName" name="product_category_id"
                                        value="<?php echo $product_category_id; ?>" class="form-control"
                                        placeholder="Product Category" />
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