<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-8">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <button class="btn btn-primary" data-toggle="modal" data-target="#modalBoxTambah"><i class="fas fa fa-plus"></i> Tambah data</button>

      <!-- Modal -->
      <div class="modal fade" id="modalBoxTambah" tabindex="-1" role="dialog" aria-labelledby="modalBoxTambahTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Tambah <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="" method="POST" id="formTambah">
              <div class="modal-body">
                <?= csrf_field(); ?>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama kriteria..">
                </div>
                <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Jenis kriteria..">
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
  </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('custom-js'); ?>
<script>
  $(document).ready(() => {
    $('#formTambah').submit((e) => {
      e.preventDefault()

      $.ajax({
        url: "<?= base_url('kriteria/create') ?>",
        type: $(this).attr('method'),
        dataType: 'JSON',
        data: $(this).serialize(),
        beforeSend: () => {
          $('.btn-simpan').html('loading.. <span class="spinner-border spinner-border-sm"></span>')
        },
        complete: () => {
          $('.btn-simpan').html('<i class="fas fa fa-save"></i> Simpan')
        },
        success: (response) => {
          if (response.status) {
            alert('ok')
          } else {
            alert('no ok')
          }
        },
        error: (xhr, status, error) => {
          alert('xhr: '+ xhr.responseText +' status: '+ status)
        }
      })
    })
  })
</script>
<?php $this->endSection(); ?>