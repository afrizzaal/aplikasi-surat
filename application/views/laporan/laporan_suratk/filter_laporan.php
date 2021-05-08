<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Laporan</li>
  </ol>
</section>
<!-- Main Content -->
<section class="content">
  <h3 class="box-title"><b>Filter Laporan Surat Keluar</b></h3>
  <div class="">
    <div class="box-header">
      <div class="pull">
        <form method="POST" action="<?php echo base_url('laporan_sk') ?>">
          <div class="form-group">
            <div class="col-sm-5">
              <label>Dari Tanggal</label>
              <input type="date" name="dari" class="form-control">
              <?php echo form_error('dari', '<span class="text-small text-danger">', '</span>') ?>
            </div>

            <!-- <div class="form-group"> -->
            <div class="col-sm-5">
              <label>Sampai Tanggal</label>
              <input type="date" name="sampai" class="form-control">
              <?php echo form_error('sampai', '<span class="text-small text-danger">', '</span>') ?>
            </div>

            <div class="col-sm-2">
              <label>&nbsp;</label><br>
              <button type="submit" class="btn btn-sm btn-primary"> Tampilkan Data</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>