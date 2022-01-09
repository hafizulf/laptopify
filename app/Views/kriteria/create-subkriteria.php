<?= $this->extend('template/content'); ?>

<?php $this->section('content') ?>
<div class="row">
  <div class="col-md-6">
    <form action="/subkriteria/create" method="post">
      <div class="form-group">
        <label for="kriteria">Kriteria</label>
        <?php foreach ($kriteria as $row) :; ?>
          <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
        <?php endforeach; ?>

        <label for="subkriteria">Sub-kriteria</label>
        <input type="text" name="subkriteria" id="subkriteria" class="form-control" placeholder="Sub kriteria..">
      </div>
    </form>
  </div>
</div>
<?php $this->endSection(); ?>
