<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo2.png">
  <link rel="icon" type="image/png" href="../assets/img/logo2.png">
  <title>
    MyBrada - Sign In
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
<?php if(session()->has('errors')): ?>
  <div class="alert alert-danger">
    <ul>
      <?php foreach(session('errors') as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<?php if(session()->has('error')): ?>
  <div class="alert alert-danger">
    <?= session('error') ?>
  </div>
<?php endif ?>

<main class="main-content mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Controller Portal</h4>
                <p class="mb-0">Control everything, in the palm of your hands</p>
              </div>
              <div class="card-body">
                <form id="loginForm" novalidate>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 mt-4">Sign in</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('../assets/img/header.jpeg'); background-size: cover;">
              <span class="mask bg-gradient-primary opacity-6"></span>
              <h4 class="mt-5 text-white font-weight-bolder position-relative">Your Voice Matters</h4>
              <p class="text-white position-relative">Break The Silence. STOP VIOLENCE Against Women and Children</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


<script>
// Bootstrap custom validation script
(() => {
  'use strict'
  const forms = document.querySelectorAll('form')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      // Prevent submission if invalid
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        form.classList.add('was-validated')
        return; // Don't proceed with AJAX if form invalid
      }

      event.preventDefault()  // Prevent default for valid form

      form.classList.add('was-validated')

      const formData = new FormData(form);

      axios.post('attemptLogin', formData)
        .then(function (response) {
          if (response.data.status === 'success') {
            window.location.href = '/dashboard';  // Redirect on success
          } else {
            Swal.fire({
              icon: "error",
              title: "Incorrect Credentials",
              text: "An error occurred while logging in.",
            });
          }
        })
        .catch(function (error) {
          console.error(error);
          Swal.fire({
            icon: "error",
            title: "Login Failed",
            text: "An error occurred while logging in.",
          });
        });
    }, false)
  })
})()


</script>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>