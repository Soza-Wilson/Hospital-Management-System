<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - Bwaila HMS</title>
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../../assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">HMS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="firstName" class="form-label">Your First Name</label>
                      <input type="text" name="firstName" class="form-control" id="firstName" required>
                      <div class="invalid-feedback">Please, enter your first name!</div>
                    </div>

                    <div class="col-12">
                      <label for="lastName" class="form-label">Your Last Name</label>
                      <input type="text" name="lastName" class="form-control" id="lastName" required>
                      <div class="invalid-feedback">Please, enter your last name!</div>
                    </div>


                    <div class="col-12">
                      <label for="email" class="form-label">Your Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="dob" class="form-label">Date Of Birth</label>
                      <div class="input-group has-validation">
                        <input type="date" name="dob" class="form-control" id="dob" required>
                        <div class="invalid-feedback">Please choose a date of birth.</div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="sex" class="form-label">Sex</label>
                      <div class="input-group has-validation">



                        <select class="form-control" id="sex" required>
                          <option value="male">Male</option>
                          <option value="feamle">female</option>
                        </select>
                        <div class="invalid-feedback">Please select gender.</div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="address" class="form-label">Contact Address</label>
                      <div class="input-group has-validation">

                        <textarea name="username" class="form-control" id="address" cols="10" required></textarea>
                        <div class="invalid-feedback">Please enter Contact Address.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="address" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                      <div class="invalid-feedback">Please enter your password!</div>


                      <div class='progress' style='height: 5px;'>
                        <div id='progress' class='progress-bar progress-bar-striped bg-danger' role='progressbar' style='width: 0%' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'></div>
                      </div>

                      <label class="label"><span id='statusBadge' class=""></span> </label></br>
                      <h7 class='label' id='passwordResponse'> <i class='bi bi-info-circle-fill text-primary'></i><span class='badge text-dark'></span></h7></br>


                    </div>


                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Repeat Password</label>
                      <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                      <h7 class='label' id='verifyResponse'> <i class='bi bi-info-circle-fill text-danger'></i><span class='badge text-dark'>Passwords are no matching</span></h7>
                    </div>


                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>

                    
                  </form>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" id="save">Create Account</button>

                  </div>

                  <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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

  <!-- Page JS File -->
  <script src="../../assets/js/main.js"></script>
  <script src="../../assets/js/user/register___.js"></script>

</body>

</html>