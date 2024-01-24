<?php require_once "classes/app.php"; ?>
<?php require_once "modules/customer-group.php"; ?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template">

<?php include 'components/head.php';?>
<body>


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
          <!-- / Content -->
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