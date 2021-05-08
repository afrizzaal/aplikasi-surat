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
  <?php $this->view('messages') ?>
  <div class="">
    <div class="box-header">
      <h3 class="box-title"><b><?= ucfirst($page) ?> Data Terkait</b></h3>
      <div class="pull-right">
        <a href="<?= site_url('data_terkait') ?>" class="btn btn-warning btn-flat">
          Kembali
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= site_url('data_terkait/process') ?>" method="post">
            <div class="form-group">
              <label>Nama Terkait</label>
              <input type="hidden" name="id" value="<?= $row->id_terkait ?>">
              <input type="text" name="nama_terkait" value="<?= $row->nama_terkait ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Nama Kepala</label>
              <input type="text" name="nama_kepala" value="<?= $row->nama_kepala ?>" class="form-control" required>
            </div>

            <div class=" form-group">
              <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat"> Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>