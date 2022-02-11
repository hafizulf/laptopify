<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<section>
  <div class="row mt-4">
    <div class="col-md-12">

      <?php if ($kriteria && $alternatif && $nilai_akhir) : ?>

        <div class="card shadow">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="text-gray-900 mb-0">Tabel Nilai Akhir</h3>
              </div>
              <div class="col-md-6">
                <form action="/report/excelReporting" method="POST">
                  <button type="submit" class="btn btn-success float-right" name="excel"><i class="fa fa-file-excel"></i> Excel</button>
                </form>
                <form action="/report/pdfReporting" method="POST">
                  <button type="submit" class="btn btn-danger float-right mx-2" name="pdf"><i class="fa fa-file-pdf"></i> PDF</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-kriteria" id="dataTable">
                <thead>
                  <th>No</th>
                  <th>Alternatif</th>
                  <th>Nilai Akhir</th>
                </thead>
                <tbody>
                  <?php foreach ($nilai_akhir as $key => $row) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $row['kode']; ?></td>
                      <td><?= $row['nilai_akhir']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <?php else : ?>
        <div class="alert alert-info" role="alert">
          <strong>Data Belum Ada, Tentukan nilai akhir setelah data nilai utility siap.</strong>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php $this->endSection(); ?>
