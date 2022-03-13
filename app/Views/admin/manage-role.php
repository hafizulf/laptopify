<?= $this->extend('template/content'); ?>

<?= $this->section('content'); ?>

<div class="section">
  <div class="row mt-4">
    <div class="col-md-12">
      <h1 class="text-gray-900"><?= $judul; ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
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
              <th>Role</th>
            </thead>
            <tbody>
              <?php foreach ($roles as $key => $row) :; ?>
                <tr>
                  <td><input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id_user_role']; ?>"></td>
                  <td><?= $key + 1; ?></td>
                  <td><?= $row['role']; ?></td>
                </tr>
              <?php endforeach ?>
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
          <h5 class="modal-title">Tambah Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/Admin/ManageRole/save" method="POST" class="formSubmit" id="formTambah">
          <div class="modal-body">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="role">Role</label>
              <input type="text" name="role" id="role" class="form-control" placeholder="Masukkan role..">
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

  <div class="modal fade" id="modalBoxUbah" tabindex="-1" role="dialog" aria-labelledby="modalBoxUbahTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header badge-primary">
          <h5 class="modal-title">Ubah Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/Admin/ManageRole/save" method="POST" class="formSubmit" id="formUbah">
          <div class="modal-body">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_user_role" id="id_ubah">

            <div class="form-group">
              <label for="role_ubah">Role</label>
              <input type="text" name="role" id="role_ubah" class="form-control" placeholder="Masukkan role..">
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

<?= $this->endSection(); ?>

<?= $this->section('custom-js'); ?>
<script>
  $(document).ready(function() {
    const formTambah = $('#formTambah')
    formTambah.submit(function(e) {
      e.preventDefault()
      requestSaveData(formTambah, '#modalBoxTambah')
      removeClasses('#formTambah')
    })

    $('.btn-ubah').on('click', function(e) {
      requestGetDataById('/Admin/ManageRole/getDataById')
    })

    const formUbah = $('#formUbah')
    formUbah.submit(function(e) {
      e.preventDefault()
      requestSaveData(formUbah, '#modalBoxUbah')
      removeClasses('#formUbah')
    })

    $('.btn-hapus').on('click', function() {
      $cautionMsg = 'Semua user dengan role ini akan terhapus';
      requestDeleteData('/admin/ManageRole/delete', 'caution', $cautionMsg)
    })
  })
</script>
<?= $this->endSection(); ?>
