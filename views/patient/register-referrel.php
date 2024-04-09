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

    <title>Bwaila MHS / Register Patient Referral</title>
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
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="sign-out.php">
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
                <a class="nav-link " href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-emoji-dizzy"></i><span>Patient</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content show " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="register-patient.php">
                            <i class="bi bi-circle"></i><span>Register Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="view-patients.php">
                            <i class="bi bi-circle"></i><span>View Registered Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="register-referrel.php" class="active">
                            <i class="bi bi-circle"></i><span>Referrals</span>
                        </a>
                    </li>
                    <li>
                        <a href="register-diagnosis.php">
                            <i class="bi bi-circle"></i><span>Add Diagnosis</span>
                        </a>
                    </li>
                    <li>
                        <a href="register-treatment.php">
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
            <h1> Patient Referrel</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Patient</li>
                    <li class="breadcrumb-item active"> Patient Referrel</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        <div class="col-lg-12">

            <div class="card">



                <div class="card-body">
                    <h5 class="card-title">Register New Referral</h5>


                    <!-- Basic Modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Add New referrel
                    </button>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">


                                <div class="modal-header">
                                    <h5 class="modal-title">Register Referral</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 needs-validation"  method="POST" enctype="multipart/form-data" novalidate>

                                        <div class="col-md-7 card">

                                            
                                                <label for="sex" class="form-label">Select Patient</label>
                                                <select class="form-select" id="selectPatient" required>
                                                    <option selected disabled value="">Choose Patient...</option>


                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid region.
                                                </div>
                                           
                                            </br>

                                           
                                                <a href="register-patient.php" class="btn btn-success">register patient</a>
                                           
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Search Patient</label>
                                            <input type="text" id="searchPatientName" class="form-control" placeholder="Search Patient">
                                           
                                        </div>


                                        <div class="col-md-12">
                                            <label for="referrer" class="form-label">Reffered By</label>
                                            <input type="text" class="form-control" id="referrer" placeholder="Referrer name" required>
                                            <div class="invalid-feedback">
                                                Please enter name
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="lastName" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="referedDate" required>
                                            <div class="invalid-feedback">
                                                Please enter date
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="dob" class="form-label">Hosptital name </label>
                                            <div class="input-group has-validation">

                                                <input type="text" class="form-control" id="hospitalName" placeholder="Enter hospital name " aria-describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                    Please enter hosptal name
                                                </div>
                                            </div>
                                        </div>






                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">District</label>
                                            <select class="form-select" id="select_district" required>
                                                <option selected disabled value="">Choose District...</option>

                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid district.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">TA</label>
                                            <input type="text" class="form-control" id="ta" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid tradional authority.
                                            </div>
                                        </div>





                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Case description</label>
                                            <div class="input-group has-validation">

                                                <textarea type="text" class="form-control" id="caseDescription" aria-describedby="inputGroupPrepend" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter case description.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="email" class="form-label">Refer documentantion</label>
                                            <div class="input-group has-validation">
                                                <input type="file" id="documentation" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Please choose a documentation file .
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="registerReferrel" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->

                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Referrels</h5>


                    <table class="datatable">
                        <thead>
                            <tr>
                                <th>
                                    <b>N</b>ame
                                </th>

                                <th>Sex</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Registered Date</th>

                                <th>Status
                                <th>


                            </tr>
                        </thead>
                        <tbody>










                            <!-- Table with stripped rows -->



                        </tbody>
                    </table>


                </div>
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
    <script src="../../assets/js/patient/referrel.js"></script>

</body>

</html>