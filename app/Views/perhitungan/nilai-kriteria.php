<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <?php if ($kriteria && $alternatif && $nilai_kriteria) : ?>

        <div class="card shadow">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="text-gray-900 mb-0">Tabel Nilai Kriteria</h3>
              </div>
              <div class="col-md-6">
                <button type="button" class="btn btn-dark mx-1 float-right btn-nilai-utility"><i class="fas fa fa-recycle"></i> Tentukan Nilai Utility</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-kriteria">
                <thead>
                  <th>Alternatif / Kriteria</th>
                  <?php foreach ($kriteria->getResultArray() as $row) : ?>
                    <th><?= ucfirst(str_replace("_", " ", $row['nama'])) ?></th>
                  <?php endforeach; ?>
                </thead>
                <tbody>
                  <?php foreach ($alternatif as $key => $alt) : ?>
                    <tr>
                      <td>
                        <?= $alt['kode']; ?>
                      </td>
                      <?php for ($i = 0; $i < sizeof($nilai_kriteria); $i++) : ?>
                        <?php if ($nilai_kriteria[$i]['alternatif_id'] === $alt['id']) : ?>
                          <td>
                            <?= $nilai_kriteria[$i]['nilai_kriteria']; ?>
                          </td>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <?php else : ?>
        <div class="alert alert-info" role="alert">
          <strong>Data Belum Ada, Tentukan Nilai kriteria setelah data alternatif siap.</strong>
        </div>

      <?php endif; ?>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('custom-js') ?>
<script>
  $(document).ready(function() {
    $('.btn-nilai-utility').on('click', function() {
      $.ajax({
        url: '/NilaiUtility/generateNilaiUtility',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
          $('.btn-nilai-utility').html('loading.. <span class="spinner-border spinner-border-sm"></span>')
        },
        complete: function() {
          $('.btn-nilai-utility').html('<i class="fas fa fa-recycle"></i>  Tentukan Nilai Utility')
        },
        success: function(response) {
          if (!response.warning) {
            toastSuccess(response)
            reload()
          } else {
            toastAlert(response)
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
        }
      })
    })
  })
</script>
<?php $this->endSection() ?>
