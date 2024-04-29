<?php
session_start();
$user = $_SESSION['user'];
spl_autoload_register(function ($class) {
    if (file_exists('../../class/' . $class . '.php')) {
        require_once '../../class/' . $class . '.php';
    }
});

$patient = new Patient($_GET['patientID'], "", "", "", "", "", "", "", "", "", "", "");
$patientData = $patient->getPatientDetails();

$role = new Role("", "", "", "");
$userRole = $role->getRole($user);

$diagnosis = new Diagnosis($_GET['diagnosisID'], "", "", "", "", "", "", "", "", "");
$diagnosisData = $diagnosis->getDiagnosisDetails()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bwaila HMS / View Diagnosis Details </title>
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
                        <a href="../patientregister-patient.php">
                            <i class="bi bi-circle"></i><span>Register Patient</span>
                        </a>
                    </li>
                    <li>
                        <a href="../patientview-patients.php">
                            <i class="bi bi-circle"></i><span>View Registered Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="../referrelregister-referrel.php">
                            <i class="bi bi-circle"></i><span>Referrals</span>
                        </a>
                    </li>
                    <li>
                        <a href="register-diagnosis.php" class="active">
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
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>General Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
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
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Chart.js</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>ApexCharts</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-echarts.html">
                            <i class="bi bi-circle"></i><span>ECharts</span>
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
            <h1> Diagnosis</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Register Diagnosis</li>
                    <li class="breadcrumb-item active">View Diagnosis Details </li>

                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">

                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="../../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            <h2><?php echo ucfirst($patientData["full_name"]) ?> </h2>
                            <h3>DOB : <?php echo Util::convert_date($patientData['date_of_birth']); ?> / Sex : <?php echo $patientData['sex']; ?></h3>
                            <h6>District : <?php echo $patientData['district']; ?> / village :<?php echo $patientData['village']; ?> TA : <span> <?php echo $patientData['TA']; ?> </span></h6>


                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <div class="card-header">
                                <h6> Diagnosis Assistant </h6>
                            </div>
                            <button class=" btn btn-dark rounded-pill"><i class="ri ri-bilibili-fill"></i></button>


                        </div>
                    </div>

                </div>


                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#diagnosis">Diagnosis</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vitals">Vitals (Optinal)</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lab-test">Lab Test (Optional)</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Physical Examination (Optional)</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">



                                <div class="tab-pane fade show active profile-overview profile-edit pt-3" id="diagnosis">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3 needs-validation">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Present Complaint</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control diagnosis" placeholder="Enter complaint" id="presentComplaint" required><?php echo $diagnosisData['prensent_complaint'] ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter complaint.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">History (Optional)</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control diagnosis" placeholder="Enter complaint history" id="presentComplaintHistory"><?php echo $diagnosisData['history'] ?></textarea>



                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Diagnosis / Medical Condition Identified</label>
                                            <div class="col-md-8 col-lg-9">

                                                <textarea name="diagnosisName" id="diagnosisName" type="text" class="form-control diagnosis" placeholder="Enter condition identified" required><?php echo $diagnosisData['diagnosis_name'] ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter medical condition identified.
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control diagnosis" placeholder="Enter Description" id="diagnosisDescription" required><?php echo $diagnosisData['description'] ?></textarea>
                                                <input type="hidden" id="patientId" value="<?php echo $_GET['patientID'] ?>">
                                                <input type="hidden" id="doctorId" value="<?php echo $user ?>">
                                                <div class="invalid-feedback">
                                                    Please enter condition description.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Date</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="date" class="form-control diagnosis" placeholder="Enter Description" id="diagnosisDescription" value="<?php echo $diagnosisData['diagnosis_date'] ?>"></input>
                                                <input type="hidden" id="patientId" value="<?php echo $_GET['patientID'] ?>">
                                                <input type="hidden" id="doctorId" value="<?php echo $user ?>">
                                                <div class="invalid-feedback">
                                                    Please enter condition description.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Diagnosis By</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control diagnosis" placeholder="Enter Description" id="diagnosisDescription" value="<?php echo $diagnosisData['first_name'] . " " . $diagnosisData['last_name'] ?>"></input>
                                                <input type="hidden" id="patientId" value="<?php echo $_GET['patientID'] ?>">
                                                <input type="hidden" id="doctorId" value="<?php echo $user ?>">
                                                <input type="hidden" id="diagnosisId" value="<?php echo $_GET["diagnosisID"] ?>">
                                                <div class="invalid-feedback">
                                                    Please enter condition description.
                                                </div>

                                            </div>
                                        </div>















                                    </form><!-- End Profile Edit Form -->

                                    <div class="text-center">
                                        <button id="saveDiagnosis" class="btn btn-primary">Update</button>
                                    </div>
                                </div>


                                <div class="tab-pane fade profile-edit pt-3" id="vitals">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3 needs-validation-vitals">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Temperature</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="temperature" id="temperature" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Blood Pressure</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="bloodPressure" id="bloodPressure" type="text" class="form-control" required>
                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Heart Rate</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="heartRate" type="text" class="form-control" id="heartRate" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Respiratory Rate</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" id="respiratoryRate" class="form-control" required>
                                                <input type="hidden" id="vitalsId" class="form-control">
                                            </div>
                                        </div>









                                    </form><!-- End Profile Edit Form -->


                                    <div class="text-center">
                                        <button type="submit" id="saveVitals" class="btn btn-primary">Save Changes</button>
                                    </div>

                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="lab-test">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3 needs-validation-lab-test">


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Urine Tests</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="urineTest" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Blood Tests</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="bloodTest" required>
                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Emaging Studies</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="imagingStudies" required>
                                            </div>
                                        </div>













                                    </form><!-- End Profile Edit Form -->

                                    <div class="text-center">
                                        <button id="saveLabTest" class="btn btn-primary">Save Changes</button>
                                    </div>

                                </div>



                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form class="row g-3 needs-validation-physical" action="../../controller/physical.php" method="POST" enctype="multipart/form-data">

                                        <div class="row mb-3">
                                            <label for="currentPassword" class=" col-lg-3 col-form-label">Examination Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="examinationName" type="text" class="form-control" id="examinationName" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Documents</label>
                                            <div class="col-md-6 col-lg-6">
                                                <input type="hidden" id="tempName">
                                                <input type="file" name="documents" class="form-control" id="documents" required>
                                            </div>
                                              <div class="col-md-2 col-lg-2">
                                                <div id="buttons">

                                                </div>
                                            </div>


                                        </div>




                                    </form><!-- End Change Password Form -->
                                    <div class="text-center column">
                                        <button id="SaveExamination" class="btn btn-primary">Save</button>
                                       
                                    </div>



                                </div>

                            </div><!-- End Bordered Tabs -->

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
    <script src="../../assets/js/diagnosis/add_diagnosis_details__.js"></script>
    <script src="../../assets/js/vitals/register_vitals__.js"></script>
    <script src="../../assets/js/labTest/register_lab_test__.js"></script>
    <script src="../../assets/js/physical/physical_exam.js"></script>




</body>

</html>