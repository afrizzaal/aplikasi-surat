<!-- <!-- <section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Surat Masuk</li>
  </ol>
</section> -->
<!-- Main Content -->
<section class="content">
  <div class="">
    <div class="box-header">
      <h3 class="box-title"></h3>
      <div class="pull-right">
        <a href="<?= site_url('suratm') ?>" class="btn btn-warning btn-flat">
          Kembali
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= site_url('suratm/cek_status') ?>" method="post">
            <?php foreach ($status as $st) : ?>
              <div class="form-group">
                <label>Status</label>
                <input type="hidden" name="id" value="<?php echo $st->id_suratm ?>">
                <input type="text" name="status" value="<?php echo $st->status ?>" class="form-control" required>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
            <?php endforeach; ?>
          </form>
        </div>
      </div>

    </div>
  </div>
</section> -->