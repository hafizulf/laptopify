<div class="row mt-4">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-header">
        <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah"><i class="fas fa fa-plus"></i> Tambah data</button>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-main">
          <thead>
            <th>No.</th>
            <th>Nama</th>
          </thead>
          <tbody>
            <?php if ($kriteria) : ?>
              <?php foreach ($kriteria as $key => $row) : ?>
                <tr>
                  <td><?= $key + 1; ?></td>
                  <td><?= $row['nama']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="3" class="text-gray-900 text-center">Data belum ada</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
