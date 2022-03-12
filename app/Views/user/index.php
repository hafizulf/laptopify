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
            <a href="#" class="card-link">Ubah Profil</a>
            <a href="#" class="card-link">Ubah Password</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
