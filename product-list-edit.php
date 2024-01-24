<?php require_once "modules/brand-list.php"; ?>

<?php

// Edit operation
if (isset($_GET['edit'])) {
    $product_id = $_GET['edit'];
    $update = true;
    $rec = mysqli_query($db, "SELECT * FROM product WHERE product_id=$product_id");
    $record = mysqli_fetch_array($rec);
    $category_id = $record['category_id'];
    $brand_id = $record['brand_id'];
    $product_name = $record['product_name'];
    $product_code = $record['product_code'];
    $barcode = $record['barcode'];
    $product_short_description = $record['product_short_description'];
    $product_detailed_description = $record['product_detailed_description'];
    $stock_uom_id = $record['stock_uom_id'];
    $min_selling_qty = $record['min_selling_qty'];
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
                            <h3 style='text-align: center;'>Edit Product Information</h3>
                            <form id="editUserForm" method="POST" action="" class="row g-3">
                                <input type="hidden" name="brand_id" value="<?php echo $brand_id; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Category
                                        ID</label>
                                    <input type="text" id="modalEditUserFirstName" name="category_id"
                                        value="<?php echo $category_id; ?>" class="form-control"
                                        placeholder="Select Category" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Brand ID</label>
                                    <input type="text" id="modalEditUserLastName" name="brand_id"
                                        value="<?php echo $brand_id; ?>" class="form-control"
                                        placeholder="Select Brand" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Product Name</label>
                                    <input type="text" id="modalEditUserName" name="product_name"
                                        value="<?php echo $product_name; ?>" class="form-control"
                                        placeholder="Product Name" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Product
                                        Code(SKU)</label>
                                    <input type="text" id="modalEditUserFirstName" name="product_code"
                                        value="<?php echo $product_code; ?>" class="form-control"
                                        placeholder="Product Code(SKU)" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Barcode</label>
                                    <input type="text" id="modalEditUserLastNamerefunable" name="barcode"
                                        value="<?php echo $barcode; ?>" class="form-control"
                                        placeholder="Only 12 digits valid" />
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Short
                                        Description</label>
                                    <textarea class="form-control" name="product_short_description"
                                        id="exampleFormControlTextarea1"
                                        rows="3"><?php echo $product_short_description; ?></textarea>
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Detailed
                                        Descripton</label>
                                    <textarea class="form-control" name="product_detailed_description"
                                        id="exampleFormControlTextarea1"
                                        rows="5"><?php echo $product_detailed_description; ?></textarea>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Stock-UOM</label>
                                    <input type="text" id="modalEditUserFirstName" name="stock_uom_id"
                                        value="<?php echo $stock_uom_id; ?>" class="form-control"
                                        placeholder="Stock-UOM" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">MIN Selling
                                        Quantity</label>
                                    <input type="text" id="modalEditUserFirstName" name="min_selling_qty"
                                        value="<?php echo $min_selling_qty; ?>" class="form-control"
                                        placeholder="MIN Selling Quantity" />
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Is the Product Refundable?</span>
                                        <input type="checkbox" name="refundable" value="<?php echo $refundable; ?>"
                                            class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
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