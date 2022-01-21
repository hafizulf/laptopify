<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAkhir;
use App\Models\NilaiKriteria;
use App\Models\NilaiUtility;

class Hitung extends BaseController
{
  public function __construct()
  {
    $this->kriteriaModel = new Kriteria();
    $this->alternatifModel = new Alternatif();
    $this->nilaiKriteriaModel = new NilaiKriteria();
    $this->nilaiUtilityModel = new NilaiUtility();
    $this->nilaiAkhirModel = new NilaiAkhir();
  }

  public function hitungNilaiKriteria()
  {
    $data = [
      'judul' => 'Proses Perhitungan',
      'kriteria' => $this->kriteriaModel->getCriteria(),
      'alternatif' => $this->alternatifModel->getKodeAlternatif(),
      'nilai_kriteria' => $this->nilaiKriteriaModel->getNilaiKriteria(),
    ];

    return view('perhitungan/nilai-kriteria', $data);
  }

  public function hitungNilaiUtility()
  {
    $data = [
      'judul' => 'Proses Perhitungan',
      'kriteria' => $this->kriteriaModel->getCriteria(),
      'alternatif' => $this->alternatifModel->getKodeAlternatif(),
      'nilai_utility' => $this->nilaiUtilityModel->getNilaiUtility(),
    ];

    return view('perhitungan/nilai-utility', $data);
  }

  public function hitungNilaiAkhir()
  {
    $data = [
      'judul' => 'Proses Perhitungan',
      'kriteria' => $this->kriteriaModel->getCriteria(),
      'alternatif' => $this->alternatifModel->getKodeAlternatif(),
      'nilai_akhir' => $this->nilaiAkhirModel->getNilaiAkhir(),
    ];

    return view('perhitungan/nilai-akhir', $data);
  }
}
