<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Data Terkait</li>
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
      <h3 class="box-title"><b>Data Terkait</b></h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->level == 1) { ?>
          <a href="<?= site_url('data_terkait/tambah') ?>" class="btn btn-primary btn-flat">
            Tambah Data Terkait
          </a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->level == 3) { ?>
          <a href="<?= site_url('data_terkait/tambah') ?>" class="btn btn-primary btn-flat">
            Tambah Data Terkait
          </a>
        <?php } ?>
      </div>
    </div>
    <!-- <a href="<?= site_url('data_terkait/print') ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print</a>
    <a href="<?= site_url('data_terkait/pdf') ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file"></i> PDF</a> -->
    <div class="box-body table-responsive">

      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Terkait</th>
            <th>Nama Kepala</th>
            <th> <?php if ($this->fungsi->user_login()->level == 1) { ?>Action <?php } ?> <?php if ($this->fungsi->user_login()->level == 3) { ?>Action <?php } ?> </th>


          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td style="width: 5%;"><?= $no++ ?></td>
              <td><?= $data->nama_terkait ?></td>
              <td><?= $data->nama_kepala ?></td>

              <td class="text-center" width="160px">
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <a href="<?= site_url('data_terkait/edit/' . $data->id_terkait) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                  </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->level == 3) { ?>
                  <a href="<?= site_url('data_terkait/edit/' . $data->id_terkait) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                  </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                  <a href="<?= site_url('data_terkait/del/' . $data->id_terkait) ?>" id="btn-hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus
                  </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->level == 3) { ?>
                  <a href="<?= site_url('data_terkait/del/' . $data->id_terkait) ?>" id="btn-hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus
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