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
  <p align="center"><b>LAPORAN DATA SURAT KELUAR</b></p>
  <br><br>
  <table table-bordered table-striped align="center" border="1">
    <tr>
      <th>No</th>
      <th>No Agenda SK</th>
      <th>Tanggal Surat</th>
      <th>Ditujukan Kepada</th>
      <th>Perihal</th>
      <th>Unit Pengolah</th>
      <th>Id Indeks</th>
      <th>Keterangan</th>
      <th>File Surat</th>
      <th>User Id</th>
    </tr>
    <?php $no = 1;
    foreach ($laporan_sk as $key => $data) { ?>
      <tr>
        <td align="center" style="width: 5%;"><?= $no++ ?></td>
        <td align="center"><?= $data->no_agenda_sk ?></td>
        <td align="center"><?= $data->tanggal_surat ?></td>
        <td align="center"><?= $data->ditujukan_kepada ?></td>
        <td align="center"><?= $data->perihal ?></td>
        <td align="center"><?= $data->unit_pengolah ?></td>
        <td align="center"><?= $data->id_indeks ?></td>
        <td align="center"><?= $data->keterangan ?></td>
        <td align="center"><?= $data->file_surat ?></td>
        <td align="center"><?= $data->user_id ?></td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <br>
  Dicetak Oleh : <?= $this->fungsi->user_login()->name ?>
  <br>
  Dicetak Tanggal : Purwakarta, <?= date('d-m-Y'); ?>
</body></html>