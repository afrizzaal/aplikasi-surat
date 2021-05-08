<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi SURAT</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">

  <div class="wrapper">
    <header class="main-header">
      <a href="<?= base_url('dashboard') ?>" class="logo">
        <span class="logo-lg">APLIKASI<b>SURAT</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">3</span>
              </a> -->
              <!-- <ul class="dropdown-menu">
                <li class="header">You have 3 tasks</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <h3>Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul> -->
            </li>
            <!-- User Account -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/default.jpg" class="user-image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
              </a>

              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/default.jpg" class="img-circle">
                  <p><?= $this->fungsi->user_login()->name ?>
                    <small><?= $this->fungsi->user_login()->address ?></small>
                  </p>
                </li>

                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->

                  <div class="pull text-center">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-flat bg-red" onclick="return confirm('Apakah anda akan keluar?')">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/dist/img/default.jpg" class="img-circle">
          </div>
          <div class="pull-left info">
            <p><?= $this->fungsi->user_login()->username ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form> -->
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>

          <li <?= $this->uri->segment(1) == 'suratm' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('suratm') ?>"> <i class="fa fa-envelope"></i> <span>Surat Masuk</span></a>
          </li>

          <!-- <?php if ($this->fungsi->user_login()->level == 1) { ?>
          <li <?= $this->uri->segment(1) == 'disposisi' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('disposisi') ?>"> <i class="fa fa-pencil"></i> <span>Disposisi</span></a>
          </li>
          <?php } ?> -->

          <li <?= $this->uri->segment(1) == 'suratk' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('suratk') ?>"><i class="fa fa-envelope"></i> <span>Surat Keluar</span></a>
          </li>


          <li <?= $this->uri->segment(1) == 'indeks' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('indeks') ?>"><i class="fa fa-code"></i> <span> Indeks</span></a>
          </li>


          <!-- <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li <?= $this->uri->segment(1) == 'indeks' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('indeks') ?>"><i class="fa fa-code"></i> <span> Indeks</span></a>
            </li>
          <?php } ?> -->


          <li <?= $this->uri->segment(1) == 'data_terkait' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('data_terkait') ?>"><i class="fa fa-folder"></i> <span>Data Terkait</span></a>
          </li>


          <!-- <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li <?= $this->uri->segment(1) == 'data_terkait' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('data_terkait') ?>"><i class="fa fa-folder"></i> <span>Data Terkait</span></a>
            </li>
          <?php } ?> -->

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Laporan</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'laporan_sm' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_sm') ?>"><i class="fa fa-circle-o"></i> Laporan Surat Masuk</a></li>
                <li <?= $this->uri->segment(1) == 'laporan_dp' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_dp') ?>"><i class="fa fa-circle-o"></i> Laporan Disposisi</a></li>
                <li <?= $this->uri->segment(1) == 'laporan_sk' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_sk') ?>"><i class="fa fa-circle-o"></i> Laporan Surat Keluar</a></li>
                <li <?= $this->uri->segment(1) == 'indeks/print' ? 'class="active"' : '' ?>><a href="<?= site_url('indeks/print') ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Indeks</a></li>
                <li <?= $this->uri->segment(1) == 'data_terkait/print' ? 'class="active"' : '' ?>><a href="<?= site_url('data_terkait/print') ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Data Terkait</a></li>
                <li <?= $this->uri->segment(1) == 'user/print' ? 'class="active"' : '' ?>><a href="<?= site_url('user/print') ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan User</a></li>
              </ul>
            </li>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 3) { ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Laporan</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'laporan_sm' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_sm') ?>"><i class="fa fa-circle-o"></i> Laporan Surat Masuk</a></li>
                <li <?= $this->uri->segment(1) == 'laporan_sk' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_sk') ?>"><i class="fa fa-circle-o"></i> Laporan Surat Keluar</a></li>
                <li <?= $this->uri->segment(1) == 'laporan_dp' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_dp') ?>"><i class="fa fa-circle-o"></i> Laporan Disposisi</a></li>
                <li <?= $this->uri->segment(1) == 'indeks/print' ? 'class="active"' : '' ?>><a href="<?= site_url('indeks/print') ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Indeks</a></li>
                <li <?= $this->uri->segment(1) == 'data_terkait/print' ? 'class="active"' : '' ?>><a href="<?= site_url('data_terkait/print') ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan Data Terkait</a></li>
                <li <?= $this->uri->segment(1) == 'user/print' ? 'class="active"' : '' ?>><a href="<?= site_url('user/print') ?>" target="_blank"><i class="fa fa-circle-o"></i> Laporan User</a></li>
              </ul>
            </li>
          <?php } ?>

          <!-- <li <?= $this->uri->segment(1) == 'laporan' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('laporan') ?>"><i class="fa fa-print"></i> <span>Laporan</span></a>
          </li> -->

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">SETTINGS</li>
            <li><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
          <?php } ?>
        </ul>
      </section>
    </aside>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>

    <!-- <footer class="main-footer text-center">
      <div class="pull-right hidden-xs"> 
      </div>
      <strong>&copy; 2020 M Afrijal Amrulah - </strong> All rights reserved.
    </footer> -->

  </div>

  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script>
    var flash = $('#flash').data('flash');
    if (flash) {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: flash
      })
    }


    $(document).on('click', '#btn-hapus', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#table1').dataTable()
    })
  </script>

</body>

</html>