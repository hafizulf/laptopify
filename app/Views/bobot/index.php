<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <div class="row mt-4">
        <div class="col-md-8">
          <div class="card shadow">
            <div class="card-header">
              <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah" data-backdrop="static" data-keyboard="false"><i class="fas fa fa-plus"></i> Tambah</button>
              <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
              <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-kriteria">
                <thead>
                  <th>
                    <input type="checkbox" id="checkboxes">
                  </th>
                  <th>No.</th>
                  <th>Kriteria</th>
                  <th>Nilai Bobot</th>
                </thead>
                <tbody>
                  <?php if ($bobot) : ?>
                    <?php foreach ($bobot->getResultArray() as $key => $row) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id']; ?>">
                        </td>
                        <td><?= $key + 1; ?></td>
                        <td><?= $row['nama_kriteria']; ?></td>
                        <td><?= $row['nilai_bobot']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="3" class="text-gray-900 text-center">
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

      <!-- Modal -->
      <div class="modal fade" id="modalBoxTambah" tabindex="-1" role="dialog" aria-labelledby="modalBoxTambahTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Tambah <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/bobot/create" method="POST" class="formSubmit" id="formTambah">
              <div class="modal-body">
                <?= csrf_field(); ?>

                <div class="form-group">
                  <label for="kriteria">Kriteria</label>
                  <select name="kriteria_id" class="form-control" id="kriteria">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($kriteria->getResultArray() as $row) : ?>
                      <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                  <label for="nilai_bobot">Nilai Bobot</label>
                  <input type="number" class="form-control" name="nilai_bobot" id="nilai_bobot" placeholder="Nilai bobot.." min="1" max="100">
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-simpan"><i class="fas fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>

<?= $this->section('custom-js'); ?>
<script>
  $(document).ready(function() {
    const formTambah = $('#formTambah')
    formTambah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formTambah, '#modalBoxTambah')

      removeClasses('#formTambah')
    })
  })
</script>
<?= $this->endSection(); ?>
