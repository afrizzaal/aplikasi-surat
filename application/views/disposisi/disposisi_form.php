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
  <div class="">
    <div class="box-header">
      <h3 class="box-title"><b><?= ucfirst($page) ?> Disposisi</b></h3>
      <div class="pull-right">
        <a href="<?= site_url('disposisi') ?>" class="btn btn-warning btn-flat">
          Kembali
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= site_url('disposisi/process') ?>" method="post">
            <div class="form-group">
              <label>Sifat Surat</label>
              <input type="hidden" name="id" value="<?= $row->id_disposisi ?>">
              <input type="text" name="sifat_surat" value="<?= $row->sifat_surat ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>isi Disposisi</label>
              <input type="text" name="isi_disposisi" value="<?= $row->isi_disposisi ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Batas Waktu</label>
              <input type="date" name="batas_waktu" value="<?= $row->batas_waktu ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Diteruskan kepada</label>
              <input type="text" name="diteruskan_kepada" value="<?= $row->diteruskan_kepada ?>" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Id Suratm</label>
              <select name="id_suratm" class="form-control">
                <option value="">- Pilih -</option>
                <?php foreach ($suratm->result() as $key => $data) { ?>
                  <option value="<?= $data->id_suratm ?>" <?= $data->id_suratm == $row->id_suratm ? "selected" : null ?>><?= $data->no_agenda_sm ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label>Id User</label>
              <select name="user_id" class="form-control">
                <option value="">- Pilih -</option>
                <?php foreach ($user->result() as $key => $data) { ?>
                  <option value="<?= $data->user_id ?>" <?= $data->user_id == $row->user_id ? "selected" : null ?>><?= $data->level ?></option>
                <?php } ?>
              </select>
            </div>

            <div class=" form-group">
              <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>