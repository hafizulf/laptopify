<?= $this->extend('template/content'); ?>

<?= $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card shadow-sm">
        <div class="card-body badge-primary">
          <h3 class="text-center"><b>Informasi Laptopify</b></h3>

          <h5><b><u> Deskripsi </u></b></h5>
          <p>
            Laptopify merupakan sebuah sistem pendukung keputusan yang bertujuan untuk merekomendasikan laptop pada e-commerce kepada user berdasarkan pilihan-pilihan dari atribut yang ditentukan sesuai dengan preferensi yang dibutuhkan.
          </p>
          <h5><b><u> Langkah-langkah untuk Menghasilkan Laptop Rekomendasi Terbaik </u></b></h5>
          <p>
          <ol class="text-putih">
            <?php if (session('role') === 'Admin') : ?>
              <li>Masukkan Kriteria
                <p>
                  Tambah <a href="/kriteria" target="_blank">kriteria-kriteria</a> yang sesuai dengan kebutuhan, serta pastikan <a href="/sub-kriteria" target="_blank">sub-kriteria</a> awal untuk tipe (benefit criteria & tipe data kualitatif) sudah ditambahkan, karena akan digunakan pada form tambah data alternatif.
                </p>
              </li>
              <li>Berikan nilai bobot kriteria
                <p>
                  Tambahkan <a href="/bobot" target="_blank">Nilai bobot</a> untuk masing-masing kriteria sesuai dengan tingkat prioritas yang dibutuhkan.

                  Serta lakukan proses normalisasi bobot <button type="button" class="btn btn-sm btn-dark"><i class="fas fa fa-recycle"></i> Update Normalisasi Nilai Bobot</button> jika nilai pembobotan sudah diberikan.
                </p>
              </li>
            <?php endif; ?>
            <li>
              Masukkan Data Alternatif
              <p>
                Tambah data-data <a href="/alternatif" target="_blank"> alternatif </a> maksimal sebanyak 20 data. Kemudian klik <button type="button" class="btn btn-sm btn-dark"><i class="fas fa fa-recycle"></i> Tentukan Nilai Kriteria</button> untuk menentukan nilai setiap kriteria berdasarkan data alternatif yang sudah ada.
              </p>
            </li>
            <li>Proses Perhitungan
              <p class="mb-1">
                - Tentukan nilai kriteria pada halaman <a href="/perhitungan/nilai-kriteria" target="_blank"> berikut</a> dengan meng-klik <button type="button" class="btn btn-sm btn-dark"><i class="fas fa fa-recycle"></i> Tentukan Nilai Kriteria</button>
              </p>
              <p class="mb-1">
                - Tentukan nilai utility pada halaman <a href="/perhitungan/nilai-utility" target="_blank"> berikut</a> dengan meng-klik <button type="button" class="btn btn-sm btn-dark"><i class="fas fa fa-recycle"></i> Tentukan Nilai Utility</button>
              </p>
              <p class="mb-1">
                - Tentukan nilai akhir pada halaman <a href="/perhitungan/nilai-akhir" target="_blank"> berikut</a> dengan meng-klik <button type="button" class="btn btn-sm btn-dark"><i class="fas fa fa-recycle"></i> Tentukan Nilai Akhir</button>
              </p>
              <p>
                - Sekarang nilai akhir beserta peringkat rekomendasi terkait alternatif (laptop) dapat dilihat pada informasi <a href="/perhitungan/nilai-akhir" target="_blank"> Nilai Akhir</a>.
              </p>
            </li>
          </ol>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>
