<?php require_once "modules/customers.php"; ?>

<?php 
    if (isset($_GET['edit'])) {
        $user_id = $_GET['edit'];
        $update = true;
        $rec = mysqli_query($db, "SELECT * FROM users WHERE user_id=$user_id");
        $record = mysqli_fetch_array($rec);
        $first_name = $record['first_name'];
        $last_name = $record['last_name'];
        $group_id  = $record['group_id'];
        $username = $record['username'];
        $email = $record['email'];
        $phone = $record['phone'];
        $contact_id  = $record['contact_id'];
        $password = $record['password'];
        $reward_points = $record['reward_points'];
        $role_id  = $record['role_id'];
        $created_at = $record['created_at'];
        $user_id = $record['user_id'];

        }
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
    data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template">

<?php
include "components/head.php"; ?>

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
                            <h3 style='text-align: center;'>Edit Customer Information</h3>
                            <!-- Add new record Modal -->
                            <form id="editUserForm" class="row g-3" method="POST" action="">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">First Name</label>
                                    <input type="text" id="modalEditUserFirstName" name="first_name"
                                        value="<?php echo $first_name; ?>" class="form-control" placeholder="John" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserLastName">Last Name</label>
                                    <input type="text" id="modalEditUserLastName" name="last_name"
                                        value="<?php echo $last_name; ?>" class="form-control" placeholder="Doe" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Username</label>
                                    <input type="text" id="modalEditUserName" name="username"
                                        value="<?php echo $username; ?>" class="form-control"
                                        placeholder="john.doe.007" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserEmail">Email</label>
                                    <input type="email" id="modalEditUserEmail" name="email"
                                        value="<?php echo $email; ?>" class="form-control"
                                        placeholder="example@domain.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserStatus">Group ID
                                    </label>
                                    <select id="modalEditUserStatus" name="group_id" value="<?php echo $group_id; ?>"
                                        class="form-select" aria-label="Default select example">
                                        <option selected>Group</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditTaxID">Contact ID</label>
                                    <input type="text" id="modalEditTaxID" name="contact_id"
                                        value="<?php echo $contact_id; ?>" class="form-control modal-edit-tax-id"
                                        placeholder="123 456 7890" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserPhone">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">+92</span>
                                        <input type="text" id="modalEditUserPhone" name="phone"
                                            value="<?php echo $phone; ?>" class="form-control phone-number-mask"
                                            placeholder="202 555 0111" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Role</label>
                                    <input type="text" id="modalEditUserFirstName" name="role_id"
                                        value="<?php echo $role_id; ?>" class="form-control" placeholder="Role" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Password</label>
                                    <input type="text" id="modalEditUserFirstName" name="password"
                                        value="<?php echo $password; ?>" class="form-control" placeholder="Password" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Created at</label>
                                    <input type="date" id="modalEditUserFirstName" name="created_at"
                                        value="<?php echo $created_at; ?>" class="form-control" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserFirstName">Reward Points</label>
                                    <input type="text" id="modalEditUserFirstName" name="reward_points"
                                        value="<?php echo $reward_points; ?>" class="form-control"
                                        placeholder="Reward Points" />
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