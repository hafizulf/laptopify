<!DOCTYPE html>
<html lang="en">

<head>
  <title>Laporan PDF - Peringkat Alternatif</title>
  <style>
    table>tr>td {
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <h3 style="margin-bottom: 0;">Laporan Peringkat Alternatif</h3>
  <div style="margin-bottom: 20px;">dicetak pada tanggal: <?= date('d/M/Y'); ?></div>

  <table border="1" cellpadding="4" cellspacing="0">
    <thead>
      <th width="15px" align="center">No.</th>
      <th align="center">Detail Alternatif</th>
    </thead>

    <!-- Body -->
    <tbody>
      <?php foreach ($query as $key => $row) : ?>

        <tr nobr="true">
          <td width="15px" align="center"><?= $key + 1; ?></td>
          <td>
            <table border="0">
              <tr>
                <td width="25%">Nama Produk</td>
                <td style="text-align: justify;">: <?= $row['nama']; ?></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>: Rp. <?= number_format($row['harga'], 0, ',', '.') ?></td>
              </tr>
              <tr>
                <td>Rating Produk</td>
                <td>: <?= $row['rating_produk']; ?></td>
              </tr>
              <tr>
                <td>Merk / Prosesor</td>
                <td>: <?= $row['merk']; ?> / <?= $row['prosesor']; ?></td>
              </tr>
              <tr>
                <td width="25%">Kapasitas Memori (RAM)</td>
                <td>: <?= $row['kapasitas_ram']; ?> GB</td>
              </tr>
              <tr>
                <td width="25%">Tipe / Kapasitas Penyimpanan</td>
                <td>: <?= $row['tipe_penyimpanan']; ?> / <?= $row['kapasitas_penyimpanan']; ?> GB</td>
              </tr>
              <tr>
                <td>Ukuran Layar</td>
                <td>: <?= $row['ukuran_layar']; ?></td>
              </tr>
              <tr>
                <td>Kartu Grafis</td>
                <td>: <?= $row['kartu_grafis']; ?></td>
              </tr>
              <tr>
                <td>Sistem Operasi</td>
                <td>: <?= $row['sistem_operasi']; ?></td>
              </tr>
              <tr>
                <td>Masa Garansi</td>
                <td>: <?= $row['masa_garansi']; ?> (bulan)</td>
              </tr>
              <tr>
                <td>Kondisi Produk</td>
                <td>: <?= $row['kondisi_produk']; ?></td>
              </tr>
            </table>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>
