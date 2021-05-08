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
    <hr>

    <div class="box-body table-responsive">
      <div class="form-group">
        <a class="btn btn-sm btn-info" target="_blank" href="<?php echo base_url() . 'laporan_sk/print/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai') ?>"><i class="fa fa-print"></i> Print</a>
        <a class="btn btn-sm btn-danger" target="_blank" href="<?php echo base_url() . 'laporan_sk/pdf/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai') ?>"><i class="fa fa-file"></i> PDF</a>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No Agenda</th>
            <th>Tanggal Surat</th>
            <th>Ditujukan Kepada</th>
            <th>Perihal</th>
            <th>Unit Pengolah</th>
            <th>Id Indeks</th>
            <th>Keterangan</th>
            <th>File Surat</th>
            <th>User Id</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($laporan_sk as $key => $data) { ?>
            <tr>
              <td style="width: 5%;"><?= $no++ ?></td>
              <td><?= $data->no_agenda_sk ?></td>
              <td><?= $data->tanggal_surat ?></td>
              <td><?= $data->ditujukan_kepada ?></td>
              <td><?= $data->perihal ?></td>
              <td><?= $data->unit_pengolah ?></td>
              <td><?= $data->id_indeks ?></td>
              <td><?= $data->keterangan ?></td>
              <td><?= $data->file_surat ?></td>
              <td><?= $data->user_id ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>