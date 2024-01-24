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

<?php include 'components/head.php';?>

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
                            <h3 style='text-align: center;'>Edit Group Information</h3>
                            <!-- Add new record Modal -->
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                                <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
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