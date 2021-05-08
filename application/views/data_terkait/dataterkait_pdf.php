<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>
    .line-title {
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head><body>
<img src="assets/dist/img/drd.png" style="position: absolute; width: 100px; height:auto;">
  <table style="width:100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          PEMERINTAH KABUPATEN PURWAKARTA
          <br>KECAMATAN DARANGDAN
          <br>Jln. Raya Darangdan KM. 22 Tlp. (0264) 620372 Darangdan 41163
        </span>
      </td>
    </tr>
  </table>
  <hr class="line-title">
  <p align="center"><b>LAPORAN DATA TERKAIT</b></p>
  <br><br>
 <table table-bordered table-striped align="center" border="1">
    <tr>
      <th>No</th>
      <th>Nama Terkait</th>
      <th>Nama Kepala</th>
    </tr>
    <?php $no = 1;
    foreach ($row->result() as $key => $data) { ?>
      <tr>
        <td align="center" style="width: 5%;"><?= $no++ ?></td>
        <td align="center"><?= $data->nama_terkait ?></td>
        <td align="center"><?= $data->nama_kepala ?></td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <br>
  Dicetak Oleh : <?= $this->fungsi->user_login()->name ?>
  <br>
  Dicetak Tanggal : Purwakarta, <?= date('d-m-Y'); ?>
</body></html>
