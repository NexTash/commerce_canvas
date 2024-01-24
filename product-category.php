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

                    <!-- Content -->


                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Product /</span> Category
                        </h4>

                        <div class="card p-2 w-100" style="overflow-x: auto;">
                            <div class="card-datatable table-responsive overflow-hidden">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header flex-column flex-md-row">
                                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                            <div class="dt-buttons"> <button type="button" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#adduser">
                                                    <span><i class="bx bx-plus me-sm-1"></i> <span
                                                            class="d-none d-sm-inline-block">Add New Product</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $results = mysqli_query($db, "SELECT * FROM product_category"); ?>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Parent Category</th>
                                        <th>Is Child</th>
                                        <th>Category Title</th>
                                        <th>Category Description</th>
                                        <th>Brand ID</th>
                                        <th>Category Media Id</th>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['parent_category']; ?></td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['is_child'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td><?php echo $row['category_title']; ?></td>
                                        <td><?php echo $row['category_description']; ?></td>
                                        <td><?php echo $row['brand_id']; ?></td>
                                        <td><?php echo $row['category_media_id']; ?></td>
                                        <td>
                                            <a href="product-category-edit.php?edit=<?php echo $row['category_id']; ?>">
                                                <button type="button" class='btn btn-outline-primary'>
                                                    <i class="bx bxs-edit"></i>
                                                </button>
                                            </a>
                                            <a
                                                href="modules/product-category.php?del=<?php echo $row['category_id']; ?>">
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
            <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3>Category Information</h3>

                            </div>

                            <form id="editUserForm" method="POST" action="" class="row g-3">
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

                                </div>

                                <div id="checkbox-unchecked" style="display:none;">
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