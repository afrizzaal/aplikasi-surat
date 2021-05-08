<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Surat Masuk</li>
  </ol>
</section>
<!-- Main Content -->
<section class="content">
  <div class="">
    <div class="box-header">
      <h3 class="box-title"><b><?= ucfirst($page) ?> Surat Masuk</b></h3>
      <div class="pull-right">
        <a href="<?= site_url('suratm') ?>" class="btn btn-warning btn-flat">
          Kembali
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <?php echo form_open_multipart('suratm/process') ?>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>No Agenda SM</label>
              <input type="hidden" name="id" value="<?= $row->id_suratm ?>">
              <input type="text" name="no_agenda_sm" value="<?= $row->no_agenda_sm ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>No Agenda SM</label>
              <input type="hidden" name="id" value="<?= $row->id_suratm ?>">
              <input type="text" name="no_agenda_sm" value="<?= $row->no_agenda_sm ?>" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Tanggal Surat</label>
              <input type="date" name="tanggal_surat" value="<?= $row->tanggal_surat ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Tanggal Surat</label>
              <input type="date" name="tanggal_surat" value="<?= $row->tanggal_surat ?>" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Asal Surat</label>
              <input type="text" name="asal_surat" value="<?= $row->asal_surat ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Asal Surat</label>
              <input type="text" name="asal_surat" value="<?= $row->asal_surat ?>" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" name="perihal" value="<?= $row->perihal ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" name="perihal" value="<?= $row->perihal ?>" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Isi Surat</label>
              <input type="text" name="isi_surat" value="<?= $row->isi_surat ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Isi Surat</label>
              <input type="text" name="isi_surat" value="<?= $row->isi_surat ?>" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Id Indeks</label>
              <select name="id_indeks" class="form-control">
                <option value="">- Pilih -</option>
                <?php foreach ($indeks->result() as $key => $data) { ?>
                  <option value="<?= $data->id_indeks ?>" <?= $data->id_indeks == $row->id_indeks ? "selected" : null ?>><?= $data->kode_indeks ?></option>
                <?php } ?>
              </select>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Id Indeks</label>
              <select name="id_indeks" class="form-control">
                <option value="">- Pilih -</option>
                <?php foreach ($indeks->result() as $key => $data) { ?>
                  <option value="<?= $data->id_indeks ?>" <?= $data->id_indeks == $row->id_indeks ? "selected" : null ?>><?= $data->kode_indeks ?></option>
                <?php } ?>
              </select>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" value="<?= $row->keterangan ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" value="<?= $row->keterangan ?>" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>File Surat</label>
              <?php if ($page == 'edit') {
                if ($row->file_surat != null) { ?>
                  <div style="margin-bottom: 5px;">
                    <img src="<?= base_url('uploads/surat-masuk/' . $row->file_surat) ?>" style="width:100%">
                  </div>
              <?php
                }
              } ?>
              <input type="file" name="file_surat" class="form-control">
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>File Surat</label>
              <?php if ($page == 'edit') {
                if ($row->file_surat != null) { ?>
                  <div style="margin-bottom: 5px;">
                    <img src="<?= base_url('uploads/surat-masuk/' . $row->file_surat) ?>" style="width:100%">
                  </div>
              <?php
                }
              } ?>
              <input type="file" name="file_surat" class="form-control" readonly>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Status</label>
              <input type="text" name="status" value="<?= $row->status ?>" class="form-control" required>
            </div>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Status</label>
              <input type="text" name="status" value="<?= $row->status ?>" class="form-control" required>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <div class="form-group">
              <label>Id User</label>
              <select name="user_id" class="form-control">
                <option value="">- Pilih -</option>
                <?php foreach ($user->result() as $key => $data) { ?>
                  <option value="<?= $data->user_id ?>" <?= $data->user_id == $row->user_id ? "selected" : null ?>><?= $data->level ?></option>
                <?php } ?>
              </select>
            </div>
          <?php } ?>

          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <div class="form-group">
              <label>Id User</label>
              <select name="user_id" class="form-control">
                <option value="">- Pilih -</option>
                <?php foreach ($user->result() as $key => $data) { ?>
                  <option value="<?= $data->user_id ?>" <?= $data->user_id == $row->user_id ? "selected" : null ?>><?= $data->level ?></option>
                <?php } ?>
              </select>
            </div>
          <?php } ?>

          <div class="form-group">
            <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </div>
          <?php echo form_close() ?>
        </div>
      </div>

    </div>
  </div>
</section>