<?php require_once "modules/product-list.php"; ?>

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
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Product /</span> List
                        </h4>

                        <div class="card p-2 w-100" style="overflow-x:auto;">
                            <div class="card-datatable table-responsive overflow-hidden">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header flex-column flex-md-row">
                                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                            <div class="dt-buttons">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#adduser">
                                                    <span><i class="bx bx-plus me-sm-1"></i> <span
                                                            class="d-none d-sm-inline-block">Add New Product</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $results = mysqli_query($db, "SELECT * FROM product"); ?>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Brand ID</th>
                                        <th>Product Name</th>
                                        <th>Product Code(SKU)</th>
                                        <th>Barcode</th>
                                        <th>Short Description</th>
                                        <th>Detailed Description</th>
                                        <th>Stock-UOM</th>
                                        <th>Min Selling Qty</th>
                                        <th>Refundable</th>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['category_id']; ?></td>
                                        <td><?php echo $row['brand_id']; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['product_code']; ?></td>
                                        <td><?php echo $row['barcode']; ?></td>
                                        <td><?php echo $row['product_short_description']; ?></td>
                                        <td><?php echo $row['product_detailed_description']; ?></td>
                                        <td><?php echo $row['stock_uom_id']; ?></td>
                                        <td><?php echo $row['min_selling_qty']; ?></td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['refundable'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="product-list-edit.php?edit=<?php echo $row['product_id']; ?>">
                                                <button type="button" class='btn btn-outline-primary'>
                                                    <i class="bx bxs-edit"></i>
                                                </button>
                                            </a>
                                            <a href="modules/product-list.php?del=<?php echo $row['product_id']; ?>">
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
                        <!-- Add User Modal -->
                        <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3>Product Information</h3>
                                        </div>
                                        <form id="editUserForm" method="POST" action="" class="row g-3">
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
                                                    <input type="checkbox" name="refundable" value="<?php echo $refundable; ?>" class="switch-input"
                                                        checked>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
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
                        <!--/ Add User Modal -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
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