<?php
session_start();

if (!isset($_SESSION['LOGGED_IN'])) {
    header('Location: ../login.php');
    exit();
}
$currentPage = 'certificate';

if (isset($_GET['sno'])) {
    require_once '../Controller/DbController.php';
    require_once '../Controller/UserController.php';

    $database = new DbController();
    $db = $database->getConnection();

    $user = new UserController($db);

    $sno = $_GET['sno'];

    // Fetch user details based on $sno
    $userData = $user-> getUserDetails($sno); // Assuming a method to retrieve user details

    if($_SERVER['REQUEST_METHOD']=='POST'){
      $id = $_POST["id"];
      $sno = $_POST["sno"];
      $batch_no = $_POST["batch_no"];
      $roll_no = $_POST["roll_no"];
      $full_name = $_POST["full_name"];
      $parents_name =  $_POST["parents_name"];
      $resident_of =  $_POST["resident_of"];
      $date_of_issue =  $_POST["date_of_issue"];
      $designation =  $_POST["designation"];
      $place_of_issue =  $_POST["place_of_issue"];
      $training_from =  $_POST["training_from"];
      $training_to =  $_POST["training_to"];

      if ($user->update_certificate($id, $sno, $batch_no, $roll_no, $full_name, $parents_name , $resident_of, $date_of_issue, $designation, $place_of_issue, $training_from, $training_to)) {
        header('Location: list-certificate.php');
      } else {
          echo  'Failed to Update certificate.';
      }

    }
    // Now you can populate an edit form with the user's data or perform editing actions
    // Example:
    if ($userData) {
      
        // Display your edit form or perform edit actions here using $userData
    
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../public/assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Shourya Academy | Add Certificate</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../public/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../public/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../public/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../public/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../public/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../public/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include 'common/sidebar.php'  ?>
        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../public/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../public/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block">Anish Khan</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                   
                   
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
         
     
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> Update Certificate</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Details</h5>
                    </div>
                    <div class="card-body">
                      <form method="post">
                        <input type="hidden" value="<?php echo $userData['id'] ?>" name="id">
                        <div class="row">
                          <div class="col-md-6 col-xl-6">

                            <div class="mb-3">
                              <label class="form-label" for="basic-default-S.No.">Serial No.</label>
                              <input type="text" class="form-control" id="basic-default-S.No."  name="sno" value="<?php echo $userData['sno'];?>"/>
                            </div>

                            <div class="mb-3">
                              <label class="form-label" for="basic-default-License No.">License No.</label>
                              <input type="text" class="form-control" id="basic-default-License No." placeholder="License No." value="TRG.NO.-11" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-Full Name">Full Name</label>
                              <input type="text" class="form-control" id="basic-default-Full Name" value="<?php echo $userData['full_name'];?>" name="full_name"/>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-Resident Of">Resident Of</label>
                              <input type="text" class="form-control" id="basic-default-Resident Of" value="<?php echo $userData['resident_of'];?>" name="resident_of" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-Designation">Designation</label>
                              <input type="text" class="form-control" id="basic-default-Designation" value="<?php echo $userData['designation'];?>" name="designation" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-Complete Training From">Complete Training From</label>
                              <input type="date" class="form-control" id="basic-default-Complete Training From" value="<?php echo $userData['training_from'];?>" name="training_from" />
                            </div>
                           
                          </div>
                          <div class="col-md-6 col-xl-6">
                          <div class="mb-3">
                              <label class="form-label" for="basic-default-Roll No.">Roll No.</label>
                              <input type="text" class="form-control" id="basic-default-Roll No." value="<?php echo $userData['roll_no'];?>" name="roll_no" />
                            </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-Batch No.">Batch No.</label>
                            <input type="text" class="form-control" id="basic-default-Batch No." value="<?php echo $userData['batch_no'];?>" name="batch_no" />
                          </div>
                          <div class="mb-3">
                              <label class="form-label" for="basic-default-Parents Name">Parents Name</label>
                              <input type="text" class="form-control" id="basic-default-Parents Name" value="<?php echo $userData['parents_name'];?>" name="parents_name" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-Date Of Issue">Date Of Issue</label>
                              <input type="date" class="form-control" id="basic-default-Date Of Issue" value="<?php echo $userData['date_of_issue'];?>" name="date_of_issue" />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-Place Of Issue">Place Of Issue</label>
                              <input type="text" class="form-control" id="basic-default-Place Of Issue" value="<?php echo $userData['place_of_issue'];?>" name="place_of_issue" />
                            </div>
                          
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-To">To</label>
                              <input type="date" class="form-control" id="basic-default-To" value="<?php echo $userData['training_to'];?>" name="training_to"/>
                            </div>
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- / Content -->
          

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">Tanveer and team</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../public/assets/vendor/libs/popper/popper.js"></script>
    <script src="../public/assets/vendor/js/bootstrap.js"></script>
    <script src="../public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../public/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../public/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
