<?= $this->extend('template/content'); ?>

<?php $this->section('content') ?>
<div class="section">
  <div class="row">
    <div class="col-md-10">
      <h1 class="text-gray-900 mt-2 mb-4"><?= $judul; ?></h1>
      <div class="card shadow">
        <div class="card-header">
          <div class="errors-section"></div>
        </div>
        <div class="card-body">
          <form action="/subkriteria/create" method="post" id="formTambah">
            <div class="form-group">
              <label for="kriteria">Kriteria</label>
              <select name="kriteria_id" id="kriteria" class="form-control">
                <option value="">-- Pilih --</option>
                <?php foreach ($kriteria->getResultArray() as $row) : ?>
                  <option value="<?= $row['id']; ?>" id="kriteria"><?= $row['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="jumlahSk" class="jumlahSk">Jumlah Sub Kriteria</label>
              <input type="text" name="jumlahsk" id="jumlahSk" class="form-control jumlahSk" placeholder="Jumlah sub kriteria.." maxlength="1" pattern="[0-9]+">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-success btn-request" onclick="tambahSub()"> <i class="fa fa-circle-notch"></i> Request</button>
            </div>

            <div class="subkriteria-section"></div>
            <div class="submit-section"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('custom-js') ?>
<script>
  $(window).keydown(function(event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

  const tambahSub = function() {
    const jumlahSub = $('#jumlahSk').val()

    if (jumlahSub > 0) {
      $('.jumlahSk').hide()
      $('.btn-request').hide()

      let subkriteriaSection = ''
      for (let i = 0; i < jumlahSub; i++) {
        let number = i + 1
        subkriteriaSection += `
        <div class="form-group row">
          <div class="col-10">
            <input type="text" class="form-control" name="nama[]" id="sk${i}" placeholder="Nama sub kriteria..">
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="nilai_preferensi[]" id="np${i}" placeholder="Nilai..">
          </div>
        </div>
        `
      }
      $('.subkriteria-section').html(subkriteriaSection)

      $('.submit-section').html(`
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-simpan"><i class="fa fa-save"></i> Simpan</button>
      </div>
      `)
    }
  }

  const formTambah = $('#formTambah')
  formTambah.submit(function(e) {
    e.preventDefault()

    requestSaveData(formTambah, '', 'has array')
  })
</script>
<?php $this->endSection() ?>
