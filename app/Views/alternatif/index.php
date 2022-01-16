<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header">
              <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah" data-backdrop="static" data-keyboard="false"><i class="fas fa fa-plus"></i> Tambah</button>
              <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
              <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
              <?php if ($alternatif) : ?>
                <table class="table table-bordered table-striped table-kriteria">
                  <thead>
                    <th>
                      <input type="checkbox" id="checkboxes">
                    </th>
                    <th>No.</th>
                  </thead>
                  <tbody>
                    <?php foreach ($alternatif->getResultArray() as $key => $row) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id']; ?>">
                        </td>
                        <td><?= $key + 1; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php else : ?>
                <h3 class="text-center">DATA BELUM ADA</h3>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>
