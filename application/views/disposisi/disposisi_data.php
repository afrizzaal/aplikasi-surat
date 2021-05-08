<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Disposisi</li>
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
      <h3 class="box-title"><b>Data Disposisi</b></h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->level == 1) { ?>
          <a href="<?= site_url('disposisi/tambah') ?>" class="btn btn-primary btn-flat">
            Tambah Disposisi
          </a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->level == 3) { ?>
          <a href="<?= site_url('disposisi/tambah') ?>" class="btn btn-primary btn-flat">
            Tambah Disposisi
          </a>
        <?php } ?>
      </div>
    </div>

    <!-- <a href="<?= site_url('disposisi/print') ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print</a>
    <a href="<?= site_url('disposisi/pdf') ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file"></i> PDF</a> -->
    <div class="box-body table-responsive">

      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Sifat Surat</th>
            <th>Isi Disposisi</th>
            <th>Batas Waktu</th>
            <th>Diteruskan Kepada</th>
            <th>Id Surat Masuk</th>
            <th>User Id</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td style="width: 5%;"><?= $no++ ?></td>
              <td><?= $data->sifat_surat ?></td>
              <td><?= $data->isi_disposisi ?></td>
              <td><?= $data->batas_waktu ?></td>
              <td><?= $data->diteruskan_kepada ?></td>
              <td><?= $data->id_suratm ?></td>
              <td><?= $data->user_id ?></td>

              <td class="text-center" width="160px">
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <a href="<?= site_url('disposisi/edit/' . $data->id_disposisi) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                  </a>
                <?php } ?>

                <?php if ($this->fungsi->user_login()->level == 3) { ?>
                  <a href="<?= site_url('disposisi/edit/' . $data->id_disposisi) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                  </a>
                <?php } ?>

                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <a href="<?= site_url('disposisi/del/' . $data->id_disposisi) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Hapus
                  </a>
                <?php } ?>

                <?php if ($this->fungsi->user_login()->level == 3) { ?>
                  <a href="<?= site_url('disposisi/del/' . $data->id_disposisi) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Hapus
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