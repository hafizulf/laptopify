<?= $this->extend('template/content'); ?>

<?= $this->section('content'); ?>


<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h2 class="text-gray-900"><?= $judul; ?></h2>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form action="/otomatis/get-data" method="GET">
            <small class="text-sm text-info">Default tidak ada harga minimum dan maksimum</small>
            <div class="form-group">
              <label for="min_price">Harga Minimum</label>
              <input type="number" class="form-control" name="min_price" id="min_price" value="0">
            </div>
            <div class="form-group">
              <label for="max_price">Harga Maksimum</label>
              <input type="number" class="form-control" name="max_price" id="max_price" value="0">
            </div>
            <div class="form-group">
              <label for="limit">Limit <small class="text-sm badge badge-primary">default 20</small></label>
              <input type="number" class="form-control" name="limit" id="limit" placeholder="Limit Data" min="1" max="100" value="20">
            </div>
            <button type="submit" class="btn btn-primary btn-simpan"><i class="fas fa fa-spinner"></i> Proses</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>
