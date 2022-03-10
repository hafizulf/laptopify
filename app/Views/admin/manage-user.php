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
              <?php foreach ($users as $key => $row) : ?>
                <tr>
                  <td><input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id_user']; ?>"></td>
                  <td><?= $key + 1; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['username']; ?></td>
                  <td>
                    <?php foreach ($roles as $role) : ?>
                      <?php if ($row['id_user_role'] == $role['id_user_role']) : ?>
                        <?= $role['role']; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
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
          <h5 class="modal-title">Tambah Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/admin/ManageUser/save" method="POST" class="formSubmit" id="formTambah">
          <div class="modal-body">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama..">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username..">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <button type="button" class="btn btn-sm btn-outline-primary" id="generate-password">Generate</button>
              <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password..">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="id_user_role">Role</label>
              <select name="id_user_role" class="form-control" id="id_user_role">
                <option value="">-- Pilih --</option>
                <?php foreach ($roles as $row) : ?>
                  <option value="<?= $row['id_user_role']; ?>"><?= $row['role']; ?></option>
                <?php endforeach; ?>
              </select>
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
          <h5 class="modal-title">Ubah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/admin/ManageUser/save" method="POST" class="formSubmit" id="formUbah">
          <div class="modal-body">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_user" id="id_ubah">

            <div class="form-group">
              <label for="nama_ubah">Nama</label>
              <input type="text" name="nama" id="nama_ubah" class="form-control" placeholder="Masukkan nama..">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="username_ubah">Username</label>
              <input type="text" name="username" id="username_ubah" class="form-control" placeholder="Masukkan username..">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="password_ubah">Password</label>
              <input type="password" name="password" id="password_ubah" class="form-control" placeholder="Update password baru..">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="id_user_role_ubah">Role</label>
              <select name="id_user_role" class="form-control" id="id_user_role_ubah">
                <option value="">-- Pilih --</option>
                <?php foreach ($roles as $row) : ?>
                  <option value="<?= $row['id_user_role']; ?>"><?= $row['role']; ?></option>
                <?php endforeach; ?>
              </select>
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
      requestGetDataById('/admin/ManageUser/getDataById')
    })

    const formUbah = $('#formUbah')
    formUbah.submit(function(e) {
      e.preventDefault()
      requestSaveData(formUbah, '#modalBoxUbah')
      removeClasses('#formUbah')
    })

    $('.btn-hapus').on('click', function(e) {
      requestDeleteData('/admin/ManageUser/delete')
    })

    $('#generate-password').on('click', function(e) {
      $('#password').get(0).type = 'text'
      generatePassword()
    })

    const generatePassword = function() {
      let password = ''
      let possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+'
      for (let i = 0; i < 8; i++) {
        password += possible.charAt(Math.floor(Math.random() * possible.length))
      }
      $('#password').val(password)
    }
  })
</script>
<?= $this->endSection(); ?>
