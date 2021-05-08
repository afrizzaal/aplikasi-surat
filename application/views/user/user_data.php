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
  <?= $this->session->flashdata('message'); ?>
  <div class="">
    <div class="box-header">
      <h3 class="box-title"><b>Data User</b></h3>
      <div class="pull-right">
        <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
          Tambah User
        </a>
      </div>
    </div>
    <!-- <a href="<?= site_url('user/print') ?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Print</a>
    <a href="<?= site_url('user/pdf') ?>" class="btn btn-danger" target="_blank"><i class="fa fa-file"></i> PDF</a> -->
    <div class="box-body table-responsive">

      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td style="width: 5%;"><?= $no++ ?></td>
              <td><?= $data->username ?></td>
              <td><?= $data->name ?></td>
              <td><?= $data->address ?></td>
              <td><?= $data->level == 1 ? "Admin" : "User" ?></td>
              <td>
                <?php if ($data->level == 1) {
                  echo "Admin";
                } else if ($data->level == 2) {
                  echo "User";
                } else if ($data->level == 3) {
                  echo "Camat";
                }
                ?>
              </td>
              <td class="text-center" width="160px">
                <form action="<?= site_url('user/del') ?>" method="post">
                  <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> Edit
                  </a>

                  <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                  <button onclick="return confirm('Apakah anda akan menghapus data ini?')" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Hapus
                  </button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>