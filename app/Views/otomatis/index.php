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
          <form id="form-proses" action="/otomatis/get-data" method="GET">
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
            <p class="text-success text-waiting">
              Proses pengambilan data secara otomatis membutuhkan waktu, silahkan menunggu beberapa saat...
            </p>
            <button type="submit" class="btn btn-primary btn-proses"><i class="fas fa fa-spinner"></i> Proses</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>

<?= $this->endSection(); ?>

<?php $this->section('custom-js'); ?>
<script>
  $(document).ready(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true
    })

    $('.text-waiting').hide()

    $('.btn-proses').on('click', function(e) {
      e.preventDefault()
      $('.text-waiting').show()

      const form = $('#form-proses')

      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'JSON',
        data: form.serialize(),
        beforeSend: function() {
          $('.btn-proses').html('loading.. <span class="spinner-border spinner-border-sm"></span>')
        },
        complete: function() {
          $('.btn-proses').html('<i class="fas fa fa-spinner"></i> Proses')
        },
        success: function(response) {
          if (response.status) {
            Toast.fire({
              icon: 'success',
              title: 'Data berhasil didapatkan!'
            })

            $('.text-waiting').html('Silahkan lanjut ke proses perhitungan bobot dan nilai')
          } else {
            Toast.fire({
              icon: 'error',
              title: 'Data gagal didapatkan!'
            })

            $('.text-waiting').html('Periksa koneksi internet, dan coba beberapa saat lagi').css('color', 'blue')
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
        }
      })


    })
  })
</script>
<?php $this->endSection(); ?>
