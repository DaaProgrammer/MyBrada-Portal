<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/logo2.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo2.png') ?>">
  <title><?= $title ?? 'MyBrada Portal' ?></title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap JS + Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
 -->

  <!-- CK EDIOR -->
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
  UPLOADCARE_PUBLIC_KEY = 'f30a8d5627e6171d2c62';
</script>
<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/quill-delta-to-html@0.12.1/dist/browser/QuillDeltaToHtmlConverter.bundle.js"></script>

  <!-- Your custom JS (with cache busting) -->
  <script src="<?= base_url('assets/js/main.js?v=' . time()) ?>"></script>

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 position-absolute w-100 opacity-10" style="background-image: url('../assets/img/header.jpeg');
          background-size: 60% 71; background-position:bottom center"></div>    

    <?php if (!empty($showSidebar)) : ?>
        <?= view('partials/sidebar') ?>
    <?php endif; ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">MyBrada</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= substr($title, 9) ?? 'MyBrada Portal' ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><?= substr($title, 9) ?? 'MyBrada Portal' ?></h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-6">



