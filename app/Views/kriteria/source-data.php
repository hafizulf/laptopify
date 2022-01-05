<div class="row mt-4">
  <div class="col-md-8">
    <table class="table table-bordered">
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
            <td colspan="2" class="text-gray-900 text-center">Data belum ada</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
