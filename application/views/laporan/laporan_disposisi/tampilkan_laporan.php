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
  <h3 class="box-title center"><b>Filter Laporan Disposisi</b></h3>
  <div class="">
    <div class="box-header">
      <div class="pull">
        <form method="POST" action="<?php echo base_url('laporan_dp') ?>">
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
    <hr>

    <div class="box-body table-responsive">
      <div class="form-group">
        <a class="btn btn-sm btn-info" target="_blank" href="<?php echo base_url() . 'laporan_dp/print/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai') ?>"><i class="fa fa-print"></i> Print</a>
        <a class="btn btn-sm btn-danger" target="_blank" href="<?php echo base_url() . 'laporan_dp/pdf/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai') ?>"><i class="fa fa-file"></i> PDF</a>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Sifat Surat</th>
            <th>Isi Disposisi</th>
            <th>Batas Waktu</th>
            <th>Diteruskan Kepada</th>
            <th>Id Surat Masuk</th>
            <th>User Id</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($laporan_dp as $key => $data) { ?>
            <tr>
              <td style="width: 5%;"><?= $no++ ?></td>
              <td><?= $data->sifat_surat ?></td>
              <td><?= $data->isi_disposisi ?></td>
              <td><?= $data->batas_waktu ?></td>
              <td><?= $data->diteruskan_kepada ?></td>
              <td><?= $data->id_suratm ?></td>
              <td><?= $data->user_id ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>