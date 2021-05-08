<section class="content-header">
  <h1>Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!-- Main Content -->
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Surat Masuk</span>
          <span class="info-box-number"><?= $this->fungsi->count_suratm() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->


    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-pencil"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Disposisi</span>
          <span class="info-box-number"><?= $this->fungsi->count_disposisi() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>


    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Surat Keluar</span>
          <span class="info-box-number"><?= $this->fungsi->count_suratk() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <!-- <div class="clearfix visible-sm-block"></div> -->

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-code"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Indeks</span>
          <span class="info-box-number"><?= $this->fungsi->count_indeks() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-folder"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Terkait</span>
          <span class="info-box-number"><?= $this->fungsi->count_dataterkait() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <?php if ($this->fungsi->user_login()->level == 1) { ?>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-gray"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Users</span>
            <span class="info-box-number"><?= $this->fungsi->count_user() ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    <?php } ?>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>