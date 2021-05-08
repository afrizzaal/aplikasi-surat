<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Users</li>
  </ol>
</section>
<!-- Main Content -->
<section class="content">
  <div class="">
    <div class="box-header">
      <h3 class="box-title"><b>Edit User</b></h3>
      <div class="pull-right">
        <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
          Kembali
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="" method="post">
            <div class="form-group <?= set_value('fullname') ? 'has-error' : null ?>">
              <label>Nama</label>
              <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
              <input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name ?>" class="form-control">
              <?= form_error('fullname') ?>
            </div>

            <div class="form-group <?= set_value('username') ? 'has-error' : null ?>">
              <label>Username</label>
              <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
              <?= form_error('username') ?>
            </div>

            <div class="form-group <?= set_value('password') ? 'has-error' : null ?>">
              <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
              <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
              <?= form_error('password') ?>
            </div>
            <div class="form-group <?= set_value('passconf') ? 'has-error' : null ?>">
              <label>Konfirmasi Password</label>
              <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control">
              <?= form_error('passconf') ?>
            </div>
            <div class="form-group <?= set_value('address') ? 'has-error' : null ?>">
              <label>Alamat</label>
              <textarea name="address" value="<?= $this->input->post('address') ?? $row->address ?>" class="form-control"></textarea>
              <?= form_error('address') ?>
            </div>
            <div class="form-group <?= set_value('level') ? 'has-error' : null ?>">
              <label>Level</label>
              <select name="level" class="form-control">
                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                <option value="1">Admin</option>
                <option value="2" <?php $level == 2 ? 'selected' : null ?>>User</option>
                <option value="3" <?php $level == 3 ? 'selected' : null ?>>Camat</option>
              </select>
              <?= form_error('level') ?>
            </div>
            <div class=" form-group">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>