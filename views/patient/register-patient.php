<?php session_start();
$user = $_SESSION['user'];

spl_autoload_register(function ($class) {
  if (file_exists('../../class/' . $class . '.php')) {
    require_once '../../class/' . $class . '.php';
  }
});

$role = new Role("", "", "", "");
$userRole = $role->getRole($user)

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bwaila MHS / Register Patient</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../../https://fonts.gstatic.com" rel="preconnect">
  <link href="../../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Bwaila HMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ucfirst($_SESSION['firstName'])  ?> . <?php echo ucfirst($_SESSION['lastName']) ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo ucfirst($_SESSION['firstName']) ?> . <?php echo ucfirst($_SESSION['lastName']) ?></h6>
              <span><?php echo $userRole; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../other/users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
        
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../other/sign-out.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="../home.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-emoji-dizzy"></i><span>Patient</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content show " data-bs-parent="#sidebar-nav">
          <li>
            <a href="patient/register-patient.php" class="active">
              <i class="bi bi-circle"></i><span>Register Patient</span>
            </a>
          </li>
          <li>
            <a href="view-patients.php">
              <i class="bi bi-circle"></i><span>View Registered Patients</span>
            </a>
          </li>

          <li>
            <a href="../referrel/register-referrel.php" >
              <i class="bi bi-circle"></i><span>Referrals</span>
            </a>
          </li>
          <li>
            <a href="../diagnosis/register-diagnosis.php">
              <i class="bi bi-circle"></i><span>Add Diagnosis</span>
            </a>
          </li>
          <li>
            <a href="../treatment/register-treatment.php">
              <i class="bi bi-circle"></i><span>Add Treatment</span>
            </a>
          </li>

        </ul>
      </li><!-- End Components Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>User & Role </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../user/view-active-users.php">
              <i class="bi bi-circle"></i><span>Active Users</span>
            </a>
          </li>
          <li>
            <a href="../user/view-inactive-users.php">
              <i class="bi bi-circle"></i><span>Inactive Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-shop"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../department/register-department.php">
              <i class="bi bi-circle"></i><span>Register Department</span>
            </a>
          </li>
          <li>
            <a href="../department/departments.php">
              <i class="bi bi-circle"></i><span>View Departments</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-speedometer"></i><span>Charts and Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->





    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register Patient</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Patient</li>
          <li class="breadcrumb-item active">Register Patient</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Enter Patient Details </h5>


          <!-- Custom Styled Validation -->
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="firstName" class="form-label">fullname</label>
              <input type="text" class="form-control" id="fullName" required>
              <div class="invalid-feedback">
                Please enter full name
              </div>
            </div>
           
            <div class="col-md-12">
              <label for="dob" class="form-label">Date of Birth</label>
              <div class="input-group has-validation">

                <input type="date" class="form-control" id="dob" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a date of birth.
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <label for="sex" class="form-label">Sex</label>
              <select class="form-select" id="sex" required>
                <option selected disabled value="">Choose Gender...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>

              </select>
              <div class="invalid-feedback">
                Please select a valid region.
              </div>
            </div>

            <div class="col-md-12">
              <label for="contactAddress" class="form-label">Contact Number</label>
              <div class="input-group has-validation">

                <input type="text" class="form-control" id="contactNumber" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a contact address.
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Email(Optional)</label>
              <div class="input-group has-validation">

                <input type="email" class="form-control" id="email" aria-describedby="inputGroupPrepend">
                <div class="invalid-feedback">
                  Please choose a email.
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">contact Address</label>
              <div class="input-group has-validation">

                <textarea type="text" class="form-control" id="contactAddress" aria-describedby="inputGroupPrepend"></textarea>
                <div class="invalid-feedback">
                  Please choose a email.
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom04" class="form-label">Region</label>
              <select class="form-select" id="select_region" required>
                <option selected disabled value="">Choose Region...</option>
                <option value="northern">Northen Region</option>
                <option value="central">Central Region</option>
                <option value="southern">Sourthern Region</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid region.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom04" class="form-label">District</label>
              <select class="form-select" id="select_district" required>
                <option selected disabled value="">Choose District...</option>

              </select>
              <div class="invalid-feedback">
                Please select a valid district.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom03" class="form-label">TA</label>
              <input type="text" class="form-control" id="ta" required>
              <div class="invalid-feedback">
                Please provide a valid tradional authority.
              </div>
            </div>

            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Village</label>
              <input type="text" class="form-control" id="village" required>
              <input type="hidden" id="userId" value="<?php echo $user; ?>">
              <div class="invalid-feedback">
                Please provide village name .
              </div>


            </div>


            <div class="col-12">

            </div>

          </form><!-- End Custom Styled Validation -->

          <div class="col-12">
            <button class="btn btn-primary" id="save_patient">Next</button>
          </div>

        </div>
      </div>



    </div>
    </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <strong><span>BWAILA HMS <?php echo date("Y") ?></span></strong>.
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>



  <script src="../../assets/js/main.js"></script>
  <script src="../../assets/js/patient/register_patient_.js"></script>

</body>

</html>