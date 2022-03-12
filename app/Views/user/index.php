<?= $this->extend('template/content') ?>

<?php $this->section('content') ?>
<div class="section">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-gray-900"><?= $judul; ?></h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="card" style="width: 18rem;">
        <div class="text-center">
          <img src="<?= base_url() ?>/img/undraw_profile.svg" class="card-img-top mt-2" style="width: 80px">
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><span class="badge badge-primary"> <?= $data['role']; ?></span></li>
            <li class="list-group-item"><?= $data['nama']; ?> </li>
            <li class="list-group-item"><?= $data['username']; ?> </li>
          </ul>
          <hr class="mb-2 mt-0">
          <div class="text-center">
            <a href="#" data-toggle="modal" data-target="#modalBoxUbah" data-id="<?= $data['id_user']; ?>" class="card-link update-profile">Ubah Profil</a>
            <a href="#" class="card-link">Ubah Password</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalBoxUbah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header badge-primary">
          <h5 class="modal-title text-white"><i class="fa fa-edit"></i> Update Profile</h5>
        </div>

        <form action="/user/update" method="POST" id="formUbah">
          <div class="modal-body">
            <?= csrf_field(); ?>
            <input type="hidden" name="id_user" id="id_user">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
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
    $('.update-profile').on('click', function(e) {

      let id = $(this).data('id');
      $.ajax({
        url: '/user/getDataById',
        type: 'POST',
        data: {
          id: id
        },
        success: function(response) {
          $.each(response, function(key, val) {
            $('[name="' + key + '"]').val(val)
          })
        }
      });
    })

    const formUbah = $('#formUbah')
    formUbah.submit(function(e) {
      e.preventDefault()
      requestSaveData(formUbah, '#modalBoxUbah')
      removeClasses('#formUbah')
    })
  })
</script>
<?= $this->endSection(); ?>
