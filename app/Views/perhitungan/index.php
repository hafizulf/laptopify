<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <div class="row mt-4">
        <div class="col-md-12">

          <?php if ($kriteria && $alternatif && $nilai_kriteria) : ?>

            <div class="card shadow">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="text-gray-900 mb-0">Tabel Nilai Kriteria</h3>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-info mx-1 float-right btn-show-nilai-utility"><i class="fas fa fa-info"></i> Lihat Nilai Utility</button>
                    <button type="button" class="btn btn-dark mx-1 float-right btn-nilai-utility"><i class="fas fa fa-recycle"></i> Tentukan Nilai Utility</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-stripedtable-kriteria">
                    <thead>
                      <th>Alternatif / Kriteria</th>
                      <?php foreach ($kriteria->getResultArray() as $row) : ?>
                        <th><?= ucfirst(str_replace("_", " ", $row['nama'])) ?></th>
                      <?php endforeach; ?>
                    </thead>
                    <tbody>
                      <?php foreach ($alternatif as $key => $alt) : ?>
                        <tr>
                          <td>
                            <?= $alt['kode']; ?>
                          </td>
                          <?php for ($i = 0; $i < sizeof($nilai_kriteria); $i++) : ?>
                            <?php if ($nilai_kriteria[$i]['alternatif_id'] === $alt['id']) : ?>
                              <td>
                                <?= $nilai_kriteria[$i]['nilai_kriteria']; ?>
                              </td>
                            <?php endif; ?>
                          <?php endfor; ?>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          <?php else : ?>
            <div class="alert alert-info" role="alert">
              <strong>Data Belum Ada, Silahkan Masukkan Data-data yang diperlukan terlebih dahulu!</strong>
            </div>

          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</div>
<?php $this->endSection(); ?>
