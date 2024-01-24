<?php require_once "modules/customers.php"; ?>

<?php 
    if (isset($_GET['edit'])) {
        $user_id = $_GET['edit'];
        $update = true;
        $rec = mysqli_query($db, "SELECT * FROM users id WHERE $user_id=user_id");
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
            <?php include "components/sidebar.php";?>
            <!-- Layout container -->
            <div class="layout-page">
                <?php include "components/navbar.php"; ?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4">
                            <span class="text-muted fw-light">Customer /</span> List
                        </h4>
                        <div class="card p-2  w-100 " style="overflow-x: auto;">
                            <div class="card-datatable table-responsive overflow-hidden">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="card-header flex-column flex-md-row">
                                        <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                            <div class="dt-buttons"> <button type="button" class="btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#adduser"><span><i
                                                            class="bx bx-plus me-sm-1"></i> <span
                                                            class="d-none d-sm-inline-block">Add New
                                                            Record</span></span></button> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Group ID</th>
                                        <th>Contact ID</th>
                                        <th>Phone No</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                        <th>Created At</th>
                                        <th>Reward Points</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php while ($row = mysqli_fetch_array($results)) { ?>

                                <tr>
                                    <td><?= $row['first_name']; ?></td>
                                    <td><?= $row['last_name']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['contact_id']; ?></td>
                                    <td><?= $row['phone']; ?></td>
                                    <td><?= $row['role_id']; ?></td>
                                    <td><?= $row['password']; ?></td>
                                    <td><?= $row['created_at']; ?></td>
                                    <td><?= $row['reward_points']; ?></td>
                                    <td>
                                        <a href="customer-list-edit.php?edit=<?php echo $row['user_id']; ?>"> <button
                                                type="button" class='btn btn-outline-primary'><i
                                                    class="bx bxs-edit"></i></button></a>
                                        <a href="modules/customers.php?del=<?php echo $row['user_id']; ?>"><button
                                                type='button' class='btn btn-outline-danger'><i
                                                    class='bx bxs-trash'></i></button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>


                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Add new record Modal -->
            <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3>Customer Information</h3>

                            </div>
                            <form id="editUserForm" class="row g-3" method="POST" action="">
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
                                        name="save">save</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add new record Modal -->

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>


            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <?php include "components/script.php";
?>

</body>

</html>