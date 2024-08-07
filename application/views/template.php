<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Siakad</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/') ?>img/logo/logo.png" rel="icon">
  <link href="<?= base_url('assets/') ?>img/logo/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/nice/assets') ?>/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/backend/nice/assets') ?>/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Siakad</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('nama_lengkap'); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $this->session->userdata('nama_lengkap'); ?></h6>
              <span>
                Online
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
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
      <?php
      $id_level_user = $this->session->userdata('id_level_user');

      $sql_menu = "SELECT * FROM `tabel_menu` WHERE id IN(SELECT id_menu FROM tbl_user_rule WHERE id_level_user = $id_level_user) AND is_main_menu = 0";

      $main_menu  = $this->db->query($sql_menu)->result();
      ?>
      <!-- Nav Item - Dashboard -->
      <?php foreach ($main_menu as $main) : ?>
        <?php $submenu = $this->db->get_where('tabel_menu', array('is_main_menu' => $main->id)); ?>
        <?php if ($submenu->num_rows() == 0) : ?>

          <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() . $main->link; ?>">
              <i class="bi <?= $main->icon; ?>"></i>
              <span><?= $main->nama_menu; ?></span></a>
          <?php else : ?>


          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?= $main->id; ?>" aria-expanded="true" aria-controls="collapse<?= $main->id; ?>">
              <i class="bi <?= $main->icon; ?>"></i>
              <span><?= $main->nama_menu; ?></span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="collapse<?= $main->id; ?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">

              <?php foreach ($submenu->result() as $s) : ?>
                <li>
                  <a href="<?= $s->link; ?>">
                    <i class="bi bi-circle"></i><span><?= $s->nama_menu; ?></span>
                  </a>
                </li>
              <?php endforeach; ?>

            </ul>
          </li>
        <?php endif; ?>
        </li>


      <?php endforeach; ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('auth/logout'); ?>">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span></a>

      </li>





    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= ucwords($this->uri->segment(2)) ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><?= ucwords($this->uri->segment(1)) ?></li>
          <li class="breadcrumb-item active"><?= ucwords($this->uri->segment(2)) ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <?php echo $contents; ?>
          </div>
        </div>
      </section>


    </div>
  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Siakad</span></strong> by Sania. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('assets/backend/nice/assets') ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/backend/nice/assets') ?>/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#kabupaten');
    $(document).ready(function() {

      $('#provinsi').change(function() {
        $('#default_text').text("Pilih Kab/Kota").addClass('default');
        $('#default_text2').text("Pilih Kecamatan").addClass('default');
        $('#default_text3').text("Pilih Kelurahan").addClass('default');

        var kode = $('#provinsi').val();
        console.log(kode);
        $.ajax({
          url: "<?= base_url('auth/cariKab'); ?>",
          method: "POST",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(array) {
            var html = '';
            html += '<option value="" selected hidden>Pilih Kab/Kota</option>';


            for (let index = 0; index < array.length; index++) {
              html += "<option value='" + array[index].kode + "'>" + array[index].nama + "</option>"

            }
            $('#kabupaten').html(html);
            $('#kecamatan').html('<option value="" selected hidden>Pilih Kecamatan</option>');
            $('#kelurahan').html('<option value="" selected hidden>Pilih Kelurahan</option>');
          }
        })
      })
    })

    $('#kecamatan')
      .change();
    $(document).ready(function() {

      $('#kabupaten').change(function() {
        $('#default_text2').text("Pilih Kecamatan").addClass('default');
        $('#default_text3').text("Pilih Kelurahan").addClass('default');

        var kode = $('#kabupaten').val();
        console.log(kode);
        $.ajax({
          url: "<?= base_url('auth/cariKec'); ?>",
          method: "POST",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(array) {
            var html = '';
            html += '<option value="" selected hidden>Pilih Kecamatan</option>';

            for (let index = 0; index < array.length; index++) {
              html += "<option value='" + array[index].kode + "'>" + array[index].nama + "</option>"

            }
            $('#kecamatan').html(html);
            $('#kelurahan').html('<option value="" selected hidden>Pilih Kelurahan</option>');
          }
        })
      })
    })

    $('#kelurahan')
      .change();
    $(document).ready(function() {

      $('#kecamatan').change(function() {
        $('#default_text3').text("Pilih Kelurahan").addClass('default');

        var kode = $('#kecamatan').val();
        console.log(kode);
        $.ajax({
          url: "<?= base_url('auth/cariKel'); ?>",
          method: "POST",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(array) {
            var html = '';
            html += '<option value="" selected hidden>Pilih Kelurahan</option>';

            for (let index = 0; index < array.length; index++) {
              html += "<option value='" + array[index].kode + "'>" + array[index].nama + "</option>"

            }
            $('#kelurahan').html(html);
          }
        })
      })
    })
  </script>


</body>

</html>