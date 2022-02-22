<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <?php if ($kriteria && $alternatif && $nilai_kriteria) : ?>

        <div class="card shadow">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="text-gray-900 mb-0">Tabel Nilai Kriteria</h3>
              </div>
              <div class="col-md-6">
                <button type="button" class="btn btn-dark mx-1 float-right btn-nilai-kriteria"><i class="fas fa fa-recycle"></i> Update Nilai Kriteria</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-striped table-kriteria">
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
                        <?php if ($nilai_kriteria[$i]['id_alternatif'] === $alt['id_alternatif']) : ?>
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
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="alert alert-info" role="alert">
                  <strong class="text-center">Data Belum Ada, </strong> <button type="button" class="btn btn-dark btn-nilai-kriteria"><i class="fas fa fa-recycle"></i> Tentukan Nilai Kriteria</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endif; ?>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('custom-js') ?>
<script>
  $(document).ready(function() {
    $('.btn-nilai-kriteria').on('click', function() {
      $.ajax({
        url: '/NilaiKriteria/setNilaiKriteria',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
          $('.btn-nilai-kriteria').html('loading.. <span class="spinner-border spinner-border-sm"></span>')
        },
        complete: function() {
          $('.btn-nilai-kriteria').html('<i class="fas fa fa-recycle"></i> Tentukan Nilai Kriteria')
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

    const formTambah = $('#formTambah')
    formTambah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formTambah, '#modalBoxTambah')

      removeClasses('#formTambah')
    })

    $('.btn-hapus').on('click', function() {
      requestDeleteData('/alternatif/delete')
    })

    $('.btn-ubah').on('click', function(e) {
      requestGetDataById('/alternatif/getDataById')
    })

    const formUbah = $('#formUbah')
    formUbah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formUbah, '#modalBoxUbah')

      removeClasses('#formUbah')
    })
  })
</script>
<?php $this->endSection() ?>
