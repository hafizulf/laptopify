<?= $this->extend('template/content'); ?>

<?php $this->section('content') ?>
<div class="row">
  <div class="col-md-6">
    <form action="/subkriteria/create" method="post">
      <div class="form-group">
        <label for="kriteria">Kriteria</label>
        <select name="kriteria_id" id="kriteria" class="form-control">
          <option value="">-- Pilih --</option>
          <?php foreach ($kriteria->getResultArray() as $row) :; ?>
            <option value="<?= $row['id']; ?>" id="kriteria"><?= $row['nama']; ?></option>
          <?php endforeach; ?>
        </select>

        <label for="subkriteria">Sub-kriteria</label>
        <input type="text" name="subkriteria" id="subkriteria" class="form-control" placeholder="Sub kriteria..">
      </div>
    </form>
  </div>
</div>
<?php $this->endSection(); ?>
