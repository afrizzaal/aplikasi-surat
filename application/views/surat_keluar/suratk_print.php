<!DOCTYPE html>
<html lang="en">

<head>
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
</head>

<body>
<img src="<?= base_url() ?>assets/dist/img/drd.png" style="width: 100px; height:auto; position:absolute;">
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
  <table class="table table-bordered table-striped mt-3">
    <tr>
      <td align="center"><b>No</b></td>
      <td align="center"><b>No Agenda SK</b></td>
      <td align="center"><b>Tanggal Surat</b></td>
      <td align="center"><b>Ditujukan Kepada</b></td>
      <td align="center"><b>Perihal</b></td>
      <td align="center"><b>Unit Pengolah</b></td>
      <td align="center"><b>Id Indeks</b></td>
      <td align="center"><b>Keterangan</b></td>
      <td align="center"><b>User Id</b></td>
    </tr>
    <?php $no = 1;
    foreach ($row->result() as $key => $data) { ?>
      <tr>
        <td align="center" style="width: 5%;"><?= $no++ ?></td>
        <td align="center"><?= $data->no_agenda_sk ?></td>
        <td align="center"><?= $data->tanggal_surat ?></td>
        <td align="center"><?= $data->ditujukan_kepada ?></td>
        <td align="center"><?= $data->perihal ?></td>
        <td align="center"><?= $data->unit_pengolah ?></td>
        <td align="center"><?= $data->id_indeks ?></td>
        <td align="center"><?= $data->keterangan ?></td>
        <td align="center"><?= $data->user_id ?></td>
      </tr>
    <?php } ?>
  </table>
  Dicetak Oleh : <?= $this->fungsi->user_login()->name ?>
  <br>
  Dicetak Tanggal : Purwakarta, <?= date('d-m-Y'); ?>
</body>

</html>
<script type="text/javascript">
  window.print();
</script>