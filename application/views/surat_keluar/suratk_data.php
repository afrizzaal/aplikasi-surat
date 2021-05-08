<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Surat Keluar</li>
  </ol>
</section>
<!-- Main Content -->
<section class="content">

  <?php
  //  $this->view('messages') 
  ?>
  <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>

  <div class="">
    <div class="box-header">
      <h3 class="box-title"><b>Data Surat Keluar</b></h3>
      <div class="pull-right">
        <a href="<?= site_url('suratk/tambah') ?>" class="btn btn-primary btn-flat">
          Tambah Surat Keluar
        </a>
      </div>
    </div>
    <!-- <a href="<?= site_url('suratk/print') ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print</a>
    <a href="<?= site_url('suratk/pdf') ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file"></i> PDF</a> -->
    <div class="box-body table-responsive">

      <table class="table table-bordered table-striped" id="table1">
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
            <th>Status</th>
            <th>User Id</th>
            <th><?php if ($this->fungsi->user_login()->level == 1) { ?>Action<?php } ?></th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td style="width: 5%;"><?= $no++ ?></td>
              <td><?= $data->no_agenda_sk ?></td>
              <td><?= $data->tanggal_surat ?></td>
              <td><?= $data->ditujukan_kepada ?></td>
              <td><?= $data->perihal ?></td>
              <td><?= $data->unit_pengolah ?></td>
              <td><?= $data->id_indeks ?></td>
              <td><?= $data->keterangan ?></td>
              <td>
                <?= $data->file_surat ?>
                <a href="<?= site_url('suratk/file_surat/' . $data->id_suratk) ?>" class="btn btn-default btn-xs">
                  <i class="fa fa-file"></i>
                </a>
              </td>
              <td>
                <?= $data->status ?>

                <!-- <a href="<?= site_url('suratk/edit/' . $data->id_suratk) ?>" class="btn btn-default btn-xs">
                  <i class="fa fa-edit"></i>
                </a> -->

              </td>
              <td><?= $data->user_id ?></td>

              <td class="text-center" width="160px">
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <a href="<?= site_url('suratk/edit/' . $data->id_suratk) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                  </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <a href="<?= site_url('suratk/del/' . $data->id_suratk) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i>
                  </a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>