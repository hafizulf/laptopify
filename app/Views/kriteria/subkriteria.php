<?= $this->extend('template/content'); ?>

<?php $this->section('content') ?>
<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header">
              <a href="/sub-kriteria/create" class="btn btn-primary btn-tambah"><i class="fas fa fa-plus"></i> Tambah</a>
              <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
              <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-subkriteria">
                <thead>
                  <th>
                    <input type="checkbox" id="checkboxes">
                  </th>
                  <th>No.</th>
                  <th>Kriteria</th>
                  <th>Sub-Kriteria</th>
                  <th>Nilai Preferensi</th>
                </thead>
                <tbody>
                  <?php if ($subkriteria) : ?>
                    <?php $nomor = 1; ?>
                    <?php foreach ($subkriteria->getResultArray() as $key => $row) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id']; ?>">
                        </td>

                        <?php if ($rowspan[$row['nama_kriteria']]['printed'] == 'yes') : ?>
                          <td rowspan="<?= $rowspan[$row['nama_kriteria']]['rowspan'] ?>"><?= $nomor; ?></td>
                          <td rowspan="<?= $rowspan[$row['nama_kriteria']]['rowspan'] ?>"><?= $row['nama_kriteria']; ?></td>

                          <?php $rowspan[$row['nama_kriteria']]['printed'] = 'no' ?>
                        <?php else : ?>
                          <?php $nomor -= 1; ?>
                        <?php endif; ?>

                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['nilai_preferensi']; ?></td>
                      </tr>
                      <?php $nomor++ ?>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="5" class=" text-gray-900 text-center">
                        <h3>DATA BELUM ADA</h3>
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<?php $this->endSection(); ?>
