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
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Product /</span> Brand List
                        </h4>
                        <div class="card p-2 w-100 " style="overflow-x:auto ;">
                            <div class="card-datatable table-responsive overflow-hidden">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header flex-column flex-md-row">
                                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                            <div class="dt-buttons">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#adduser">
                                                    <span><i class="bx bx-plus me-sm-1"></i>
                                                        <span class="d-none d-sm-inline-block">Add New Brand</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $results = mysqli_query($db, "SELECT * FROM brand"); ?>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Brand Title</th>
                                        <th>Brand Description</th>
                                        <th>Brand Image</th>
                                        <th>Alt Image</th>
                                        <th>Show in Brand Menu</th>
                                        <th>Disable it</th>
                                        <th>Feature it</th>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['brand_title']; ?></td>
                                        <td><?php echo $row['brand_description']; ?></td>
                                        <td><?php echo $row['brand_image']; ?></td>
                                        <td><?php echo $row['alt_image']; ?></td>
                                        <td>
                                            <div class="col-12">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input"
                                                        <?php echo $row['show_in_brand_menu'] ? 'checked' : ''; ?>>
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
                                                        <?php echo $row['disabled'] ? 'checked' : ''; ?>>
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
                                                        <?php echo $row['featured'] ? 'checked' : ''; ?>>
                                                    <span class="switch-toggle-slider">
                                                        <span class="switch-on"></span>
                                                        <span class="switch-off"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="brand-list-edit.php?edit=<?php echo $row['brand_id']; ?>">
                                                <button type="button" class='btn btn-outline-primary'><i
                                                        class="bx bxs-edit"></i></button>
                                            </a>
                                            <a href="modules/brand-list.php?del=<?php echo $row['brand_id']; ?>">
                                                <button type='button' class='btn btn-outline-danger'><i
                                                        class='bx bxs-trash'></i></button>
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

            <!-- Add User Modal -->
            <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3>Brand Information</h3>
                            </div>
                            <form id="editUserForm" class="row g-3" method="post" enctype="multipart/form-data">
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
        <?php include 'components/script.php'; ?>
</body>

</html>