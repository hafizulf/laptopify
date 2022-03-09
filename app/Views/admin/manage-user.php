<?= $this->extend('template/content'); ?>

<?= $this->section('content'); ?>

<div class="section">
  <div class="row mt-4">
    <div class="col-md-12">
      <h1 class="text-gray-900"><?= $judul; ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah" data-backdrop="static" data-keyboard="false"><i class="fas fa fa-plus"></i> Tambah</button>
          <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
          <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-kriteria" id="dataTable">
            <thead>
              <th>
                <input type="checkbox" id="checkboxes">
              </th>
              <th>No.</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Role</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>
